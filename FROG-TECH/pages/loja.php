<?php
include('../api/Conect/conecao.php'); 

$query = "SELECT * FROM produtos";
$stmt = $pdo->query($query);
$produtos = $stmt->fetchAll();

foreach ($produtos as $produto) {
    echo "<div class='produto'>";
    echo "<h3>" . htmlspecialchars($produto['nome']) . "</h3>";
    echo "<p>" . htmlspecialchars($produto['descricao']) . "</p>";
    echo "<p>Preço: R$" . number_format($produto['preco'], 2, ',', '.') . "</p>";
    echo "<p>Quantidade disponível: " . $produto['quantidade'] . "</p>";
    echo "<a href='produto.php?id=" . $produto['id'] . "'>Ver mais</a>";
    echo "</div>";
}
?>
