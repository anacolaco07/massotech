<?php
require_once '../Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha os campos.";
    } else {
        $select = $pdo->prepare("SELECT id, senha FROM tb_usuario WHERE email = ?");
        $select->bindParam(1, $email);
        $select->execute();
        
        if ($select->rowCount() > 0) {
            $row = $select->fetch(PDO::FETCH_ASSOC);
            $senha_hash = $row["senha"];
            
            if ($senha === $senha_hash) {
                session_start();
                $_SESSION["id_usuario"] = $row['id'];
                echo "Sucesso";
                exit();
            } else {
                echo "Credenciais inválidas.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }
}
?>
