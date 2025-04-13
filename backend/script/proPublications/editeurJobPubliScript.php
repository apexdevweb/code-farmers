<?php
require_once('backend/connection/connexionDB.php');

//VERIFIE SI L'ID EST BIENS PASSER EN PARAMETRE DANS L'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idJobPubli = $_GET['id'];

    //VERIFIE SI LA PUBLICATION EXISTE
    $verifJobPubliExist = $bdd->prepare("SELECT * FROM recrutement WHERE `id_recruitment` = ?");
    $verifJobPubliExist->execute([$idJobPubli]);

    if ($verifJobPubliExist->rowCount() > 0) {

        //RECUPERE LES DONNEES DE LA PUBLICATION
        $publiJobInfos = $verifJobPubliExist->fetch();
        if ($publiJobInfos['job_author_id'] == $_SESSION['pro_data']['pro_id']) {

            $publi_job_titre = $publiJobInfos['job_title'];
            $publi_job_contenu = $publiJobInfos['job_description'];
            $publi_job_time = $publiJobInfos['job_time'];
            $publi_job_auteur = $publiJobInfos['job_offer_author'];
        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette publication";
        }
    }
} else {
    $errorMsg = "Aucune publication n'a été trouver";
}
