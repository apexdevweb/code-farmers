<?php
require("actionback/database.php");
//RECUPERATION DES UTILISATEUR

$user4tchat = $bdd->prepare("SELECT * FROM `users` WHERE `id`");
$user4tchat->execute(array());

/////////////////////////////////////////////////////////////////////////////////////////////
//TRAITEMENT DE LA MESSAGERIE
if (isset($_POST['envoi_pv'])) {
    if (isset($_POST['msg_pv']) && !empty($_POST['msg_pv'])) {

        $message = strip_tags($_POST['msg_pv']);
        $message_date = date('Y-m-d');

        $insMsg = $bdd->prepare("INSERT INTO `msgprive`(`message`, `id_destinataire`, `id_expediteur`, `msg_date`) VALUES (?,?,?,?)");
        $insMsg->execute(array($message, $_GET['id'], $_SESSION['id'], $message_date));
    } else {
        echo "Aucun message trouvé";
    }
} else {
    $errormsg = "vous n'avez pas encore envoyer votre message";
}
/////////////////////////////////////////////////////////////////////////////////////////////
