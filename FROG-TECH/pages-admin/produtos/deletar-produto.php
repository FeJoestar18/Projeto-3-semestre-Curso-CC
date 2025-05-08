<?php
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');

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
