<?php 

if (!preg_match("/^\d{11}$/", $cpf)) {
    echo "CPF inválido. Deve ter 11 dígitos.";
    exit;
}

?>