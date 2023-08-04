<?php
class Config {
    private $pdo;
    
    public function __construct() {
        $server = "localhost";
        $database = "projeto_login";
        $user = "root";
        $pass = "";
        
        $con = "mysql:host=$server;dbname=$database;charset=UTF8";
        
        try {
            $this->pdo = new PDO($con, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
            exit;
        }
    }
    
    public function getPDO() {
        return $this->pdo;
    }
}

$database = new Config();
$pdo = $database->getPDO();
?>