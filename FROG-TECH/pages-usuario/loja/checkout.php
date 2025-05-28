<?php 
include_once('../../Controller/checkout-backend.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Checkout - FrogTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/css-usuarios/checkout.css">
</head>
<body>

<div class="checkout-card">
    <h2 class="mb-4">Checkout - FrogTech</h2>

    <h4><?= htmlspecialchars($produto['nome']) ?></h4>
    <p>Preço Unitário: <strong>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></strong></p>
    <p>Quantidade: <?= htmlspecialchars($quantidade) ?></p>
    <p>Total: <strong>R$ <?= number_format($produto['preco'] * $quantidade, 2, ',', '.') ?></strong></p>
    <p class="frete-info">Frete para o CEP <?= htmlspecialchars($usuario['cep']) ?>: R$ <?= number_format($frete, 2, ',', '.') ?></p>

    <hr>

    <p><strong>Endereço de entrega:</strong><br>
        <?= htmlspecialchars("{$usuario['rua']}, {$usuario['bairro']} - {$usuario['cidade']}/{$usuario['estado']} - CEP {$usuario['cep']}") ?>
    </p>

    <hr>

    <h3 class="mt-3">Total Final (com frete): R$
        <?php
        $total = ($produto['preco'] * $quantidade) + $frete; 
        echo number_format($total, 2, ',', '.');
        ?>
    </h3>

    <form action="<?= BASE_URL ?>pages-usuario/loja/Pagamento-recebido.php" method="post" class="mt-4">
        <input type="hidden" name="produto_id" value="<?= $idProduto ?>">
        <input type="hidden" name="quantidade" value="<?= $quantidade ?>"> 
        <input type="hidden" name="valor_total" value="<?= $total ?>">
        <button type="submit" class="btn btn-pay">PAGAR</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php ob_end_flush(); ?>
