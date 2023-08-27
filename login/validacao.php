<?php
include "../Config.php";

$email = $_POST["email"];
// criptografa a senha do input pra comparar com a criptografia do banco
$senha = md5($_POST["senha"]);

// faz o select
$select = $pdo->prepare("SELECT senha FROM tb_usuario WHERE email = ?");
// anti sql injection
$select->bindParam(1, $email);
$select->execute();

// SE HOUVER PELO MENOS UM REGISTRO( registros MAIOR QUE(>) 0 )
if ($select->rowCount() > 0) {
    $row = $select->fetch(PDO::FETCH_ASSOC);
    // atribui o valor da coluna ("senha") do select no banco a variavel senha_hash pra comparar
    $senha_hash = $row["senha"];

    if ($senha === $senha_hash) {
        // se a senha inserida for a mesma que a do login, vá para o index
        header("Location: ../main_page/index.php");
        exit();
        
    }else if( empty($email) || empty($senha)){
        echo"Por favor, preencha os campos.";
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
