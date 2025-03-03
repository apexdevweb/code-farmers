<?php
session_start();
require('backend/connection/connexionDB.php');
require('backend/mail/autoMail.php');

use PHPMailer\PHPMailer\PHPMailer;

// Vérifie si le formulaire est soumis
if (isset($_POST['signup'])) {

    // Vérifie que tous les champs sont remplis
    if (
        !empty($_POST['userName']) && !empty($_POST['mail']) && !empty($_POST['userPassword']) &&
        !empty($_POST['confirmPassword']) && !empty($_POST['city']) && !empty($_POST['dateNaissance'])
    ) {
        // Nettoyage des données et sécurisation
        $confirmkey = mt_rand(3000000, 9000000);
        $Uname = htmlspecialchars(strip_tags($_POST['userName']));
        $Umail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $Upasse = htmlspecialchars(strip_tags($_POST['userPassword']));
        $confirmPasse = htmlspecialchars(strip_tags($_POST['confirmPassword']));
        $Ubirthday = $_POST['dateNaissance'];
        $Ucity = $_POST['city'];
        $Usex = $_POST['genre'];
        $date_inscription = date("Y-m-d");

        // Vérifie si l'utilisateur existe déjà
        $data_verif = $bdd->prepare("SELECT userName FROM users WHERE userName = ?");
        $data_verif->execute([$Uname]);

        // Vérifie que les mots de passe correspondent
        if ($Upass === $confirmPasse) {
            $Upasse_crypted = password_hash($_POST['userPassword'], PASSWORD_ARGON2ID);
            // Insère l'utilisateur en base de données
            if ($data_verif->rowCount() == 0) {
                $user_insert = $bdd->prepare("INSERT INTO users (userName, mail, userPassword, date_naissance, ville, genre, date_inscription, confirmkey, confirm) 
                                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $user_insert->execute([$Uname, $Umail,  $Upasse_crypted, $Ubirthday, $Ucity, $Usex, $date_inscription, $confirmkey, 0]);

                // Récupère les infos de l'utilisateur
                $rescu_user_info = $bdd->prepare("SELECT `id`, userName FROM users WHERE userName = ? AND mail = ?");
                $rescu_user_info->execute([$Uname, $Umail]);
                $userInfo = $rescu_user_info->fetch();

                if ($userInfo) {
                    $_SESSION['valideAuth'] = true;
                    $_SESSION['id'] = $userInfo['id'];
                    $_SESSION['userName'] = $userInfo['userName'];
                } else {
                    $errorMsg = "Impossible de récupérer les informations utilisateur.";
                }
            } else {
                $errorMsg = "Ce compte existe déjà !";
            }

            // Récupère les informations utilisateur pour envoyer le mail de confirmation
            $recupUserInfo = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
            $recupUserInfo->execute([$Umail]);

            if ($recupUserInfo->rowCount() > 0) {
                $userCrf_Info = $recupUserInfo->fetch();
                $_SESSION['id'] = $userCrf_Info['id'];

                // Envoie l'email de confirmation
                sendAutoMail($Umail, $_SESSION['id'], $confirmkey);
                if (sendAutoMail($Umail, $_SESSION['id'], $confirmkey)) {
                    header('Location: confirmAttente.php');
                    exit();
                } else {
                    echo "L'email de confirmation n'a pas pu être envoyé.";
                }
            }
        } else {
            $errorMsg = "Les mots de passe ne correspondent pas !";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoires !";
    }
}
