<?php
session_start();
include_once('../../Controller/Conect/config-url.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pagamento Recebido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .modal {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.4s ease-in-out;
        }

        .modal h2 {
            color: green;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>

    <script>
        setTimeout(function () {
            window.location.href = "<?= BASE_URL ?>pages-usuario/tela-home-usuario.php";
        }, 3000);
    </script>
</head>
<body>

<div class="modal">
    <h2>✅ Pagamento realizado com sucesso!</h2>
    <p>Você será redirecionado para a página inicial em instantes...</p>
</div>

</body>
</html>
