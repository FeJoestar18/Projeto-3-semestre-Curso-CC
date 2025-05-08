<?php
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        header('Location: ' . BASE_URL . 'pages-admin/produtos/lista_produtos.php?erro=Produto não encontrado');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome']);
        $preco = floatval($_POST['preco']);
        $descricao = trim($_POST['descricao']);
        $quantidade = intval($_POST['quantidade']);

        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao, quantidade = :quantidade WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':preco' => $preco,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':id' => $id
        ]);

        header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php?sucesso=Produto atualizado com sucesso');
        exit();
    }
} else {
    header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php?erro=ID não fornecido');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Produto</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" name="preco" value="<?= number_format($produto['preco'], 2, '.', '') ?>" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" required><?= htmlspecialchars($produto['descricao']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" value="<?= $produto['quantidade'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="<?= BASE_URL ?>pages-admin/produtos/lista_produtos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>