<?php
if (isset($_POST['signup'])) {
    if (!empty($_POST['userName']) && !empty($_POST['userPassword'])) {
        # code...
    } else {
        $errorMsg = "Vous devez remplir tous les champs!";
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