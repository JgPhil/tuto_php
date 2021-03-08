<div class="row">
    <div class="col-sm-4">
        <?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
        $vues = nombre_vues();
        $s = $vues > 1 ? 's' : ''; ?>
        Il y a eu <?= nombre_vues() ?> visite<?= $s ?> sur le site
        <?php ajouter_vue(); ?>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
            <?php
            $place = "bottom";
            require 'menu.php' ?>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>