<?php
session_start();

if(!isset($_SESSION["id_usuario"])){
    header("Location: ../login/login.php");
} else{
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="agendamentos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Agendamentos</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
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
        <h2>Agenda</h2>
        <form id="agendaForm" action="../agenda/validacao.php" method="post">
        <label for="idPaciente">ID do Paciente</label>
            <input type="number" name="id_paciente" id="id_paciente">
            <br>
            <label for="procedimento">Massagem</label>
            <select name="procedimento">
                <option value="1" selected>Massagem Laboral</option>
                <option value="2">Massagem Shiatsu</option>
                <option value="3">Massagem Tuiná</option>
                <option value="4" selected>Massagem Infantil</option>
                <option value="5" selected>Massagem Reflexologia Podal</option>
                <option value="6" selected>Massagem Yoga-Tai</option>
                <option value="7" selected>Massagem Drenagem Linfática Manual</option>
                <option value="8" selected>Massagem Desportiva</option>
                <option value="9" selected>Massagem Abhyanga</option>
                <option value="10" selected>Massoterapia aplicada em SPA</option>
                <option value="11" selected>Massagem Terapêutica</option>
            </select>
            <br>
            <label for="dataHoraAgendamento">Data e Hora</label>
            <input type="datetime-local" name="dataHoraAgendamento" id="dataHoraAgendamento">
            <br>
            <input type="submit" value="Agendar">
        </form>
        <div id="botao">
        <a href="../agenda/agenda.php">Voltar</a>
        </div>
    </div>

    <script>
$(document).ready(function() {
    $("#agendaForm").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(response) {
                // Verifica se a resposta contém a palavra "sucesso"
                if (response.includes("sucesso")) {
                    alert("Agendamento realizado com sucesso!");
                    window.location.href = "../agenda/agendamentos.php";
                } else {
                    // Exibe apenas a mensagem de erro, sem o código fonte
                    alert("Erro ao agendar. Tente novamente.");
                }
            },
            error: function() {
                alert("Erro ao processar a solicitação. Tente novamente mais tarde.");
            }
        });
    });
});


    </script>
</body>
</html>
<?php
}
?>