<?php
session_start();
if(!isset($_SESSION["id_usuario"])){
    header("Location: ../login/login.php");
} else{
?>    

<?php
require_once "../Config.php";

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projeto_login", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO tb_Paciente (
            nome_paciente, sexo, email_paciente, telefone_paciente, data_nascimento, profissao, setor, funcao, tempo_que_exerce, postura_corporal, ja_teve_covid, quando_ano, quando_mes, esta_vacinado, doencas_pregressas, doenca_atual, queixas_principais, processos_cirurgicos, medicamentos, realiza_atividade_fisica, qual_atividade_fisica, qual_frequencia, motivo_procura
        ) VALUES (
            :nome_paciente, :sexo, :email_paciente, :telefone_paciente, :data_nascimento, :profissao, :setor, :funcao, :tempo_que_exerce, :postura_corporal, :ja_teve_covid, :quando_ano, :quando_mes, :esta_vacinado, :doencas_pregressas, :doenca_atual, :queixas_principais, :processos_cirurgicos, :medicamentos, :realiza_atividade_fisica, :qual_atividade_fisica, :qual_frequencia, :motivo_procura
        )";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':nome_paciente' => $_POST['nome_paciente'],
        ':sexo' => $_POST['sexo'],
        ':email_paciente' => $_POST['email_paciente'],
        ':telefone_paciente' => $_POST['telefone_paciente'],
        ':data_nascimento' => $_POST['data_nascimento'],
        ':profissao' => $_POST['profissao'],
        ':setor' => $_POST['setor'],
        ':funcao' => $_POST['funcao'],
        ':tempo_que_exerce' => $_POST['tempo_que_exerce'],
        ':postura_corporal' => $_POST['postura_corporal'],
        ':ja_teve_covid' => $_POST['ja_teve_covid'],
        ':quando_ano' => $_POST['quando_ano'],
        ':quando_mes' => $_POST['quando_mes'],
        ':esta_vacinado' => $_POST['esta_vacinado'],
        ':doencas_pregressas' => $_POST['doencas_pregressas'],
        ':doenca_atual' => $_POST['doenca_atual'],
        ':queixas_principais' => $_POST['queixas_principais'],
        ':processos_cirurgicos' => $_POST['processos_cirurgicos'],
        ':medicamentos' => $_POST['medicamentos'],
        ':realiza_atividade_fisica' => $_POST['realiza_atividade_fisica'],
        ':qual_atividade_fisica' => $_POST['qual_atividade_fisica'],
        ':qual_frequencia' => $_POST['qual_frequencia'],
        ':motivo_procura' => $_POST['motivo_procura']
    ]);
    
    header("Location: ../paciente/show_paciente.php?id_paciente=" . $pdo->lastInsertId());
    exit();
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
<?php
}
?>