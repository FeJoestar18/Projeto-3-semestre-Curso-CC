<?php
require '../Controller/Conect/conecao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Verifica se o e-mail existe no banco
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        
        $token = bin2hex(random_bytes(32));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $stmt = $pdo->prepare("UPDATE usuarios SET token_recuperacao = ?, token_expira = ? WHERE id = ?");
        $stmt->execute([$token, $expira, $user['id']]);

        $link = "http://localhost/Projeto-3-semestre-Curso-CC/FROG-TECH/Pages/nova_senha.php?token=$token";

        echo "<h3>Link de redefinição de senha:</h3>";
        echo "<a href='$link'>$link</a><br><br>";
        echo "<small>Copie o link acima e cole no navegador para continuar o processo.</small>";
    } else {
        echo "E-mail não encontrado.";
    }
}
?>
