<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cadastro de usuário</title>
	<link rel="stylesheet" href="estilo.css">

</head>
<body>
<center>
	<div id=corpo-form>
		<form action="../cadastro/salvar.php" method="post">
			<input type="text" name="nome" placeholder="Nome Completo" maxlength="40" /> 
			<br /> 
			<input type="email" name="email" placeholder="Email" maxlength="42" />
			<br /> 
			<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
			<br />
			<input type="password" name="senha" placeholder="Senha" maxlength="15"> 
			<br />
			<input type="password" name="confSenha" placeholder="Confirmar Senha">
			<br /> 
			<input type="submit" name="salvar" value="SALVAR" />
		</form>
	</div>

	<?php
if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);

    if (! empty($nome) && ! empty($telefone) && ! empty($email) && ! empty($senha)) {
        $u->conectar("projeto_login", "localhost", "root", "");
        if ($u->msgErro == "") {
            if ($senha == $confirmarSenha) {
                if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                    echo "Cadastrado com sucesso! Acesse para entrar!";
                } else {
                    echo "Email já cadastrado!";
                }
            } else {
                echo "Senha e confirmar senha não correspondem!";
            }
        } else {
            echo "Erro: " . $u->msgErro;
        }
    } else {
        echo "Preencha todos os campos!";
    }
}

?>    

	<br />
</body>
</html>