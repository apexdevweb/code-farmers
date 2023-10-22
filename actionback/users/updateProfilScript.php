<?php
require('actionback/database.php');
//VALIDATION DU FORMULAIRE
if (isset($_POST['modifProfil'])) {
    //ON VERIFIE QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST['profilName']) && !empty($_FILES['avatar']) && !empty($_POST['city'])) {
        //ON SECURISE LE NOUVEAU TITRE ET CONTENU AVEC UN STRIP_TAGS
        $new_profil_name = strip_tags($_POST['profilName']);
        $new_profil_city = strip_tags($_POST['city']);
        //ON MET A JOUR LES NOUVELLES DONNEES DANS LA DATABASE
        $UpProfil = $bdd->prepare('UPDATE users SET userName = ? , ville = ? WHERE `id` = ?');
        $UpProfil->execute(array($new_profil_name, $new_profil_city, $idProfil));

        header('Location: editeurProfile.php');
    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}