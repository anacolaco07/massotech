<?php
require '../Config.php';

// pegando dados caso nome não esteja em branco
if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confSenha'];

    // pog pra fazer basicamente a mesma coisa que o 1 if so q melhor(php momento)
    if (! empty($nome) || ! empty($telefone) || ! empty($email) || ! empty($senha)) {

        // verificando se a senha inserida é o mesmo que a senha inserida em confirme sua senha
        if ($senha == $confirmarSenha) {
            // caso seja, inserir na base de dados, o MD5 é pra criptografar a senha
            $sql = "
	       insert into tb_usuario (nome, email, telefone, senha)
	       values (:nome, :email, :telefone, md5(:senha))";

            $stm = $pdo->prepare($sql);
            // anti sql injection
            $stm->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':senha' => $senha
            ]);
            echo "Usuario cadastrado com sucesso<br/>";
            echo "<a href='../login/login.php'>LOGIN<a/>";

            // if( empty($nome) || empty($email) || empty($senha) || empty($telefone))
        }
    } else {
        echo "Por favor, preencha os campos.";
    }
}

?>

