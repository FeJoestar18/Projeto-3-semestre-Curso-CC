<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    echo "Você precisa estar logado para acessar o carrinho.";
    exit;
}

$total = 0;
$carrinho = [];

if (!empty($_SESSION['carrinho'])) {
    // Calculando o total
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'] * $item['quantidade'];
        $carrinho[] = $item; // Armazena o carrinho para exibição
    }
} else {
    echo "Seu carrinho está vazio.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
</head>
<body>

<h1>Carrinho de Compras</h1>

<?php foreach ($carrinho as $item): ?>
    <p>
        <?= $item['nome'] ?> - Quantidade: <?= $item['quantidade'] ?> - Preço: R$<?= number_format($item['preco'], 2, ',', '.') ?>
    </p>
<?php endforeach; ?>

<h2>Total: R$<?= number_format($total, 2, ',', '.') ?></h2>

<form method="post" action="checkout_process.php">
    <button type="submit" name="finalizar">Finalizar Compra</button>
</form>

</body>
</html>
