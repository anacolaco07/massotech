<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="box_login">

        <h1>Faça seu login</h1>
        <form id="loginForm" action="../login/validacao.php" method="post">
            <input type="email" name="email" id="email" placeholder="Email" maxlength="42" />
            <input type="password" name="senha" id="senha" placeholder="Senha" maxlength="42">
            <input type="submit" value="ACESSAR">
        </form>
        <a href="../cadastro/usuario_form.php">Ainda não está cadastrado?<strong>
                Cadastre-se!</strong></a>

        <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                event.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success: function(response) {
                        
                        
                        if (response.includes("Sucesso")) {
                            window.location.href = "../main_page/index.php";
                        } else {
                            alert(response);
                            window.location.href = "../login/login.php";
                        }
                    }
                });
            });
        });
    </script>
    </div>
</body>

</html>
