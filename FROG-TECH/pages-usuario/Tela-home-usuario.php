<?php

session_start();
include("../Controller/protect.php");
include("../Controller/Conect/conecao.php");
include_once('../Controller/Conect/config-url.php');
include_once('../Controller/func/exibir-modal-verificar-role_id.php'); 

if (isset($_SESSION['user_id']) && isset($_SESSION['role_id']) && $_SESSION['role_id'] === 3) {
    
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
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/telaHomeUser.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer2.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/cardStyleHome.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?= BASE_URL ?>img/logo/LogoHeader.png" alt="Frog Tech Logo">
        </div>
        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <div class="sidebar" id="sidebarMenu">
        <ul>
            <li><a href="<?= BASE_URL ?>pages-usuario/loja/loja.php">Loja</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/usuario-pages/pagina-usuario.php">Perfil de Usuário</a></li>
            <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="titulo">
        <h1>Bem-vindo à Frog Tech</h1>
        <h3>Seu e-commerce de tecnologia</h3>
    </div>

    <div class="card-container">
        <div class="card">
            <h2>Compre Agora</h2>
            <p>Aproveite nossas ofertas exclusivas.</p>
            <a href="../pages-usuario/loja/loja.php" class="button">Comprar</a>
        </div>
        <div class="card">
            <h2>Fale Conosco</h2>
            <p>Entre em contato com nossa equipe de suporte.</p>
            <a href="../pages-usuario/fale-conosco-user/fale-conosco-user.php" class="button">Fale Conosco</a>
        </div>
        <!-- <div class="card">
            <h2>Sobre Nós</h2>
            <p>Conheça mais sobre nossa história e valores.</p>
            <a href="../pages-usuario/sobreNos.php" class="button">Venha Saber Mais</a>
        </div> -->
    </div>

    <div class="floating-button" title="Pagina de Ajuda Usuário">
        <a href="../pages-usuario/ajuda.php" target="_blank">
            <img src="<?= BASE_URL ?>img/logo/FrogTech-logo.png" alt="Frog Tech Logo" width="40">
        </a>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="../js/Nav-Bar.js"></script>

</body>
</html>