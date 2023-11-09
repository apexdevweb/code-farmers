<?php
require('actionback/database.php');
//ON VERIFIE LA METHODE GET EST EXISTANTE ET QUE LE CHAMPS EST REMPLI
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $user_select_id = $_GET['id'];
    //ON VERIFIE QUE LE PROFIL EXISTE
    $userSelect = $bdd->prepare("SELECT * FROM users WHERE `id` = ?");
    $userSelect->execute(array($user_select_id));

    if ($userSelect->rowCount() > 0) {
        //ON RECUPERE TOUTE LA DATA DU PROFIL
        $userSelectInfo = $userSelect->fetch();
        //ON PLACE LA DATA RECUPERE DANS DES VARIABLES
        $user_name_select =  $userSelectInfo['userName'];
        $user_avatar_select =  $userSelectInfo['avatar'];
        $user_age_select = $userSelectInfo['date_naissance'];
        $user_genre_select = $userSelectInfo['genre'];
        $user_city_select = $userSelectInfo['ville'];
        $user_skill_select = $userSelectInfo['skill'];
        $user_tube_select = $userSelectInfo['youtube'];
        $user_lien_select = $userSelectInfo['lien_web'];
    } else {
        $errorMsg = "Aucun utilisateur a été trouver";
    }
} else {
    $errorMsg = "Aucune compte a été trouver";
}
