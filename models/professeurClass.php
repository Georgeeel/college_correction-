<?php
require_once("conf.php");

require_once("personneClass.php");

class Professeur extends Personne{
    public string $email;

    function afficherInfos()
    {
        parent::afficherInfos();
        echo "<td>" . $this->email. "</td>";
        echo "</tr>";
    }

   //création d'une methode static, qui concerne le concept d'eleve en général, afin de récupérer la liste des prof

    static function readAll():array{
    //permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
    global $pdo;

    $sql = "SELECT nom, prenom, email FROM professeurs";
    //preparation de la requête
    $statements = $pdo->prepare($sql);
    //execution de la requete 
    $statements->execute();

    $professeurs = $statements->fetchAll(PDO::FETCH_CLASS,"Professeur");
    return $professeurs;
    }

    //Méthode permettant de charger les informations d'un professeur en function de id
    static function readOne(int $id):Professeur{
        global $pdo;
        // utilisation d'un paramètre nommé :id afin de ce protéger des injection SQL
        $sql = "SELECT nom, prenom, email FROM professeurs WHERE id_professeur = :id";

        //preparation de la requête
        $statements = $pdo->prepare($sql);
        //lien entre le paramètre nomée :id et la variable $id qui sont de type int
        $statements->bindParam(":id",$id,PDO::PARAM_INT );
        //execution de la requete 
        $statements->execute();
        $statements->setFetchMode(PDO::FETCH_CLASS,"Professeur");
        // récupération du résultat de la requête sous forme d'un objet Professeur 
        $professeur = $statements->fetch();

        return $professeur ;
    }

}
?>