<?php
require('actionback/users/securityScript.php');
require("actionback/publications/editeurInfoPubliScript.php");
require("actionback/publications/updatePubliScript.php");
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include "includes/head.php";
?>

<body>
    <?php
    include "includes/navbar.php";
    ?>
    <div class="container">
        <?php
        if (isset($errorMsg,)) {
            echo "<p>" . $errorMsg . "</p>";
        }
        ?>
        <?php
        if (isset($publication_auteur)) {
        ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"> Modifier le Titre de la publication</label>
                    <input type="text" class="form-control" name="titlePubli" value="<?= $publication_titre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Modifier le Contenu de la publication</label>
                    <textarea class="form-control" name="containPubli"><?= $publication_contenu ?></textarea>
                </div>
                <h6>Par: <?= $publication_auteur ?></h6>
                <button type="submit" class="btn btn-primary" name="modifpubli">Enregistré la modification</button>
            </form>
        <?php
        }
        ?>


    </div>
</body>

</html>