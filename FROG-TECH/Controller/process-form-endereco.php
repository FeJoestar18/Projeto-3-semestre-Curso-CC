<?php
session_start();
include_once(__DIR__ . '/Conect/config-url.php');  
include(__DIR__ . "/Conect/conecao.php");
include(__DIR__ . "/protect.php");

$id = $_SESSION['user_id'] ?? null;
$produtoId = $_SESSION['produto_id'] ?? null;

if (!$id) {
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit;
}

if (empty($produtoId)) {
    echo "Erro: Produto não selecionado.";
    exit();
}

if (isset($_POST['salvar'])) {
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $stmt = $pdo->prepare("UPDATE usuarios SET cep = ?, rua = ?, bairro = ?, cidade = ?, estado = ? WHERE id = ?");
    $stmt->execute([$cep, $rua, $bairro, $cidade, $estado, $id]);

    header("Location: " . BASE_URL . "pages-usuario/loja/checkout.php");
    exit;
}
