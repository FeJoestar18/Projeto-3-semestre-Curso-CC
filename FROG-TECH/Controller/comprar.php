<?php

session_start();
include('../Controller/Conect/conecao.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login.php");
    exit;
}

if (isset($_POST['acao']) && $_POST['acao'] == 'comprar') {
    $produto_id = (int) $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];
    $usuario_id = $_SESSION['usuario_id'];

    $query = "SELECT * FROM produtos WHERE id = :produto_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':produto_id' => $produto_id]);
    $produto = $stmt->fetch();

    if ($produto && $produto['quantidade'] >= $quantidade) {
       
        $query = "INSERT INTO compras (usuario_id, produto_id, nome_produto, preco, quantidade) 
                  VALUES (:usuario_id, :produto_id, :nome_produto, :preco, :quantidade)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':usuario_id' => $usuario_id,
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

        header("Location: ../pages/pagamento_recebido.php");
        exit;
    } else {
        echo "Estoque insuficiente!";
    }
}

?>
