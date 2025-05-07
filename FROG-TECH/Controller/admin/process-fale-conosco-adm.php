<?php
session_start();
include(__DIR__ . '/../Conect/conecao.php');
include_once(__DIR__ . '/../Conect/config-url.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$is_admin = isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1;

if (!$is_admin) {
    echo "Você não tem permissão para acessar esta página.";
    exit();
}

if (isset($_POST['answer']) && isset($_POST['question_id'])) {
    echo "Answer: " . htmlspecialchars($_POST['answer']) . "<br>";
    echo "Question ID: " . htmlspecialchars($_POST['question_id']) . "<br>";
}

if (isset($_POST['answer']) && isset($_POST['question_id'])) {
    $answer = trim($_POST['answer']);
    $question_id = (int)$_POST['question_id'];

    if (empty($answer)) {
        echo "A resposta não pode estar vazia!";
        exit();
    }

    if ($question_id <= 0) {
        echo "ID da pergunta inválido!";
        exit();
    }

    $stmt = $pdo->prepare("UPDATE questions SET answer = ? WHERE id = ?");
    if ($stmt->execute([$answer, $question_id])) {
        
        header("Location: " . BASE_URL . "pages-admin/fale-conosco/fale-conosco-adm.php");
        exit();
    } else {
       
        echo "Erro ao atualizar a resposta!";
        exit();
    }
} else {
    
    echo "Erro: dados não enviados corretamente!";
    exit();
}
?>
