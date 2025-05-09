<?php
session_start();
include('../Controller/Conect/conecao.php');
include_once('../Controller/Conect/config-url.php');

$user_id = $_SESSION['user_id'];

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
    $pasta = '../../public_html/img/Fotos-users/';
    $nomeOriginal = $_FILES['foto']['name'];
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
    $nomeFinal = uniqid() . '.' . $extensao;

    if (!is_dir($pasta)) {
        mkdir($pasta, 0755, true);
    }

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $pasta . $nomeFinal)) {
        
        $stmt = $pdo->prepare("UPDATE usuarios SET foto = ? WHERE id = ?");
        $stmt->execute([$nomeFinal, $user_id]);
    }
}

header("Location: " . BASE_URL . "pages-usuario/usuario-pages/pagina-usuario.php");
exit;
