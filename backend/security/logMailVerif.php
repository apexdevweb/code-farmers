<?php
if (isset($_POST['connexion'])) {
    if (!empty($_POST['mail']) && !empty($_POST['Upassword'])) {
        // ON RECUPERE LES INFO DE L'UTILISATEUR POUR LA CONFIRMATION PAR EMAIL
        $verifRecupUser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND userPassword");
        $verifRecupUser->execute(array($_POST['mail'], $_POST['Upassword']));
        if ($verifRecupUser->rowCount() > 0) {
            $verifUserInfos = $verifRecupUser->fetch();
            if ($verifUserInfos['confirm'] == 1 && $_POST['Upassword'] == $verifUserInfos['userPassword']) {
                header('Location: actionback/users/verifConfirme.php?id=' . $verifUserInfos['id'] . '&confirmkey=' . $verifUserInfos['confirmkey']);
            } else {
                echo "Vous n'êtes pas encore confirmé sur le site";
            }
        } else {
            echo "L'utilisateur n'existe pas!";
        }
    } else {
        echo "Aucun e-mail à été saisi!";
    }
}
