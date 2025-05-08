<?php 

session_start();
include_once('../../Controller/Conect/config-url.php'); 
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');


if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
    echo "Usuário logado com ID: " . $_SESSION['user_id'];
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
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Produto</h2>
        <form action="<?= BASE_URL ?>Controller/admin/process-add_produto.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" required>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
            </div>

            <button type="submit" class="btn btn-primary">Adicionar Produto</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
