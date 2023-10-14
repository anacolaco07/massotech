<?php
include "../Config.php";

$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$select = $pdo->prepare("SELECT senha FROM tb_usuario WHERE email = ?");
$select->bindParam(1, $email);
$select->execute();

if ($select->rowCount() > 0) {
    $row = $select->fetch(PDO::FETCH_ASSOC);
    $senha_hash = $row["senha"];
    
    if ($senha === $senha_hash) {
        // Consulta SQL para recuperar o ID do usuário com base no email
        $sql = "SELECT id FROM tb_usuario WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_id = $user_data['id'];
            
            // Iniciar a sessão
            session_start();
            
            // Armazenar o ID do usuário na sessão
            $_SESSION['user_id'] = $user_id;
            
            header("Location: ../main_page/index.php");
            exit;
        } else {
            echo "Erro ao autenticar o usuário. Tente novamente.";
        }
    } else {
        // Senha incorreta
        echo "Senha incorreta. Tente novamente.";
    }
} else {
    // Usuário não encontrado
    echo "Usuário não encontrado.";
}

?>
