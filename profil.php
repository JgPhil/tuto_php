<?php
require 'functions/functions.php';

$user = null;
if (!empty($_COOKIE['user'])) { //connecté
    $user = unserialize($_COOKIE['user']);
    $prenom = $user['prenom'];
    $nom = $user['nom'];
    $age = date('Y') - $user['date_naissance'];
}
if (
    !empty($_POST['prenom'])
    && !empty($_POST['nom'])
    && !empty($_POST['date_naissance'])
) {
    $userArr = [
        'prenom' => htmlentities($_POST['prenom']),
        'nom' => htmlentities($_POST['nom']),
        'date_naissance' => htmlentities($_POST['date_naissance'])
    ];
    setcookie('user', serialize($userArr)); //formulaire envoyé
}
require "header.php";
?>

<?php if ($user) : ?>
    <h2 class="h2"><?= "Bonjour $prenom $nom tu as $age ans" ?></h2>
<?php else : ?>
    <form class="form-inline" action="profil.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Entrez votre prenom" name="prenom">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Entrez votre nom" name="nom">
        </div>
        <select class="form-control" name="date_naissance">
            <?php for ($i = date('Y'); $i > 1913; $i--) {
                echo "<option value=$i>$i</option>";
            }
            ?>
        </select>
        <button class="btn btn-primary" type="submit">
            Envoyer
        </button>
    </form>
<?php endif; ?>

<?php require "footer.php"; ?>