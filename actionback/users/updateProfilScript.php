<?php
require('actionback/database.php');
//VALIDATION DU FORMULAIRE
if (isset($_POST['modifProfil'])) {
    //ON VERIFIE QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST['profilName']) && !empty($_FILES['avatar']) && !empty($_POST['city']) && !empty($_POST['skill'])) {
        //ON SECURISE LE NOUVEAU TITRE ET CONTENU AVEC UN STRIP_TAGS
        $new_profil_name = strip_tags($_POST['profilName']);
        $new_profil_city = strip_tags($_POST['city']);
        $new_profil_skill = $_POST['skill'];
        //ON UTILISE IMPLODE POUR UPDATE LES CHECKBOX
        $allSkill = implode(" ", $new_profil_skill);
        $new_lien_web = strip_tags($_POST['lien']);

        //ON MET A JOUR LES NOUVELLES DONNEES DANS LA DATABASE
        $UpProfil = $bdd->prepare("UPDATE users SET userName = ? , ville = ?, skill = ?, lien_web = ? WHERE `id` = ?");
        $UpProfil->execute(array($new_profil_name, $new_profil_city, $allSkill, $new_lien_web, $idProfil));

        header('Location: editeurProfile.php');
    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}
