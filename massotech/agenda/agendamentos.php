<?php 
    require "../Config.php";
    $sql = "SELECT tb_Agendamento.id AS id_agendamento, tb_Paciente.id AS id_paciente, tb_Paciente.nome AS nome_paciente, tb_Agendamento.data_hora_agendamento, tb_Agendamento.procedimento
                FROM tb_Agendamento
                INNER JOIN tb_Paciente ON tb_Agendamento.id_paciente = tb_Paciente.id
                ORDER BY tb_Agendamento.data_hora_agendamento";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($agendamentos) > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID Agendamento</th>
                        <th>ID Paciente</th>
                        <th>Nome do Paciente</th>
                        <th>Data e Hora do Agendamento</th>
                        <th>Procedimento</th>
                    </tr>";

            foreach ($agendamentos as $agendamento) {
                echo "<tr>
                        <td>" . $agendamento["id_agendamento"] . "</td>
                        <td>" . $agendamento["id_paciente"] . "</td>
                        <td>" . $agendamento["nome_paciente"] . "</td>
                        <td>" . $agendamento["data_hora_agendamento"] . "</td>
                        <td>" . $agendamento["procedimento"] . "</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Não há agendamentos disponíveis.";
    }


?>