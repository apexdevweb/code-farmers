<?php
if (isset($_POST['signup'])) {

    if (!empty($_POST['userName']) && !empty($_POST['userPassword'])) {

        $Uname = strip_tags($_POST['userName']);
        $Upasse = $_POST['userPassword'];
        $Xtreme_cryptage = password_hash($Upasse, PASSWORD_ARGON2ID);

        $data_verif = $bdd->prepare("SELECT userName FROM users WHERE userName = ?");
        $data_verif->execute(array($Uname));

        if ($data_verif->rowcount() == 0) {
            $user_insert = $bdd->prepare("INSERT INTO users (userName,userPassword) VALUES (?,?)");
            $user_insert->execute(array($Uname, $Upasse));
        } else {
            $errorMsg = "Se compte éxiste déjà!";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoire!";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<?php
include "includes/head.php"
?>

<body>
    <?php
    include "includes/navbar.php"
    ?>


    <form method="post">

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
            <input type="password" class="form-control" name="userPasword">
        </div>
        <button type="submit" class="btn btn-primary" name="signup">Inscription</button>
    </form>

</body>

</html>