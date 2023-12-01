<?php
session_start();
if(!isset($_SESSION["id_usuario"])){
    header("Location: ../login/login.php");
}else{
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Página Principal</title>
        <link rel="stylesheet" type="text/css" href="menu.css">
    </head>
    <body>
        <div class="botoes-cima">
            <button id="button1">Agenda</button>
            <button id="button2">Prontuário</button>
            <button id="button3">Relatório</button>
        </div>
        <div class="botoes-baixo">
            <button id="button4">Paciente</button>
            <button id="button5">Perfil</button>
            <button id="button6">SAIR</button>
        </div>
        <script src="script.js"></script>
    </body>
    </html>
<?php

}
?>

