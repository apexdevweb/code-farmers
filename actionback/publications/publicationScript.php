<?php
require('actionback/database.php');

if (isset($_POST['publish'])) {

    if (!empty($_POST['titlePubli']) && !empty($_POST['containPubli'])) {

        $publiTitle = strip_tags($_POST['titlePubli']);
        //on rajoute nl2br() pour aller a la ligne par rapport au texte de la publication
        $publiContain = nl2br(strip_tags($_POST['containPubli']));
        //on rajoute date('jour/mois/année') pour définir la date de la publication
        $publidate = date('d/m/Y');
        $publiAuthorId = $_SESSION['id'];
        $publiAuthorName = $_SESSION['userName'];

        $insertionPubli = $bdd->prepare("INSERT INTO publications (titre , contenu, id_auteur, nom_auteur, date_publication) VALUES (?,?,?,?,?)");
        $insertionPubli->execute(array($publiTitle, $publiContain, $publiAuthorId, $publiAuthorName, $publidate));

        $successMsg = "Publier avec succès";
    } else {
        $errorMsg = "Vous n'avez pas remplis tous les champs!";
    }
}
