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

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$total = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras - FrogTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/car.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer2.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">
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
      <li><a href="<?= BASE_URL ?>pages-usuario/usuario-pages/pagina-usuario.php">Pagina Usuário</a></li>
        <li><a href="<?= BASE_URL ?>pages-usuario/Tela-home-usuario.php">Pagina Home</a></li>
          <li><a href="<?= BASE_URL ?>pages-usuario/loja/loja.php">Loja</a></li>
          <li><a href="<?= BASE_URL ?>pages-usuario/fale-conosco-user/fale-conosco-user.php">Fale Conosco</a></li>
            <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
    </ul>
  </div>

<div class="overlay" id="overlay"></div>

<div class="floating-button" title="Pagina de Ajuda Usuário">
        <a href="../paginas_cadastros/ajudaUsuario.php" target="_blank">
            <img src="<?= BASE_URL ?>img/logo/FrogTech-logo.png" alt="Frog Tech Logo" width="40">
        </a>
    </div>

<div class="carrinho-container">
    <h2 class="carrinho-header mb-4">Carrinho de Compras</h2>

    <?php if (!empty($_SESSION['carrinho'])): ?>
        <?php foreach ($_SESSION['carrinho'] as $item): 
            $subtotal = $item['preco'] * $item['quantidade'];
            $total += $subtotal;
        ?>
            <div class="produto-item">
                <p class="mb-1"><strong><?= htmlspecialchars($item['nome']) ?></strong></p>
                <p class="mb-1">Quantidade: <?= $item['quantidade'] ?></p>
                <p>Preço: R$ <?= number_format($item['preco'], 2, ',', '.') ?></p>
            </div>
        <?php endforeach; ?>

        <h4 class="mt-4">Total: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></h4>

        <form method="post" action="">
            <button type="submit" name="finalizar" class="btn btn-finalizar mt-3">Finalizar Compra</button>
        </form>

    <?php else: ?>
        <div class="alert alert-info">Seu carrinho está vazio.</div>
    <?php endif; ?>
</div>

<!-- <footer>
    <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
</footer> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>js/Nav-Bar.js"></script>
</body>
</html>

<?php
if (isset($_POST['finalizar'])) {
    $user_id = $_SESSION['user_id'];
    $compra_sucesso = true;

    foreach ($_SESSION['carrinho'] as $item) {
        $produto_id = $item['id'];
        $quantidade = $item['quantidade'];
        $nome_produto = $item['nome'];
        $preco = $item['preco'];

        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :produto_id");
        $stmt->execute([':produto_id' => $produto_id]);
        $produto = $stmt->fetch();

        if ($produto && $produto['quantidade'] >= $quantidade) {
            $stmt = $pdo->prepare("INSERT INTO compras (user_id, produto_id, nome_produto, preco, quantidade) 
                                   VALUES (:user_id, :produto_id, :nome_produto, :preco, :quantidade)");
            $stmt->execute([
                ':user_id' => $user_id,
                ':produto_id' => $produto_id,
                ':nome_produto' => $nome_produto,
                ':preco' => $preco,
                ':quantidade' => $quantidade
            ]);

            $nova_quantidade = $produto['quantidade'] - $quantidade;
            $stmt = $pdo->prepare("UPDATE produtos SET quantidade = :quantidade WHERE id = :produto_id");
            $stmt->execute([':quantidade' => $nova_quantidade, ':produto_id' => $produto_id]);
        } else {
            $compra_sucesso = false;
            echo "<div class='alert alert-danger text-center mt-4'>Quantidade insuficiente em estoque para o produto: " . htmlspecialchars($nome_produto) . "</div>";
        }
    }

    if ($compra_sucesso) {
        unset($_SESSION['carrinho']);
        header("Location: ../loja/Pagamento-recebido.php");
        exit;
    } else {
        echo "<div class='alert alert-warning text-center mt-4'>Houve um erro na finalização da compra. Tente novamente mais tarde.</div>";
    }
}
?>
