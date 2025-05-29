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
    <link rel="stylesheet" href="<?= BASE_URL ?>css/css-admin/lista-funcionarios.css">
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
                    <td data-label="ID"><?php echo $funcionario['id']; ?></td>
                    <td data-label="Nome"><?php echo $funcionario['nome']; ?></td>
                    <td data-label="Email"><?php echo $funcionario['email']; ?></td>
                    <td data-label="Telefone"><?php echo $funcionario['telefone']; ?></td>
                    <td data-label="Salário"><?php echo 'R$ ' . number_format($funcionario['salario'], 2, ',', '.'); ?></td>
                    <td data-label="Ações">
                        <a href="editar-funcionario.php?id=<?php echo $funcionario['id']; ?>">Editar</a> |
                        <a href="<?php BASE_URL ?>Controller/admin/excluir-funcionario.php?id=<?php echo $funcionario['id']; ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    <?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
</body>
</html>
