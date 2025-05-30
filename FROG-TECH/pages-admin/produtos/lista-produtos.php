<?php

session_start();
include_once(dirname(__DIR__, 2) . '/Controller/Conect/conecao.php');
include_once(dirname(__DIR__, 2) . '/Controller/Conect/config-url.php'); 
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');

if (isset($_SESSION['user_id']) && ($_SESSION['role_id'] === 1 || $_SESSION['role_id'] === 2)) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Produtos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Imagem</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= $produto['id'] ?></td>
                        <td><?= htmlspecialchars($produto['nome']) ?></td>
                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td><?= $produto['quantidade'] ?></td>
                        <td>
                            <?php if ($produto['imagem']): ?>
                                <img src="<?= $produto['imagem'] ?>" alt="Imagem" width="100">
                            <?php endif; ?>
                        </td>
                        <td>
                                <?php
                                $stmt_categoria = $pdo->prepare("SELECT nome FROM categorias WHERE id = :id");
                                $stmt_categoria->bindParam(':id', $produto['categoria_id']);
                                $stmt_categoria->execute();
                                $categoria = $stmt_categoria->fetch(PDO::FETCH_ASSOC);
                                if ($categoria && isset($categoria['nome'])) {
                                    echo htmlspecialchars($categoria['nome']);
                                } else {
                                    echo "Categoria não encontrada";  
                                }
                                ?>
                        </td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>pages-admin/produtos/editar-produto.php?id=<?= $produto['id'] ?>" class="btn btn-warning btn-sm"style="background-color: #00a86b;">Editar</a>
                            <a href="<?php echo BASE_URL; ?>Controller/admin/deletar-produto.php?id=<?= $produto['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <a href="<?php echo BASE_URL; ?>pages-admin/produtos/add-produto.php" class="btn btn-primary" style="background-color: #00a86b;">Adicionar Novo Produto</a><br><br>
    </div>
        </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
</body>
</html>
