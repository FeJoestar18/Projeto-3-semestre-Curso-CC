<?php
session_start();
include(__DIR__ . '/../../Controller/Conect/conecao.php');
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');


if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
    echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$query = "SELECT * FROM compras";
$stmt = $pdo->query($query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Compras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Compras</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto ID</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Data da Compra</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['produto_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nome_produto']); ?></td>
                    <td><?php echo htmlspecialchars($row['preco']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantidade']); ?></td>
                    <td><?php echo htmlspecialchars($row['data_compra']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>