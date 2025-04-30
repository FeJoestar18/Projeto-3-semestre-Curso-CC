<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('../Controller/Conect/conecao.php');

// Recebe os dados do formulário
$login = $_POST['cpf'] ?? '';  // Pode ser CPF ou Email
$senha = $_POST['senha'] ?? '';

$isCPF = preg_match("/^\d{11}$/", $login);
$isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);

// Validação do login
if (!$isCPF && !$isEmail && $login !== 'AdminCPF') {
    $_SESSION['error'] = "Digite um CPF com 11 dígitos ou um e-mail válido.";
    header("Location: ../pages-usuario/Login.php");
    exit;
}

// Validação da senha (exceto se for admin)
if ($senha !== 'admin') {
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha)) {
        $_SESSION['error'] = "A senha deve ter no mínimo 8 caracteres, incluindo letra maiúscula, minúscula, número e caractere especial.";
        header("Location: ../pages-usuario/Login.php");
        exit;
    }
}

// Tentativa de login como usuário (CPF)
if ($isCPF || $login === 'AdminCPF') {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
    $stmt->execute([':cpf' => $login]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['role_id'] = $usuario['role_id'];

        switch ($usuario['role_id']) {
            case 1:
                header("Location: ../pages-admin/Tela-home-adm.php");
                break;
            case 3:
                header("Location: ../pages-usuario/Tela-home-usuario.php");
                break;
            default:
                echo "Função de usuário desconhecida.";
        }
        exit;
    }
}

// Tentativa de login como funcionário (Email)
if ($isEmail) {
    $stmtFunc = $pdo->prepare("SELECT * FROM funcionarios WHERE email = :email");
    $stmtFunc->execute([':email' => $login]);
    $funcionario = $stmtFunc->fetch(PDO::FETCH_ASSOC);

    if ($funcionario && password_verify($senha, $funcionario['senha'])) {
        $_SESSION['usuario_id'] = $funcionario['id'];
        $_SESSION['nome'] = $funcionario['nome'];
        $_SESSION['role_id'] = 2;
        header("Location: ../pages-usuario-funcionario/Tela-home-func.php");
        exit;
    }
}

$_SESSION['error'] = "Credenciais inválidas.";
header("Location: ../pages-usuario/Login.php");
exit;
