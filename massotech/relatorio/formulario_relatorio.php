<?php

require_once "../Config.php";

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projeto_login", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM tb_procedimento");

    $procedimentos = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT * FROM tb_regioes");

    $regioes = $stmt->execute();

} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Relatório</title>
</head>
<body>
<h1>Selecione os campos para gerar o relatório</h1>
<form action="gerar_relatorio.php" method="POST">
    <label for="procedimento">Procedimento</label>
        <select name="procedimento">
            <option>Selecione</option>
            <?php foreach($procedimentos as $procedimento){?>
            <option value="<?php echo($procedimento['id_procedimento']) ?>"><?php echo($procedimento['nome_procedimento'])?></option>
            <?php } ?>
        </select>
    <br>
    <label for="sexo">
        Sexo:
    </label>
    <select name="sexo">
        <option>Selecione</option>
        <option value="feminino">Feminino</option>
        <option value="masculino">Masculino</option>
        <option value="outro">Outro</option>
    </select>
    <br />
    <label for="dataNascimentoMin">Data de Nascimento Minima</label>
    <input type="date" name="dataNascimentoMin" id="dataNascimentoMin">
    <br>

    <label for="dataNascimentoMax">Data de Nascimento Maxima</label>
    <input type="date" name="dataNascimentoMax" id="dataNascimentoMax">
    <br>

    <input type="submit" value="Gerar Relatório">
</form>
<a href='../main_page/index.php'>Voltar</a>
</body>
</html>
