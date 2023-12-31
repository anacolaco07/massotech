<?php
session_start();
if(!isset($_SESSION["id_usuario"])){
  header("Location: ../login/login.php");
} else{
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="prontuario.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prontuário</title>
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
          <a href="../login/logout.php">
            <i class="fas fa-sign-out-alt"></i> Sair
          </a>
        </div>

        <div id="conteudo">
          <h1>Prática Supervisionada em Massoterapia</h1>
          <h1>Ficha de Anamnese / Prontuário de atendimento</h1>

          <form action="../prontuario/salvar_prontuario.php" method="post">
            <h2>Identificação Pessoal</h2>
            <label>Nome</label>
            <input type="text" name="nome_paciente" value=""/>
            
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo">
              <option value="feminino">Feminino</option>
              <option value="masculino">Masculino</option>
              <option value="outro">Outro</option>
            </select>
            
            <label>Data de nascimento</label>
            <input type="date" name="data_nascimento" value=""/>

            <label>Email</label>
            <input type="text" name="email_paciente" value=""/>

            <label>Telefone</label>
            <input type="text" name="telefone_paciente" value=""/>
            
            <h2>Identificação Profissional</h2>
            <label>Profissão</label>
            <input type="text" name="profissao" value=""/>

            <label>Setor/Área de trabalho</label>
            <input type="text" name="setor" value=""/>

            <label>Função</label>
            <input type="text" name="funcao" value=""/>

            <label>Há quanto tempo exerce</label>
            <input type="text" name="tempo_que_exerce" value=""/>

            <label for="postura_corporal">Postura corporal adotada no trabalho</label>
            <select name="postura_corporal" id="postura_corporal">
              <option value="sentada">Sentada</option>
              <option value="em pé">Em pé</option>
              <option value="mista">Mista</option>
            </select>

            <h2>Histórico de Saúde</h2>
            
            <label for="ja_teve_covid">Já teve COVID-19?</label>
            <select name="ja_teve_covid" id="ja_teve_covid">
              <option value="sim">Sim</option>
              <option value="não">Não</option>
            </select>
            
            <label>Se sim, quando?(ano e mês)</label>
            <input type="number" name="quando_ano" value=""/>
            <label for="quando_mes"></label>
            <select name="quando_mes" id="quando_mes">
              <option value="janeiro">Janeiro</option>
              <option value="fevereiro">Fevereiro</option>
              <option value="março">Março</option>
              <option value="abril">Abril</option>
              <option value="maio">Maio</option>
              <option value="junho">Junho</option>
              <option value="julho">Julho</option>
              <option value="agosto">Agosto</option>
              <option value="setembro">Setembro</option>
              <option value="outubro">Outubro</option>
              <option value="novembro">Novembro</option>
              <option value="dezembro">Dezembro</option>
            </select>

            <label for="esta_vacinado">Está vacinado?</label>
            <select name="esta_vacinado" id="esta_vacinado">
              <option value="sim">Sim</option>
              <option value="não">Não</option>
            </select>

            <label>Doenças pregressas</label>
            <input type="text" name="doencas_pregressas" value=""/>

            <label>Doença atual</label>
            <input type="text" name="doenca_atual" value=""/>

            <label>Queixas principais</label>
            <input type="text" name="queixas_principais" value=""/>

            <label>Processos cirúrgicos</label>
            <input type="text" name="processos_cirurgicos" value=""/>

            <label>Medicamentos</label>
            <input type="text" name="medicamentos" value=""/>

            <label for="realiza_atividade_fisica">Realiza alguma atividade física ou tratamento de reabilitação?</label>
            <select name="realiza_atividade_fisica" id="realiza_atividade_fisica">
              <option value="sim">Sim</option>
              <option value="não">Não</option>
            </select>

            <label>Se sim, qual(is)?</label>
            <input type="text" name="qual_atividade_fisica" value=""/>

            <label>Qual a frequência?</label>
            <input type="text" name="qual_frequencia" value=""/>
            
            <label>Motivo da procura pela massoterapia</label>
            <input type="text" name="motivo_procura" value=""/>

            <div id="botao">
            <input type="submit" name="salvar" value="Salvar"/>
            <a href='../main_page/index.php'>Voltar</a>
            </div>
          </form>
        </div>
    <!--<?php include 'menu.php'; ?>-->
    </body>
</html>
<?php
}
?>