<?php 
include(__DIR__ . "/../../Controller/PaginaUserRequest.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel do Usuário - FrogTech</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- layouts -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer2.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/ModalExcluirUser.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/avatarUser.css">
  
            <!-- css -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/User.css">
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
      <li><a href="<?= BASE_URL ?>pages-usuario/loja/carrinho.php">Carrinho de Compras</a></li>
        <li><a href="<?= BASE_URL ?>pages-usuario/Tela-home-usuario.php">Pagina Home</a></li>
          <li><a href="<?= BASE_URL ?>pages-usuario/loja/loja.php">Loja</a></li>
          <li><a href="<?= BASE_URL ?>pages-usuario/fale-conosco-user/fale-conosco-user.php">Fale Conosco</a></li>
            <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
    </ul>
  </div>

<div class="overlay" id="overlay"></div>

<div class="container">
    <form id="uploadForm" action="<?= BASE_URL ?>Controller/upload_foto.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="foto" id="fotoInput" accept="image/*" onchange="document.getElementById('uploadForm').submit()">
    </form>

    <img src="<?= $fotoPerfil ?>" class="avatar" onclick="document.getElementById('fotoInput').click()" alt="Avatar"><br>

    <strong><?= htmlspecialchars($usuario['email']) ?></strong>
      <small>ID: <?= $usuario['id'] ?></small>
        <p><strong>Bem-vindo(a) ao seu painel de usuário!</strong> </p>
          <p><strong>CPF:</strong> <?= $usuario['cpf'] ?: 'Não informado' ?></p>
            <p><strong>Telefone:</strong> <?= $usuario['telefone'] ?: 'Não informado' ?></p>
              <p><strong>Email:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
                <a href="<?= BASE_URL ?>Controller/logout.php " class="logout">Sair</a>
                  <!-- <a href="<?= BASE_URL ?>pages-usuario/usuario-pages/editar-usuario.php" class="btn-editar">Editar</a> -->
                    <a href="javascript:void(0);" class="btn-excluir" onclick="abrirModal()">Excluir Perfil</a>
</div>

<div class="modal-overlay" id="modalExcluir">
  <div class="modal-content" id="modalContent">
    <h3>Tem certeza que deseja excluir seu perfil?</h3>
    <p>Essa ação é irreversível.</p>
    <div class="modal-actions">
      <button onclick="fecharModal()" class="btn-cancelar">Cancelar</button>
      <button onclick="exibirAnimacaoExclusao()" class="btn-confirmar">Sim, excluir</button>
    </div>
  </div>

  <div class="modal-content" id="modalExcluindo" style="display: none;">
    <div class="loading-spinner"></div>
    <p>Excluindo seu perfil...</p>
  </div>
</div>

<div class="floating-button" title="Pagina de Ajuda Usuário">
        <a href="../paginas_cadastros/ajudaUsuario.php" target="_blank">
            <img src="<?= BASE_URL ?>img/logo/FrogTech-logo.png" alt="Frog Tech Logo" width="40">
        </a>
    </div>
<footer>
    <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
</footer>

<!-- Script -->
 <script src="<?= BASE_URL ?>js/Nav-Bar.js"></script>
  <script src="<?= BASE_URL ?>js/Modal/animationExcluirUser.js"></script>
  
</body>
</html>