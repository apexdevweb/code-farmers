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
        $confirmkey = mt_rand(9000000, 10000000);
        $Uname = strip_tags($_POST['userName']);
        $Umail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $Upasse = password_hash($_POST['userPassword'], PASSWORD_ARGON2ID);
        $Ubirthday = $_POST['dateNaissance'];
        $Ucity = $_POST['city'];
        $Usex = $_POST['genre'];
        $date_inscription = date("Y-m-d");

        // ON VERIFIE QUE L'UTILISATEUR N'EXISTE PAS DEJA 

        $data_verif = $bdd->prepare("SELECT userName FROM users WHERE userName = ?");
        $data_verif->execute(array($Uname));

        // ON VERIFIE QUE LES MOT DE PASSE CORRESPONDENT 
        if ($_POST['userPassword'] === $_POST['confirmPassword']) {

            // ON INSERT LE NOUVEL UTILISATEUR DANS LA DATABASE

            if ($data_verif->rowcount() == 0) {
                $user_insert = $bdd->prepare("INSERT INTO users (userName, mail, userPassword, date_naissance, ville, genre, date_inscription, confirmkey, confirm) VALUES (?,?,?,?,?,?,?,?,?)");
                $user_insert->execute(array($Uname, $Umail, $Upasse, $Ubirthday, $Ucity, $Usex, $date_inscription, $confirmkey, 0));

                // ON RECUPERE LES INFORMATION DE L'UTILISATEUR

                $rescu_user_info = $bdd->prepare("SELECT `id` userName FROM users WHERE userName = ? AND mail = ?");
                $rescu_user_info->execute(array($Uname, $Umail));

                $userInfo = $rescu_user_info->fetch();

                // ON AUTHENTIFIE L'UTILISATEUR SUR LE SITE ET RECUPERER LES DONNEES DANS DES SUPERGLOBALE SESSION

                $_SESSION['valideAuth'] = true;
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['userName'] = $userInfo['userName'];
            } else {
                $errorMsg = " Se compte éxiste déjà!";
            }

            // ON RECUPERE LES INFORMATION DE L'UTILISATEUR POUR LE MAIL DE CONFIRMATION
            $recupUserInfo = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
            $recupUserInfo->execute(array($Umail));
            if ($recupUserInfo->rowCount() > 0) {
                $userCrf_Info = $recupUserInfo->fetch();
                $_SESSION['id'] = $userCrf_Info['id'];

                // ON ENVOI UN MAIL DE CONFIRMATION
                $header = "MIME-Version: 1.0\r\n";
                $header .= 'From:"Code-Farmers"<apexdevweb@gmail.com>' . "\r\n";
                $header .= 'Content-type: text/html; charset="utf-8"' . "\r\n";
                $header .= 'Content-transfert-encoding: 8bit';

                $message = '
             <html>
              <body>
                 <div align="center">
                 <h3>Code-farmers-support</h3>
                 <a href="http://code-farmer348//actionback/users/verifConfirme.php?id=' . $_SESSION['id'] . '&confirmkey=' . $confirmkey . '">Activation de votre compte</a>                    
                 </div>
              </body>
             </html>
             ';
                mail($Umail, "Confirmation de compte", $message, $header);
                //ON FAIS UNE CONDITION POUR VERIFIER QUE L'EMAIL A BIEN ETE ENVOYE
                if (mail($Umail, "Confirmation de compte", $message, $header)) {
                    //SI LE MAIL EST ENVOYE ON REDIRIGE L'UTILISATEUR VERS LA PAGE D'ATTENTE DE CONFIRMATION
                    header('Location: confirmAttente.php');
                } else {
                    echo "L'email de confirmation n'as pas pu être envoyer";
                }
            }
        } else {
            $errorMsg = "Les mot de passe ne correspondent pas!";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoire!";
    }
}
