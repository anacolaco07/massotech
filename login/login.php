<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="inicio.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="box_login">

		<h1>Faça seu login</h1>
		<form action="../login/validacao.php" method="post">
			<input type="email" name="email" placeholder="Email" maxlength="42" />
			<input type="password" name="senha" placeholder="Senha"
				maxlength="42">
			<button class="btn-login">ACESSAR</button>
			
			<!--  <span class="msg_error"> <i class="fa fa-exclamation-triangle" style="font-size: 18px; color:#FF6D6D;"></i>Tentativa inválida</span>-->
		</form>
		<a href='../cadastro/usuario_form.php'><button class="btn-cadastro">CADASTRO</button></a>
	</div>
</body>
</html>