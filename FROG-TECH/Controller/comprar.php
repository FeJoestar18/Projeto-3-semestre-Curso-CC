<?php
session_start();
ob_start();

include(__DIR__ . '/Conect/conecao.php');
require_once(__DIR__ . '/Conect/config-url.php');  

function debug_log($mensagem) {
    
    $diretorio = __DIR__ . '/logs/logs-loja/';
    $arquivo = $diretorio . 'log_debug.txt';

    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);  
    }

    $hora = date('Y-m-d H:i:s');
    file_put_contents($arquivo, "[$hora] $mensagem\n", FILE_APPEND);
}

debug_log("POST recebido: " . print_r($_POST, true));
debug_log("SESSION atual: " . print_r($_SESSION, true));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'], $_POST['quantidade'])) {
    
    $produtoId = (int) $_POST['produto_id'];
    $quantidade = max(1, (int) $_POST['quantidade']); 
    $_SESSION['produto_id'] = $produtoId;
    $_SESSION['quantidade'] = $quantidade;

    debug_log("Redirecionando para checkout com produto ID: $produtoId e quantidade: $quantidade");

    header("Location: " . BASE_URL . "pages-usuario/loja/checkout.php");
} else {
    debug_log("Erro: Dados do produto não enviados corretamente.");
    echo "Dados do produto não enviados corretamente.";
}

if (!isset($_SESSION['user_id'])) {
    debug_log("Usuário não está logado. Redirecionando para login.");
    header("Location: ../pages-usuario/cadastro/login.php");
    exit;
}

if (isset($_POST['acao']) && $_POST['acao'] == 'comprar') {
    $produto_id = (int) $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];
    $user_id = $_SESSION['user_id'];

    debug_log("Iniciando processo de compra - Produto ID: $produto_id, Quantidade: $quantidade, Usuário ID: $user_id");

    $query = "SELECT * FROM produtos WHERE id = :produto_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':produto_id' => $produto_id]);
    $produto = $stmt->fetch();

    if ($produto && $produto['quantidade'] >= $quantidade) {
        debug_log("Produto encontrado: " . print_r($produto, true));

        $query = "INSERT INTO compras (user_id, produto_id, nome_produto, preco, quantidade) 
                  VALUES (:user_id, :produto_id, :nome_produto, :preco, :quantidade)";
        $stmt = $pdo->prepare($query);
        $sucesso = $stmt->execute([
            ':user_id' => $user_id,
            ':produto_id' => $produto_id,
            ':nome_produto' => $produto['nome'],
            ':preco' => $produto['preco'],
            ':quantidade' => $quantidade
        ]);

        if ($sucesso) {
            debug_log("Compra registrada com sucesso no banco de dados.");
        } else {
            debug_log("Erro ao registrar compra: " . print_r($stmt->errorInfo(), true));
        }

        $nova_qtd = $produto['quantidade'] - $quantidade;
        $query = "UPDATE produtos SET quantidade = :quantidade WHERE id = :produto_id";
        $stmt = $pdo->prepare($query);
        $sucessoEstoque = $stmt->execute([
            ':quantidade' => $nova_qtd,
            ':produto_id' => $produto_id
        ]);

        if ($sucessoEstoque) {
            debug_log("Estoque atualizado com sucesso. Novo estoque: $nova_qtd");
        } else {
            debug_log("Erro ao atualizar estoque: " . print_r($stmt->errorInfo(), true));
        }

        header("Location: " . BASE_URL . "pages-usuario/loja/checkout.php");
        exit;

    } else {
        debug_log("Estoque insuficiente ou produto não encontrado.");
        echo "<h2 style='color:red;'>Estoque insuficiente!</h2>";
    }
}

ob_end_flush();
?>