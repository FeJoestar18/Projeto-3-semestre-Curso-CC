<?php

session_unset();
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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Preencher Endereço</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/buscarCEP.js" defer></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/endereco.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/footer2.css">
</head>
<body>

    <div class="address-form-container">
        <h2>Complete seu endereço</h2>
        <form action="<?= BASE_URL ?>Controller/process-form-endereco.php" method="post">
            <input type="hidden" name="produto_id" value="<?= $_SESSION['produto_id'] ?? '' ?>">

            <div class="mb-3">
                <input type="text" name="cep" placeholder="CEP" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="rua" placeholder="Rua" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="bairro" placeholder="Bairro" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="cidade" placeholder="Cidade" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="estado" placeholder="Estado (UF)" class="form-control" required>
            </div>

            <div class="text-center">
                <button type="submit" name="salvar" class="btn btn-save">Salvar Endereço</button>
            </div>
        </form>
    </div>
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 Frog Tech. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


