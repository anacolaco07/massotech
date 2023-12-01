<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de usuário</title>

    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#cadastroForm").submit(function(event) {
                event.preventDefault();

                if (validarFormulario()) {
                    $.ajax({
                        type: "POST",
                        url: $(this).attr("action"),
                        data: $(this).serialize(),
                        success: function(response) {
                            alert(response);
                            if (response.includes("Sucesso")) {
                                window.location.href = "../main_page/index.php";
                            } else {
                                alert("Erro: " + response);
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            alert("Erro na requisição AJAX: " + errorThrown);
                        }
                    });
                }
            });

            function validarFormulario() {
                var nome = document.getElementById("nome");
                var email = document.getElementById("email");
                var telefone = document.getElementById("telefone");
                var senha = document.getElementById("senha");
                var confSenha = document.getElementById("confSenha");

                if (!nome || !email || !telefone || !senha || !confSenha) {
                    alert("Erro: Elementos do formulário não encontrados.");
                    return false;
                }

                if (nome.value.trim() === "" || email.value.trim() === "" || telefone.value.trim() === "" || senha.value.trim() === "" || confSenha.value.trim() === "") {
                    alert("Por favor, preencha todos os campos.");
                    return false;
                }

                var emailFormat = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if (!email.value.match(emailFormat)) {
                    alert("Formato de email inválido.");
                    return false;
                }

                if (!/^\d+$/.test(telefone.value)) {
                    alert("O telefone deve conter apenas dígitos.");
                    return false;
                }

                if (senha.value !== confSenha.value) {
                    alert("A senha e a confirmação de senha não coincidem.");
                    return false;
                }

                return true;
            }
        });
    </script>
</head>
<body>
    <div class="box_cadastro">
        <h1>Cadastro de usuário</h1>
        <form id="cadastroForm" action="../cadastro/salvar.php" method="post">
            <input type="text" name="nome" id="nome" placeholder="Nome Completo" maxlength="40" required/> 
            <input type="email" name="email" id="email" placeholder="Email" maxlength="42" required/>
            <input type="text" name="telefone" id="telefone" placeholder="Telefone" maxlength="30" required/>
            <input type="password" name="senha" id="senha" placeholder="Senha" maxlength="15" required/> 
            <input type="password" name="confSenha" id="confSenha" placeholder="Confirmar Senha" required/>
            <button class="btn-cadastro">CONFIRMAR</button>
            <button class="btn-cancelar" type="button" onclick="window.location.href='../login/login.php'">CANCELAR</button>
        </form>
    </div>
</body>
</html>
