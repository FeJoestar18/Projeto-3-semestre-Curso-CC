<?php
session_start();
include(__DIR__ . '/../../Controller/Conect/conecao.php');
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die("Usuário não encontrado.");
    }
} else {
    die("ID do usuário não fornecido.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_user'])) {

    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $role_id = $_POST['role_id'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $updateQuery = "UPDATE usuarios SET email = ?, telefone = ?, cpf = ?, role_id = ?, cep = ?, rua = ?, bairro = ?, cidade = ?, estado = ? WHERE id = ?";
    $stmt = $pdo->prepare($updateQuery);
    $stmt->execute([$email, $telefone, $cpf, $role_id, $cep, $rua, $bairro, $cidade, $estado, $id]);

    header("Location: " . BASE_URL . "pages-admin/usuarios/visualizar_usuarios.php");
    exit();
}
?>
