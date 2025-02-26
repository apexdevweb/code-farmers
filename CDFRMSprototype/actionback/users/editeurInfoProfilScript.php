<?php
require("actionback/database.php");

//VERIFIE SI L'ID EST BIENS PASSER EN PARAMETRE DANS L'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idProfil = $_GET['id'];

    //VERIFIE SI LE PROFIL EXISTE
    $verifProfilExist = $bdd->prepare("SELECT * FROM users WHERE `id` = ?");
    $verifProfilExist->execute(array($idProfil));

    //VERIFIE QUE LES DONNE SELECTIONNE SONT SUPERIEUR A 0
    if ($verifProfilExist->rowCount() > 0) {

        //RECUPERE LES DONNEES DU PROFIL QUE L'ON VAS STOCKE DANS DES VARIABLES
        $profilInfos = $verifProfilExist->fetch();

        //VERIFIE QUE LES DONNEES DEMANDER SOIT EGALE A LA SESSION DU PROFILE AVANT DE LES STOCKE
        if ($profilInfos['id'] == $_SESSION['id']) {

            $profil_name = $profilInfos['userName'];
            $profil_avatar = $profilInfos['avatar'];
            $profil_age = $profilInfos['date_naissance'];
            $profil_genre = $profilInfos['genre'];
            $profil_city = $profilInfos['ville'];
            $profil_skill = $profilInfos['skill'];
            $profil_gitlien = $profilInfos['lien_github'];
            $profil_webLien = $profilInfos['lien_web'];
            $profil_tubeLien = $profilInfos['youtube'];
        } else {
            $errorMsg = "Vous n'êtes pas le propriétaire de se profil!!!";
        }
    }
} else {
    $errorMsg = "Aucune profil n'a été trouver";
}
