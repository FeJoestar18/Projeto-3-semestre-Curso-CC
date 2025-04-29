<?php
session_start(); 

include('../Controller/Conect/conecao.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    if (!preg_match("/^\d{11}$/", $cpf)) {
        echo "CPF inválido. Deve ter 11 dígitos.";
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($senha, $user['senha'])) {
            // Usando 'usuario_id' para manter consistência com o carrinho
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_email'] = $user['email'];
            header('Location: ../pages/Tela-home.php');
            exit;
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
    
}
?>
