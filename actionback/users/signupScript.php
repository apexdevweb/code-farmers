<?php
session_start();
require("actionback/database.php");
// ON VERIFIE SI LE FORMULAIRE EST VALIDE
if (isset($_POST['signup'])) {

    // ON VERIFIE QUE LES CHAMPS NE SONT PAS VIDE

    if (
        !empty($_POST['userName']) && !empty($_POST['mail']) && !empty($_POST['userPassword']) && !empty($_POST['confirmPassword'])
        && !empty($_POST['city']) && !empty($_POST['dateNaissance'])
    ) {

        // ON PLACE LA SUPERGLOBALE DANS UNE VARIABLE ET ON SECURISE LES CHAMP AVEC UN STRIPTAGS ET ON CRYPTE LE MDP

        $Uname = strip_tags($_POST['userName']);
        $Umail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $Upasse = password_hash($_POST['userPassword'], PASSWORD_ARGON2ID);
        $Ubirthday = $_POST['dateNaissance'];
        $Ucity = $_POST['city'];
        $Usex = $_POST['genre'];
        $date_inscription = date("Y-m-d");
        $date_connexion = date("Y-m-d H:i:s");

        // ON VERIFIE QUE L'UTILISATEUR N'EXISTE PAS DEJA 

        $data_verif = $bdd->prepare("SELECT userName FROM users WHERE userName = ?");
        $data_verif->execute(array($Uname));

        // ON VERIFIE QUE LES MOT DE PASSE CORRESPONDENT 
        if ($_POST['userPassword'] == $_POST['confirmPassword']) {

            // ON INSERT LE NOUVEL UTILISATEUR DANS LA DATABASE

            if ($data_verif->rowcount() == 0) {
                $user_insert = $bdd->prepare("INSERT INTO users (userName, mail, userPassword, date_naissance, ville, genre, date_inscription) VALUES (?,?,?,?,?,?,?)");
                $user_insert->execute(array($Uname, $Umail, $Upasse, $Ubirthday, $Ucity, $Usex, $date_inscription));

                // ON RECUPERE LES INFORMATION DE L'UTILISATEUR

                $rescu_user_info = $bdd->prepare("SELECT `id` userName FROM users WHERE userName = ? ");
                $rescu_user_info->execute(array($Uname));

                $userInfo = $rescu_user_info->fetch();

                //ON AUTHENTIFIE L'UTILISATEUR SUR LE SITE ET RECUPERER LES DONNEES DANS DES SUPERGLOBALE SESSION

                $_SESSION['valideAuth'] = true;
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['userName'] = $userInfo['userName'];

                //ON REDIRIGE L'UTILISATEUR VERS LA PAGE D'ACCEUIL

                header('Location: login.php');
            } else {
                $errorMsg = " Se compte éxiste déjà!";
            }
        } else {
            $errorMsg = "Les mot de passe ne correspondent pas!";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoire!";
    }
}
