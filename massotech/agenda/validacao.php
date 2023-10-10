<?php
require "../Config.php";

$nome_paciente = $_POST['nome_paciente'];
$dataHoraAgendamento = $_POST['dataHoraAgendamento'];
$procedimento = $_POST['procedimento'];

$sql = "insert into tb_Agendamento (nome_paciente, data_hora_agendamento,procedimento)
        values (:nome_paciente,:data_hora_agendamento,:procedimento)";
try {
    $stm = $pdo->prepare($sql);

    $stm->execute([
        ':nome_paciente' => $nome_paciente,
        ':data_hora_agendamento' => $dataHoraAgendamento,
        ':procedimento' => $procedimento
    ]);
} catch (\Throwable $th) {
    echo "<script>alert('Algum dado foi inserido de forma incorreta'</script>";
}

header("Location: ../agenda/agendamentos.php");

?>
