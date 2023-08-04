<?php

require_once "../config.php";

$id = $_POST["id"];
$nome = $_POST['nome'];
$email = $_POST['email'];
$dataNascimento = $_POST['dtnascimento'];
$senha = $_POST['senha'];

$sqlUpdate = "update tb_usuario
		set nome = :nome,
		email = :email,
		data_nascimento = :dataNascimento,
		senha = :senha
		where id = :id";

$statement = $pdo->prepare($sqlUpdate);

$statement->execute([
		':nome' => $nome,
		':email' => $email,
		':dataNascimento' => $dataNascimento,
		':senha' => $senha,
		':id' => $id
	]);


?>