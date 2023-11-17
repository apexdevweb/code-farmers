<?php
require("actionback/database.php");

if (isset($_GET['userName'], $_GET['confirmkey']) && !empty($_GET['userName']) && !empty($_GET['confirmkey'])) {
    //on decode l'url avec un url decode
    $Uname = strip_tags(urldecode($_GET['userName']));
    $confirmkey = strip_tags($_GET['confirmkey']);

    $verif_user = $bdd->prepare("SELECT * FROM users WHERE userName = ? AND confirmkey = ?");
    $verif_user->execute(array($Uname, $confirmkey));


    if ($verif_user->rowCount() == 1) {
        $user_wait_confirm = $verif_user->fetch();
        if ($user_wait_confirm['confirm'] == 0) {
            $update_confirm = $bdd->prepare("UPDATE users SET confirm = 1 WHERE userName = ? AND confirmkey = ?");
            $update_confirm->execute(array($Uname, $confirmkey));
            echo "Votre compte a biens été validé";
        } else {
            echo "compte déjà confirmer !";
        }
    } else {
        echo "l'utilisateur n'existe pas !";
    }
}
