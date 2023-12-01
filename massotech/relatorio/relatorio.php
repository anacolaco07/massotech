<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Pacientes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
            echo "<td>{$paciente['nome_paciente']}</td>";
            echo "<td>{$paciente['sexo']}</td>";
            echo "<td>{$paciente['idade']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <form id="form1">
        <div style="padding: 20px">
            <select id="chkveg" multiple="multiple">
                <option value="cheese">Cheese</option>
                <option value="tomatoes">Tomatoes</option>
                <option value="onions">Onions</option>
            </select>
            <div id="selected-values"></div>
            <br /><br />
            <input type="button" id="btnget" value="Obter Valores Selecionados" />
        </div>
    </form>

    <a href='../main_page/index.php'>Voltar</a>

    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
    <script src="script.js"></script>
</body>
</html>
