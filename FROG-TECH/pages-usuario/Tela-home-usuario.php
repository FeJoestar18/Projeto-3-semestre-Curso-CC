<?php

session_start();
include("../Controller/protect.php");
include("../Controller/Conect/conecao.php");
include_once('../Controller/Conect/config-url.php');
include_once('../Controller/func/exibir-modal-verificar-role_id.php'); 

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 3) {
    echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/Themes.css">
</head>
<body>
    <h2>Bem-vindo à Home!</h2>
    <button id="toggleTheme">Alternar Tema</button>
    <a href="../pages-usuario/fale-conosco-user/fale-conosco-user.php">Fale Conosco</a><br>
    <a href="../pages-usuario/loja/loja.php">Produtos</a><br>
    <a href="../pages-usuario/usuario-pages/pagina-usuario.php">Perfil</a><br>
    <a href="../Controller/logout.php" onclick="return confirm('Deseja realmente sair?')">Sair</a>
    <script src="../js/Themes.js"></script>
</body>
</html>
