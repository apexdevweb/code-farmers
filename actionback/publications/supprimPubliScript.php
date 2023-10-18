<?php
//ON PLACE UN SESSION_START() VU QUE LE FICHIER N'EST PAS RELIE A UN AUTRE QUI CONTIEN DEJA 
//CELUI CI
session_start();
if (isset($_SESSION['valideAuth'])) {
    header('Location: ../../login.php');
}


require('../database.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id_publi = $_GET['id'];

    $verifPubliExist = $bdd->prepare("SELECT id_auteur FROM publications WHERE `id` = ?");
    $verifPubliExist->execute(array($id_publi));

    if ($verifPubliExist->rowCount() > 0) {

        $info_user = $verifPubliExist->fetch();

        if ($info_user['id_auteur'] == $_SESSION['id']) {

            $supr_publi = $bdd->prepare("DELETE FROM publications WHERE `id` = ?");
            $supr_publi->execute(array($id_publi));
            echo "Publications supprimer!";

            header('Location: ../../maPublication.php');
        } else {
            echo "Vous n'avez pas l'autorisation de supprimer une publication qui ne vous appartient pas!";
        }
    } else {
        echo "La publication n'éxiste pas";
    }
} else {
    echo "Aucune publication trouvée";
}
