<?php
session_start(); 

include ('../Controller/regex/Login-regex.php');
include('../Controller/Conect/conecao.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();
    
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($senha, $user['senha'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email']; 
            header('Location: ../pages-usuario/Tela-home-usuario.php');
            exit; 
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>
