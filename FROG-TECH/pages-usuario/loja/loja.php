<?php
include(__DIR__ . "/../../Controller/Conect/conecao.php");
session_start();
include(__DIR__ . "/../../Controller/protect.php");
// if (isset($_SESSION['user_id'])) {
//     echo "Usuário logado com ID: " . $_SESSION['user_id'];
// } else {
//     echo "Usuário não logado.";
// }

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
