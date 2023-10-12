<?php
require "actionback/signupScript.php";
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include "includes/head.php";
?>

<body>
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
        <button type="submit" class="btn btn-primary" name="signup">Inscription</button>
        <br>
        <a href="login.php">
            <p>J'ai déjà un compte, je me connecte</p>
        </a>
    </form>

</body>

</html>