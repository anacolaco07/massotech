<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Perfil</title>
<style>
table {
	border-collapse: collapse;
	width: 65%;
}

th, td {
	border: 1px solid black;
	padding: 8px;
	text-align: left;
}

th {
	background-color: #f2f2f2;
}
</style>


</head>
<body>
	<h1>Perfil</h1>
	<table>
		<tr>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Telefone</th>
			<th>Ações</th>
		</tr>

<?php

require_once "../Config.php";

$sql = "select * from tb_usuario";

$stm = $pdo->query($sql);

$usuarios = $stm->fetchAll(PDO::FETCH_ASSOC);


foreach ($usuarios as $usuario) {
    echo "<tr><td>";
    echo $usuario["nome"];
    echo "</td><td>";
    echo $usuario["email"];
    echo "</td><td>";
    echo $usuario["telefone"];
    echo "</td><td>";

    echo "<a href='./editar_form.php?id=".$usuario["id"]."'>Editar</a>";
    echo "</td>";
}
echo "</tr></table>";

echo "<br/><a href='../main_page/index.php'>Voltar</a>";
?>
