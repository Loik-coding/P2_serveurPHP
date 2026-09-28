<?php    
    require_once 'bdd.php';
?>

<?php
//Je récupère les données du formulaire
$postData = $_POST;

//Je donne des noms de variables aux infos récupérées
$titre = $postData['titre'];
$description = $postData['description'];
$artiste = $postData['artiste'];
$image = $postData['image'];

//On vérifie que le titre de l'oeuvre est renseigné, n'est pas vide et n'est pas rempli d'espaces
if (
    !isset($titre)
    || empty(trim($titre))
){
    echo("Il faut un titre d'oeuvre valide.<br>");
}

//On vérifie que le nom d'artiste est renseigné, n'est pas vide et n'est pas rempli d'espaces
if (
    !isset($artiste)
    || empty(trim($artiste))
){
    echo("Il faut un nom d'artiste valide.<br>");
}

//on vérifie la description (pas d'espaces avant et min 3 caractères)
if (!isset($description)
    || (strlen(trim($description)) < 3))
{
    echo("La description est trop courte !<br>");
}

//On vérifie le début du lien de l'image
if (!str_starts_with($image,'https://')){
    echo("Le lien de l'image doit commencer par 'https://'.");
}

//J'insère les données du formulaire dans la BDD et redirection vers l'accueil
$requeteInsert = 'INSERT INTO oeuvres (titre, description, artiste, image) VALUES (:titre, :description, :artiste, :image)';

$insertOeuvre = $mysqlClient->prepare($requeteInsert);

$insertOeuvre->execute([
    'titre' => $titre,
    'description' => $description,
    'artiste' => $artiste,
    'image' => $image
]);
header('Location: oeuvre.php?id=' . $mysqlClient->lastInsertId())

?>