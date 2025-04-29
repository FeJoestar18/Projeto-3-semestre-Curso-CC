<?php
session_start();
session_unset();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../Controller/auth-login.php" method="POST">
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Entrar"><br>
        <a href="Tela-registro.php">Cadastrar</a><br>
        <a href="recuperar_senha.php">Esqueci minha senha</a>
        
    </form>
</body>
</html>
