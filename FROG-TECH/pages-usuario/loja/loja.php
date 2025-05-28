<?php
include_once('../../Controller/lojaRequest.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <!-- Layouts -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/barraPesquisaLoja.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/filtroCategoriasLoja.css">

    <!-- CSS ESTILOS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/lojaUser.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="<?= BASE_URL ?>img/logo/LogoHeader.png" alt="Frog Tech Logo">
        </div>

        <!-- Formulário de busca -->
        <form method="GET" action="loja.php">
            <div style="position: relative;">
                <input type="text" name="search" placeholder="Pesquisar produtos..." value="<?= htmlspecialchars($search) ?>"> 
                <i class="search-icon">🔍</i>
            </div>
        </form>

        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <div class="sidebar" id="sidebarMenu">
        <ul>
            <li><a href="<?= BASE_URL ?>pages-usuario/loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/usuario-pages/pagina-usuario.php">Perfil de Usuário</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/fale-conosco-user/fale-conosco-user.php">Fale Conosco</a></li>
            <li><a href="<?= BASE_URL ?>pages-usuario/Tela-home-usuario.php">Pagina Home</a></li>
            <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <h1>Lista de Produtos</h1>

    <div class="filtro-categorias">
        <form method="GET" action="">
            <div class="btn-group" role="group" aria-label="Filtros de categoria">
                <button type="submit" name="categoria" value="" class="btn-outline-primary <?= ($categoria == '') ? 'active' : '' ?>">Todos</button>
                <?php foreach ($categorias as $cat): ?>
                    <button type="submit" name="categoria" value="<?= htmlspecialchars($cat['id']) ?>" class="btn-outline-primary <?= ($categoria == $cat['id']) ? 'active' : '' ?>">
                        <?= htmlspecialchars($cat['nome']) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </form>
    </div>

    <div class="produtos-container">
        <?php if ($produtos): ?>
            <?php foreach ($produtos as $produto): ?>
                <?= renderProduto($produto) ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>

    <div class="floating-button" title="Pagina de Ajuda Usuário">
        <a href="../paginas_cadastros/ajudaUsuario.php" target="_blank">
            <img src="<?= BASE_URL ?>img/logo/FrogTech-logo.png" alt="Frog Tech Logo" width="40">
        </a>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="<?= BASE_URL ?>js/Nav-Bar.js"></script>
    <script src='<?= BASE_URL ?>js/search.js'></script>

</html>
