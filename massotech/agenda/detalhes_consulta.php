<?php
session_start();
if(!isset($_SESSION["id_usuario"])){
    header("Location: ../login/login.php");
} else{

?>
<?php
require "../Config.php";

function calcularIdade($data_nascimento) {
    $data_nascimento = new DateTime($data_nascimento);
    $data_atual = new DateTime();
    $diferenca = $data_atual->diff($data_nascimento);
    return $diferenca->y;
}

if (isset($_GET['id'])) {
    $idConsulta = $_GET['id'];

    try {
        $sql = "SELECT tb_Agendamento.id_agendamento, tb_Paciente.nome_paciente, tb_Agendamento.data_hora_agendamento, tb_Agendamento.id_procedimento,
                tb_Paciente.id_paciente, tb_Paciente.sexo, tb_Paciente.data_nascimento, tb_Paciente.email_paciente, tb_Paciente.telefone_paciente,
                tb_Paciente.profissao, tb_Paciente.setor, tb_Paciente.funcao, tb_Paciente.tempo_que_exerce, tb_Paciente.postura_corporal,
                tb_Paciente.ja_teve_covid, tb_Paciente.quando_ano, tb_Paciente.quando_mes, tb_Paciente.esta_vacinado, tb_Paciente.doencas_pregressas,
                tb_Paciente.doenca_atual, tb_Paciente.queixas_principais, tb_Paciente.processos_cirurgicos, tb_Paciente.medicamentos,
                tb_Paciente.realiza_atividade_fisica, tb_Paciente.qual_atividade_fisica, tb_Paciente.qual_frequencia, tb_Paciente.motivo_procura
                FROM tb_Agendamento
                INNER JOIN tb_Paciente ON tb_Agendamento.id_paciente = tb_Paciente.id_paciente
                WHERE tb_Agendamento.id_agendamento = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idConsulta, PDO::PARAM_INT);
        $stmt->execute();

        $consulta = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlProcedimento = "SELECT tb_procedimento.nome_procedimento 
                   FROM tb_procedimento 
                   WHERE id_procedimento = :id_procedimento";

        $stmtProcedimento = $pdo->prepare($sqlProcedimento);
        $stmtProcedimento->bindParam(':id_procedimento', $consulta['id_procedimento'], PDO::PARAM_INT);
        $stmtProcedimento->execute();

        $resultadoProcedimento = $stmtProcedimento->fetch(PDO::FETCH_ASSOC);

        $nomeProcedimento = $resultadoProcedimento['nome_procedimento'];

        if (!$consulta) {
            echo "Consulta não encontrada.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
        exit();
    }
} else {
    echo "ID da consulta não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Detalhes da Consulta</title>
    <link rel="stylesheet" href="detalhes.css">
</head>
<body>

    <div id="menu-lateral">
    <a href="../main_page/index.php">
        <i class="fas fa-home"></i> Início
    </a>
    <a href="../agenda/agenda.php">
        <i class="fas fa-calendar"></i> Agenda
    </a>
    <a href="../paciente/paciente.php">
        <i class="fas fa-users"></i> Pacientes
    </a>
    <a href="../perfil/view_perfil.php">
        <i class="fas fa-user"></i> Perfil
    </a>
    <a href="../main_page/index.php">
        <i class="fas fa-sign-out-alt"></i> Sair
    </a>
    </div>

    <div id="conteudo">
        <h2>Detalhes da Consulta</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Infos do paciente</th>
                    <th>Nome do Paciente</th>
                    <th>Data e Hora do Agendamento</th>
                    <th>Procedimento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                        <strong>ID:</strong> <?php echo htmlspecialchars($consulta['id_paciente']); ?><br>                       
                        <strong>Sexo:</strong> <?php echo htmlspecialchars($consulta['sexo']); ?><br>
                        <strong>Idade:</strong> <?php echo calcularIdade($consulta['data_nascimento']); ?><br>
                        <strong>Email:</strong> <?php echo htmlspecialchars($consulta['email_paciente']); ?><br>
                        <strong>Telefone:</strong> <?php echo htmlspecialchars($consulta['telefone_paciente']); ?><br>
                    </td>
                    <td><?php echo htmlspecialchars($consulta['nome_paciente']); ?></td>
                    <td><?php echo htmlspecialchars($consulta['data_hora_agendamento']); ?></td>
                    <td><?php echo htmlspecialchars($nomeProcedimento) ?></td>
                </tr>
            </tbody>
        </table>

        <br>
        <div id="botao">
        <a href='agenda.php' class="back-link">Voltar</a>
        </div>
        <div id="botao-remover">
        <button type="button" class="remover-consulta" onclick="removerConsulta()">Cancelar Consulta</button>
        </div>
    </div>


</div>


<script>
    function removerConsulta() {
        if (confirm("Deseja realmente remover esta consulta?")) {
            window.location.href = 'remover_consulta.php?id=<?php echo $consulta['id_agendamento']; ?>';
        }
    }
</script>

</body>
</html>
<?php
}
?>