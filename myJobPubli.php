<?php
require('backend/security/securityScript.php');
require("backend/script/proPublications/myJobPubliScript.php");
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
    <?php
    if (isset($_SESSION['pro_Auth'])) {
        include("include/agencyPannel.php");
    }
    ?>
    <br>
    <div class="myPubli_contain">
        <?php
        while ($my_publi_job = $my_job_rescu->fetch()) {
        ?>
            <br>
            <div class="card" style="width: 17rem; height: auto; background:none;">
                <div class="card-body">
                    <h5 class="card-title" style="color:#444;"><?= $my_publi_job['job_title'] ?></h5>
                    <br>
                    <hr>
                    <br>
                    <p class="card-text"><?= $my_publi_job['job_description'] ?></p>
                    <br>
                    <hr>
                    <br>
                    <h6 class="card-subtitle mb-2 text-body-secondary" style="color:#fff;"><?= $my_publi_job['job_location'] ?> <?= $my_publi_job['job_offer_author'] ?></h6>
                    <!--on récupère dans le lien l'id de la publication afin d'acceder à la publication de l'utilisateur qui l'a creer: php?id=...  -->
                    <div class="action__container">
                        <a href="articleJob.php?id=<?= $my_publi_job['id_recruitment'] ?>" class="card-link">Voir</a>
                        <a href="editeurPublication.php?id=<?= $my_publi_job['id_recruitment'] ?>" class="card-link">Modifier</a>
                        <a href="backend/script/publications/supprimPubliScript.php?id=<?= $my_publi_job['id_recruitment'] ?>" class="card-link">Supprimer</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</body>

</html>