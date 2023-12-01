<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
    exit();
}

require "../Config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_agendamento = $_GET["id"];

    try {
        $stmt = $pdo->prepare("DELETE FROM tb_agendamento WHERE id_agendamento = :id_agendamento");
        $stmt->bindParam(":id_agendamento", $id_agendamento, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: agenda.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
        exit();
    }
}
?>
