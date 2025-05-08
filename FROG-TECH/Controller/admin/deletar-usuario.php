<?php
session_start();
include(__DIR__ . '/../../Controller/Conect/conecao.php');
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die("Usuário não encontrado.");
    }

    $deleteQuery = "DELETE FROM usuarios WHERE id = ?";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->execute([$id]);

    header("Location: " . BASE_URL . "pages-admin/usuarios/visualizar_usuarios.php");
    exit();
} else {
    die("ID do usuário não fornecido.");
}
?>
