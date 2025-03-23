<?php
session_start();
require('backend/connection/connexionDB.php');
require('backend/mail/autoMail.php');

use PHPMailer\PHPMailer\PHPMailer;

// Vérifie si le formulaire est soumis
if (isset($_POST['compagnySignup'])) {

    // Vérifie que tous les champs sont remplis
    if (
        !empty($_POST['compagnyName']) && !empty($_POST['compagnyMail']) && !empty($_POST['compagnyNumber']) && !empty($_POST['compagnyPassword']) &&
        !empty($_POST['confirmPassword']) && !empty($_POST['city'])
    ) {
        // Nettoyage des données et sécurisation
        $confirmkey = mt_rand(3000000, 9000000);
        $cpgny_name = htmlspecialchars(strip_tags($_POST['compagnyName']));
        $cpgny_mail = filter_var($_POST['compagnyMail'], FILTER_VALIDATE_EMAIL);
        $cpgny_number = htmlspecialchars(strip_tags($_POST['compagnyNumber']));
        $cpgny_pass = htmlspecialchars(strip_tags($_POST['compagnyPassword']));
        $confirmPasse = htmlspecialchars(strip_tags($_POST['confirmPassword']));
        $cpgny_city = htmlspecialchars($_POST['city']);
        $date_inscription = date("Y-m-d");

        // Vérifie si l'utilisateur existe déjà
        $data_cpgny_verif = $bdd->prepare("SELECT enterprise_name FROM enterprise WHERE enterprise_name = ?");
        $data_cpgny_verif->execute([$cpgny_name]);

        // Vérifie que les mots de passe correspondent
        if ($cpgny_pass === $confirmPasse) {
            $cpgny_pass_crypted = password_hash($_POST['compagnyPassword'], PASSWORD_ARGON2ID);
            // Insère l'utilisateur en base de données
            if ($data_cpgny_verif->rowCount() == 0) {
                $cpgny_insert = $bdd->prepare("INSERT INTO enterprise (enterprise_name, enterprise_mail, enterprise_password, enterprise_number, enterprise_location, date_inscription, confirmkey, confirm) 
                                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $cpgny_insert->execute([$cpgny_name, $cpgny_mail,  $cpgny_pass_crypted, $cpgny_number, $cpgny_city, $date_inscription, $confirmkey, 0]);

                // Récupère les infos de l'utilisateur
                $rescu_cpgny_info = $bdd->prepare("SELECT `id`, userName FROM users WHERE userName = ? AND mail = ?");
                $rescu_cpgny_info->execute([$cpgny_name, $cpgny_mail]);
                $cpgnyInfo = $rescu_cpgny_info->fetch();

                if ($cpgnyInfo) {
                    $_SESSION['cpgnyAuth'] = true;
                    $_SESSION['id_enterprise'] = $cpgnyInfo['id_enterprise'];
                    $_SESSION['enterprise_name'] = $cpgnyInfo['enterprise_name'];
                } else {
                    $errorMsg = "Impossible de récupérer les informations de l'entreprise.";
                }
            } else {
                $errorMsg = "Ce compte existe déjà !";
            }

            // Récupère les informations utilisateur pour envoyer le mail de confirmation
            $recupCpgnyInfo = $bdd->prepare("SELECT * FROM enterprise WHERE enterpise_mail = ?");
            $recupCpgnyInfo->execute([$cpgny_mail]);

            if ($recupCpgnyInfo->rowCount() > 0) {
                $cpgnyCrf_Info = $recupCpgnyInfo->fetch();
                $_SESSION['id_enterprise'] = $cpgnyCrf_Info['id_enterprise'];

                // Envoie l'email de confirmation
                sendAutoMail($cpgny_mail, $_SESSION['id_enterprise'], $confirmkey);
                if (sendAutoMail($cpgny_mail, $_SESSION['id_enterprise'], $confirmkey)) {
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
