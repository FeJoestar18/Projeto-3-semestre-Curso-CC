<?php
include_once(__DIR__ . "/Conect/config-url.php");
include(__DIR__ . "/Conect/conecao.php");
include(__DIR__ . "/protect.php");

$id = $_SESSION['user_id'] ?? null;

if (!$id) {
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT cep, rua, bairro, cidade, estado FROM usuarios WHERE id = ?");
$stmt->bindParam(1, $id, PDO::PARAM_INT);  
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);  

if (
    empty($usuario['cep']) ||
    empty($usuario['rua']) ||
    empty($usuario['bairro']) ||
    empty($usuario['cidade']) ||
    empty($usuario['estado'])
) {
    header("Location: " . BASE_URL . "pages-usuario/dados-endereco/form_endereco.php");
    exit;
}


