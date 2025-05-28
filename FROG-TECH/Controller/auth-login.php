<?php

include_once('Conect/config-url.php');
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
            $_SESSION['role_id'] = $user['role_id'];  

            switch ($user['role_id']) {
                case 1:
                    header("Location: " . BASE_URL . "pages-admin/Tela-home-adm.php");
                    break;
                case 2:
                    header("Location: " . BASE_URL . "pages-admin/Tela-home-adm.php");
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
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
                $_SESSION['error'] = "Senha inválida.";
            } else {
                $_SESSION['error'] = "Senha incorreta!";
            }
            header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
            exit;
        }
    }
} else {
    $_SESSION['error'] = "Usuário não encontrado!";
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit;
}
?>
