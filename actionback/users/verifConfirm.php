<?php
session_start();
require("../database.php");

if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['confirmkey']) && !empty($_GET['id'])) {

    $getId = $_GET['id'];
    $getKey = $_GET['confirmkey'];
    $recupInfoUser = $bdd->prepare("SELECT * FROM users WHERE `id` = ? AND confirmkey = ?");
    $recupInfoUser->execute(array($getId, $getKey));

    if ($recupInfoUser->rowCount() > 0) {
        $userCRFinfo = $recupInfoUser->fetch();
        if ($userCRFinfo['confirm'] != 1) {
            $Upconfirm = $bdd->prepare('UPDATE users SET confirm = ? WHERE id = ?');
            $Upconfirm->execute(array(1, $getId));
            $_SESSION['confirmkey'] = $getKey;
            header('Location: index.php');
        } else {
            $_SESSION['confirmkey'] = $getKey;
            header('Location: index.php');
        }
    } else {
        echo "identifiant ou Clé incorrecte";
    }
} else {
    echo "Aucun utilisateur trouver";
}
