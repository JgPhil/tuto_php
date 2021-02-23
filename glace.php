<?php

require 'functions/functions_glace.php';
$title = "Composez votre glace";
require 'header.php';
$commande = commande($_GET);
?>

<h1 class="text-center">Composez votre glace</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <li>Parfums:  <span class="text-right"> <?= $commande['parfums'] ?> </span></li>
                    <li>Contenant:   <span class="text-right"> <?= $commande['cornet'] ?></span></li>
                    <li>Suppléments: <span class="text-right">  <?= $commande['supplements'] ?></span></li>
                    <li><strong>Total: </strong><span class="text-right">  <?= $commande['total'] . '€' ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="/glace.php" method="GET">
            <h4>Parfums</h4>
            <?= form_glace('parfum') ?>
            <h4>Forme</h4>
            <?= form_glace('cornets') ?>
            <h4>Suppléments</h4>
            <?= form_glace('supplements') ?>
            <button class="btn btn-primary" type="submit">Choisir</button>
        </form>
    </div>
</div>



<?php require 'footer.php' ?>