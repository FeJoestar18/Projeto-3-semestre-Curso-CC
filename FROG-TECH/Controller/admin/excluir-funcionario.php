<?php
session_start();
include_once(__DIR__ . '/../Conect/conecao.php');
include_once(__DIR__ . '/../Conect/config-url.php');

$funcionario_id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM funcionarios WHERE id = :id");
$stmt->bindParam(':id', $funcionario_id);
if ($stmt->execute()) {
    
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $funcionario_id);
    $stmt->execute();

    header("Location: " . BASE_URL . "pages-admin/Funcionario/lista-funcionarios.php");
    exit;
} else {
    echo "Erro ao excluir funcionário!";
}
?>
