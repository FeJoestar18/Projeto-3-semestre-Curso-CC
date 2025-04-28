<?php
session_start();
include('../Controller/Conect/conecao.php');

if (!isset($_SESSION['usuario_id'])) {
    echo "Você precisa estar logado para acessar o carrinho.";
    exit;
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$total = 0;

if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }

    echo "<h1>Carrinho de Compras</h1>";
    foreach ($_SESSION['carrinho'] as $item) {
        echo "<p>" . $item['nome'] . " - Quantidade: " . $item['quantidade'] . " - Preço: R$" . number_format($item['preco'], 2, ',', '.') . "</p>";
    }

    echo "<h2>Total: R$" . number_format($total, 2, ',', '.') . "</h2>";

    echo "<form method='post' action=''>
            <button type='submit' name='finalizar'>Finalizar Compra</button>
          </form>";
} else {
    echo "Seu carrinho está vazio.";
}

if (isset($_POST['finalizar'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $compra_sucesso = true;

    foreach ($_SESSION['carrinho'] as $item) {
        $produto_id = $item['id'];
        $quantidade = $item['quantidade'];
        $nome_produto = $item['nome'];
        $preco = $item['preco'];

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
                ':nome_produto' => $nome_produto,
                ':preco' => $preco,
                ':quantidade' => $quantidade
            ]);

            $nova_quantidade = $produto['quantidade'] - $quantidade;
            $query = "UPDATE produtos SET quantidade = :quantidade WHERE id = :produto_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':quantidade' => $nova_quantidade, ':produto_id' => $produto_id]);
        } else {
            $compra_sucesso = false;
            echo "Quantidade insuficiente em estoque para o produto: " . $nome_produto . "<br>";
        }
    }

    if ($compra_sucesso) {
        unset($_SESSION['carrinho']);
        header("Location: ../pages/Pagamento-recebido.php");
        exit;
    } else {
        echo "<h2>Houve um erro na finalização da compra. Tente novamente mais tarde.</h2>";
    }
}
?>
