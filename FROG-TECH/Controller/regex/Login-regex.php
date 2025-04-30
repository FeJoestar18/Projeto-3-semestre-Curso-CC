<?php 

if (!preg_match("/^\d{11}$/", $cpf)) {
    echo "CPF inválido. Deve ter 11 dígitos.";
    exit;
}

if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $senha)) {
    echo "Senha inválida. Deve ter pelo menos 8 caracteres alfanuméricos.";
    exit;
}

?>