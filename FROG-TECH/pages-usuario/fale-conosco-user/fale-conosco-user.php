<?php
session_start();
include(__DIR__ . '/../../Controller/Conect/conecao.php');
include(__DIR__ . '/../../Controller/protect.php');
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');
 

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 3) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM questions WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Fale Conosco - Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- layouts -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/header.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer2.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/Nav-Bar.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/BotaoPaginaDeAjuda.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/ModalExcluirUser.css">
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/avatarUser.css">
  
            <!-- css -->
            <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/fale-conosco.css">
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
            <li><a href="<?= BASE_URL ?>pages-usuario/usuario-pages/pagina-usuario.php">Perfil de Usuário</a></li>
            <li><a href="<?= BASE_URL ?>Controller/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="container mt-4">
        <h2>Fale Conosco - Usuário</h2>

        <form action="<?= BASE_URL ?>Controller/process-fale-conosco.php" method="post" class="mb-3">
            <div class="mb-3">
                <label for="question" class="form-label">Sua Pergunta</label>
                <textarea name="question" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Pergunta</button>
        </form>

        <h3>Suas Perguntas</h3>
        <ul class="list-group">
            <?php foreach ($questions as $q) { ?>
                <li class="list-group-item">
                    <strong>Você:</strong> <?php echo htmlspecialchars($q['question']); ?><br>
                    <?php if ($q['answer']) { ?>
                        <strong>Resposta do Admin:</strong> <?php echo htmlspecialchars($q['answer']); ?>
                    <?php } else { ?>
                        <em>Aguardando resposta...</em>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </div>

<div class="floating-button" title="Pagina de Ajuda Usuário">
        <a href="<?= BASE_URL ?>pages-usuario/ajuda.php" target="_blank">
            <img src="<?= BASE_URL ?>img/logo/FrogTech-logo.png" alt="Frog Tech Logo" width="40">
        </a>
    </div>
    
    <footer>
        <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
    </footer>

    <script src="<?= BASE_URL ?>js/Nav-Bar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
