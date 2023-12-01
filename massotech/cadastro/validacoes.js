document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('cadastro-form');
    
    form.addEventListener('submit', function (event) {
        var nome = document.getElementById('nome').value;
        var email = document.getElementById('email').value;
        var senha = document.getElementById('senha').value;
        var confSenha = document.getElementById('confSenha').value;

        if (!nome || !email || !senha || !confSenha) {
            alert('Por favor, preencha todos os campos obrigatórios.');
            event.preventDefault();
        } else if (senha !== confSenha) {
            alert('As senhas não coincidem.');
            event.preventDefault();
        }
    });
});
