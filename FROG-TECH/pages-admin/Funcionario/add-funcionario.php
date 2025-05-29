<?php 

session_start();
require_once(__DIR__ . '/../../Controller/Conect/conecao.php');
require_once(__DIR__ . '/../../Controller/Conect/config-url.php');
require_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');


if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$sql = "SELECT id, nome FROM departamentos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL; ?>js/buscarCEP.js"></script> 
    <link rel="stylesheet" href="<?= BASE_URL ?>css/css-admin/add-funcionario.css">

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
            <input type="text" name="cep" placeholder="CEP" required id="cep" 
            class="form-control">
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua:</label>
            <input type="text" name="rua" placeholder="Rua" required 
            class="form-control"><br>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" name="cidade" placeholder="Cidade" required 
            class="form-control"><br>
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro:</label>
            <input type="text" name="bairro" placeholder="Bairro" required 
            class="form-control"><br>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <input type="text" name="estado" placeholder="Estado (UF)" required class="form-control"><br>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número:</label>
            <input type="text" name="numero" placeholder="Número" required class="form-control"><br>
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
        <label for="departamento" class="form-label">Departamento:</label>
        <select name="departamento" id="departamento" class="form-select" required>
            <option value="" disabled selected>Selecione um departamento</option>
            <?php foreach ($departamentos as $departamento): ?>
                <option value="<?= $departamento['id']; ?>"><?= $departamento['nome']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Role ID (padrão 2):</label>
            <input type="number" name="role_id" id="role_id" class="form-control" value="2">
        </div>

        <button type="submit" class="btn btn-success">Cadastrar Funcionário</button>
    </form>

    <?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Certifique-se de que o campo 'departamento' foi enviado
    if (isset($_POST['departamento'])) {
        $departamento_id = $_POST['departamento']; // valor selecionado
        // Realize o que for necessário com $departamento_id
    } else {
        echo "Departamento não selecionado.";
    }
}
?>
