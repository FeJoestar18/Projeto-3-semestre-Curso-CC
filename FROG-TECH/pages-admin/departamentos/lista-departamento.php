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

$sql = "SELECT * FROM departamentos ORDER BY id DESC";
$stmt = $pdo->query($sql);
$departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Departamentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
 <style>
        body {
            background-color: #f5f7fb;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background-color: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 168, 107, 0.15);
        }

        h2 {
            color: #00a86b;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table thead {
            background-color: #00a86b;
            color: #fff;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e6f9f1;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            font-weight: bold;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #00a86b;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #008f5d;
            transform: scale(1.03);
        }

        .btn-warning {
            background-color: #00a86b;
            color: #333;
        }

        .btn-warning:hover {
            background-color:rgb(0, 102, 65);
            transform: scale(1.03);
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Departamentos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Quantidade de Funcionários</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departamentos as $departamento): ?>
                    <tr>
                        <td><?= $departamento['id'] ?></td>
                        <td><?= htmlspecialchars($departamento['nome']) ?></td>
                        <td><?= $departamento['descricao'] ?></td>
                        <td><?= $departamento['qntd_func'] ?></td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>pages-admin/departamentos/edit-departamento.php?id=<?= $departamento['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?php echo BASE_URL; ?>Controller/admin/deletar-departamento.php?id=<?= $departamento['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="<?php echo BASE_URL; ?>pages-admin/departamentos/form-add-departamentos.php" class="btn btn-primary">Adicionar Novo Departamento</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
</body>
</html>
