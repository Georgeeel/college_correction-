<?php
require_once("personneClass.php");

//inclusion de la connexion à la base de données
require_once("conf.php");

class Eleve extends Personne{
    public string $date_naissance;
    public static int $nombre = 0;

    function __construct(){
        //appel du constructeur de la classe personne
      
        self::$nombre++;
    }

   function afficherInfos(){
    // echo "<tr>" ;
    // echo "<td>".$this->nom."</td>";
    // echo "<td>".$this->prenom."</td>";
    parent::afficherInfos();
    echo "<td>".$this->date_naissance."</td>";
    echo "</tr>";
   }

   //création d'une methode static, qui concerne le concept d'eleve en général, afin de récupérer la liste des élèves
   static function readAll():array{
    //permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
    global $pdo;

    $sql = "SELECT nom, prenom, date_naissance FROM eleves";

    //préparation de la requête
    $statement = $pdo->prepare($sql);

    //Exécution de la requête
    $statement->execute();

    //récuperation de résultats de la requête, sous forme de tableau associatif ici 
    $eleves = $statement->fetchAll(PDO::FETCH_CLASS,"Eleve");

    return $eleves;

   }
   
}


?>