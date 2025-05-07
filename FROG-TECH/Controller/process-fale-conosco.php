<?php
session_start();
include(__DIR__ . '/../Controller/Conect/conecao.php');
include_once(__DIR__ . '/../Controller/Conect/config-url.php'); 

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "pages-usuario/cadastro/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$is_admin = isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1;

if (!$is_admin && isset($_POST['question'])) {
    $question = trim($_POST['question']);

    if (!empty($question)) {
        $stmt = $pdo->prepare("INSERT INTO questions (user_id, question) VALUES (?, ?)");
        $stmt->execute([$user_id, $question]);
    }
    header('Location: ' . BASE_URL . 'pages-usuario/fale-conosco-user/fale-conosco-user.php');
    exit();
}
?>
