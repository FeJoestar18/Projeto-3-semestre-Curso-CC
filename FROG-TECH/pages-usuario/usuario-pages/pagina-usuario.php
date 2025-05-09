<?php
session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include_once('../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');


if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 3) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$user_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuário não encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {
    $diretorioDestino = 'public_html/img/Fotos-users/';
    $nomeFoto = $_FILES['foto']['name'];
    $caminhoDestino = $diretorioDestino . basename($nomeFoto);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino)) {
        
        $stmtUpdate = $pdo->prepare("UPDATE usuarios SET foto = ? WHERE id = ?");
        $stmtUpdate->execute([basename($nomeFoto), $user_id]);
        $usuario['foto'] = basename($nomeFoto); 
        echo "Foto enviada com sucesso!";
    } else {
        echo "Erro ao enviar foto.";
    }
}

$fotoPerfil = !empty($usuario['foto']) ? BASE_URL . "img/Fotos-users/" . $usuario['foto'] : "https://via.placeholder.com/100";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel do Usuário - FrogTech</title>
  <style>
    .avatar {
      cursor: pointer;
      border-radius: 50%;
      width: 100px;
      height: 100px;
      object-fit: cover;
      border: 2px solid #ccc;
    }
    #uploadForm {
      display: none;
    }
  </style>
</head>
<body>

<div class="container">

  <form id="uploadForm" action="<?= BASE_URL ?>Controller/upload_foto.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto" id="fotoInput" accept="image/*" onchange="document.getElementById('uploadForm').submit()">
  </form>

  <img src="<?= $fotoPerfil ?>" class="avatar" onclick="document.getElementById('fotoInput').click()" alt="Avatar"><br>

  <strong><?= htmlspecialchars($usuario['email']) ?></strong><br>
  <small>ID: <?= $usuario['id'] ?></small>

  <h2>Resumo do seu perfil</h2>
  <p><strong>CPF:</strong> <?= $usuario['cpf'] ?: 'Não informado' ?></p>
  <p><strong>Telefone:</strong> <?= $usuario['telefone'] ?: 'Não informado' ?></p>
  <p><strong>Email:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
</div>

<a class="logout" href="<?php echo BASE_URL; ?>/Controller/logout.php">🔌 Desconectar</a>

</body>
</html>