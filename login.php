<?php
require("actionback/users/loginScript.php");
//if (isset($_POST['connexion'])) {
//    if (!empty($_POST['mail'])) {
//        // ON RECUPERE LES INFO DE L'UTILISATEUR POUR LA CONFIRMATION PAR EMAIL
//
//        $verifRecupUser = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
//        $verifRecupUser->execute(array($_POST['mail']));
//
//        if ($verifRecupUser->rowCount() > 0) {
//            $verifUserInfos = $verifRecupUser->fetch();
//            if ($verifUserInfos['confirm'] == 1) {
//                header('Location: actionback/users/verifConfirm.php?id=' . $verifUserInfos['id'] . '&confirmkey' . $verifUserInfos['confirmkey']);
//            } else {
//                echo "Vous n'êtes pas encore confirmé sur le site";
//            }
//        } else {
//            echo "L'utilisateur n'existe pas!";
//        }
//    } else {
//        echo "Aucun e-mail à été saisi!";
//    }
//}
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include "includes/head.php";
?>

<body>
    <div class="container">
        <br>
        <a href="index.php"><i class="fa-solid fa-arrow-left"></i>Retour</a>
        <br>
        <br>
        <form method="POST">

            <?php
            if (isset($errorMsg)) {
                echo "<p>" . $errorMsg . "</p>";
            }
            ?>
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="mail" placeholder="E-mail">
                <span class="input-group-text">@example.com</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="userPassword">
            </div>
            <button type="submit" class="btn btn-primary" name="connexion">Connection</button>
        </form>
        <br>
        <a href="signup.php">Je n'ai pas encore de compte, je m'inscris<i class="fa-solid fa-arrow-right"></i></a>
    </div>
</body>

</html>