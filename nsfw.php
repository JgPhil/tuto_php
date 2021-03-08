<?php

$age = null;
$error = null;
$access = false;
if (!$_COOKIE['user']) {
    $error = "Contenu protégé";
} else {
    $user = unserialize($_COOKIE['user']);
    $prenom = $user['prenom'];
    $nom = $user['nom'];
    $age = date('Y') - (int)$user['date_naissance']; ?>
    <?php if ($age < 18) {
        $error = "Vous n'avez pas l'âge suffisant ";
    } else {
        $access = true;
    }
} ?>

<?php if ($access) : ?>
    <h1>Contenu caché</h1>
    <p><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere dicta deleniti excepturi provident corporis. Itaque placeat molestias mollitia architecto tempora fugiat nemo est, eius ipsum libero natus saepe suscipit consectetur?</span><span>Fugiat totam a eum distinctio unde neque iusto autem mollitia aliquid eaque soluta repudiandae cumque voluptates illum illo, error accusamus pariatur consequatur provident hic ex in alias qui. Itaque, explicabo.</span><span>Nihil dicta similique consequuntur aperiam voluptates, nam accusamus repellat nostrum quasi reiciendis doloremque assumenda quos ducimus ipsam asperiores id temporibus praesentium veritatis iure autem animi? Maiores ex eius nemo sapiente.</span></p>
<?php else : ?>
    <div class="alert alert-danger">
        <?= $error; ?>
        <a href="/profil.php">Veuillez vous connecter</a>
    </div>
<?php endif ?>