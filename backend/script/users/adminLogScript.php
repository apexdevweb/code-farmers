<?php
require_once("backend/connection/connexionDB.php");
require("backend/class/adminClass.php");
if (isset($_POST['connexion'])) {

    if (!empty($_POST['mail']) && !empty($_POST['UPassword'])) {
        try {
            $admin_mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
            $admin_passe = htmlspecialchars(strip_tags($_POST['UPassword']));

            $admin_data_verif = $bdd->prepare("SELECT * FROM `admin` WHERE admin_mail = ?");
            $admin_data_verif->execute(array($admin_mail));

            if ($admin_data_verif->rowCount() > 0) {

                $admin_infos = $admin_data_verif->fetch();
                $admin_pass_db = $admin_infos['admin_password'];
                //↓↓Ne pas oublier de changer et de crypté le mot de pass administrateur après les tests↓↓ 
                if ($admin_passe === $admin_pass_db) {

                    $administrator = new Administrateur(
                        $admin_infos['admin_name'],
                        $admin_infos['admin_mail'],
                        $admin_infos['admin_password'],
                    );
                    $_SESSION["adminAuth"] = true;
                    $_SESSION['data'] = [
                        "adm_name" => $administrator->get_name_admin(),
                        "adm_mail" => $administrator->get_mail_admin(),
                        "adm_pass" => $administrator->get_pass_admin(),
                    ];

                    header("Location: home.php");
                    exit;
                } else {
                    $errorMsg = "Mot de passe incorrect!";
                }
            } else {
                $errorMsg = "Nom d'utilisateur incorrect!";
            }
        } catch (PDOException $e) {
            die("Admin login error" . $e->getMessage());
        }
    }
}
