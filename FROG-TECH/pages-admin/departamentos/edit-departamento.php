<?php 

include_once('../../Controller/Conect/config-url.php');
include_once('../../Controller/admin/process-form-edit-departamento.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Departamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Departamento</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($departamento['nome']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" required><?= htmlspecialchars($departamento['descricao']) ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="<?= BASE_URL ?>pages-admin/departamentos/lista-departamento.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
</body>
</html>