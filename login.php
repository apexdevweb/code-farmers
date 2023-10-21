<?php
require("actionback/users/loginScript.php");
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
                <label for="exampleInputEmail1" class="form-label">User-name</label>
                <input type="text" class="form-control" name="userName">
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