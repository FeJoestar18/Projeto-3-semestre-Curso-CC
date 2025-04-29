<?php
session_start();
include('../Controller/Conect/conecao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');  // Redireciona para a página de login
    exit;
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$total = 0;
$carrinho = [];

if (!empty($_SESSION['carrinho'])) {
    // Calculando o total
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'] * $item['quantidade'];
        $carrinho[] = $item; // Armazena o carrinho para exibição no front-end
    }

    // Processando a compra
    if (isset($_POST['finalizar'])) {
        $usuario_id = $_SESSION['usuario_id'];
        $compra_sucesso = true;

        foreach ($_SESSION['carrinho'] as $item) {
            $produto_id = $item['id'];
            $quantidade = $item['quantidade'];
            $nome_produto = $item['nome'];
            $preco = $item['preco'];

            // Verifica se o produto tem estoque suficiente
            $query = "SELECT * FROM produtos WHERE id = :produto_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':produto_id' => $produto_id]);
            $produto = $stmt->fetch();

            if ($produto && $produto['quantidade'] >= $quantidade) {
                // Inserindo dados da compra no banco
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

                // Atualizando a quantidade do produto no estoque
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
            unset($_SESSION['carrinho']); // Limpa o carrinho após a compra
            header("Location: ../pages/Pagamento-recebido.php");
            exit;
        } else {
            echo "<h2>Houve um erro na finalização da compra. Tente novamente mais tarde.</h2>";
        }
    }
}
?>
