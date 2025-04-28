<?php
require_once('backend/connection/connexionDB.php');
//VALIDATION DU FORMULAIRE
if (isset($_POST['proModif'])) {
    //ON VERIFIE QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST['proName'])  && !empty($_POST['proCity']) && !empty($_POST['proSkill']) && !empty($_POST['proLien']) && !empty($_POST['proDescript']) && !empty($_FILES['proAvatar'])) {
        //ON SECURISE LE NOUVEAU TITRE ET CONTENU AVEC UN STRIP_TAGS
        $new_pro_name = htmlspecialchars(strip_tags($_POST['proName']));
        $new_pro_city = htmlspecialchars(strip_tags($_POST['proCity']));
        $new_pro_skill = $_POST['proSkill'];
        //ON UTILISE IMPLODE POUR UPDATE LES CHECKBOX
        $allProSkill = implode(" ", $new_pro_skill);
        $new_pro_descript = htmlspecialchars(strip_tags($_POST['proDescript']));
        $new_pro_link = htmlspecialchars(strip_tags($_POST['proLien']));

        try {
            //ON MET A JOUR LES NOUVELLES DONNEES DANS LA DATABASE
            $UpProfil = $bdd->prepare("UPDATE enterpise SET enterprise_name = ? , enterprise_location = ?, enterprise_description = ?,enterprise_sector = ?, enterprise_link = ?, enterprise_banner = ? WHERE id_enterprise = ?");
            $UpProfil->execute([$new_pro_name, $new_pro_city, $allProSkill, $new_pro_descript, $new_pro_link, $id_pro_profil]);
        } catch (PDOException $e) {
            echo "Erreur de mise a jour des info de l'entreprise" . $e->getMessage();
        }
        header('Location: editeurProfile.php');
    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}
