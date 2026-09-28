<?php
require 'header.php';
require_once 'bdd.php';


//$oeuvreDetail = $mysqlClient->prepare('SELECT * FROM oeuvres WHERE id=:id');
//$oeuvreDetail->execute([
//    'id' => $_GET['id']
//    ]);
//$oeuvre = $oeuvreDetail->fetch();



// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

//On récupère les données de la table oeuvres via SQL avec l'id récupéré dans l'URL 
//et on affiche la première ligne.
$oeuvreDetail = $mysqlClient->prepare('SELECT * FROM oeuvres WHERE id=:id');
$oeuvreDetail->execute([
    'id' => $_GET['id']
    ]);
$oeuvre = $oeuvreDetail->fetch();

//On vérifie que la requete a bien récupéré des infos
//Si l'id n'existe pas, on renvoie à index.php exemple pour id=19 retour à l'index
if ($oeuvre===false) {
    header('Location: index.php');
    exit;
}

?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
