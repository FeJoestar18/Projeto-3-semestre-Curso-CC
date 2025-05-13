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
    $diretorioDestino = 'FROG-TECH/img/Fotos-users/';
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
  <!-- layouts -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer2.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/ModalExcluirUser.css">
  
            <!-- css -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/User.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="<?= BASE_URL ?>img/logo/LogoHeader.png" alt="Frog Tech Logo">
        </div>

        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>
            <div class="sidebar" id="sidebarMenu">
                <ul>
                    <li><a href="<?= BASE_URL ?>pages-usuario/loja/carrinho.php">Carrinho de Compras</a></li>
                    <li><a href="<?= BASE_URL ?>pages-usuario/Tela-home-usuario.php">Pagina Home</a></li>
                    <li><a huref="<?= BASE_URL ?>pages-usuario/loja/loja.php">Loja</a></li>
                    <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
                </ul>
            </div>
          
            <div class="overlay" id="overlay"></div>

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
  <a href="<?= BASE_URL ?>Controller/logout.php " class="logout">Sair</a>
  <a href="<?= BASE_URL ?>pages-usuario/usuario-pages/editar-usuario.php" class="btn-editar">Editar</a>
   <a href="javascript:void(0);" class="btn-excluir" onclick="abrirModal()">Excluir Perfil</a>
</div>

<div class="modal-overlay" id="modalExcluir">
  <div class="modal-content" id="modalContent">
    <h3>Tem certeza que deseja excluir seu perfil?</h3>
    <p>Essa ação é irreversível.</p>
    <div class="modal-actions">
      <button onclick="fecharModal()" class="btn-cancelar">Cancelar</button>
      <button onclick="exibirAnimacaoExclusao()" class="btn-confirmar">Sim, excluir</button>
    </div>
  </div>

  <div class="modal-content" id="modalExcluindo" style="display: none;">
    <div class="loading-spinner"></div>
    <p>Excluindo seu perfil...</p>
  </div>
</div>


<!-- FOOTERS -->
<div class="floating-button" title="Pagina de Ajuda Usuário">
        <a href="../paginas_cadastros/ajudaUsuario.php" target="_blank">
            <img src="<?= BASE_URL ?>img/logo/FrogTech-logo.png" alt="Frog Tech Logo" width="40">
        </a>
    </div>
<footer>
    <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
</footer>

<script src="<?= BASE_URL ?>js/Nav-Bar.js"></script>
<script src="<?= BASE_URL ?>js/Modal/animationExcluirUser.js"></script>

</body>
</html>