<?php
require('actionback/users/securityScript.php');
require("actionback/publications/mesPublicationScript.php");
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
    <br>
    <br>
    <?php
    while ($publication = $publi_rescu->fetch()) {
    ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $publication['titre'] ?></h5>
                <hr>
                <p class="card-text"><?= $publication['contenu'] ?></p>
                <hr>
                <h6 class="card-subtitle mb-2 text-body-secondary"><?= $publication['date_publication'] ?> <?= $publication['nom_auteur'] ?></h6>
                <!--on récupère dans le lien l'id de la publication afin d'acceder à la publication de l'utilisateur qui l'a creer: php?id=...  -->
                <a href="article.php?id=<?= $publication['id'] ?>" class="card-link">Voir</a>
                <a href="editeurPublication.php?id=<?= $publication['id'] ?>" class="card-link">Modifier</a>
                <a href="actionback/publications/supprimPubliScript.php?id=<?= $publication['id'] ?>" class="card-link">Supprimer</a>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>