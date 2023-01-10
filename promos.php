<?php
require_once("models/professeurClass.php");
require_once("models/promoClass.php");
$promos = Promo::readAll();
?>

<?php include("assets/inc/head.php");?>

<title>Site PDO</title>

<?php include("assets/inc/header.php");?>
<main>
<h3 class="text text-center">Liste des promotion</h3>
<div class="container">
    <div class="row ">
        <table class="table table-striped table-success table-bordered fw-bolder">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Id professeur</th>
            </tr>
            <?php
            foreach($promos as $promo){
                $promo->afficherInfos();
            }
            ?>
        </table>
        </div>
</div>
</main>
