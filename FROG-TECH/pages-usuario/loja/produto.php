<?php
session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include(__DIR__ . "/../../Controller/protect.php");
include_once('../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] !== 3) {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Consulta ao banco de dados
    $query = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        ?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Produto - <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></title>

            <!-- layouts -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/barraPesquisaLoja.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/rodape.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">
  
            <!-- css -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/produtoUser.css">
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
                    <li><a href="<?= BASE_URL ?>pages-usuario/usuario-pages/pagina-usuario.php">Perfil de Usuário</a></li>
                    <li><a href="<?= BASE_URL ?>pages-usuario/Tela-home-usuario.php">Pagina Home</a></li>
                    <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
                </ul>
            </div>

            <div class="overlay" id="overlay"></div>

           <div class="produto-container">
    <div class="produto-imagem">
        <h1><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></h1>
        <img src="<?= BASE_URL ?>uploads-files-produtos/<?= htmlspecialchars($produto['imagem'] ?: 'default.png', ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="avaliacoes">
        </div>
    </div>

    <div class="produto-descricao">
        <p><?= nl2br(htmlspecialchars($produto['descricao'], ENT_QUOTES, 'UTF-8')) ?></p><br>
        <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p><br>
        <p><strong>Quantidade disponível:</strong> <?= (int) $produto['quantidade'] ?></p>
    </div>

    <div class="produto-botoes">
        <form method="post" action="<?= BASE_URL ?>/Controller/adicionar_carrinho.php">
            <input type="hidden" name="produto_id" value="<?= (int) $produto['id'] ?>">
            <input type="number" name="quantidade" value="1" min="1" max="<?= (int) $produto['quantidade'] ?>" required>
            <button type="submit" name="acao" value="carrinho">Adicionar ao Carrinho</button>
        </form>

        <form method="post" action="<?= BASE_URL ?>/Controller/comprar.php">
            <input type="hidden" name="produto_id" value="<?= (int) $produto['id'] ?>">
            <input type="number" name="quantidade" value="1" min="1" max="<?= (int) $produto['quantidade'] ?>" required>
            <button type="submit" name="acao" value="comprar">Comprar</button>
        </form>
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

    <script src="<?= BASE_URL ?>js/Nav-Bar.js"></script>

    </body>
</html>

        <?php
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto inválido.";
}
?>
