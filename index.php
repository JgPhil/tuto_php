<?php
session_start();
$_SESSION['role'] = 'administrateur';
require 'functions/functions.php';
$title = "Page d'accueil";
require 'header.php'; 

?>

<div class="starter-template text-center py-5 px-3">
  <h1><?= $title ?></h1>
  <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
</div>

</main><!-- /.container -->


<?php require 'footer.php' ?>