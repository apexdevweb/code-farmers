<?php
require_once("backend/connection/connexionDB.php");
// require("backend/security/logMailVerif.php");
require("backend/class/proClass.php");

// ON VERIFIE SI LE FORMULAIRE EST VALIDE
if (isset($_POST['connexion'])) {

    // ON VERIFIE QUE SI LES CHAMPS NE SONT PAS VIDE

    if (!empty($_POST['mail']) && !empty($_POST['UPassword'])) {

        // les données de l'utilisateur qui souhaite se connecté!
        $pro_mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $pro_passe = strip_tags($_POST['UPassword']);

        // vérifie si l'utilisateur existe
        $data_pro_verif = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $data_pro_verif->execute(array($pro_mail));

        if ($data_pro_verif->rowCount() > 0) {

            // on vérifie si les mot de passe rentrer par l'utilisateur correspond avec ceux de la database
            $pro_infos = $data_verif->fetch();
            $passhash = $pro_infos['userPassword'];
            if (password_verify($pro_passe, $passhash)) {


                $administrator = new Professionel(
                    $pro_infos['admin_id'],
                    $pro_infos['admin_name'],
                    $pro_infos['admin_mail'],
                    $pro_infos['admin_password'],
                );
                $_SESSION["cpgnyAuth"] = true;
                $_SESSION['cpgnydata'] = [
                    // "adm_id" => $administrator->get_id_admin(),
                    // "adm_name" => $administrator->get_name_admin(),
                    // "adm_mail" => $administrator->get_mail_admin(),
                    // "adm_pass" => $administrator->get_pass_admin(),
                ];

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
