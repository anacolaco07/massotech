<?php

$server = "localhost";
$database = "projeto_login";
$user = "root";
$pass = "root";
$pdo = null;


$con = "mysql:host=$server;dbname=$database;charset=UTF8";

// PDO
try{
	$pdo = new PDO($con, $user, $pass);
}
catch (PDOException $e)
{
	$e->getMessage();
}

?>