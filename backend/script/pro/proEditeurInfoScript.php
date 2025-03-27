<?php
require_once('backend/connection/connexionDB.php');

//VERIFIE SI L'ID EST BIENS PASSER EN PARAMETRE DANS L'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id_pro_profil = (int) $_GET['id'];

    //VERIFIE SI LE PROFIL EXISTE
    $verifCpgnyProfilExist = $bdd->prepare("SELECT * FROM enterprise WHERE id_enterprise = ?");
    $verifCpgnyProfilExist->execute(array($id_pro_profil));

    //VERIFIE QUE LES DONNE SELECTIONNE SONT SUPERIEUR A 0
    if ($verifCpgnyProfilExist->rowCount() > 0) {

        //RECUPERE LES DONNEES DU PROFIL QUE L'ON VAS STOCKE DANS DES VARIABLES
        $profilProInfos = $verifCpgnyProfilExist->fetch();

        //VERIFIE QUE LES DONNEES DEMANDER SOIT EGALE A LA SESSION DU PROFILE AVANT DE LES STOCKE
        if ($profilProInfos['id_enterprise'] == $_SESSION['pro_data']['pro_id']) {
            $profil_name = $profilProInfos['enterprise_name'];
            $profil_avatar = $profilProInfos['enterprise_banner'];
            $profil_age = $profilProInfos['date_inscription'];
            $profil_city = $profilProInfos['enterprise_location'];
        } else {
            $errorMsg = "Vous n'êtes pas le propriétaire de se profil!";
        }
    }
} else {
    $errorMsg = "Aucune profil n'a été trouver";
}
