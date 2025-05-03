<?php
include_once('../../Controller/Conect/config-url.php');
include(__DIR__ . "/../../Controller/Conect/conecao.php");
session_start();
include(__DIR__ . "/../../Controller/protect.php");

$id = $_SESSION['user_id'] ?? null;

if (!$id) {
    header("Location: " . BASE_URL . " /pages-usuario/cadastro/login.php");
    exit;
}

// Buscar endereço no banco
$stmt = $pdo->prepare("SELECT cep, rua, bairro, cidade, estado FROM usuarios WHERE id = ?");
$stmt->bindParam(1, $id, PDO::PARAM_INT);  
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);  

if (
    empty($usuario['cep']) ||
    empty($usuario['rua']) ||
    empty($usuario['bairro']) ||
    empty($usuario['cidade']) ||
    empty($usuario['estado'])
) {
    header("Location: " . BASE_URL . "pages-usuario/dados-endereco/form_endereco.php");
    exit;
}

$produto = [
    'nome' => 'Mouse Gamer',
    'preco' => 999.99,
    'cor' => 'Preto',
];

function calcularFrete($cepDestino) {
    $cepBase = '01000000';
    $destino = preg_replace('/[^0-9]/', '', $cepDestino);
    $distancia = abs((int)$destino - (int)$cepBase);
    $distanciaKm = $distancia / 1000;
    return round(10 + ($distanciaKm * 0.5), 2);
}

$frete = 0;
if ($usuario['cep']) {
    $frete = calcularFrete($usuario['cep']);
    $_SESSION['frete'] = $frete;
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

    <h3><?php echo $produto['nome']; ?> (<?php echo $produto['cor']; ?>)</h3>
    <p>Preço: R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>

    <p class="frete-info">Frete para o CEP <?php echo $usuario['cep']; ?>: R$ <?php echo number_format($frete, 2, ',', '.'); ?></p>

    <hr>

    <p><strong>Endereço de entrega:</strong><br>
        <?php
        echo "{$usuario['rua']}, {$usuario['bairro']} - {$usuario['cidade']}/{$usuario['estado']} - CEP {$usuario['cep']}";
        ?>
    </p>

    <hr>
    <h3>Total: R$
        <?php
        $total = $produto['preco'] + $frete;
        echo number_format($total, 2, ',', '.');
        ?>
    </h3>

    <form action="<?= BASE_URL ?>pages-usuario/loja/Pagamento-recebido.php" method="post">
        <button type="submit">PAGAR</button>
    </form>
</div>

</body>
</html>
