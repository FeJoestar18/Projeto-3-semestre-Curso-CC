<?php
include('../api/Conect/conecao.php');
session_start();

if (isset($_POST['acao']) && $_POST['acao'] == 'comprar') {
    $produto_id = (int) $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];

    $query = "SELECT * FROM produtos WHERE id = :produto_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':produto_id' => $produto_id]);
    $produto = $stmt->fetch();

    if ($produto && $produto['quantidade'] >= $quantidade) {
        
        $query = "INSERT INTO compras (produto_id, nome_produto, preco, quantidade) 
                  VALUES (:produto_id, :nome_produto, :preco, :quantidade)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':produto_id' => $produto_id,
            ':nome_produto' => $produto['nome'],
            ':preco' => $produto['preco'],
            ':quantidade' => $quantidade
        ]);

        $nova_quantidade = $produto['quantidade'] - $quantidade;
        
        if ($nova_quantidade >= 0) {
            $query = "UPDATE produtos SET quantidade = :quantidade WHERE id = :produto_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':quantidade' => $nova_quantidade, ':produto_id' => $produto_id]);
            echo "Compra realizada com sucesso!";
        } else {
            echo "Quantidade insuficiente em estoque!";
        }

    } else {
        echo "Produto não encontrado ou quantidade insuficiente em estoque!";
    }
}
?>
