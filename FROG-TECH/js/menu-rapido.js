function abrirModalMenu() {
    document.getElementById('modalMenu').style.display = 'flex';
}

function fecharModalMenu() {
    document.getElementById('modalMenu').style.display = 'none';
}

// Fecha ao clicar fora da modal
window.onclick = function(event) {
    const modal = document.getElementById('modalMenu');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
