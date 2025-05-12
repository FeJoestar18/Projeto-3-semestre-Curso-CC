<?php 

include_once('../../Controller/Conect/config-url.php'); 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/modalERROR.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/layouts/rodape.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/css-usuarios/pageRegister.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class ="back-button-container">
        <a href="javascript:history.back()" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#d32f2f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
         </a>
    </div>

    <header class="header">
        <img src="<?= BASE_URL ?>img/logo/Logo-Frog-v1.png" alt="FrogTech Logo" class="logo">
    </header>
 
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="register-container">
        <div class="register-form">
            <h2>cadastre-se</h2>
                <form action="<?= BASE_URL ?>Controller/auth-register.php" method="POST">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                        <div class="password-wrapper">
                            <input type="password" name="senha" id="senha" placeholder="Senha" required>
                            <span class="toggle-password" onclick="togglePassword('senha', this)">👁️</span>
                        </div>
                    <input type="text" name="telefone" placeholder="Telefone" required>
                <button type="submit">Cadastrar-se</button>
            </form>
        </div>
    </div>
</div>

    <footer>
        <p>&copy; 2025 Frog Tech. Todos os direitos reservados.</p>
    </footer>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                el.textContent = "🐸";
            } else {
                input.type = "password";
                el.textContent = "👁️";
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
if (isset($_SESSION['error'])) {
    $erro = $_SESSION['error'];
    unset($_SESSION['error']);
    $imgUrl = BASE_URL . "/img/Modal-Error.png"; 
    echo "<script>
        Swal.fire({
            title: 'Erro!',
            text: '$erro',
            iconHtml: '<img src=\"$imgUrl\" style=\"width:115px;\">',
            background: '#e9f5ee',
            color: '#14532d',
            confirmButtonText: 'OK',
            confirmButtonColor: '#22c55e',
            customClass: {
                popup: 'swal2-custom-popup',
                title: 'swal2-custom-title'
            }
        });
    </script>";
}
?>


</body>
</html>
