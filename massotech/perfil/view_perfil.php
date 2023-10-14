<?php
session_start();

require_once "../Config.php";

$id = $_SESSION['id'];
$query = "SELECT * FROM tb_usuario WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {

    echo "<h1>Seu Perfil</h1>";
    echo "<p>Nome: " . $usuario['nome'] . "</p>";
    echo "<p>E-mail: " . $usuario['email'] . "</p>";
    echo "<p>Telefone: " . $user['telefone'] . "</p>";
 
} else {
  
    echo "Usuário não encontrado.";
}
?>

