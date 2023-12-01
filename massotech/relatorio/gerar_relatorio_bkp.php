<?php
require_once "../Config.php";

// This function calculates age from a birthdate
function calcularIdade($data_nascimento) {
    $data_nascimento = new DateTime($data_nascimento);
    $data_atual = new DateTime();
    $diferenca = $data_atual->diff($data_nascimento);
    return $diferenca->y;
}

// Handle a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['campos']) && !empty($_POST['campos'])) {
        $campos_selecionados = $_POST['campos'];
        
        
        
        
        // Remove specific values and add columns conditionally
        $campos_selecionados = array_diff($campos_selecionados, [ 'masculino', 'feminino','dataNascimentoMin', 'dataNascimentoMax']);
        
        // Add 'sexo' if 'masculino' or 'feminino' is selected
        if (in_array('masculino', $_POST['campos']) || in_array('feminino', $_POST['campos'])) {
            $campos_selecionados[] = 'sexo';
        }
        
        // Add 'data_hora_agendamento' if it is selected
        if (in_array('data_hora_agendamento', $_POST['campos'])) {
            $campos_selecionados[] = 'data_hora_agendamento';
        }
        
        if (in_array('dataNascimentoMin', $_POST['campos'])) {
            $campos_selecionados[] = 'dataNascimentoMin';
        }
        
        if (in_array('dataNascimentoMax', $_POST['campos'])) {
            $campos_selecionados[] = 'dataNascimentoMax';
        }

        
        // Ensure 'data_nascimento' is included if 'idade' is required
       // if (in_array('dataNascimentoMin', $_POST['campos']) && !in_array('dataNascimentoMin', $campos_selecionados)) {
           // $campos_selecionados[] = 'dataNascimentoMin';
     //   }
        
      //  if (in_array('dataNascimentoMax', $_POST['campos']) && !in_array('dataNascimentoMax', $campos_selecionados)) {
           // $campos_selecionados[] = 'dataNascimentoMax';
        //}

      //  echo $_POST['dataNascimentoMax'];
        // Build the field list for the SQL query
        $campos_para_selecionar = implode(", ", $campos_selecionados);
        
        
        
        
        
        // Prepare the SQL query
        $sql = "SELECT $campos_para_selecionar FROM tb_paciente
                LEFT JOIN tb_agendamento ON tb_paciente.id_paciente = tb_agendamento.id_paciente
                WHERE ";
        
//        $sql = "SELECT $campos_para_selecionar FROM tb_Paciente
//                WHERE data_nascimento BETWEEN $campos_selecionados['dataNascimentoMin'] AND $campos_selecionados['dataNascimentoMax']";
        
        // Add WHERE conditions if necessary
        $whereConditions = [];
        if (in_array('masculino', $_POST['campos'])) {
            $whereConditions[] = "sexo = 'masculino'";
        }
        if (in_array('feminino', $_POST['campos'])) {
            $whereConditions[] = "sexo = 'feminino'";
        }
        if (!empty($whereConditions)) {
            $sql .= " WHERE " . implode(' OR ', $whereConditions);
        }
        
        // Execute the query
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        // Fetch and display the results
        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                foreach ($_POST['campos'] as $campo) {
                    if ($campo === 'idade' && isset($row['data_nascimento'])) {
                        $idade = calcularIdade($row['data_nascimento']);
                        echo "Idade: " . $idade . "<br>";
                    } else if (isset($row[$campo]) && $campo !== 'data_nascimento') {
                        $valor = $row[$campo];
                        echo ucfirst($campo) . ": " . $valor . "<br>";
                    }
                }
                echo "---------------------------------<br>";
            }
            echo "<a href='../relatorio/formulario_relatorio.php'>Voltar</a>";
        } else {
            echo "Erro ao executar a consulta.";
        }
    } else {
        echo "Nenhum campo foi selecionado.";
    }
}
?>
