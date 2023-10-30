<?php
require('actionback/database.php');

if (isset($_POST['valideRepons']) && !empty($_POST['reponse'])) {

    $user_reponse = nl2br(strip_tags($_POST['reponse']));
    //ON INSERT LES DONNES ON LES PLACE DANS UN TABLEAU AVEC L'ID ET LE NOM DE L'UTILISATEUR CONNECTER QUI VAS REPONDRE ET LE $_GET[ID] POSTE
    $insertReponse = $bdd->prepare("INSERT INTO comentaire(id_auteur, name_auteur, id_coment, contenu) VALUES (?,?,?,?)");
    $insertReponse->execute(array($_SESSION['id'], $_SESSION['userName'],  $_GET['id'], $user_reponse));
} else {
    echo "Veuillez remplir tous les champs!";
}
