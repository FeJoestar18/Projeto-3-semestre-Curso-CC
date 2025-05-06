<?php
session_start();
include_once('Conect/config-url.php');
include('../Controller/Conect/conecao.php');
include ('../Controller/regex/Register-regex.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    $check = $pdo->prepare("SELECT id FROM usuarios WHERE cpf = :cpf OR email = :email OR telefone = :telefone");
    $check->bindParam(':cpf', $cpf);
    $check->bindParam(':email', $email);
    $check->bindParam(':telefone', $telefone);
    $check->execute();

    if ($check->rowCount() > 0) {
        $_SESSION['error'] = "CPF, e-mail ou telefone já cadastrado!";
        header("Location: " . BASE_URL . "pages-usuario/cadastro/registro.php");
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (email, senha, cpf, telefone) VALUES (:email, :senha, :cpf, :telefone)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senhaHash);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':telefone', $telefone);

    if ($stmt->execute()) {
        header("Location: " . BASE_URL . "pages-usuario/Tela-home-usuario.php");
        exit;
    } else {
        $_SESSION['error'] = "Erro ao cadastrar usuário: " . $stmt->errorInfo()[2];
        header("Location: " . BASE_URL . "pages-usuario/cadastro/registro.php");
        exit;
    }
    
}
?>
