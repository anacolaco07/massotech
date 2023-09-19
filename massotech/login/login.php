<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="inicio.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
</head>

<body>
	<div class="box_login">

		<h1>Faça seu login</h1>
		<form action="../login/validacao.php" method="post">
			<input type="email" name="email" placeholder="Email" maxlength="42"/>
			<input type="password" name="senha" placeholder="Senha"
				maxlength="42">
			<button class="btn-login">ACESSAR</button>
			
			<!--  <span class="msg_error"> <i class="fa fa-exclamation-triangle" style="font-size: 18px; color:#FF6D6D;"></i>Tentativa inválida</span>-->
		</form>
		<a href="../cadastro/usuario_form.php">Ainda não está cadastrado?<strong> Cadastre-se!</strong>
		</br>
		<a href="esquecisenha.php">Esqueci a senha.
	</div>
</body>
</html>