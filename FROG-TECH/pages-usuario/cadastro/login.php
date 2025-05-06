<?php

session_unset();

include_once('../../Controller/Conect/config-url.php'); 

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
.swal2-custom-popup {
  border-radius: 15px;
  font-family: 'Arial', sans-serif;
}

.swal2-custom-title {
  font-size: 22px;
  font-weight: bold;
}
</style>
<body>
    <h2>Login</h2>
    <form action="<?= BASE_URL ?>/Controller/auth-login.php" method="POST">
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Entrar"><br>
        <a href="registro.php">Cadastrar</a><br>
        <a href="recuperar_senha.php">Esqueci minha senha</a>
    </form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
if (isset($_SESSION['error'])) {
    $erro = $_SESSION['error'];
    unset($_SESSION['error']);
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    echo "<script>
        Swal.fire({
            title: 'Erro!',
            text: '$erro',
            iconHtml: '<img src=\"$imgUrl\" style=\"width:115px;\">',
            background: '#e9f5ee',
            color: '#14532d',
            confirmButtonText: 'OK',
            confirmButtonColor: '#22c55e',
            customClass: {
                popup: 'swal2-custom-popup',
                title: 'swal2-custom-title'
            }
        });
    </script>";
}
?>

</body>
</html>
