<?php
require("actionback/database.php");
/////////////////////////////////////////////////////////////////////////////////////////////
//TRAITEMENT DE LA MESSAGERIE
if (isset($_POST['envoi_pv'])) {
    if (isset($_POST['msg_pv']) && !empty($_POST['msg_pv'])) {
        $getid = $_GET['id'];
        $session = $_SESSION['id'];
        $message = strip_tags($_POST['msg_pv']);
        $message_date = date('Y-m-d H:i:s');
        $insMsg = $bdd->prepare("INSERT INTO `msgprive`(`message`, `id_destinataire`, `id_expediteur`, `msg_date`) VALUES (?,?,?,?)");
        $insMsg->execute(array($message, $getid, $session, $message_date));
    } else {
        echo "Aucun message trouvé";
    }
} else {
    $errormsg = "vous n'avez pas encore envoyer votre message";
}
/////////////////////////////////////////////////////////////////////////////////////////////
