<?php

include('../api/Conect/conecao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    // Validações
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

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
        echo "A senha deve ter no mínimo 8 caracteres, incluindo letra maiúscula, minúscula, número e caractere especial.";
        exit;
    }
   
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        
    $verificaCpf = $pdo->prepare("SELECT id FROM usuarios WHERE cpf = :cpf");
    $verificaCpf->bindParam(':cpf', $cpf);
    $verificaCpf->execute();

    if ($verificaCpf->rowCount() > 0) {
        echo "Este CPF já está cadastrado!";
        exit;
    }

    $sql = "INSERT INTO usuarios (email, senha, cpf, telefone) VALUES (:email, :senha, :cpf, :telefone)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senhaHash);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':telefone', $telefone);

    if ($stmt->execute()) {
        header('Location: ../login.php');
        exit; 
    } else {
        $errorInfo = $stmt->errorInfo(); 
        echo "Erro ao cadastrar usuário: " . $errorInfo[2];
    }
}
?>
