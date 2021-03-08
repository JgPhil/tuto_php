<?php

session_start();

$title = "Page de contact";
require_once 'config.php';
require 'functions/functions.php';
date_default_timezone_set('Europe/Paris');
$jour = (int)$_GET["jour"] ?? date('N') - 1;
$creneaux = CRENEAUX[$jour];
$heure = (int) $_GET["heure"] ?? date('G');
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red';
require 'header.php'; ?>

<div class="row">
    <div class="col-md-8">
    <h2>
        <?= dump($_SESSION); ?>
    </h2>
        <h2>Nous Contacter</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni inventore quidem nam esse blanditiis ullam, placeat veritatis eveniet laborum ut commodi facilis dicta! Explicabo repudiandae obcaecati voluptatum quae! Ipsa, quam?</p>
        <p>Maiores commodi praesentium obcaecati et ipsum consectetur optio est reprehenderit delectus voluptatem perspiciatis nihil excepturi, quidem a repudiandae deserunt amet at consequatur, deleniti voluptas numquam dolorum tempora non. Necessitatibus, suscipit?</p>
    </div>
    <div class="col-md-4">
        <h4>Horaires d'ouvertures</h4>
        <form class="form-group" action="" method="GET">
            <?= select('jour', $jour, JOURS) ?>
            <input class="form-control" type="number" name="heure" min=0 max=23 value="<?= $heure ?>">
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
        <?php if ($ouvert) : ?>
            <div class="alert alert-success">
                Le magasin sera ouvert
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin sera fermé
            </div>
        <?php endif ?>
        <ul>
            <?php foreach (JOURS as $k => $jour) : ?>
                <li>
                    <strong><?= $jour ?></strong> :
                    <?= creneaux_html(CRENEAUX[$k]) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>




<?php require 'footer.php'; ?>