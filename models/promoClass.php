<?php
require_once("conf.php");
require_once("professeurClass.php");

class Promo {
    public int $id_classes;
    public string $nom;
    public int $niveau;
    public int $id_professeur;
    

    public Professeur $prof_principal;


    static function readAll():array{
        //permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
        global $pdo;
        
        $sql = "SELECT id_classes, nom, niveau,id_professeur FROM classes";
        //preparation de la requête
        $statements = $pdo->prepare($sql);
        //execution de la requete 
        $statements->execute();
        
        $liste = $statements->fetchAll(PDO::FETCH_CLASS,"Promo");

        //TODO 
        foreach($liste as $promo){
            //chargeons les information du professeur principal sélectionné grâce la propriété  id_professeur
            //de mon objet Promo
            $prof_principal = Professeur::readOne($promo->id_professeur);
            // enregistrons les informations du professeur principal dans la propriété prof_principal
            $promo->prof_principal = $prof_principal;
        }

        return $liste;
        }
        function afficherInfos(){
            echo "<tr>";
            echo "<td>" .$this->nom."</td>";
            echo "<td>" .$this->niveau."</td>";
            echo "<td>" .$this->id_professeur."</td>";
            echo "<tr>";
        }
    
}