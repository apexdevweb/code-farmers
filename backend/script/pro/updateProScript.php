<?php
require_once('backend/connection/connexionDB.php');
//VALIDATION DU FORMULAIRE
if (isset($_POST['proModif'])) {
    //ON VERIFIE QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST['profilName']) && !empty($_FILES['proAvatar']) && !empty($_POST['city']) && !empty($_POST['skill'])) {
        //ON SECURISE LE NOUVEAU TITRE ET CONTENU AVEC UN STRIP_TAGS
        $new_profil_name = strip_tags($_POST['profilName']);
        $new_profil_city = strip_tags($_POST['city']);
        $new_profil_skill = $_POST['skill'];
        //ON UTILISE IMPLODE POUR UPDATE LES CHECKBOX
        $allSkill = implode(" ", $new_profil_skill);

        //ON MET A JOUR LES NOUVELLES DONNEES DANS LA DATABASE
        $UpProfil = $bdd->prepare("UPDATE enterpise SET enterprise_name = ? , enterprise_location = ?, skill = ?, lien_github = ?, lien_web = ?, youtube = ? WHERE `id` = ?");
        $UpProfil->execute(array($new_profil_name, $new_profil_city, $allSkill,  $new_profil_git, $new_lien_web, $new_lien_tube, $idProfil));

        header('Location: editeurProfile.php');
    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}
