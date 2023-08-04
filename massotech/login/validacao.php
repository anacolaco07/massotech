<?php
require_once "../config.php";

$email = $_POST["email"];
$senha = md5($_POST["senha"]);

$select = $pdo->prepare("SELECT senha FROM tb_usuario WHERE email = ?");
$select->bindParam(1, $email);
$select->execute();

if ($select->rowCount() > 0) {
    $row = $select->fetch(PDO::FETCH_ASSOC);
    $senha_hash = $row["senha"];
    
    if ($senha === $senha_hash) {
        header("Location: ../main_page/index.php");
        exit;
    } else {
        echo "Senha incorreta. Tente novamente.";
        echo "<br/>";
        echo "<a href='login.php'>Voltar</a>";
    }
} else {
    echo "Usuário não encontrado.";
    echo "<br/>";
    echo "<a href='login.php'>Voltar</a>";
}
?>
