<?php
include_once(__DIR__ . '/../Conect/conecao.php');
include_once(__DIR__ . '/../Conect/config-url.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);

    $sql = "INSERT INTO departamentos (nome, descricao) VALUES (:nome, :descricao)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao
    ]);

    header('Location: ' . BASE_URL . 'pages-admin/departamentos/lista-departamento.php');
    exit();
}
?>
