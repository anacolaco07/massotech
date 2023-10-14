<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pacientes</title>
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
<center>
	<body>

		<h1>Pacientes</h1>
		<table>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Idade</th>
				<th>Profissão</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>Ação</th>

			</tr>
        <?php
        require_once "../Config.php";

        $sql = "select * from tb_Paciente";

        $stm = $pdo->query($sql);

        $pacientes = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($pacientes as $paciente) {
            echo "<tr>";
            echo "<td>{$paciente['id_paciente']}</td>";
            echo "<td>{$paciente['nome_paciente']}</td>";
            echo "<td>{$paciente['idade']}</td>";
            echo "<td>{$paciente['profissao']}</td>";
            echo "<td>{$paciente['telefone_paciente']}</td>";
            echo "<td>{$paciente['email_paciente']}</td>";
            echo "<td><a href='../paciente/show_paciente.php?id_paciente={$paciente['id_paciente']}'>Ver</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
	</body>
</center>
</html>
