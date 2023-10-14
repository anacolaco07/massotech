<?php
require_once "../Config.php";

/*
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

echo "<a href='../main_page/index.php'>Voltar</a>"*/

if (isset($_GET['id_paciente'])) {
    $id_paciente = $_GET['id_paciente'];
    
    $sql = "SELECT * FROM tb_paciente WHERE id_paciente = :id_paciente";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_paciente', $id_paciente);
    $stmt->execute();
    
    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($paciente) {
        echo "ID: " . $paciente['id_paciente'] . "<br>";
        echo "Nome: " . $paciente['nome_paciente'] . "<br>";
        echo "Sexo: " . $paciente['sexo'] . "<br>";
        echo "Idade : " . $paciente['idade'] . "<br>";
        echo "Email : " . $paciente['email_paciente'] . "<br>";
        echo "Telefone: " . $paciente['telefone_paciente'] . "<br>";
        echo "Data de nascimento: " . $paciente['data_nascimento'] . "<br>";
        echo "Profissão: " . $paciente['profissao'] . "<br>";
        echo "Setor: " . $paciente['setor'] . "<br>";
        echo "Função: " . $paciente['funcao'] . "<br>";
        echo "Tempo que exerce: " . $paciente['tempo_que_exerce'] . "<br>";
        echo "Postura corporal adotada no trabalho: " . $paciente['postura_corporal'] . "<br>";
        echo "Já teve COVID-19? " . $paciente['ja_teve_covid'] . "<br>";
        echo "Se sim, quando?(ano e mês): " . $paciente['quando_ano'] . " " . $paciente['quando_mes'] . "<br>";
        echo "Está vacinado? " . $paciente['esta_vacinado'] . "<br>";
        echo "Doenças pregressas: " . $paciente['doencas_pregressas'] . "<br>";
        echo "Doença atual: " . $paciente['doenca_atual'] . "<br>";
        echo "Queixas principais: " . $paciente['queixas_principais'] . "<br>";
        echo "Processos cirurgicos: " . $paciente['processos_cirurgicos'] . "<br>";
        echo "Medicamentos: " . $paciente['medicamentos'] . "<br>";
        echo "Realiza alguma atividade física ou tratamento de reabilitação? " . $paciente['realiza_atividade_fisica'] . "<br>";
        echo "Se sim, qual(is)? " . $paciente['qual_atividade_fisica'] . "<br>";
        echo "Qual a frenquência? " . $paciente['qual_frequencia'] . "<br>";
        echo "Motivo da procura pela massoterapia: " . $paciente['motivo_procura'] . "<br>";
        echo "</br>";
        echo "<a href='../main_page/index.php'>Voltar</a>";
        
    } else {
        echo "Paciente não encontrado.";
    }
} else {
    echo "ID do paciente não especificado.";
}
?>
