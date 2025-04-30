<?php 

$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($cpf === 'AdminCPF' && $senha === 'admin') {
    header("Location: ../pages-admin/Tela-home-adm.php");
    exit;
}

$cpf_limpo = preg_replace("/\D/", "", $cpf);
if (!preg_match("/^\d{11}$/", $cpf_limpo)) {
    echo "CPF inválido. Deve ter 11 dígitos.";
    exit;
}

if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $senha)) {
    echo "Senha inválida. Deve ter pelo menos 8 caracteres alfanuméricos.";
    exit;
}
?>
