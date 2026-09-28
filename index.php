<?php
    require_once 'bdd.php';
    require 'header.php';
?>
<?php


//Je teste la connexion de la BDD en affichant les oeuvres
$oeuvresListing = $mysqlClient->prepare('SELECT * FROM oeuvres');
$oeuvresListing->execute();
$oeuvres = $oeuvresListing->fetchAll();
//echo '<pre>';
//print_r ($oeuvres);
//echo '</pre>';

?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
