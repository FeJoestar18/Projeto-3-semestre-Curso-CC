<?php 

include_once('../../Controller/Conect/config-url.php'); 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/admin-js/buscarCEP.js"></script> 
</head>
<body class="container py-4">

    <h2 class="mb-4">Cadastro de Funcionário</h2>
    
    <form action="<?= BASE_URL ?>Controller/admin/process-add-funcionario.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="idade" class="form-label">Idade:</label>
            <input type="number" name="idade" id="idade" class="form-control">
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Salário:</label>
            <input type="text" name="salario" id="salario" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP:</label>
            <input type="text" name="cep" id="cep" class="form-control" maxlength="9" required>
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua:</label>
            <input type="text" name="rua" id="rua" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" name="cidade" id="cidade" class="form-control">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <input type="text" name="estado" id="estado" class="form-control">
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número:</label>
            <input type="text" name="numero" id="numero" class="form-control">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento ID:</label>
            <input type="number" name="departamento_id" id="departamento_id" class="form-control">
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Role ID (padrão 2):</label>
            <input type="number" name="role_id" id="role_id" class="form-control" value="2">
        </div>

        <button type="submit" class="btn btn-success">Cadastrar Funcionário</button>
    </form>
</body>
</html>
