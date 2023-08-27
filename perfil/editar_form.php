<?php

require_once "../Config.php";

$id = $_GET["id"];

$sql = "select * from tb_usuario where id = :idUsuario";

$stm = $pdo->prepare($sql);

$stm->execute([':idUsuario' => $id]);

$usuario = $stm->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edição de cadastro</title>
<link rel="stylesheet" href="estilo.css">

</head>
<body>
<div id=corpo-form>
<h2>Edição de cadastro</h2>
<form action="../perfil/atualizar.php" method="post">

<input type="text" value="" name="nome" placeholder="Nome Completo" maxlength="40" />
<br />
<input type="email" value="" name="email" placeholder="Email" maxlength="42" />
<br />
<input type="text" value="" name="telefone" placeholder="Telefone" maxlength="30">
<br />
<input type="password" name="senha" placeholder="Senha" maxlength="15">
<br />
<input type="password" name="confSenha" placeholder="Confirmar Senha">
<br />
<input type="submit" name="salvar" value="SALVAR" />
</form>
</div>
</body>
</html>
<?php
/*
 *
 * gente oq isso faz.......
 * $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 
 if (empty($dados['id'])) {
 $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o id!</div>"];
 } elseif (empty($dados['nome'])) {
 $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o nome!</div>"];
 }elseif (empty($dados['email'])) {
 $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o e-mail!</div>"];
 }elseif (empty($dados['telefone'])) {
 $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o telefone!</div>"];
 }else {
 $query_usuario = "UPDATE tb_usuario SET nome=:nome, email=:email , telefone=:telefone WHERE id=:id";
 $edit_usuario = $conn->prepare($query_usuario);
 $edit_usuario->bindParam(':nome', $dados['nome']);
 $edit_usuario->bindParam(':email', $dados['email']);
 $edit_usuario->bindParam(':telefone', $dados['telefone']);
 $edit_usuario->bindParam(':id', $dados['id']);
 
 if($edit_usuario->execute()){
 $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
 }else{
 $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o e-mail!</div>"];
 }
 }
 
 echo json_encode($retorna);*/
?>
