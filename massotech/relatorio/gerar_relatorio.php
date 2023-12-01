<?php

require_once "../Config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projeto_login", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recupera os valores do formulário
        $id_procedimento = $_POST['procedimento'];
        $sexo = $_POST['sexo'];

        // Formatação correta das datas
        $dataNascimentoMin = date('Y-m-d', strtotime($_POST['dataNascimentoMin']));
        $dataNascimentoMax = date('Y-m-d', strtotime($_POST['dataNascimentoMax']));

        // Cria a consulta SQL com base nos valores do formulário
        $sql = "SELECT
                    a.id_agendamento,
                    p.nome_paciente,
                    p.sexo,
                    TIMESTAMPDIFF(YEAR, p.data_nascimento, CURDATE()) AS idade,
                    pr.nome_procedimento,
                    a.data_hora_agendamento
                FROM
                    tb_Agendamento a
                JOIN tb_Paciente p ON a.id_paciente = p.id_paciente
                JOIN tb_procedimento pr ON a.id_procedimento = pr.id_procedimento
                WHERE
                    pr.id_procedimento = :id_procedimento
                    AND p.sexo = :sexo
                    AND p.data_nascimento BETWEEN :dataNascimentoMin AND :dataNascimentoMax";

        $stmt = $pdo->prepare($sql);

        // Associa os parâmetros
        $stmt->bindParam(':id_procedimento', $id_procedimento, PDO::PARAM_INT);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimentoMin', $dataNascimentoMin, PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimentoMax', $dataNascimentoMax, PDO::PARAM_STR);

        // Executa a consulta
        $stmt->execute();

        // Recupera os resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Faça o que quiser com os resultados, como exibi-los em uma tabela HTML
        echo '<table border="1">';
        echo '<tr><th>ID Agendamento</th><th>Nome Paciente</th><th>Sexo</th><th>Idade</th><th>Procedimento</th><th>Data/Hora Agendamento</th></tr>';
        foreach ($resultados as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_agendamento'] . '</td>';
            echo '<td>' . $row['nome_paciente'] . '</td>';
            echo '<td>' . $row['sexo'] . '</td>';
            echo '<td>' . $row['idade'] . '</td>';
            echo '<td>' . $row['nome_procedimento'] . '</td>';
            echo '<td>' . $row['data_hora_agendamento'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
}

?>
