<?php

require '../Controller/Conect/conecao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];

    if ($senha !== $confirmar) {
        die("As senhas não coincidem.");
    }

    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE token_recuperacao = ? AND token_expira > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE usuarios SET senha = ?, token_recuperacao = NULL, token_expira = NULL WHERE id = ?");
        $stmt->execute([$senhaHash, $user['id']]);

        echo "Senha atualizada com sucesso!";
        header("Location: ../pages-usuario/cadastro/login.php");
        
        exit;

    } 
    else {
        echo "Token inválido ou expirado.";
    }
}
