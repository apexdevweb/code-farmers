<?php
require("actionback/database.php");

//VERIFIE SI L'ID EST BIENS PASSER EN PARAMETRE DANS L'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idPubli = $_GET['id'];

    //VERIFIE SI LA PUBLICATION EXISTE
    $verifPubliExist = $bdd->prepare("SELECT * FROM publications WHERE `id` = ?");
    $verifPubliExist->execute(array($idPubli));

    if ($verifPubliExist->rowCount() > 0) {


        //RECUPERE LES DONNEES DE LA PUBLICATION
        $publiInfos = $verifPubliExist->fetch();
        if ($publiInfos['id_auteur'] == $_SESSION['id']) {

            $publication_titre = $publiInfos['titre'];
            $publication_contenu = $publiInfos['contenu'];
            $publication_date = $publiInfos['date_publication'];
            $publication_auteur = $publiInfos['nom_auteur'];
        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette publication";
        }
    }
} else {
    $errorMsg = "Aucune publication n'a été trouver";
}
