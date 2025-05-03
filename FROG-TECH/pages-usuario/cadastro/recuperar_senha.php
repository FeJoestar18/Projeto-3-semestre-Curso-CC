<?php 
include_once('../../Controller/Conect/config-url.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?= BASE_URL ?>/Controller/enviar_link.php" method="post">
    <h2>Recuperar Senha</h2>
    <label for="email">Digite seu e-mail:</label>
    <input type="email" name="email" required>
    <button type="submit">Enviar link de recuperação</button>
</form>

</body>
</html>