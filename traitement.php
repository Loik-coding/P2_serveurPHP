<?php 
session_start();   
    require_once 'bdd.php';

//Je récupère les données du formulaire
$postData = $_POST;

//Je donne des noms de variables aux infos récupérées
$titre = trim($postData['titre']);
$description = trim($postData['description']);
$artiste = trim($postData['artiste']);
$image = $postData['image'];
$_SESSION['errors']=[];

//On vérifie que le titre de l'oeuvre est renseigné, n'est pas vide et n'est pas rempli d'espaces
if (
    !isset($titre)
    || empty($titre)
){
    $_SESSION['errors']['titre']="Il faut un titre d'oeuvre valide.";
}

//On vérifie que le nom d'artiste est renseigné, n'est pas vide et n'est pas rempli d'espaces
if (
    !isset($artiste)
    || empty($artiste)
){
    $_SESSION['errors']['artiste']="Il faut un nom d'artiste valide.";
}

//on vérifie que la description fait au moins 3caract.
if (!isset($description)
    || (strlen($description)) < 3)
{
    $_SESSION['errors']['description']="La description est trop courte";
}

//On vérifie le début du lien de l'image
if (!str_starts_with($image,'https://')){
    $_SESSION['errors']['image']="Le lien de l'image doit commencer par 'https://'.";
}

if (!empty($_SESSION['errors'])){
    header('Location: ajouter.php');
}    else{
        $requeteInsert = 'INSERT INTO oeuvres (titre, description, artiste, image) VALUES (:titre, :description, :artiste, :image)';
        $insertOeuvre = $mysqlClient->prepare($requeteInsert);
        $insertOeuvre->execute([
            'titre' => $titre,
            'description' => $description,
            'artiste' => $artiste,
            'image' => $image
            ]);
            header('Location: oeuvre.php?id=' . $mysqlClient->lastInsertId());
    }
?>