<?php 

include('../Controller/Conect/conecao.php');
session_start(); 

$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha'] ?? '';


if (!preg_match("/^\d{11}$/", $cpf)) {
    $_SESSION['error'] = "CPF inválido. Deve ter 11 dígitos.";
    header("Location: ../pages-usuario/Login-Cadastro/Login.php");
    exit;
}

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
    $_SESSION['error'] = "A senha deve ter no mínimo 8 caracteres, incluindo letra maiúscula, minúscula, número e caractere especial.";
    header("Location: ../pages-usuario/Login-Cadastro/Login.php");
    exit;
}
?>