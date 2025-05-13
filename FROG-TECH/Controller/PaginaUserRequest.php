<?php
session_start();
include(__DIR__ . "/Conect/conecao.php");
include_once(__DIR__ . "/Conect/config-url.php");
include_once(__DIR__ . "/func/exibir-modal-verificar-role_id.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] !== 3) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
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

$fotoPerfil = !empty($usuario['foto']) 
    ? BASE_URL . "img/Fotos-users/" . $usuario['foto'] 
    : "https://via.placeholder.com/100";
