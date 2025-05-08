<?php 
include_once('Conect/config-url.php');
include('../Controller/Conect/conecao.php');
session_start(); 

$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha'] ?? '';


if (!preg_match("/^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$/", $cpf)) {
    $_SESSION['error'] = "CPF inválido. Deve ter 11 dígitos.";
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit;
}


// if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
//     $_SESSION['error'] = "A senha deve ter no mínimo 8 caracteres, incluindo letra maiúscula, minúscula, número e caractere especial.";
//     header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
//     exit;
// }

// if (empty($senha)) {
//     $_SESSION['error'] = "Senha não pode ser vazia.";
//     header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
//     exit;
// }
// if (empty($cpf)) {
//     $_SESSION['error'] = "CPF não pode ser vazio.";
//     header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
//     exit;
// }

?>