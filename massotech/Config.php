<?php
// declarado como classe pra ter alcance global
class Config {
    public $pdo;
    
    public function __construct() {
        //dados da conexão
        $server = "localhost:3306";
        $database = "projeto_login";
        $user = "root";
        $pass = "";
        //estabelecendo conexão
        $con = "mysql:host=$server;dbname=$database;charset=UTF8";
        
        try {
            // criando objeto
            $this->pdo = new PDO($con, $user, $pass);
            // setando o modo de erro pra lançar exception pra pegar no try catch
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
            exit;
        }
    }
    
    public function getPDO() {
        //retorna o objeto de conexão
        return $this->pdo;
    }
}

//cria o objeto de conexão
$database = new Config();
$pdo = $database->getPDO();
?>