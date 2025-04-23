<?php

include('../api/Conect/conecao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido!";
        exit;
    }

    if (!preg_match("/^\d{11}$/", $cpf)) {
        echo "CPF inválido. Deve ter 11 dígitos.";
        exit;
    }

    if (!preg_match("/^\d{10,11}$/", $telefone)) {
        echo "Telefone inválido. Deve ter 10 ou 11 dígitos.";
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
        echo "Cadastro realizado com sucesso!";
    } else {
        $errorInfo = $stmt->errorInfo(); 
        echo "Erro ao cadastrar usuário: " . $errorInfo[2];
    }
}
?>