<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="paciente.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #menu-lateral {
            background-color: #3A7D7D;
            height: 100%;
            width: 365px;
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
            padding: 10px;
            margin-left: 365px;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .styled-table {
            width: 100%;
            border-radius: 20px;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
            text-align: left;

            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table th,
        .styled-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border: 1px solid #000;
            
        }

        .styled-table th {
            background-color: #3A7D7D;
            color: white;
            
        }

        .styled-table td a {
            color: #3A7D7D;
            text-decoration: none;
        }

        .styled-table td a:hover {
            color: #4d9e9e;
        }

        #botao a {
            display: inline-block;
            width: 100%;
            padding: 15px;
            background: #3A7D7D;
            color: #000;
            margin-bottom: 15px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            outline: none;
            text-align: center;
        }

        #botao a:hover {
            background: #4d9e9e;
        }

        #conteudo h1 {
            text-align: center;
            background-color: #3A7D7D;
            color: black;
            font-size: 24px;
            border-radius: 10px;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        #botao-remover {
            margin-top: 20px;
        }
        
    </style>
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
        <a href="../main_page/index.php">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
    </div>

    <div id="conteudo">
        <h1>Pacientes</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Profissão</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once "../Config.php";

            $sql = "select * from tb_Paciente";

            $stm = $pdo->query($sql);

            function calcularIdade($data_nascimento)
            {
                $data_nascimento = new DateTime($data_nascimento);
                $data_atual = new DateTime();
                $diferenca = $data_atual->diff($data_nascimento);
                return $diferenca->y;
            }

            $pacientes = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($pacientes as $paciente) {
                echo "<tr>";
                echo "<td>{$paciente['id_paciente']}</td>";
                echo "<td>{$paciente['nome_paciente']}</td>";
                $idade = calcularIdade($paciente['data_nascimento']);
                echo "<td>{$idade}</td>";
                echo "<td>{$paciente['profissao']}</td>";
                echo "<td>{$paciente['telefone_paciente']}</td>";
                echo "<td>{$paciente['email_paciente']}</td>";
                echo "<td><a href='../paciente/show_paciente.php?id_paciente={$paciente['id_paciente']}' class='styled-button'>Ver</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <div id="botao">
        <a href="../main_page/index.php">Voltar</a>
        </div>
    </div>

</html>
<?php
}
?>
