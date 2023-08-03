<?php

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}

// Tenta se conectar ao servidor MySQL
mysql_connect('localhost', 'root', 'root') or trigger_error(mysql_error());
// Tenta se conectar a um banco de dados MySQL
mysql_select_db('usuarios') or trigger_error(mysql_error());

$email = mysql_real_escape_string($_POST['email']);
$senha = mysql_real_escape_string($_POST['senha']);

// Validação do usuário/senha digitados
$sql = "SELECT `id`, `nome` FROM `usuarios` WHERE (`email` = '".$email ."') AND (`senha` = '". ms5($senha) ."') AND (`ativo` = 1) LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "Login inválido!"; exit;
} else {
    // Salva os dados encontados na variável $resultado
    $resultado = mysql_fetch_assoc($query);
}

?>