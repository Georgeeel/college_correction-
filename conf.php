<?php
//constate de connexion à la base de données
//nom base de donnée
define("DB_NAME", "college_correction");
//nom user
define("DB_USER", "root");
//password du bdd
define("DB_PASSWORD","");

define("DB_HOST","localhost");

$pdo = new PDO("mysql:dbname=". DB_NAME . ";host=" .DB_HOST, DB_USER, DB_PASSWORD);
?>