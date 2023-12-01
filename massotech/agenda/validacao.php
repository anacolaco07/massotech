<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
} else {
    require "../Config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $dataHoraAgendamento = $_POST["dataHoraAgendamento"];
            $id_procedimento = $_POST["procedimento"];
            $id_paciente = $_POST["id_paciente"];

            if (empty($dataHoraAgendamento) || empty($id_procedimento) || empty($id_paciente)) {
                echo "Preencha todos os campos obrigatórios.";
            } else {
                $dataAtual = new DateTime();
                $dataAgendamento = new DateTime($dataHoraAgendamento);

                if ($dataAgendamento < $dataAtual) {
                    echo "A data de agendamento não pode ser anterior à data atual.";
                } else {
                    $inserir = $pdo->prepare("INSERT INTO tb_agendamento (data_hora_agendamento, id_procedimento, id_paciente) VALUES (:dataHoraAgendamento, :id_procedimento, :id_paciente)");
                    $format = $dataAgendamento->format('Y-m-d H:i:s');
                    $inserir->bindParam(":dataHoraAgendamento", $format);
                    $inserir->bindParam(":id_procedimento", $id_procedimento);
                    $inserir->bindParam(":id_paciente", $id_paciente);
                    var_dump($inserir);
                    try {
                        if ($inserir->execute()) {
                            echo "sucesso";
                        } else {
                            echo "Erro ao agendar. Tente novamente.";
                        }
                    } catch (Exception $ex) {
                        echo "Erro ao executar a inserção no banco de dados.";
                    }
                }
            }
        } catch (Exception $e) {
            echo "Erro geral.";
        }
    }
}
?>
