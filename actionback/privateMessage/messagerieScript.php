<?php
require("actionback/database.php");

// ON RECUPERE LES MEMBRE INSCRIT DANS LA TABLE USERS POUR LES AFFICHER SUR LES SITE
$reqMessage_users = $bdd->query("SELECT * FROM users ORDER BY `id` DESC");


if (isset($_GET['id']) && !empty($_GET['id'])) {

    $messGetId = $_GET['id'];
    $recupUser = $bdd->prepare("SELECT * FROM users WHERE `id` = ?");
    $recupUser->execute(array($messGetId));

    if ($recupUser->rowCount() > 0) {

        if (isset($_POST['envoyer'])) {

            $message = strip_tags($_POST['messagePV']);
            $maSession = $_SESSION['id'];

            $insertMessage = $bdd->prepare("INSERT INTO msgprive(`message`, `id_destinataire`, `id_expediteur`) VALUES ('?,?,?')");
            $insertMessage->execute(array($message, $messGetId, $maSession));
        } else {
            echo "aucun message n'as été trouvé";
        }
    } else {
        echo "aucun utilisateur trouvé";
    }
} else {
    echo "aucun identifiant a été trouvé";
}
