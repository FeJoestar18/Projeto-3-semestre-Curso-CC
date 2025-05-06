<?php
session_start();
include_once(__DIR__ . '/../Conect/conecao.php');
include_once(__DIR__ . '/../Conect/config-url.php');

$funcionario_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE id = :id");
$stmt->bindParam(':id', $funcionario_id);
$stmt->execute();
$funcionario = $stmt->fetch();

if (!$funcionario) {
    echo "Funcionário não encontrado!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $salario = $_POST['salario'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $rua = $_POST['rua'];
    $telefone = $_POST['telefone'];
    $estado = $_POST['estado'];
    $numero = $_POST['numero'];
    $cpf = $_POST['cpf'];
    $departamento_id = $_POST['departamento_id'];

    $stmt = $pdo->prepare("UPDATE funcionarios SET nome = :nome, email = :email, idade = :idade, salario = :salario, cep = :cep, cidade = :cidade, rua = :rua, telefone = :telefone, estado = :estado, numero = :numero, cpf = :cpf, departamento_id = :departamento_id WHERE id = :id");
    $stmt->bindParam(':id', $funcionario_id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':departamento_id', $departamento_id);

    if ($stmt->execute()) {
        header("Location: " . BASE_URL . "pages-admin/Funcionario/lista-funcionarios.php");
        exit;
    } else {
        echo "Erro ao atualizar funcionário!";
    }
}
?>