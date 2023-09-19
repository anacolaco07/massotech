<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="menu.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</html>

<?php
require_once "../Config.php";

?>


<body>

        <div class='box_prontuario'>
            <form action='../prontuario/prontuario_form.php' method='post'>
            <button class='btn-prontuario'><h1>Prontuário</h1></button>
            </form>
        </div>
        <div class='box_agenda'>
            <form action='../agenda/agenda.php' method='post'>
            <button class='btn-agenda'><h1>Agenda</h1></button>
            </form>
        </div>    
        <div class='box_perfil'>
            <form action='../perfil/view_perfil.php' method='post'>
            <button class='btn-perfil'><h1>Perfil</h1></button>
            </form>
        </div>
        <div class='box_paciente'>
            <form action='../paciente/paciente.php' method='post'>
            <button class='btn-paciente'><h1>Paciente</h1></button>
            </form>
        </div>
        <div class='box_relatorio'>
            <form action='../relatorio/relatorio.php' method='post'>
            <button class='btn-relatorio'><h1>Relatorio</h1></button>
            </form>
        </div>    

           
</body>

<!--echo "<a href='../prontuario/prontuario_form.php'>Novo Prontuário</a><br/>";
echo "<a href='../agenda/agenda.php'>Agenda</a><br/>";
echo "<a href='../perfil/view_perfil.php'>Perfil</a><br/>";
echo "<a href='../paciente/paciente.php'>Pacientes</a><br/>";
echo "<a href='../relatorio/relatorio.php'>Relatório</a><br/>";
echo "<a href='../login/login.php'>Sair</a><br/>";-->