<?php
require('actionback/users/securityScript.php');
require("actionback/publications/publicationScript.php");
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("includes/head.php");
?>

<body>
    <?php
    include("includes/navbar.php");
    ?>
    <br>
    <?php
    include("includes/userpanel.php");
    ?>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <?php
            if (isset($errorMsg,)) {
                echo "<p>" . $errorMsg . "</p>";
            } elseif (isset($successMsg)) {
                echo "<p>" . $successMsg . "</p>";
            }
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de la publication</label>
                <input type="text" class="form-control" name="titlePubli" maxlength="25" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contenu de la publication</label>
                <textarea class="form-control" name="containPubli" required></textarea>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <label class="input-group-text">Publier un fichier</label>
                    <input type="file" class="form-control" name="publiImg">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="publish">Publier</button>
        </form>
    </div>
</body>

</html>