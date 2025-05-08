<?php
session_start();
include(__DIR__ . "/../../Controller/Conect/conecao.php");
include(__DIR__ . "/../../Controller/protect.php");
include_once('../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 3) {
    echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$query = "SELECT * FROM produtos";
$stmt = $pdo->query($query);
$produtos = $stmt->fetchAll();

foreach ($produtos as $produto) {
    echo "<div class='produto'>";
    echo "<img src='" . BASE_URL . "uploads-files-produtos/" . htmlspecialchars($produto['imagem']) . "' alt='" . htmlspecialchars($produto['nome']) . "' width='100' height='100'>";
    echo "<h3>" . htmlspecialchars($produto['nome']) . "</h3>";
    echo "<p>" . htmlspecialchars($produto['descricao']) . "</p>";
    echo "<p>Preço: R$" . number_format($produto['preco'], 2, ',', '.') . "</p>";
    echo "<p>Quantidade disponível: " . $produto['quantidade'] . "</p>";
    echo "<a href='produto.php?id=" . $produto['id'] . "'>Ver mais</a>";
    echo "</div>";
}
?>
