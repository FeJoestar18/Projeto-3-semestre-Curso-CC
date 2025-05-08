<?php
session_start();
ob_start();
include(__DIR__ . "/process-checkout.php");
include(__DIR__ . '/Conect/conecao.php');
include_once(__DIR__ . '/func/exibir-modal-verificar-role_id.php');
function debug_log($mensagem) {
    
    $diretorio = __DIR__ . '/logs/logs-checkout/';
    $arquivo = $diretorio . 'log_debug.txt';

    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);  
    }

    $hora = date('Y-m-d H:i:s');
    file_put_contents($arquivo, "[$hora] $mensagem\n", FILE_APPEND);
}

debug_log("POST recebido: " . print_r($_POST, true));
debug_log("SESSION atual: " . print_r($_SESSION, true));

// ------------------------------------------------------------------------
if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 3) {
    echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}
function calcularFrete($cep) {
   
    $uf = substr($cep, 0, 2); 
    $frete = 0;

    if (in_array($uf, ['69', '70', '71', '72', '73'])) { 
        $frete = 30.00;
    }
    elseif (in_array($uf, ['56', '57', '58', '59'])) { 
        $frete = 20.00;
    }
    elseif (in_array($uf, ['75', '76', '77'])) { 
        $frete = 25.00;
    }
    elseif (in_array($uf, ['35', '36', '37', '38', '39'])) { 
        $frete = 15.00;
    }
    elseif (in_array($uf, ['41', '42', '43', '44', '45'])) { 
        $frete = 10.00;
    } else {
        
        $frete = 35.00;
    }

    return $frete;
}

$idProduto = $_POST['produto_id'] ?? $_GET['produto_id'] ?? $_SESSION['produto_id'] ?? null;
$quantidade = $_POST['quantidade'] ?? $_GET['quantidade'] ?? $_SESSION['quantidade'] ?? 1;


if (!empty($idProduto)) {
    $_SESSION['produto_id'] = $idProduto;
    $_SESSION['quantidade'] = $quantidade;
    debug_log("Redirecionando para checkout com produto ID: $idProduto e quantidade: $quantidade");
} else {
    debug_log("Erro: Dados do produto não enviados corretamente.");
    echo "Erro: Produto não selecionado.";
    exit;
}

if (
    empty($usuario['cep']) ||
    empty($usuario['rua']) ||
    empty($usuario['bairro']) ||
    empty($usuario['cidade']) ||
    empty($usuario['estado'])
) {
    debug_log("Erro: Endereço não preenchido. Redirecionando para o formulário de endereço.");
    header("Location: " . BASE_URL . "pages-usuario/dados-endereco/form_endereco.php");
    exit;
}

$frete = calcularFrete($usuario['cep']);

$stmtProduto = $pdo->prepare("SELECT nome, preco FROM produtos WHERE id = ?");
$stmtProduto->execute([$idProduto]);
$produto = $stmtProduto->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}
$quantidade = $_POST['quantidade'] ?? $_SESSION['quantidade'] ?? 1;
?>