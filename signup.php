<?php
require "actionback/users/signupScript.php";
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
            <div class="mb-3">
                <label for="userName" class="form-label">User-name</label>
                <input type="text" class="form-control" name="userName">
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="mail" placeholder="E-mail">
                <span class="input-group-text">@example.com</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="userPassword">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirme password</label>
                <input type="password" class="form-control" name="confirmPassword">
            </div>
            <label for="city" class="form-label">Choisir une province</label>
            <select class="form-select form-select-sm" name="city">
                <option selected>...</option>
                <option value="1">Anvers</option>
                <option value="2">Limbourg</option>
                <option value="3">Flandre orientale</option>
                <option value="3">Brabant famand</option>
                <option value="3">Flandre occidenal</option>
                <option value="3">Bruxelles</option>
                <option value="3">Namure</option>
                <option value="3">Brabant wallon</option>
                <option value="3">Hainaut</option>
            </select>
            <br>
            <div class="container_downform">
                <label for="dateNaissance" class=" form-label">Votre date de naissance</label>
                <input type="date" name="dateNaissance">
                <br>
                <label for="Homme" class=" form-label">Votre genre</label>
                <div class="subcontainer_downform">
                    <label for="dateNaissance" class=" form-label">Homme</label>
                    <input type="radio" name="Homme">
                    <label for="dateNaissance" class=" form-label">Femme</label>
                    <input type="radio" name="Femme">
                    <label for="Extraterrestre" class=" form-label">Extraterrestre</label>
                    <input type="radio" name="Extraterrestre">
                </div>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary" name="signup">Inscription</button>
        </form>
        <br>
        <a href="login.php">J'ai déjà un compte, je me connecte<i class="fa-solid fa-arrow-right"></i></a>
    </div>

</body>

</html>