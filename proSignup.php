<?php
require("backend/script/users/proSignupScript.php");
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
            <div class="mb-3">
                <label for="userName" class="form-label">Company name</label>
                <input type="text" class="form-control" name="compagnyName" required>
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="compagnyMail" placeholder="E-mail" required>
                <span class="input-group-text">@example.com</span>
            </div>
            <div class="mb-3">
                <label for="userName" class="form-label">Company number identification</label>
                <input type="text" class="form-control" name="compagnyNumber" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="compagnyPassword" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirme password</label>
                <input type="password" class="form-control" name="confirmPassword" required>
            </div>
            <label for="city" class="form-label">Compagny location</label>
            <select class="form-select form-select-sm" name="city" required>
                <option selected>...</option>
                <option value="Anvers">Anvers</option>
                <option value="Limbourg">Limbourg</option>
                <option value="Flandre orientale">Flandre orientale</option>
                <option value="Brabant famand">Brabant famand</option>
                <option value="Flandre occidenal">Flandre occidenal</option>
                <option value="Bruxelles">Bruxelles</option>
                <option value="Namur">Namur</option>
                <option value="Brabant wallon">Brabant wallon</option>
                <option value="Hainaut">Hainaut</option>
                <option value="Luxembourg">Luxembourg</option>
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-primary" name="compagnySignup">Inscription</button>
        </form>
        <br>
        <a href="login.php" class="btnRetour">Login <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</body>

</html>