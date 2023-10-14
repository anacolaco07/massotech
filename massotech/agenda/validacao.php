<?php
require "../Config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $dataHoraAgendamento = $_POST["dataHoraAgendamento"];
        $procedimento = $_POST["procedimento"];
        $id_paciente = $_POST["id_paciente"];
        
        // Verifique se os campos obrigatórios foram preenchidos
        if (empty($dataHoraAgendamento) || empty($procedimento) || empty($id_paciente)) {
            echo "Preencha todos os campos obrigatórios.";
        } else {
            // Insere o agendamento no banco de dados
            $inserir = $pdo->prepare("INSERT INTO agendamentos (dataHoraAgendamento, procedimento, id_paciente) VALUES (:dataHoraAgendamento, :procedimento, :id_paciente)");
            $inserir->bindParam(":dataHoraAgendamento", $dataHoraAgendamento);
            $inserir->bindParam(":procedimento", $procedimento);
            $inserir->bindParam(":id_paciente", $id_paciente);
            
            if ($inserir->execute()) {
                echo "Agendamento realizado com sucesso!";
            } else {
                echo "Erro ao agendar. Tente novamente.";
            }
        }
    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
    }
}

header("Location: ../agenda/agendamentos.php");
