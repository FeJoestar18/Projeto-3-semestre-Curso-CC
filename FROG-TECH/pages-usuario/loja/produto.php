<?php
session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include(__DIR__ . "/../../Controller/protect.php");
include_once('../../Controller/Conect/config-url.php'); 

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch();

    if ($produto) {
        
        echo "<h1>" . htmlspecialchars($produto['nome']) . "</h1>";
        if (!empty($produto['imagem'])) {
            echo "<img src='" . BASE_URL . "uploads-files-produtos/" . htmlspecialchars($produto['imagem']) . "' alt='" . htmlspecialchars($produto['nome']) . "' width='100' height='100'>";
        } else {
            echo "<img src='" . BASE_URL . "uploads/default.png' alt='Imagem não disponível' width='100' height='100'>";
        }
        echo "<p>" . htmlspecialchars($produto['descricao']) . "</p>";
        echo "<p>Preço: R$" . number_format($produto['preco'], 2, ',', '.') . "</p>";
        echo "<p>Quantidade disponível: " . $produto['quantidade'] . "</p>";

        echo "<form method='post' action='" . BASE_URL . "/Controller/adicionar_carrinho.php'>
                <input type='hidden' name='produto_id' value='" . $produto['id'] . "'>
                <input type='number' name='quantidade' min='1' max='" . $produto['quantidade'] . "' required>
                <button type='submit' name='acao' value='carrinho'>Adicionar ao Carrinho</button>
              </form>";

              echo '<form method="post" action="checkout.php">
              <input type="hidden" name="produto_id" value="' . $produto['id'] . '">
              <input type="number" name="quantidade" value="1" min="1" max="' . $produto['quantidade'] . '" required>
              <button type="submit" name="acao" value="carrinho">Adicionar ao Carrinho</button>
        </form>';
    } else {
        echo "Produto não encontrado.";
    }
}
?>
