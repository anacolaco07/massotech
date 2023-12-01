<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
    exit();
}

require_once "../Config.php";

function calcularIdade($data_nascimento) {
    $data_nascimento = new DateTime($data_nascimento);
    $data_atual = new DateTime();
    $diferenca = $data_atual->diff($data_nascimento);
    return $diferenca->y;
}

if (isset($_GET['id_paciente'])) {
    $id_paciente = $_GET['id_paciente'];

    $sql = "SELECT * FROM tb_paciente WHERE id_paciente = :id_paciente";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_paciente', $id_paciente);
    $stmt->execute();

    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($paciente) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="show_paciente.css">
</head>
<body>
    <div id="conteudo">
        <h1 class="titulo-centralizado">Detalhes do Paciente</h1>
        <div class="paciente-info">
            <p><strong>ID:</strong> <?php echo $paciente['id_paciente']; ?></p>
            <p><strong>Nome:</strong> <?php echo $paciente['nome_paciente']; ?></p>
            <p><strong>Sexo:</strong> <?php echo $paciente['sexo']; ?></p>
            <p><strong>Idade:</strong> <?php echo calcularIdade($paciente['data_nascimento']); ?></p>
            <p><strong>Email:</strong> <?php echo $paciente['email_paciente']; ?></p>
            <p><strong>Telefone:</strong> <?php echo $paciente['telefone_paciente']; ?></p>
            <p><strong>Data de Nascimento:</strong> <?php echo $paciente['data_nascimento']; ?></p>
            <p><strong>Profissão:</strong> <?php echo $paciente['profissao']; ?></p>
            <p><strong>Setor:</strong> <?php echo $paciente['setor']; ?></p>
            <p><strong>Função:</strong> <?php echo $paciente['funcao']; ?></p>
            <p><strong>Tempo que exerce:</strong> <?php echo $paciente['tempo_que_exerce']; ?></p>
            <p><strong>Postura corporal adotada no trabalho:</strong> <?php echo $paciente['postura_corporal']; ?></p>
            <p><strong>Já teve COVID-19?</strong> <?php echo $paciente['ja_teve_covid']; ?></p>
            <p><strong>Se sim, quando? (ano e mês):</strong> <?php echo $paciente['quando_ano'] . " " . $paciente['quando_mes']; ?></p>
            <p><strong>Está vacinado?</strong> <?php echo $paciente['esta_vacinado']; ?></p>
            <p><strong>Doenças pregressas:</strong> <?php echo $paciente['doencas_pregressas']; ?></p>
            <p><strong>Doença atual:</strong> <?php echo $paciente['doenca_atual']; ?></p>
            <p><strong>Queixas principais:</strong> <?php echo $paciente['queixas_principais']; ?></p>
            <p><strong>Processos cirúrgicos:</strong> <?php echo $paciente['processos_cirurgicos']; ?></p>
            <p><strong>Medicamentos:</strong> <?php echo $paciente['medicamentos']; ?></p>
            <p><strong>Realiza alguma atividade física ou tratamento de reabilitação?</strong> <?php echo $paciente['realiza_atividade_fisica']; ?></p>
            <p><strong>Se sim, qual(is)?</strong> <?php echo $paciente['qual_atividade_fisica']; ?></p>
            <p><strong>Qual a frequência?</strong> <?php echo $paciente['qual_frequencia']; ?></p>
            <p><strong>Motivo da procura pela massoterapia:</strong> <?php echo $paciente['motivo_procura']; ?></p>
        </div>
        <div class="botoes">
            <a href='../main_page/index.php' class="styled-button">Voltar</a>
            <a href='../agenda/agendamentos.php' class="styled-button">Nova Sessão</a>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        echo "Paciente não encontrado.";
    }
} else {
    echo "ID do paciente não especificado.";
}
?>
