<?php
class Personne{
    public string $nom;
    public string $prenom;
    
    
    function direBonjour(){
        echo " <br>Bonjour, je m'appelle " .$this-> nom." " .$this-> prenom. " </br>";
    }

    function afficherInfos(){
        echo "<tr>" ;
        echo "<td>".$this->nom."</td>";
        echo "<td>".$this->prenom."</td>";
    }
}
?>