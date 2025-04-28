<?php
require_once('backend/connection/connexionDB.php');
//ON VERIFIE LA METHODE GET EST EXISTANTE ET QUE LE CHAMPS EST REMPLI
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $cpgny_select_id = (int) $_GET['id'];
    //ON VERIFIE QUE LE PROFIL EXISTE
    $cpgnySelect = $bdd->prepare("SELECT * FROM enterprise WHERE id_enterprise = ?");
    $cpgnySelect->execute(array($cpgny_select_id));

    if ($cpgnySelect->rowCount() > 0) {
        //ON RECUPERE TOUTE LA DATA DU PROFIL
        $cpgnySelectInfo = $cpgnySelect->fetch();
        //ON PLACE LA DATA RECUPERE DANS DES VARIABLES
        $cpgny_name_select =  $cpgnySelectInfo['enterprise_name'];
        $cpgny_mail_select =  $cpgnySelectInfo['enterprise_mail'];
        $cpgny_number_select =  $cpgnySelectInfo['enterprise_number'];
        $cpgny_avatar_select =  $cpgnySelectInfo['enterprise_banner'];
        $cpgny_descript_select =  $cpgnySelectInfo['enterprise_description'];
        $cpgny_link_select =  $cpgnySelectInfo['enterprise_link'];
        $cpgny_city_select = $cpgnySelectInfo['enterprise_location'];
    } else {
        $errorMsg = "Aucun utilisateur a été trouver";
    }
} else {
    $errorMsg = "Aucune compte a été trouver";
}
