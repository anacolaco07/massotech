<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agenda</title>
</head>

<body>
	<h2>Agenda</h2>
	<form action="../agenda/validacao.php" method="post">
	
	<label for="idPaciente">Nome do Paciente</label>
	<input type="text" name="nome_paciente" id="nome_paciente">
	<br/>
	
	<label for="procedimento">Massagem</label>
	<select name="procedimento">
  	<option value="valor1" selected>Massagem</option>
  	<option value="valor2">Opçao 2</option>
  	<option value="valor3">Opçao 3</option>
	</select>
	<br/>

	<label for="dataHoraAgendamento">Data e Hora</label>
	<input type="datetime-local" name="dataHoraAgendamento" id="dataHoraAgendamento">
	<br/>

	<input type="submit" value="Enviar">

	</form>

</body>
</html>