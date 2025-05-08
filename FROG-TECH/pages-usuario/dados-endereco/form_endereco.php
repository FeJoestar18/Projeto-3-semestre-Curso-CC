<?php

session_unset();
include(__DIR__ . "/../../Controller/protect.php");
include_once('../../Controller/Conect/config-url.php'); 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Preencher Endereço</title>
    <script src="../../js/buscarCEP.js"></script>   
</head>
<body>
    <h2>Complete seu endereço</h2>
    <form action="<?= BASE_URL ?>Controller/process-form-endereco.php" method="post">
    <input type="hidden" name="produto_id" value="<?= $_SESSION['produto_id'] ?? '' ?>"> 
    <input type="text" name="cep" placeholder="CEP" required><br>
    <input type="text" name="rua" placeholder="Rua" required><br>
    <input type="text" name="bairro" placeholder="Bairro" required><br>
    <input type="text" name="cidade" placeholder="Cidade" required><br>
    <input type="text" name="estado" placeholder="Estado (UF)" required><br>
    <button type="submit" name="salvar">Salvar Endereço</button>
</form>



</body>
</html>

