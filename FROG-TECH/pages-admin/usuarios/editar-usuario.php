<?php

session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');
include(__DIR__ . '/../../Controller/admin/editar-usuario-process.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <form action="<?php echo BASE_URL; ?>Controller/admin/editar-usuario-process.php?id=<?php echo $usuario['id']; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $usuario['telefone']; ?>" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php echo $usuario['cpf']; ?>" required><br>

        <label for="role_id">Role ID:</label>
        <input type="number" name="role_id" value="<?php echo $usuario['role_id']; ?>" required><br>

        <label for="cep">CEP:</label>
        <input type="text" name="cep" value="<?php echo $usuario['cep']; ?>"><br>

        <label for="rua">Rua:</label>
        <input type="text" name="rua" value="<?php echo $usuario['rua']; ?>"><br>

        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" value="<?php echo $usuario['bairro']; ?>"><br>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $usuario['cidade']; ?>"><br>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" value="<?php echo $usuario['estado']; ?>"><br>

        <button type="submit" name="edit_user">Atualizar</button>
    </form>
</body>
</html>
