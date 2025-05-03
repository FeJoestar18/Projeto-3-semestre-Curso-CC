<?php 
include_once('Conect/config-url.php');
include('../Controller/Conect/conecao.php');
session_start(); 

$email = $_POST['email'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$senha = $_POST['senha'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "E-mail inválido!";
    header("Location: " . BASE_URL . " /pages/Tela-registro.php");
    exit;
}

if (!preg_match("/^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$/", $cpf)) {
    $_SESSION['error'] = "CPF inválido. Deve ter 11 dígitos.";
    header("Location: " . BASE_URL . " /pages-usuario/cadastro/registro.php");
    exit;
}

if (!preg_match("/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/", $telefone)) {
    $_SESSION['error'] = "Telefone inválido. Deve ter 10 ou 11 dígitos.";
    header("Location: " . BASE_URL . " /pages-usuario/cadastro/registro.php");
    exit;
}

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
    $_SESSION['error'] = "A senha deve ter no mínimo 8 caracteres, incluindo letra maiúscula, minúscula, número e caractere especial.";
    header("Location: " . BASE_URL . " /pages-usuario/cadastro/registro.php");
    exit;
}
?>
