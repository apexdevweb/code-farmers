<?php
require('actionback/database.php');

//on rajoute une condition pour pouvoir upload une image
if (isset($_POST['modifProfil']) && isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {

    //on définie la taille de l'image et les extension autorisé    
    $tailleMax = 2097152;
    $extensionValide = array('jpg', 'jpeg', 'png');

    if ($_FILES['avatar']['size'] <= $tailleMax) {

        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValide)) {

            //on définie le chemin pour que l'image soit placé dans un dossier via la database
            $cheminUpload = "asset/image/" . $_SESSION['id'] . "." . $extensionUpload;
            $transferImg = move_uploaded_file($_FILES['avatar']['tmp_name'], $cheminUpload);

            if ($transferImg) {
                $updateImg = $bdd->prepare("UPDATE users SET avatar = :avatar WHERE `id` = :id");
                $updateImg->execute(array(
                    'avatar' => $_SESSION['id'] . "." . $extensionUpload,
                    'id' => $_SESSION['id']
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
