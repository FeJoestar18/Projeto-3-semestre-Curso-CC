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

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        header('Location: ' . BASE_URL . 'pages-admin/produtos/lista_produtos.php?erro=Produto não encontrado');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome']);
        $preco = floatval($_POST['preco']);
        $descricao = trim($_POST['descricao']);
        $quantidade = intval($_POST['quantidade']);
        $categoria_id = intval($_POST['categoria_id']); 

        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao, quantidade = :quantidade, categoria_id = :categoria_id WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':preco' => $preco,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':categoria_id' => $categoria_id,
            ':id' => $id
        ]);

        header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php?sucesso=Produto atualizado com sucesso');
        exit();
    }
} else {
    header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php?erro=ID não fornecido');
    exit();
}
?>
