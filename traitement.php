<?php    
    require_once 'bdd.php';
?>

<?php
//Je récupère les données du formulaire
$postData = $_POST;

//On vérifie que le titre de l'oeuvre est renseigné, n'est pas vide et n'est pas rempli d'espaces
if (
    !isset($postData['titre'])
    || empty(trim($postData['titre']))
){
    echo("Il faut un titre d'oeuvre valide.<br>");
}

//On vérifie que le nom d'artiste est renseigné, n'est pas vide et n'est pas rempli d'espaces
if (
    !isset($postData['artiste'])
    || empty(trim($postData['artiste']))
){
    echo("Il faut un nom d'artiste valide.<br>");
}

//on vérifie la description (pas d'espaces avant et min 3 caractères)
if (!isset($postData['description'])
    || (strlen(trim($postData['description']) < 3)))
{
    echo("La description est trop courte !<br>");
}

//On vérifie le début du lien de l'image
if (!str_starts_with($postData['image'],'https://')){
    echo("Le lien de l'image doit commencer par 'https://'.");
}



?>