function buscarEnderecoPorCEP(cep) {
    cep = cep.replace(/\D/g, '');
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
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const cepInput = document.querySelector('[name="cep"]');
    cepInput.addEventListener("blur", () => buscarEnderecoPorCEP(cepInput.value));
});