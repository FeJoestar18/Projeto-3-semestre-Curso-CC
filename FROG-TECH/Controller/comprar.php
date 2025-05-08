<?php
session_start();
ob_start();
echo "<pre>";
print_r($_POST);
echo "</pre>";
include(__DIR__ . '/Conect/conecao.php');
require_once(__DIR__ . '/Conect/config-url.php');  

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'], $_POST['quantidade'])) {
    
    $produtoId = (int) $_POST['produto_id'];
    $quantidade = max(1, (int) $_POST['quantidade']); 
    $_SESSION['produto_id'] = $produtoId;
    $_SESSION['quantidade'] = $quantidade;

    header("Location: " . BASE_URL . "pages-usuario/loja/checkout.php");
    exit;
} else {
    echo "Dados do produto não enviados corretamente.";
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages-usuario/cadastro/login.php");
    exit;
}

if (isset($_POST['acao']) && $_POST['acao'] == 'comprar') {
    $produto_id = (int) $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM produtos WHERE id = :produto_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':produto_id' => $produto_id]);
    $produto = $stmt->fetch();

    if ($produto && $produto['quantidade'] >= $quantidade) {
        
        $query = "INSERT INTO compras (user_id, produto_id, nome_produto, preco, quantidade) 
                  VALUES (:user_id, :produto_id, :nome_produto, :preco, :quantidade)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':user_id' => $user_id,
            ':produto_id' => $produto_id,
            ':nome_produto' => $produto['nome'],
            ':preco' => $produto['preco'],
            ':quantidade' => $quantidade
        ]);

        $nova_qtd = $produto['quantidade'] - $quantidade;
        $query = "UPDATE produtos SET quantidade = :quantidade WHERE id = :produto_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':quantidade' => $nova_qtd,
            ':produto_id' => $produto_id
        ]);

        header("Location: " . BASE_URL . "pages-usuario/loja/checkout.php");

        exit;
    } else {
        echo "<h2 style='color:red;'>Estoque insuficiente!</h2>";
    }
}

ob_end_flush();
?>
