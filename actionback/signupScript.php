<?php
require("actionback/database.php");
// ON VERIFIE SI LE FORMULAIRE EST VALIDE
if (isset($_POST['signup'])) {

    // ON VERIFIE LES CHAMPS NE SONT PAS VIDE

    if (!empty($_POST['userName']) && !empty($_POST['userPassword'])) {

        // ON PLACE LA SUPERGLOBALE DANS UNE VARIABLE ET ON SECURISE LES CHAMP AVEC UN STRIPTAGS ET ON CRYPTE LE MDP

        $Uname = strip_tags($_POST['userName']);
        $Upasse = password_hash($_POST['userPassword'], PASSWORD_ARGON2ID);

        // ON VERIFIE QUE L'UTILISATEUR N'EXISTE PAS DEJA 

        $data_verif = $bdd->prepare("SELECT userName FROM users WHERE userName = ?");
        $data_verif->execute(array($Uname));

        // ON INSERT LE NOUVEL UTILISATEUR DANS LA DATABASE

        if ($data_verif->rowcount() == 0) {
            $user_insert = $bdd->prepare("INSERT INTO users (userName, userPassword) VALUES (?,?)");
            $user_insert->execute(array($Uname, $Upasse));

            // ON RECUPERE LES INFORMATION DE L'UTILISATEUR

            $rescu_user_info = $bdd->prepare("SELECT id userName FROM users WHERE userName = ? ");
            $rescu_user_info->execute(array($Uname));

            $userInfo = $rescu_user_info->fetch();

            //ON AUTHENTIFIE L'UTILISATEUR SUR LE SITE ET RECUPERER LES DONNEES DANS DES SUPERGLOBALE SESSION

            $_SESSION['valide'] = true;
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['userName'] = $userInfo['userName'];

            //ON REDIRIGE L'UTILISATEUR VERS LA PAGE D'ACCEUIL

            header('Location: index.php');
        } else {
            $errorMsg = "Se compte éxiste déjà!";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoire!";
    }
}
