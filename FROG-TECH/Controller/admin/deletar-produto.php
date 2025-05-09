<?php

session_start();
include_once(__DIR__ . '/../Conect/conecao.php');
include_once(__DIR__ . '/../Conect/config-url.php');
include_once(__DIR__ . '/../func/exibir-modal-verificar-role_id.php');


if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 1) {
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT imagem FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        
        if ($produto['imagem'] && file_exists($produto['imagem'])) {
            unlink($produto['imagem']);
        }

        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php');
        exit();
    }
}

header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php?erro=Produto não encontrado');
exit();
?>
