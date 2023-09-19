<?php
require "../Config.php";

$idPaciente = $_POST['idPaciente'];
$dataHoraAgendamento = $_POST["dataHoraAgendamento"];
$procedimento = $_POST["procedimento"];

$sql = "insert into tb_Agenda (id_paciente,data_hora_agendamento)
        values (:nome,:data_hora_agendamento,:procedimento)";
try {
    $stm = $pdo->prepare($sql);

    $stm->execute([':id_paciente' => $idPaciente,
                ':data_hora_agendamento' => $dataHoraAgendamento,
                ':procedimento' => $procedimento
]);
} catch (\Throwable $th) {
    echo "<script>alert('Algum dado foi inserido de forma incorreta'</script>";
}


header("Location: ../main_page/index.php");

?>
