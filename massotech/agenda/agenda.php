<?php
session_start();
if(!isset($_SESSION["id_usuario"])){
    header("Location: ../login/login.php");
} else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="agenda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</head>
<body>

<?php
require "../Config.php";

try {
    $sql = "SELECT tb_Agendamento.id_agendamento, tb_Paciente.id_paciente, tb_Paciente.nome_paciente, tb_Agendamento.data_hora_agendamento, tb_Agendamento.id_procedimento
            FROM tb_Agendamento
            INNER JOIN tb_Paciente ON tb_Agendamento.id_paciente = tb_Paciente.id_paciente
            ORDER BY tb_Agendamento.data_hora_agendamento;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
    exit();
}
?>
<div id="menu-lateral">
    <a href="../main_page/index.php">
        <i class="fas fa-home"></i> Início
    </a>
    <a href="../prontuario/prontuario_form.php">
            <i class="fas fa-book-medical"></i> Prontuário
    </a>
    <a href="../paciente/paciente.php">
        <i class="fas fa-users"></i> Pacientes
    </a>
    <a href="../perfil/view_perfil.php">
        <i class="fas fa-user"></i> Perfil
    </a>
    <a href="../login/logout.php">
            <i class="fas fa-sign-out-alt"></i> Sair
    </a>
</div>

<div id="conteudo">
    <div id="calendario">

    </div>

    <div id="botao">
        <a href='../agenda/agendamentos.php' class='back-link'>Novo Agendamento</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/pt-br.js"></script>

<script>
    $(document).ready(function() {
        $('#calendario').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                <?php
                foreach ($agendamentos as $agendamento) {
                    echo '{';
                    echo 'title: "' . htmlspecialchars($agendamento["nome_paciente"]) . ' - ' . htmlspecialchars($agendamento["id_procedimento"]) . '",';
                    echo 'start: "' . htmlspecialchars($agendamento["data_hora_agendamento"]) . '",';
                    echo 'url: "detalhes_consulta.php?id=' . htmlspecialchars($agendamento["id_agendamento"]) . '"';
                    echo '},';
                }
                ?>
            ],
            eventClick: function(event) {
                window.location.href = event.url;
                return false;
            },
            themeSystem: 'bootstrap4',
            lang: 'pt-br'
        });
    });
</script>

</body>
</html>
<?php
}
?>