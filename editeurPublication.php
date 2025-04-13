<?php
require('backend/security/securityScript.php');
require("backend/script/publications/editeurInfoPubliScript.php");
require("backend/script/publications/updatePubliScript.php");
require("backend/script/proPublications/editeurJobPubliScript.php");
require("backend/script/proPublications/updateJobPubliScript.php");
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("include/head.php");
?>

<body>
    <header>
        <?php
        include("include/logo.php");
        include("include/nav.php");
        ?>
    </header>
    <br>
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
        } elseif (isset($publi_job_auteur)) {
        ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"> Modifier le Titre de l'offre</label>
                    <input type="text" class="form-control" name="titlePubliJob" value="<?= $publi_job_titre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Modifier le Contenu de l'offre</label>
                    <textarea class="form-control" name="containPubliJob"><?= $publi_job_contenu ?></textarea>
                </div>
                <h6>Par: <?= $publi_job_auteur ?></h6>
                <button type="submit" class="btn btn-primary" name="modifjob">Enregistré la modification</button>
            </form>
        <?php
        }
        ?>


    </div>
</body>

</html>