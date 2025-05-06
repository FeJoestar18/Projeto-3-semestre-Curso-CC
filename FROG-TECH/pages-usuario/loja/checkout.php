<?php
session_start();
include(__DIR__ . "/../../Controller/process-checkout.php");
include(__DIR__ . "/../../Controller/Conect/conecao.php");

$idProduto = $_POST['produto_id'] ?? null;


if (!$idProduto || !is_numeric($idProduto)) {
    echo "Produto não selecionado.";
    exit;
}


$stmtProduto = $pdo->prepare("SELECT nome, preco FROM produtos WHERE id = ?");
$stmtProduto->execute([$idProduto]);
$produto = $stmtProduto->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout - FrogTech</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f2f2f2; }
        .card { background: #fff; padding: 20px; border-radius: 8px; width: 500px; margin: auto; }
        input { width: 100%; padding: 8px; margin: 6px 0; }
        button { background: green; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        .frete-info { margin-top: 10px; color: green; font-weight: bold; }
    </style>
</head>
<body>

<div class="card">
    <h2>Checkout - FrogTech</h2>

    <h3><?= htmlspecialchars($produto['nome']) ?></h3>
    <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>

    <p class="frete-info">Frete para o CEP <?= htmlspecialchars($usuario['cep']) ?>: R$ <?= number_format($frete, 2, ',', '.') ?></p>

    <hr>

    <p><strong>Endereço de entrega:</strong><br>
        <?= htmlspecialchars("{$usuario['rua']}, {$usuario['bairro']} - {$usuario['cidade']}/{$usuario['estado']} - CEP {$usuario['cep']}") ?>
    </p>

    <hr>
    <h3>Total: R$
        <?php
        $total = $produto['preco'] + $frete;
        echo number_format($total, 2, ',', '.');
        ?>
    </h3>

    <form action="<?= BASE_URL ?>pages-usuario/loja/Pagamento-recebido.php" method="post">
        <input type="hidden" name="produto_id" value="<?= $idProduto ?>">
        <input type="hidden" name="valor_total" value="<?= $total ?>">
        <button type="submit">PAGAR</button>
    </form>
</div>

</body>
</html>
