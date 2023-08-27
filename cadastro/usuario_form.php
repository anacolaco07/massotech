<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cadastro de usuário</title>
	<link rel="stylesheet" href="estilo.css">

</head>
<body>
	<div id=corpo-form>
		<h2>Cadastro de usuário</h2>
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
</body>
</html>