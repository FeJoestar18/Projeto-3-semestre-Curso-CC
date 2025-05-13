<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit();
}

include(__DIR__ . '/Conect/conecao.php');
require_once(__DIR__ . '/Conect/config-url.php');  

$usuario_id = $_SESSION['user_id'];

$sql = "DELETE FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $usuario_id);

if ($stmt->execute()) {
    session_destroy();
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php?excluido=1");
    exit();
} else {
    echo "Erro ao excluir o usuário. Por favor, tente novamente.";
}

?>