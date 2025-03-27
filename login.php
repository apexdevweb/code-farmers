<?php
session_start();
require("backend/script/users/loginScript.php");
require("backend/script/users/proLogScript.php");
require("backend/script/users/adminLogScript.php");
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("include/head.php");
?>

<body>
    <div class="container">
        <br>
        <img src="assets/images/Logo2.png" style="width: 99%; height: auto;">
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
        <a href="signupOption.php" class="btnRetour">Signup <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</body>

</html>