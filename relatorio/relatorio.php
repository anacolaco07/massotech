<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relatório de Pacientes</title>
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
	<h1>Relatório de Pacientes</h1>
	<table>
		<tr>
			<th>Nome</th>
			<th>Sexo</th>
			<th>Idade</th>
		</tr>
        <?php
        require_once "../Config.php";

        $sql = "select * from tb_Paciente";

        $stm = $pdo->query($sql);

        $pacientes = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($pacientes as $paciente) {
            echo "<tr>";
            echo "<td>{$paciente['nome']}</td>";
            echo "<td>{$paciente['sexo']}</td>";
            echo "<td>{$paciente['idade']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>