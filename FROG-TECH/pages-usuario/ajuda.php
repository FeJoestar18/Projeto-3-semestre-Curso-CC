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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Central de Ajuda - Frog Tech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    
  </style>
<link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/ajuda.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer2.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
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
          <li><a href="<?= BASE_URL ?>pages-usuario/Tela-home-usuario.php">Home</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/loja/loja.php">Loja</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/usuario-pages/pagina-usuario.php">Perfil de Usuário</a></li>
            <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

  <section class="hero">
    <h1 class="display-5 fw-bold">Central de Ajuda</h1>
    <p class="lead">Bem-vindo à Central de Suporte da Frog Tech! Como podemos te ajudar hoje?</p>
  </section>

  <div class="container py-5">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card card-help text-center p-4">
          <div class="icon-box"><i class="bi bi-search"></i></div>
          <h5 class="fw-bold">Pesquisar Soluções</h5>
          <p>Encontre respostas para dúvidas frequentes e tutoriais passo a passo.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-help text-center p-4">
          <div class="icon-box"><i class="bi bi-headset"></i></div>
          <h5 class="fw-bold">Falar com Suporte</h5>
          <p>Nossa equipe está pronta para te ajudar com qualquer problema técnico.</p>
          <a href="<?= BASE_URL ?>pages-usuario/fale-conosco-user/fale-conosco-user.php" class="mt-2 d-inline-block" style="color: #2E7D32; text-decoration: none;">
            Contato
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-help text-center p-4">
          <div class="icon-box"><i class="bi bi-envelope-check"></i></div>
          <h5 class="fw-bold">Enviar Feedback</h5>
          <p>Compartilhe sugestões ou avalie sua experiência com nossos serviços.</p>
        </div>
      </div>
    </div>
  </div>

<footer>
        <div class="footer-content">
            <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
        </div>
    </footer>

  <script src="../js/Nav-Bar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
