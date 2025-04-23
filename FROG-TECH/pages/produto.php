<?php
include('../api/Conect/conecao.php'); // Conectar com o banco de dados

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch();

    if ($produto) {
        echo "<h1>" . htmlspecialchars($produto['nome']) . "</h1>";
        echo "<img src='" . htmlspecialchars($produto['imagem']) . "' alt='Imagem do produto' width='300' />";
        echo "<p>" . htmlspecialchars($produto['descricao']) . "</p>";
        echo "<p>Preço: R$" . number_format($produto['preco'], 2, ',', '.') . "</p>";
        echo "<p>Quantidade disponível: " . $produto['quantidade'] . "</p>";

        echo "<form method='post' action='adicionar_carrinho.php'>
                <input type='hidden' name='produto_id' value='" . $produto['id'] . "'>
                <input type='number' name='quantidade' min='1' max='" . $produto['quantidade'] . "' required>
                <button type='submit' name='acao' value='carrinho'>Adicionar ao Carrinho</button>
              </form>";

        echo "<form method='post' action='comprar.php'>
                <input type='hidden' name='produto_id' value='" . $produto['id'] . "'>
                <input type='number' name='quantidade' min='1' max='" . $produto['quantidade'] . "' required>
                <button type='submit' name='acao' value='comprar'>Comprar Agora</button>
              </form>";
    } else {
        echo "Produto não encontrado.";
    }
}
?>
