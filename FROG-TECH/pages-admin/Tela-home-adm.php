<?php
session_start();
include("../Controller/protect.php");
include("../Controller/Conect/conecao.php");
include_once('../Controller/Conect/config-url.php');
include_once('../Controller/func/exibir-modal-verificar-role_id.php'); 

if (isset($_SESSION['user_id']) && ($_SESSION['role_id'] === 1 || $_SESSION['role_id'] === 2)) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Área Administrativa | Frog Tech</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>css/css-admin/home-adm.css">
</head>
<body>
  <div class="container">
    <h1>Olá, 
        <?php
            $nomeUsuario = '';
        if ($_SESSION['role_id'] == 1) {
            $nomeUsuario = 'Administrador';
        } elseif ($_SESSION['role_id'] == 2) {
            $nomeUsuario = 'Funcionário';
        }   
        echo $nomeUsuario ?>
    </h1>
    <h2>Bem-vindo à área administrativa da Frog Tech</h2>

    <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
        <a href="../pages-admin/Funcionario/lista-funcionarios.php">📋 Listar Funcionários</a>
        <a href="../pages-admin/departamentos/lista-departamento.php">📂 Listar Departamentos</a>
        <a href="../pages-admin/produtos/lista-produtos.php">📦 Listar Produtos</a>
        <a href="../pages-admin/fale-conosco/fale-conosco-adm.php">✉️ Fale Conosco</a>
        <a href="../pages-admin/usuarios/visualizar_usuarios.php">👤 Visualizar Usuários</a>
    <?php endif; ?>

    <?php if ($_SESSION['role_id'] == 1): ?>
        <a href="../pages-admin/Funcionario/add-funcionario.php">➕ Adicionar Funcionários</a>
        <a href="../pages-admin/departamentos/form-add-departamentos.php">🏢 Adicionar Departamentos</a>
        <a href="../pages-admin/produtos/add-produto.php">🛒 Adicionar Produtos</a>
    <?php endif; ?>

    <a href="../Controller/logout.php" class="logout" onclick="return confirm('Deseja realmente sair?')">🚪 Sair</a>
  </div>

  

</body>
</html>
