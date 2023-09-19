<?php

include "../Config.php";

$id = $_POST["id"];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

$sql = "update tb_usuario set 
        nome = :nome,
		email = :email,
        telefone = :telefone,
		senha = :senha
		where id = :id";

$statement = $pdo->prepare($sql);

$statement->execute([
		':nome' => $nome,
		':email' => $email,
		':senha' => $senha,
        ':telefone' => $telefone,
        ':id' => $id,
	]);

echo "Usuário atualizado com sucesso!!!";
echo "<br/><a href='./view_perfil.php'>Voltar</a>";

?>