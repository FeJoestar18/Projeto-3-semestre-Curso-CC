<?php
include_once(__DIR__ . '/../Controller/Conect/config-url.php');



$role_id = $_SESSION['role_id'];
?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/menu-rapido.css">

<!-- Botão flutuante -->
<button class="btn-menu" onclick="abrirModalMenu()">📂 Menu Rápido</button>

<!-- Modal -->
<div id="modalMenu" class="modal-menu">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModalMenu()">&times;</span>
        <h2>Ir para:</h2>
        <div class="links-menu">
            <?php if ($role_id == 1 || $role_id == 2): ?>
                <a href="<?php echo BASE_URL ?>pages-admin/Funcionario/lista-funcionarios.php">📋 Listar Funcionários</a>
                <a href="<?php echo BASE_URL ?>pages-admin/departamentos/lista-departamento.php">📂 Listar Departamentos</a>
                <a href="<?php echo BASE_URL ?>pages-admin/produtos/lista-produtos.php">📦 Listar Produtos</a>
                <a href="<?php echo BASE_URL ?>pages-admin/fale-conosco/fale-conosco-adm.php">✉️ Fale Conosco</a>
                <a href="<?php echo BASE_URL ?>pages-admin/usuarios/visualizar_usuarios.php">👤 Visualizar Usuários</a>
            <?php endif; ?>

            <?php if ($role_id == 1): ?>
                <a href="<?php echo BASE_URL ?>pages-admin/Funcionario/add-funcionario.php">➕ Adicionar Funcionários</a>
                <a href="<?php echo BASE_URL ?>pages-admin/departamentos/form-add-departamentos.php">🏢 Adicionar Departamentos</a>
                <a href="<?php echo BASE_URL ?>pages-admin/produtos/add-produto.php">🛒 Adicionar Produtos</a>
            <?php endif; ?>

            <a href="Controller/logout.php" class="logout" onclick="return confirm('Deseja realmente sair?')">🚪 Sair</a>
        </div>
    </div>
</div>
<script src="<?php echo BASE_URL; ?>js/menu-rapido.js"></script>