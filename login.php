<?php
require("actionback/users/loginScript.php");
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
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include "includes/head.php";
?>

<body>
    <div class="container">
        <br>
        <img src="asset/wallpapper/Logo2.png" style="width: 99%; height: auto;">
        <br>
        <br>
        <a href="index.php" class="btnRetour"><i class="fa-solid fa-arrow-left"></i> Retour</a>
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
                <input type="password" class="form-control" name="UPassword">
            </div>
            <button type="submit" class="btn btn-primary" name="connexion">Connection</button>
        </form>
        <br>
        <a href="signup.php" class="btnRetour">Je n'ai pas encore de compte, je m'inscris <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</body>

</html>