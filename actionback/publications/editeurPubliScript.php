<?php
require("actionback/database.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idPubli = $_GET['id'];

    $verifPubliExist = $bdd->prepare("SELECT * FROM publications WHERE `id` = ?");
    $verifPubliExist->execute(array($idPubli));

    if ($verifPubliExist->rowCount() > 0) {

        $publiInfos = $verifPubliExist->fetch();
        if ($publiInfos['id_auteur'] == $_SESSION['id']) {
            $publication_titre = $publiInfos['titre'];
            $publication_contenu = $publiInfos['contenu'];
            $publication_date = $publiInfos['date_publication'];
        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette publication";
        }
    }
} else {
    $errorMsg = "Aucune publication n'a été trouver";
}
