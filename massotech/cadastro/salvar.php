<?php
require_once "../Config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confSenha = $_POST["confSenha"];
    
    if (empty($nome) || empty($email) || empty($telefone) || empty($senha) || empty($confSenha)) {
        echo "Erro: Por favor, preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Erro: Formato de email inválido.";
    } elseif ($senha !== $confSenha) {
        echo "Erro: A senha e a confirmação de senha não coincidem.";
    } else {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3306;dbname=projeto_login", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare("INSERT INTO tb_usuario (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, md5(:senha))");
            
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':senha', $senha);
            
            if ($stmt->execute()) {
                echo "Sucesso: Registro bem-sucedido!";
            } else {
                echo "Erro: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }
}
?>
