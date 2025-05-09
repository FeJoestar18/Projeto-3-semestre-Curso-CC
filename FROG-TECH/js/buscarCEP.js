function buscarEnderecoPorCEP(cep) {
    cep = cep.replace(/\D/g, ''); // Remove qualquer caractere não numérico
    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.querySelector('[name="rua"]').value = data.logradouro;
                    document.querySelector('[name="bairro"]').value = data.bairro;
                    document.querySelector('[name="cidade"]').value = data.localidade;
                    document.querySelector('[name="estado"]').value = data.uf;
                } else {
                    alert("CEP não encontrado.");
                }
            })
            .catch(() => {
                alert("Erro ao buscar o endereço.");
            });
    } else {
        alert("CEP inválido. Certifique-se de que tenha 8 dígitos.");
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const cepInput = document.querySelector('[name="cep"]');
    cepInput.addEventListener("blur", () => buscarEnderecoPorCEP(cepInput.value)); // Quando perde o foco
});
