<?php 

include_once('../../Controller/Conect/config-url.php');
include_once('../../Controller/admin/process-editar-produto.php');

$stmt = $pdo->query("SELECT * FROM categorias ORDER BY nome ASC");
$categorias = $stmt->fetchAll();
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
        <form action="" method="POST">
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
                <textarea class="form-control" id="descricao" name="descricao" required oninput="limitarDescricao()">
                    <?= htmlspecialchars($produto['descricao']) ?>
                </textarea>
                <small id="contador" class="form-text text-muted" style="display: none;">0/150 caracteres</small>
            </div>


            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" value="<?= $produto['quantidade'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Selecione uma Categoria</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>" <?= (isset($produto['categoria_id']) && $produto['categoria_id'] == $categoria['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($categoria['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="<?= BASE_URL ?>pages-admin/produtos/lista-produtos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>


    <script>
document.addEventListener("DOMContentLoaded", function() {
    limitarDescricao(); 
});

function limitarDescricao() {
    const textarea = document.getElementById("descricao");
    const contador = document.getElementById("contador");
    const maxChars = 150;

    if (textarea.value.length > maxChars) {
        textarea.value = textarea.value.substring(0, maxChars);
    }

    contador.textContent = `${textarea.value.length}/${maxChars} caracteres`;

    if (textarea.value.trim() === "") {
        contador.style.display = "none";
    } else {
        contador.style.display = "block";
    }
}
</script>

</body>
</html>