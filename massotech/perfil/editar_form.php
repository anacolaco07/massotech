<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
} else {
    require_once "../Config.php";

    $id_usuario = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM tb_usuario WHERE id = :id";

    $stm = $pdo->prepare($sql);
    $stm->execute([':id' => $id_usuario]);

    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edição de cadastro</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="editar.css">
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
    <h2>Edição de cadastro</h2>
    <form action="../perfil/atualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>" />

        <div class="form-group">
            <label for="nome">Novo Nome</label>
            <input type="text" value="<?php echo $usuario['nome']; ?>" name="nome" maxlength="40" />
        </div>

        <div class="form-group">
            <label for="email">Novo Email</label>
            <input type="email" value="<?php echo $usuario['email']; ?>" name="email" maxlength="42" />
        </div>

        <div class="form-group">
            <label for="telefone">Novo Telefone</label>
            <input type="text" value="<?php echo $usuario['telefone']; ?>" name="telefone" maxlength="30">
        </div>

        <div class="form-group">
            <label for="senha">Nova Senha</label>
            <input type="password" name="senha" maxlength="15">
        </div>

        <div class="form-group">
            <label for="confSenha">Confirmar Nova Senha</label>
            <input type="password" name="confSenha">
        </div>

        <div id="botao">
            <input type="submit" name="salvar" value="SALVAR" />
            <a href='../main_page/index.php'>VOLTAR</a>
        </div>
    </form>
</div>

</body>
</html>

<?php
}
?>
