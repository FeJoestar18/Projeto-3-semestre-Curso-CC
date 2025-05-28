<?php
session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');

if (isset($_SESSION['user_id']) && ($_SESSION['role_id'] === 1 || $_SESSION['role_id'] === 2)) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM funcionarios");
$stmt->execute();
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table td a {
            text-decoration: none;
            color: #007BFF;
        }
        table td a:hover {
            color: #0056b3;
        }
        .btn-add {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-add:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Lista de Funcionários</h1>

    <a href="add-funcionario.php" class="btn-add">Adicionar Novo Funcionário</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td><?php echo $funcionario['id']; ?></td>
                    <td><?php echo $funcionario['nome']; ?></td>
                    <td><?php echo $funcionario['email']; ?></td>
                    <td><?php echo $funcionario['telefone']; ?></td>
                    <td><?php echo 'R$ ' . number_format($funcionario['salario'], 2, ',', '.'); ?></td>
                    <td>
                        
                        <a href="<?php echo BASE_URL; ?>pages-admin/Funcionario/editar-funcionario.php?id=<?php echo $funcionario['id']; ?>">Editar</a>| 
                        <a href="<?php echo BASE_URL; ?>Controller/admin/excluir-funcionario.php?id=<?php echo $funcionario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
