<?php
//inclusion de la clase Eleve
require_once("models/eleveClass.php");


//appele de la méthode statique readAll() de notre classe Eleve, qui nous permet 
$eleves = Eleve::readAll();

//écriture de la requete SQL dans une chaine de charactères

// echo "<pre>";
// var_dump($eleves);
// echo "</pre>";
?>

<?php include("assets/inc/head.php");?>

<title>Site PDO</title>

<?php include("assets/inc/header.php");?>

<main>
<h3 class="text text-center">Liste des élèves</h3>
    <div class="container">
        <div class="row col-6">
            <table class="table table-striped table-bordered">
                <tr class="table table-dark">
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Date de naissance</th>
                </tr>
            
    <?php
    foreach($eleves as $eleve){
         $eleve->afficherInfos();
    }
    ?>
    </table>
    </div>
    </div>
</main>

<?php include("assets/inc/footer.php")?>