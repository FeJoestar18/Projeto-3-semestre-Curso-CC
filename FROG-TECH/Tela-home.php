<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Bem-vindo à Home!</h2>
    <p>Você está logado como: <?php echo $_SESSION['user_email']; ?></p>

    <a href="../FROG-TECH/api/logout.php" onclick="return confirm('Deseja realmente sair?')">Sair</a>

</body>
</html>
