<?php

include_once('Conect/config-url.php');
include ('../Controller/regex/Login-regex.php');
include('../Controller/Conect/conecao.php'); 
session_start(); 

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

            switch ($user['role_id']) {
                case 1:
                    header("Location: " . BASE_URL . "pages-admin/Tela-home-adm.php");
                    break;
                case 2:
                    header("Location: " . BASE_URL . "pages-funcionario/Tela-home-func.php");
                    break;
                case 3:
                    header("Location: " . BASE_URL . "pages-usuario/Tela-home-usuario.php");
                    break;
                default:
                    echo "Função de usuário inválida.";
                    break;
            }
            exit; 
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>
