<?php

require_once "../config.php";

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confSenha'];
    
    if (! empty($nome) && ! empty($telefone) && ! empty($email) && ! empty($senha)) {
        if ($senha == $confirmarSenha) {
            $sql = "
	       insert into tb_usuario (nome, email, telefone, senha)
	       values (:nome, :email, :telefone, md5(:senha))";
            
            $stm = $pdo->prepare($sql);
            
            $stm->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':senha' => $senha
            ]);
        }
       
        /*if ($u->msgErro == "") {
            if ($senha == $confirmarSenha) {
                if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                    echo "Cadastrado com sucesso! Acesse para entrar!";
                } else {
                    echo "Email já cadastrado!";
                }
            } else {
                echo "Senha e confirmar senha não correspondem!";
            }
        } else {
            echo "Erro: " . $u->msgErro;
        }
    } */
    }
}
else {
    echo "Preencha todos os campos!";}

echo "Usuario cadastrado com sucesso<br/>";
echo"<a href='../login/login.php'>LOGIN<a/>"


?>
