function abrirModal() {
  document.getElementById('modalExcluir').style.display = 'flex';
}

function fecharModal() {
  document.getElementById('modalExcluir').style.display = 'none';
}

function exibirAnimacaoExclusao() {
  document.getElementById('modalContent').style.display = 'none';
  document.getElementById('modalExcluindo').style.display = 'block';

  setTimeout(() => {
    window.location.href = "<?= BASE_URL ?>Controller/excluir-usuario.php";
  }, 2000);
}