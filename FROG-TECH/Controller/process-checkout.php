<?php
include_once(__DIR__ . "/Conect/config-url.php");
include(__DIR__ . "/Conect/conecao.php");
include(__DIR__ . "/protect.php");

$id = $_SESSION['user_id'] ?? null;

if (!$id) {
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit;
}

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

function calcularFrete($cepDestino, $estadoDestino) {
   
    $cepBase = '01000000';
    
    $cepDestino = preg_replace('/[^0-9]/', '', $cepDestino);
    $cepBase = preg_replace('/[^0-9]/', '', $cepBase);
    
    $distancia = abs((int)$cepDestino - (int)$cepBase);
    
    $distanciaKm = $distancia / 1000;
    
    $freteBase = 15.00;
    
    $frete = $freteBase + ($distanciaKm * 0.5);  
    $estadosSP = ['SP'];
    if (!in_array($estadoDestino, $estadosSP)) {
        $frete *= 1.02; 
        
    }

    if ($frete > 1000000) {
        $frete = 1000000;
    }

    return round($frete, 2);  
}


$frete = 0;
if ($usuario['cep']) {
    $estadoDestino = $usuario['estado']; 
    $frete = calcularFrete($usuario['cep'], $estadoDestino);
    $_SESSION['frete'] = $frete;
}
