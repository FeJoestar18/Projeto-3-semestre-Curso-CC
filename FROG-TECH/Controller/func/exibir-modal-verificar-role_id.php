<?php
function exibirModal($imgUrl) {
    echo '
    <div id="modal" style="display: block; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; padding: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); border-radius: 8px; text-align: center; max-width: 400px; width: 100%; animation: fadeIn 0.4s ease-in-out;">
        <img src="' . $imgUrl . '" style="width: 100px; margin-bottom: 15px;">
        <h2 style="color: #14532d; font-family: Arial, sans-serif;">Acesso Negado</h2>
        <p style="color: #555; font-family: Arial, sans-serif; margin-bottom: 20px;">Você não tem permissão para acessar esta página.</p>
        <button onclick="window.location.href=\'' . BASE_URL . 'pages-usuario/cadastro/login.php\';" style="background-color: #22c55e; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; cursor: pointer; text-transform: uppercase; transition: background-color 0.3s ease;">Voltar à página de login</button>
    </div>';
}
?>
