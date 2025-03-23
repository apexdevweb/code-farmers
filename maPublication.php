<?php
require('backend/security/securityScript.php');
require("backend/script/publications/mesPublicationScript.php");
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
    include("include/userpanel.php");
    ?>
    <br>
    <div class="myPubli_contain">
        <?php
        while ($publication = $publi_rescu->fetch()) {
        ?>
            <br>
            <div class="card" style="width: 17rem; height: auto; background:none;">
                <div class="card-body">
                    <h5 class="card-title" style="color:#444;"><?= $publication['titre'] ?></h5>
                    <br>
                    <hr>
                    <br>
                    <p class="card-text"><?= $publication['contenu'] ?></p>
                    <br>
                    <hr>
                    <br>
                    <h6 class="card-subtitle mb-2 text-body-secondary" style="color:#fff;"><?= $publication['date_publication'] ?> <?= $publication['nom_auteur'] ?></h6>
                    <!--on récupère dans le lien l'id de la publication afin d'acceder à la publication de l'utilisateur qui l'a creer: php?id=...  -->
                    <div class="action__container">
                        <a href="article.php?id=<?= $publication['id'] ?>" class="card-link">Voir</a>
                        <a href="editeurPublication.php?id=<?= $publication['id'] ?>" class="card-link">Modifier</a>
                        <a href="backend/script/publications/supprimPubliScript.php?id=<?= $publication['id'] ?>" class="card-link">Supprimer</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</body>

</html>