<?php
require_once "../Config.php";

$id_paciente = $_GET['id_paciente'];

$sql = "SELECT * FROM tb_paciente WHERE id_paciente = :id_paciente";

$stm = $pdo->prepare($sql);
$stm->bindParam(':id_paciente', $paciente, PDO::PARAM_STR);
$stm->execute();
$results = $stm->fetch(PDO::FETCH_ASSOC);

$results = $stm->fetchAll(PDO::FETCH_ASSOC);

if ($results) {
    echo "<td>{$results['id_paciente']}</td>";
    echo "<td>{$results['nome_paciente']}</td>";
    echo "<td>{$results['idade']}</td>";
    echo "<td>{$results['profissao']}</td>";
    echo "<td>{$results['telefone_paciente']}</td>";
    echo "<td>{$results['email_paciente']}</td>";
} else {
    echo "Paciente não encontrado";
    echo"</br>";
}

echo "<a href='../main_page/index.php'>Voltar</a>"
?>