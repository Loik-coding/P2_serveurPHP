<?php require 'header.php'; 
//var_dump($_SESSION);
?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre" >
        <?php if (!empty ($_SESSION['errors']['titre'])){
            ?> <p> <?= $_SESSION['errors']['titre'] ?> </p>
        <?php } ?>
        
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste" >
        <?php if (!empty ($_SESSION['errors']['artiste'])){
            ?> <p> <?= $_SESSION['errors']['artiste'] ?> </p>
        <?php } ?>
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
        <?php if (!empty ($_SESSION['errors']['image'])){
            ?> <p> <?= $_SESSION['errors']['image'] ?> </p>
        <?php } ?>
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description" ></textarea>
        <?php if (!empty ($_SESSION['errors']['description'])){
            ?> <p> <?= $_SESSION['errors']['description'] ?> </p>
        <?php } ?>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php 
session_destroy();
require 'footer.php'; ?>
