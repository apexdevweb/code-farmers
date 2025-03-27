<?php
require_once("backend/connection/connexionDB.php");
// require("backend/security/logMailVerif.php");
require("backend/class/proClass.php");

// ON VERIFIE SI LE FORMULAIRE EST VALIDE
if (isset($_POST['connexion'])) {

    // ON VERIFIE QUE SI LES CHAMPS NE SONT PAS VIDE

    if (!empty($_POST['mail']) && !empty($_POST['UPassword'])) {

        // les données de l'agence qui souhaite se connecté!
        $pro_mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $pro_passe = strip_tags($_POST['UPassword']);

        // vérifie si l'agence existe
        $data_pro_verif = $bdd->prepare("SELECT * FROM enterprise WHERE enterprise_mail = ?");
        $data_pro_verif->execute(array($pro_mail));

        if ($data_pro_verif->rowCount() > 0) {

            // on vérifie si les mot de passe rentrer par l'agence correspond avec ceux de la database
            $pro_infos = $data_pro_verif->fetch();
            $passhash = $pro_infos['enterprise_password'];
            if (password_verify($pro_passe, $passhash)) {

                $procpgny = new Professionel(
                    $pro_infos['id_enterprise'],
                    $pro_infos['enterprise_name'],
                    $pro_infos['enterprise_mail'],
                    $pro_infos['enterprise_number'],
                    $pro_infos['enterprise_description'],
                    $pro_infos['enterprise_banner'],
                    $pro_infos['enterprise_location'],
                    new DateTime($pro_infos['date_inscription']),
                );
                $_SESSION["pro_Auth"] = true;
                $_SESSION['pro_data'] = [
                    "pro_id" => $procpgny->getProId(),
                    "pro_name" => $procpgny->getProName(),
                    "pro_mail" => $procpgny->getProMail(),
                    "pro_number" => $procpgny->getProNumber(),
                    "pro_descript" => $procpgny->getProDescript(),
                    "pro_banner" => $procpgny->getProBanner(),
                    "pro_location" => $procpgny->getProLocation(),
                    "pro_insc" => $procpgny->getProInsc()->format('Y-m-d'),
                ];

                header("Location: home.php");
                exit;
                //on redirige l'utilisateur vers la page d'acceuil
            } else {
                $errorMsg = "Mot de passe incorrect!";
            }
        } else {
            $errorMsg = "Email de l'entreprise incorrect!";
        }
    }
}
