<?php

session_start();
include_once(__DIR__ . '/../Conect/conecao.php');
include_once(__DIR__ . '/../Conect/config-url.php');
include_once(__DIR__ . '/../func/exibir-modal-verificar-role_id.php');

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM departamentos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $departamento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$departamento) {
        header('Location: ' . BASE_URL . 'pages-admin/departamentos/lista-departamento.php?erro=Departamento não encontrado');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome']);
        $descricao = trim($_POST['descricao']);

        $sql = "UPDATE departamentos SET nome = :nome, descricao = :descricao WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':id' => $id
        ]);

        header('Location: ' . BASE_URL . 'pages-admin/departamentos/lista-departamento.php?sucesso=Departamento atualizado com sucesso');
        exit();
    }
} else {
    header('Location: ' . BASE_URL . 'pages-admin/departamentos/lista-departamento.php?erro=ID não fornecido');
    exit();
}
?>
