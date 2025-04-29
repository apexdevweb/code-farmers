<?php
require_once('backend/connection/connexionDB.php');

//VERIFIE SI L'ID EST BIENS PASSER EN PARAMETRE DANS L'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    //VERIFIE QUE L'ID DANS L'URL EST LE MEME QUE CELUI DE LA SESSION
    $id_pro_profil = (int) $_GET['id'];

    //VERIFIE SI LE PROFIL EXISTE
    $verifCpgnyProfilExist = $bdd->prepare("SELECT * FROM enterprise WHERE id_enterprise = ?");
    $verifCpgnyProfilExist->execute([$id_pro_profil]);

    //VERIFIE QUE LES DONNE SELECTIONNE SONT SUPERIEUR A 0
    if ($verifCpgnyProfilExist->rowCount() > 0) {

        //RECUPERE LES DONNEES DU PROFIL QUE L'ON VAS STOCKE DANS DES VARIABLES
        $profilProInfos = $verifCpgnyProfilExist->fetch();

        //VERIFIE QUE LES DONNEES DEMANDER SOIT EGALE A LA SESSION DU PROFILE AVANT DE LES STOCKE
        if ($profilProInfos['id_enterprise'] == $_SESSION['pro_data']['pro_id']) {
            $pro_info_name = $profilProInfos['enterprise_name'];
            $pro_info_banner = $profilProInfos['enterprise_banner'];
            $pro_info_descript = $profilProInfos['enterprise_description'];
            $pro_info_link = $profilProInfos['enterprise_link'];
            $pro_info_city = $profilProInfos['enterprise_location'];
        } else {
            $errorMsg = "Vous n'êtes pas le propriétaire de ce profil!";
        }
    }
} else {
    $errorMsg = "Aucune profil n'a été trouver";
}
