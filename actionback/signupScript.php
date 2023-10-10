<?php
require("actionback/database.php");

if (isset($_POST['signup'])) {

    if (!empty($_POST['userName']) && !empty($_POST['userPassword'])) {

        $Uname = strip_tags($_POST['userName']);
        $Upasse = password_hash($_POST['userPassword'], PASSWORD_ARGON2ID);

        $data_verif = $bdd->prepare("SELECT userName FROM users WHERE userName = ?");
        $data_verif->execute(array($Uname));

        if ($data_verif->rowcount() == 0) {
            $user_insert = $bdd->prepare("INSERT INTO users (userName,userPassword) VALUES (?,?)");
            $user_insert->execute(array($Uname, $Upasse));
        } else {
            $errorMsg = "Se compte éxiste déjà!";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoire!";
    }
}
