<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dados do usuário</title>
</head>
<body>

	<h2></h2>
	<form action="../salvar.php"
		method="post">
		
		<label>Nome</label>
		<br/>
		<input type="text" name="nome"
			value=""/>
		<br/>

		<label>Idade</label>
		<br/>
		<input type="number" name="idade" value=""/>
		<br/>
		
		<label>Data de nascimento</label>
		<br/>
		<input type="date" name="data_nascimento"
			value=""/>
		<br/>
		
		<label>E-mail</label>
		<br/>
		<input type="text" name="email" value=""/>
		<br/>

		<label>Telefone</label>
		<br/>
		<input type="date" name="data_nascimento" value=""/>
		<br/>
		
		<br/>
		<input type="submit" name="salvar" value="Salvar"/>
	</form>
	
</body>
</html>
