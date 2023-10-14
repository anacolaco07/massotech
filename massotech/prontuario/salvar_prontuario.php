<?php
require "../Config.php";

$nome_paciente = $_POST['nome_paciente'];
$sexo = $_POST['sexo'];
$idade = $_POST['idade'];
$email_paciente = $_POST['email_paciente'];
$telefone_paciente = $_POST['telefone_paciente'];
$data_nascimento = $_POST['data_nascimento'];

$profissao = $_POST['profissao'];
$setor = $_POST['setor'];
$funcao = $_POST['funcao'];
$tempo_que_exerce = $_POST['tempo_que_exerce'];
$postura_corporal = $_POST['postura_corporal'];

$ja_teve_covid = $_POST['ja_teve_covid'];
$quando_ano = $_POST['quando_ano'];
$quando_mes = $_POST['quando_mes'];
$esta_vacinado = $_POST['esta_vacinado'];
$doencas_pregressas = $_POST['doencas_pregressas'];
$doenca_atual = $_POST['doenca_atual'];
$queixas_principais = $_POST['queixas_principais'];
$processos_cirurgicos = $_POST['processos_cirurgicos'];
$medicamentos = $_POST['medicamentos'];
$realiza_atividade_fisica = $_POST['realiza_atividade_fisica'];
$qual_atividade_fisica = $_POST['qual_atividade_fisica'];
$qual_frequencia = $_POST['qual_frequencia'];
$motivo_procura = $_POST['motivo_procura'];

$sql = "insert into tb_Paciente (
             nome_paciente,
             sexo,
             idade,
             email_paciente,
             telefone_paciente,
             data_nascimento,
             profissao,
             setor,
             funcao,
             tempo_que_exerce,
             postura_corporal,
             ja_teve_covid,
            quando_ano,
            quando_mes,
            esta_vacinado,
            doencas_pregressas,
            doenca_atual,
            queixas_principais,
            processos_cirurgicos,
            medicamentos,
            realiza_atividade_fisica,
            qual_atividade_fisica,
            qual_frequencia,
            motivo_procura)
        values (:nome_paciente,
            :sexo,
            :idade,
            :email_paciente,
            :telefone_paciente,
            :data_nascimento,
            :profissao,
            :setor,
            :funcao,
            :tempo_que_exerce,
            :postura_corporal,
            :ja_teve_covid,
            :quando_ano,
            :quando_mes,
            :esta_vacinado,
            :doencas_pregressas,
            :doenca_atual,
            :queixas_principais,
            :processos_cirurgicos,
            :medicamentos,
            :realiza_atividade_fisica,
            :qual_atividade_fisica,
            :qual_frequencia,
            :motivo_procura)";

$stm = $pdo->prepare($sql);
// anti sql injection
$stm->execute([
    ':nome_paciente' => $nome_paciente,
    ':sexo' => $sexo,
    ':idade' => $idade,
    ':email_paciente' => $email_paciente,
    ':telefone_paciente' => $telefone_paciente,
    ':data_nascimento' => $data_nascimento,
    ':profissao' => $profissao,
    ':setor' => $setor,
    ':funcao' => $funcao,
    ':tempo_que_exerce' => $tempo_que_exerce,
    ':postura_corporal' => $postura_corporal,
    ':ja_teve_covid' => $ja_teve_covid,
    ':quando_ano' => $quando_ano,
    ':quando_mes' => $quando_mes,
    ':esta_vacinado' => $esta_vacinado,
    ':doencas_pregressas' => $doencas_pregressas,
    ':doenca_atual' => $doenca_atual,
    ':queixas_principais' => $queixas_principais,
    ':processos_cirurgicos' => $processos_cirurgicos,
    ':medicamentos' => $medicamentos,
    ':realiza_atividade_fisica' => $realiza_atividade_fisica,
    ':qual_atividade_fisica' => $qual_atividade_fisica,
    ':qual_frequencia' => $qual_frequencia,
    ':motivo_procura' => $motivo_procura
]);

if ($stm->execute()) {

    header("Location: ../paciente/show_paciente.php?id_paciente=" . $pdo->lastInsertId());
    exit();
}
;

?>
