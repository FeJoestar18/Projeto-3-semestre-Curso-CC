<?php
$token = $_GET['token'] ?? '';
if (!$token) {
    die("Token inválido.");
}
?>

<form action="../Controller/atualizar_senha.php" method="post">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

    <label>Nova senha:</label>
    <input type="password" name="senha" required>

    <label>Confirmar nova senha:</label>
    <input type="password" name="confirmar" required>

    <button type="submit">Atualizar senha</button>
</form>
<?php