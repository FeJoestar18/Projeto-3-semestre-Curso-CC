<?php
session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');  
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');


if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$funcionario_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE id = :id");
$stmt->bindParam(':id', $funcionario_id);
$stmt->execute();
$funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
</head>
<body>
    <h2>Editar Funcionário</h2>
    <form action="<?php echo BASE_URL; ?>Controller/admin/editar-funcionario-process.php?id=<?php echo $funcionario['id']; ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $funcionario['nome']; ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $funcionario['email']; ?>" required><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" value="<?php echo $funcionario['idade']; ?>" required><br>

        <label for="salario">Salário:</label>
        <input type="text" id="salario" name="salario" value="<?php echo $funcionario['salario']; ?>" required><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" value="<?php echo $funcionario['cep']; ?>" required><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo $funcionario['cidade']; ?>" required><br>

        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua" value="<?php echo $funcionario['rua']; ?>" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $funcionario['telefone']; ?>" required><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo $funcionario['estado']; ?>" required><br>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" value="<?php echo $funcionario['numero']; ?>" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $funcionario['cpf']; ?>" required><br>

        <label for="departamento_id">Departamento ID:</label>
        <input type="text" id="departamento_id" name="departamento_id" value="<?php echo $funcionario['departamento_id']; ?>" required><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
