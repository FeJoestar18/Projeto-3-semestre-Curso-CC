$('#cep').blur(function() {
    var cep = $(this).val().replace(/\D/g, '');

    if (cep !== '') {
        var validacep = /^[0-9]{8}$/;

        if (validacep.test(cep)) {
            $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                if (!data.erro) {
                   
                    $('#rua').val(data.logradouro);
                    $('#cidade').val(data.localidade);
                    $('#estado').val(data.uf);
                } else {
                    alert('CEP não encontrado.');
                }
            });
        } else {
            alert('CEP inválido.');
        }
    }
});