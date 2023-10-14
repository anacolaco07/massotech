<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cadastro de usuário</title>
	<link rel="stylesheet" href="cadastro.css">
	<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class = "box_cadastro">
		<h1>Cadastro de usuário</h1>
		<form action="../cadastro/salvar.php" method="post">
			<input type="text" name="nome" placeholder="Nome Completo" maxlength="40" /> 
			<input type="email" name="email" placeholder="Email" maxlength="42" />
			<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
			<input type="password" name="senha" placeholder="Senha" maxlength="15"> 
			<input type="password" name="confSenha" placeholder="Confirmar Senha">
			<button class="btn-cadastro">CONFIRMAR</button>
			<button class="btn-cadastro" type="submit" formaction="../login/login.php">CANCELAR</button>
		</form>
		
	</div>
</body>
</html>