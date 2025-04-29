<?php
session_start();
include('../Controller/Conect/conecao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "E-mail inválido!";
        header("Location: ../pages/Tela-registro.php");
        exit;
    }

    if (!preg_match("/^\d{11}$/", $cpf)) {
        $_SESSION['error'] = "CPF inválido. Deve ter 11 dígitos.";
        header("Location: ../pages/Tela-registro.php");
        exit;
    }

    if (!preg_match("/^\d{10,11}$/", $telefone)) {
        $_SESSION['error'] = "Telefone inválido. Deve ter 10 ou 11 dígitos.";
        header("Location: ../pages/Tela-registro.php");
        exit;
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
        $_SESSION['error'] = "A senha deve ter no mínimo 8 caracteres, incluindo letra maiúscula, minúscula, número e caractere especial.";
        header("Location: ../pages/Tela-registro.php");
        exit;
    }

    $check = $pdo->prepare("SELECT id FROM usuarios WHERE cpf = :cpf OR email = :email OR telefone = :telefone");
    $check->bindParam(':cpf', $cpf);
    $check->bindParam(':email', $email);
    $check->bindParam(':telefone', $telefone);
    $check->execute();

    if ($check->rowCount() > 0) {
        $_SESSION['error'] = "CPF, e-mail ou telefone já cadastrado!";
        header("Location: ../pages/Tela-registro.php");
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
        header('Location: ../pages/Tela-home.php');
        exit;
    } else {
        $_SESSION['error'] = "Erro ao cadastrar usuário: " . $stmt->errorInfo()[2];
        header("Location: ../pages/Tela-registro.php");
        exit;
    }
}
?>
