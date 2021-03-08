<?php


require 'header.php';

$error = '';
$success = '';

if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $email= null;
        $success = 'Email enregistré';
    } else {
        $error = 'Email invalide';
    }
}

if ($success) {
?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php }
if ($error) {
?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php }
?>

<h1>Inscription à la newsletter</h1>



<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dolores earum itaque maxime odio quia repellendus laudantium ab debitis, numquam ullam, nihil cumque harum magnam ex, vero facilis ad eligendi?</p>

<form class="form-inline" action="newsletter.php" method="post" name="newsletter">
    <div class="form-group w-50">
        <input class="form-control"  type="email" name="email" placeholder="Entrez votre email" required>
    </div>
    <button class="btn btn-primary" type="submit">S'inscrire</button>
</form>

<?php
require 'footer.php';

?>