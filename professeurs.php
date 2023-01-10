<?php

require_once("models/professeurClass.php");
$professeurs = Professeur::readAll();
?>

<?php include("assets/inc/head.php");?>

<title>Site PDO</title>

<?php include("assets/inc/header.php");?>
<main>
<h3 class="text text-center">Liste des professeurs</h3>
<div class="container">
    <div class="row ">
        <table class="table table-striped table-success table-bordered fw-bolder">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
            </tr>
            <?php
            foreach($professeurs as $professeur){
                $professeur->afficherInfos();
            }
            ?>
        </table>
        </div>
</div>
</main>
