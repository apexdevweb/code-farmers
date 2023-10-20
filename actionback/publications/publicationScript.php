<?php
require('actionback/database.php');

if (isset($_POST['publish'])) {

    if (!empty($_POST['titlePubli']) && !empty($_POST['containPubli'])) {

        $publiTitle = strip_tags($_POST['titlePubli']);
        //on rajoute nl2br() pour aller a la ligne par rapport au texte de la publication
        $publiContain = nl2br(strip_tags($_POST['containPubli']));
        //on rajoute date('jour/mois/année') pour définir la date de la publication
        $publidate = date('d/m/Y');
        $publiAuthorId = $_SESSION['id'];
        $publiAuthorName = $_SESSION['userName'];

        $insertionPubli = $bdd->prepare("INSERT INTO publications (titre , contenu, id_auteur, nom_auteur, date_publication) VALUES (?,?,?,?,?)");
        $insertionPubli->execute(array($publiTitle, $publiContain, $publiAuthorId, $publiAuthorName, $publidate));

        $successMsg = "Publier avec succès";
    } else {
        $errorMsg = "Vous n'avez pas remplis tous les champs!";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //on rajoute une condition pour pouvoir upload une image
    if (isset($_FILES['imgPubli']) && !empty($_FILES['imgPubli']['name'])) {

        //on définie la taille de l'image et les extension autorisé    
        $tailleMax = 2097152;
        $extensionValide = array('jpg', 'jpeg', 'png');

        if ($_FILES['imgPubli']['size'] <= $tailleMax) {

            $extensionUpload = strtolower(substr(strrchr($_FILES['imgPubli']['name'], '.'), 1));
            if (in_array($extensionUpload, $extensionValide)) {

                //on définie le chemin pour que l'image soit placé dans un dossier via la database
                $cheminUpload = "asset/image/" . $_SESSION['id'] . "." . $extensionUpload;
                $transferImg = move_uploaded_file($_FILES['imgPubli']['tmp_name'], $cheminUpload);

                if ($transferImg) {
                    $updateImg = $bdd->prepare("UPDATE publications SET img_publication = :imgPubli WHERE `id` = :id");
                    $updateImg->execute(array(
                        'imgPubli' => $_SESSION['id'] . "." . $extensionUpload,
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
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
