<?php
session_start();
include(__DIR__ . '/../../Controller/Conect/conecao.php');
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');

if (isset($_SESSION['user_id']) && ($_SESSION['role_id'] === 1 || $_SESSION['role_id'] === 2)) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$query = "SELECT * FROM usuarios";
$stmt = $pdo->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuários</title>
    <style>
        body {
            background-color: #f5f7fb;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 168, 107, 0.15);
        }

        h1 {
            color: #00a86b;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        thead {
            background-color: #e0f8f0;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        tr:hover {
            background-color: #f1fef8;
        }

        a.btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            background-color: #00a86b;
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s ease;
        } */

        a.btn:hover {
            background-color: #008f5d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Usuários</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Role ID</th>
                    <th>Ações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['telefone']); ?></td>
                        <td><?= htmlspecialchars($row['cpf']); ?></td>
                        <td><?= htmlspecialchars($row['role_id']); ?></td>
                        <td><a class = "btn" href="editar-usuario.php?id=<?= $row['id']; ?>">Editar</a></td>
                        <td><a class = "btn"href="<?= BASE_URL; ?>Controller/admin/deletar-usuario.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
    </div>
</body>
</html>
