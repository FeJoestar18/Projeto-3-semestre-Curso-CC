<?php 

include('../Controller/Conect/conecao.php');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "E-mail inválido!";
    header("Location: ../pages/Tela-registro.php");
    exit;
}

if (!preg_match("/^\d{11}$/", $cpf)) {
    $_SESSION['error'] = "CPF inválido. Deve ter 11 dígitos.";
    header("Location: ../pages/Tela-registro.php");
    exit;
}

if (!preg_match("/^\d{10,11}$/", $telefone)) {
    $_SESSION['error'] = "Telefone inválido. Deve ter 10 ou 11 dígitos.";
    header("Location: ../pages/Tela-registro.php");
    exit;
}

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
    $_SESSION['error'] = "A senha deve ter no mínimo 8 caracteres, incluindo letra maiúscula, minúscula, número e caractere especial.";
    header("Location: ../pages/Tela-registro.php");
    exit;
}

?>
