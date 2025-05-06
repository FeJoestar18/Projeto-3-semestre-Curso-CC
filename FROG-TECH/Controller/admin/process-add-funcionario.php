<?php
session_start();
include_once(__DIR__ . '../Conect/conecao.php');
include_once(__DIR__ . '../Conect/config-url.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $pdo->beginTransaction();

    try {
       
        $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, email, idade, salario, cep, cidade, rua, telefone, estado, numero, role_id, cpf, departamento_id, senha) VALUES (:nome, :email, :idade, :salario, :cep, :cidade, :rua, :telefone, :estado, :numero, :role_id, :cpf, :departamento_id, :senha)");

        $senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':email' => $_POST['email'],
            ':idade' => $_POST['idade'],
            ':salario' => $_POST['salario'],
            ':cep' => $_POST['cep'],
            ':cidade' => $_POST['cidade'],
            ':rua' => $_POST['rua'],
            ':telefone' => $_POST['telefone'],
            ':estado' => $_POST['estado'],
            ':numero' => $_POST['numero'],
            ':role_id' => 2,  
            ':cpf' => $_POST['cpf'],
            ':departamento_id' => $_POST['departamento_id'],
            ':senha' => $senhaHash
        ]);

        $funcionarioId = $pdo->lastInsertId();

        $stmtUsuario = $pdo->prepare("INSERT INTO usuarios (email, senha, role_id, cpf) VALUES (:email, :senha, :role_id, :cpf)");

        $stmtUsuario->execute([
            ':email' => $_POST['email'],
            ':senha' => $senhaHash,  
            ':role_id' => 2,  
            ':cpf' => $_POST['cpf']
        ]);

        $pdo->commit();

        header("Location: " . BASE_URL . "pages-admin/Funcionario/lista-funcionarios.php");
        exit;

    } catch (Exception $e) {
        
        $pdo->rollBack();
        
        $_SESSION['error'] = "Erro ao cadastrar funcionário: " . $e->getMessage();
        header("Location: " . BASE_URL . "pages-admin/Funcionario/lista-funcionarios.php");
        exit;
    }
}
?>
