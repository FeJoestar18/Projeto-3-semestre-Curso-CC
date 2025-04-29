<?php include('../Controller/protect.php'); 

if (isset($_SESSION['user_id'])) {
    echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    echo "Usuário não logado.";
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
    <a href="../pages/loja.php">Produtos</a><br>
    <a href="../Controller/logout.php" onclick="return confirm('Deseja realmente sair?')">Sair</a>


</body>
</html>
