<?php
session_start();
var_dump($_POST);
print_r($_POST);
require("backend/connection/connexionDB.php");
require("backend/security/logMailVerif.php");
require("backend/class/userClass.php");
require("backend/class/proClass.php");
require("backend/class/adminClass.php");

// ON VERIFIE SI LE FORMULAIRE EST VALIDE
if (isset($_POST['connexion'])) {

    // ON VERIFIE QUE SI LES CHAMPS NE SONT PAS VIDE

    if (!empty($_POST['mail']) && !empty($_POST['UPassword'])) {

        // les données de l'utilisateur qui souhaite se connecté!
        $Umail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $Upasse = strip_tags($_POST['UPassword']);

        // vérifie si l'utilisateur existe
        $data_verif = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $data_verif->execute(array($Umail));

        if ($data_verif->rowCount() > 0) {

            // on vérifie si les mot de passe rentrer par l'utilisateur correspond avec ceux de la database
            $Uinfos = $data_verif->fetch();
            $passhash = $Uinfos['userPassword'];
            if (password_verify($Upasse, $passhash)) {

                // $user = new Utilisateur(
                //     $logInfo["user_first_name"],
                //     $logInfo["user_last_name"],
                //     $logInfo["user_mail"],
                //     new DateTime($logInfo["date_of_birth"]),
                //     $logInfo["user_city"],
                // );


                // $_SESSION["auth"] = true;
                // $_SESSION['user_data'] = [
                //     "USR_firstName" => $user->getFirstName(),
                //     "USR_pseudo" => $user->getLastName(),
                //     "USR_mail" => $user->getEmail(),
                //     "USR_city" => $user->getCityName(),
                //     //ici je format la date en years-month-day
                //     "USR_dtofbrth" => $user->getBirthDate()->format('Y-m-d'),
                // ];



                //ON AUTHENTIFIE L'UTILISATEUR SUR LE SITE ET RECUPERER LES DONNEES DANS DES SUPERGLOBALE SESSION
                $_SESSION['valideAuth'] = true;
                $_SESSION['id'] = $Uinfos['id'];
                $_SESSION['userName'] = $Uinfos['userName'];
                $_SESSION['confirmkey'] = $Uinfos['confirmkey'];

                header("Location: home.php");
                exit;
                //on redirige l'utilisateur vers la page d'acceuil
            } else {
                $errorMsg = "Mot de passe incorrect!";
            }
        } else {
            $errorMsg = "Nom d'utilisateur incorrect!";
        }
    }
}
