<?php
require_once('backend/connection/connexionDB.php');

//on rajoute une condition pour pouvoir upload une image
if (isset($_POST['proModif']) && isset($_FILES['proAvatar']) && !empty($_FILES['proAvatar']['name'])) {

    //on définie la taille de l'image et les extension autorisé    
    $tailleMax = 2097152;
    $extensionValide = array('jpg', 'jpeg', 'png', 'webp');

    if ($_FILES['proAvatar']['size'] <= $tailleMax) {

        $extensionUpload = strtolower(substr(strrchr($_FILES['proAvatar']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValide)) {

            //on définie le chemin pour que l'image soit placé dans un dossier avec un id via la database
            $cheminUpload = "assets/proBanner/" . $_SESSION['pro_data']['pro_id'] . "." . $extensionUpload;
            $transferImg = move_uploaded_file($_FILES['proAvatar']['tmp_name'], $cheminUpload);

            if ($transferImg) {
                $updateImg = $bdd->prepare("UPDATE enterprise SET enterprise_banner = :enterprise_banner WHERE id_enterprise = :id_enterprise");
                $updateImg->execute(array(
                    'enterprise_banner' => $_SESSION['pro_data']['pro_id'] . "." . $extensionUpload,
                    'id_enterprise' => $_SESSION['pro_data']['pro_id']
                ));
            } else {
                $errorMsg = "Erreur de transfert";
            }
        } else {
            $errorMsg = "Votre image dois être au format : jpg, jpeg, png";
        }
    } else {
        $errorMsg = "Votre image ne dois pas dépasser 2mo";
    }
}
