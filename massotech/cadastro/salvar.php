<?php

require_once "../config.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "
	insert into tb_usuario (nome, email, telefone, senha)
	values (:nome, :email, :telefone, md5(:senha))";

$stm = $pdo->prepare($sql);

$stm->execute([
    ':nome' => $nome,
    ':email' => $email,
    ':telefone' => $telefone,
    ':senha' => $senha
]);


echo "Usuario cadastrado com sucesso<br/>";
echo"<a href='../login/login.php'>LOGIN<a/>"


?>
