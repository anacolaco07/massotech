<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Seu Perfil</title>
</head>

<style>
    body, html {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    background-color: #51B6B6;
}

#menu-lateral {
    background-color: #3A7D7D;
    height: 100%;
    width: 200px;
    position: fixed;
    top: 0;
    left: 0;
    padding: 20px;
}

#menu-lateral a {
    text-decoration: none;
    color: black;
    display: block;
    margin-bottom: 10px;
}

#conteudo {
    background-color: #51B6B6;
    padding: 20px;
    margin-left: 230px;
    height: 100%;
    box-sizing: border-box;
}

#button a {
    display: inline-block;
    width: 200px;
    padding: 15px;
    background: rgb(58, 125, 125);
    color: #000;
    margin-bottom: 15px;
    border: 0;
    border-radius: 10px;
    cursor: pointer;
    text-decoration: none;
    outline: none;
    text-align: center;
}

#button a:hover {
    background: #4d9e9e;
}

</style>

<body>


<div id="menu-lateral">
    <a href="../main_page/index.php">
            <i class="fas fa-home"></i> Início
        </a>
        <a href="../prontuario/prontuario_form.php">
            <i class="fas fa-book-medical"></i> Prontuário
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
    <?php
    require_once "../Config.php";

    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=projeto_login", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM tb_usuario WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id_usuario);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                echo "<h1>Seu Perfil</h1>";
                echo "<p>Nome: " . $usuario['nome'] . "</p>";
                echo "<p>E-mail: " . $usuario['email'] . "</p>";
                echo "<p>Telefone: " . $usuario['telefone'] . "</p>";

                echo "<div id='button'><a href='../perfil/editar_form.php'>Editar</a></div>";
                echo "</br>";
                echo "<div id='button'><a href='../main_page/index.php'>Voltar</a></div>";
            } else {
                echo "Usuário não encontrado.";
            }
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
    } else {
        echo "Sessão 'id_usuario' não está definida. Você deve estar autenticado para visualizar esta página.";
    }
    ?>
</div>

</body>
</html>

<?php
}
?>
