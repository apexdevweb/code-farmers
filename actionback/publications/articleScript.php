<?php
require('actionback/database.php');
//ON VERIFIE LA METHODE GET EST EXISTANTE ET QUE LE CHAMPS EST REMPLI
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $publi_select_id = $_GET['id'];
    //ON VERIFIE QUE LA PUBLICATION EXISTE
    $publiSelect = $bdd->prepare("SELECT * FROM publications WHERE `id` = ?");
    $publiSelect->execute(array($publi_select_id));

    if ($publiSelect->rowCount() > 0) {
        //ON RECUPERE TOUTE LA DATA DE LA PUBLICATION
        $publiSelectInfo = $publiSelect->fetch();
        //ON PLACE LA DATA RECUPERE DANS DES VARIABLES
        $publi_titre_select =  $publiSelectInfo['titre'];
        $publi_contenu_select =  $publiSelectInfo['contenu'];
        $publi_id_select = $publiSelectInfo['id_auteur'];
        $publi_auteur_select = $publiSelectInfo['nom_auteur'];
        $publi_date_select = $publiSelectInfo['date_publication'];
    } else {
        $errorMsg = "Aucune publication a été trouver";
    }
} else {
    $errorMsg = "Aucune publication a été trouver";
}
