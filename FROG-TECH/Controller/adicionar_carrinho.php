<?php
include(__DIR__ . "/Conect/conecao.php");
session_start();
include(__DIR__ . "/protect.php");

include_once(__DIR__ . "/Conect/config-url.php");



if (isset($_POST['acao']) && $_POST['acao'] == 'carrinho') {
    $produto_id = (int) $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];

    $query = "SELECT * FROM produtos WHERE id = :produto_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':produto_id' => $produto_id]);
    $produto = $stmt->fetch();

    if ($produto) {
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        $encontrado = false;
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $produto_id) {
                $item['quantidade'] += $quantidade;
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            $_SESSION['carrinho'][] = [
                'id' => $produto['id'],
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => $quantidade
            ];
        }

        header("Location: " . BASE_URL . "/pages-usuario/loja/carrinho.php");
        exit; 
    } else {
        echo "Produto não encontrado.";
    }
}
?>
