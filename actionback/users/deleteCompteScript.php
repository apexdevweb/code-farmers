<?php
session_start();
require("../database.php");
if (!isset($_SESSION['valideAuth'])) {
    header('Location: ../../login.php');
}
var_dump($_GET);
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $dlt_id = $_GET['id'];
    $verifDelete_user = $bdd->prepare("SELECT * FROM users WHERE `id` = ?");
    $verifDelete_user->execute(array($dlt_id));

    if ($verifDelete_user->rowCount() > 0) {

        $dlt_info = $verifDelete_user->fetch();

        if ($dlt_info['id'] == $_SESSION['id']) {

            $Delete_user = $bdd->prepare("DELETE FROM users WHERE `id` = ?");
            $Delete_user->execute(array($dlt_id));
            header('Location: ../../index.php');
        } else {
            echo "Vous ne pouvez pas supprimer un compte qui ne vous appartient pas!";
        }
    } else {
        echo "Le compte n'éxiste pas";
    }
} else {
    echo "Aucune utilisateur trouvé";
}
