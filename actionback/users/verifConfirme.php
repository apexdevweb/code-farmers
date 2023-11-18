<?php
require("../database.php");
var_dump($_GET);
///////////////////////////PREMIERE METHODE///////////////////////////////////////////////////////////////
if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['confirmkey']) && !empty($_GET['id'])) {
    $get_id = $_GET['id'];
    $get_cle = $_GET['confirmkey'];

    $verif_user = $bdd->prepare("SELECT * FROM users WHERE `id` = ? AND confirmkey = ?");
    $verif_user->execute(array($get_id,  $get_cle));
    if ($verif_user->rowCount() > 0) {
        $verif_user_info = $verif_user->fetch();
        if ($verif_user_info['confirm']) {
            # code...
        }
    } else {
        echo "Votre clé ou identifiant est incorrecte";
    }
} else {
    echo "l'utilisateur n'existe pas !";
}

///////////////////////////SECONDE METHODE///////////////////////////////////////////////////////////////
//if (isset($_GET['userName'], $_GET['confirmkey']) && !empty($_GET['userName']) && !empty($_GET['confirmkey'])) {
//    //on decode l'url avec un url decode
//    $Uname = strip_tags(urldecode($_GET['userName']));
//    $confirmkey = strip_tags($_GET['confirmkey']);
//
//    $verif_user = $bdd->prepare("SELECT * FROM users WHERE userName = ? AND confirmkey = ?");
//    $verif_user->execute(array($Uname, $confirmkey));
//
//    if ($verif_user->rowCount() == 1) {
//        $user_wait_confirm = $verif_user->fetch();
//        if ($user_wait_confirm['confirm'] == 0) {
//            $update_confirm = $bdd->prepare("UPDATE users SET confirm = 1 WHERE userName = ? AND confirmkey = ?");
//            $update_confirm->execute(array($Uname, $confirmkey));
//            echo "Votre compte a biens été validé";
//            header('Location: login.php');
//        } else {
//            echo "compte déjà confirmer !";
//        }
//    } else {
//        echo "l'utilisateur n'existe pas !";
//    }
//}
//