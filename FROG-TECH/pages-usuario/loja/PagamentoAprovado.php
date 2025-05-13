<!-- <?php
session_start();
include_once('../../Controller/Conect/config-url.php');
?> -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Confirmado</title>
     <link rel="stylesheet" href="<?= BASE_URL ?>css/ModalPayUser.css">
     <link rel="stylesheet" href="<?= BASE_URL ?>css/PayUsers.css">
</head>
<body>
    <div class="container">
        <!-- Logo da empresa -->
       <!-- <div class="logo"><img src="/Imagens/Logo.png" alt="Logo FrogTech"></div> -->
        <!-- Título de confirmação -->
        <div class="title">Pedido Confirmado</div>
        <!-- Ícone de confirmação -->
        <div class="icon"><img src="/Imagens/Visto.png" alt="Ícone de confirmação"></div>
        <!-- Texto de confirmação -->
        <div class="confirmation-text">Seu pedido foi realizado com sucesso.</div>
        <!-- Texto do e-mail -->
        <div class="email-text">Em breve você receberá um e-mail no endereço frogtech@gmail.com com todos os detalhes do pedido</div>
        <!-- Botão de voltar -->
        <div class="back-button">Voltar pra tela inicial</div>
    </div>

    
    <div class="modal">
        <h2>✅ Pagamento realizado com sucesso!</h2>
        <p>Você será redirecionado para a página inicial em instantes...</p>
    </div>

    </div>
</body>
</html>