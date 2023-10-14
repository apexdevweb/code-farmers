<?php

require("actionback/database.php");

// ON VERIFIE SI LE FORMULAIRE EST VALIDE
if (isset($_POST['connexion'])) {

    // ON VERIFIE QUE SI LES CHAMPS NE SONT PAS VIDE

    if (!empty($_POST['userName']) && !empty($_POST['userPassword'])) {

        // les données de l'utilisateur qui souhaite se connecté!
        $Uname = strip_tags($_POST['userName']);
        $Upasse = strip_tags($_POST['userPassword']);

        // vérifie si l'utilisateur existe
        $data_verif = $bdd->prepare("SELECT * FROM users WHERE userName = ?");
        $data_verif->execute(array($Uname));

        if ($data_verif->rowcount() > 0) {

            // on vérifie si les mot de passe rentrer par l'utilisateur correspond avec ceux de la database
            $Uinfos = $data_verif->fetch();
            if (password_verify($Upasse, $Uinfos['userPassword'])) {

                //ON AUTHENTIFIE L'UTILISATEUR SUR LE SITE ET RECUPERER LES DONNEES DANS DES SUPERGLOBALE SESSION
                $_SESSION['valide'] = true;
                $_SESSION['id'] = $Uinfos['id'];
                $_SESSION['userName'] = $Uinfos['userName'];
                //on redirige l'utilisateur vers la page d'acceuil
                header("Location: index.php");
            } else {
                $errorMsg = "Mot de passe incorrect!";
            }
        } else {
            $errorMsg = "Nom d'utilisateur incorrect!";
        }
    }
}
