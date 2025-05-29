<?php

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
    <style>
        body {
            background-color: #f5f7fb;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 168, 107, 0.15);
        }

        h1 {
            color: #00a86b;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 6px;
            font-weight: 600;
            color: #00a86b;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #00a86b;
            outline: none;
            box-shadow: 0 0 6px rgba(0, 168, 107, 0.3);
        }

        button {
            margin-top: 30px;
            padding: 12px 24px;
            background-color: #00a86b;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #008f5d;
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>

        <form action="<?php echo BASE_URL; ?>Controller/admin/editar-usuario-process.php?id=<?php echo $usuario['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $usuario['telefone']; ?>" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" value="<?php echo $usuario['cpf']; ?>" required>

            <label for="role_id">Role ID:</label>
            <input type="number" name="role_id" value="<?php echo $usuario['role_id']; ?>" required>

            <label for="cep">CEP:</label>
            <input type="text" name="cep" value="<?php echo $usuario['cep']; ?>">

            <label for="rua">Rua:</label>
            <input type="text" name="rua" value="<?php echo $usuario['rua']; ?>">

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" value="<?php echo $usuario['bairro']; ?>">

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" value="<?php echo $usuario['cidade']; ?>">

            <label for="estado">Estado:</label>
            <input type="text" name="estado" value="<?php echo $usuario['estado']; ?>">

            <button type="submit" name="edit_user">Atualizar</button>
        </form>
    </div>

    <?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
</body>
</html>
