<?php
require("actionback/publications/editeurPubliScript.php");
require('actionback/users/securityScript.php');
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include "includes/head.php";
?>

<body>
    <?php
    include "includes/navbar.php";
    if (isset($errorMsg,)) {
        echo "<p>" . $errorMsg . "</p>";
    } elseif (isset($successMsg)) {
        echo "<p>" . $successMsg . "</p>";
    }
    ?>
    <?php
    if (isset($publication_date)) {
    ?>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Modifier le Titre de la publication</label>
                <input type="text" class="form-control" name="titlePubli">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Modifier le Contenu de la publication</label>
                <textarea class="form-control" name="containPubli"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="publish">Modifier la publication</button>
        </form>
    <?php
    }
    ?>





</body>

</html>