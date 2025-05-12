<?php
session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include(__DIR__ . "/../../Controller/protect.php");
include_once('../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 3) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$query = "SELECT * FROM produtos";
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if (!empty($search)) {
    $query .= " WHERE nome LIKE :search_nome OR descricao LIKE :search_descricao";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':search_nome', '%' . $search . '%');
    $stmt->bindValue(':search_descricao', '%' . $search . '%');
    $stmt->execute();
} else {
    $stmt = $pdo->query($query);
}

$produtos = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <!-- layouts -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/barraPesquisaLoja.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/rodape.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">

    <!-- css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/loja.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="<?= BASE_URL ?>img/logo/LogoHeader.png" alt="Frog Tech Logo">
        </div>

        <form method="GET" action="">
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
            <li><a href="<?= BASE_URL ?>pages-usuario/Tela-home-usuario.php">Pagina Home</a></li>
            <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <h1>Lista de Produtos</h1>

    <div class="produtos-container">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <img src="<?= BASE_URL ?>uploads-files-produtos/<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>" width="100" height="100">
                <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                <p><?= htmlspecialchars($produto['descricao']) ?></p>
                <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <p>Quantidade disponível: <?= $produto['quantidade'] ?></p>
                <a href="produto.php?id=<?= $produto['id'] ?>">Ver mais</a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="floating-button" title="Pagina de Ajuda Usuário">
        <a href="../paginas_cadastros/ajudaUsuario.php" target="_blank">
            <img src="<?= BASE_URL ?>img/logo/FrogTech-logo.png" alt="Frog Tech Logo" width="40">
        </a>
    </div>

    <footer>
        <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
    </footer>

    <script src="<?= BASE_URL ?>js/Nav-Bar.js"></script>

</body>
</html>