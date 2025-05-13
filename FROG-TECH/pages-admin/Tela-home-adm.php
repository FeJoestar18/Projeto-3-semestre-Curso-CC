<?php
session_start();
include("../Controller/protect.php");
include("../Controller/Conect/conecao.php");
include_once('../Controller/Conect/config-url.php');
include_once('../Controller/func/exibir-modal-verificar-role_id.php'); 

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Olá, Mundo!</h1>
    <a href="../pages-admin/departamentos/form-add-departamentos.php">Adicionar Departamentos</a><br>
    <a href="../pages-admin/produtos/lista-produtos.php">Listar Produtos</a><br>
    <a href="../pages-admin/fale-conosco/fale-conosco-adm.php">Fale Conosco</a><br>
    <a href="../Controller/logout.php" onclick="return confirm('Deseja realmente sair?')">Sair</a>
</body>
</html>