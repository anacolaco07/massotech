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


// $(function() {

  $('#chkveg').multiselect({
    includeSelectAllOption: true
  });

  $('#btnget').click(function() {
    alert($('#chkveg').val());
  });
});
.multiselect-container>li>a>label {
  padding: 4px 20px 3px 20px;
}
<link href="https://unpkg.com/bootstrap@3.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
<link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet"/>

<form id="form1">
  <div style="padding:20px">

    <select id="chkveg" multiple="multiple">
      <option value="cheese">Cheese</option>
      <option value="tomatoes">Tomatoes</option>
      <option value="mozarella">Mozzarella</option>
      <option value="mushrooms">Mushrooms</option>
      <option value="pepperoni">Pepperoni</option>
      <option value="onions">Onions</option>
    </select>
    
   <br /><br />

    <input type="button" id="btnget" value="Get Selected Values" />
  </div>
</form>
