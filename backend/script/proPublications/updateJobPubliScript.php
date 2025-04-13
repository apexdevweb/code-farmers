<?php
require_once('backend/connection/connexionDB.php');

//VALIDATION DU FORMULAIRE
if (isset($_POST['modifjob'])) {
    var_dump($_POST);
    //ON VERIFIE QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST['titlePubliJob']) && !empty($_POST['containPubliJob'] && !empty($_GET['id']))) {
        //ON SECURISE LE NOUVEAU TITRE ET CONTENU AVEC UN STRIP_TAGS
        $new_titre_job = strip_tags($_POST['titlePubliJob']);
        $new_contenu_job = strip_tags($_POST['containPubliJob']);
        $job_id = htmlspecialchars(strip_tags($_GET['id']));
        //ON MET A JOUR LES NOUVELLES DONNEES DANS LA DATABASE
        try {
            $UpPubliJob = $bdd->prepare('UPDATE recrutement SET job_title = ?, job_description = ? WHERE id_recruitment = ?');
            $UpPubliJob->execute([$new_titre_job,  $new_contenu_job, $job_id]);
        } catch (PDOException $e) {
            echo "Erreur de mise a jour des données" . $e->getMessage();
        }

        header('Location: myJobPubli.php');
        exit;
    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}
