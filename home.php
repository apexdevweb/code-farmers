<?php
session_start();
//if (!$_SESSION['confirmkey']) {
//    header('Location: login.php');
//}
require('actionback/publications/affichepubliScript.php');
require('actionback/publications/afficheRecherche.php');
?>

<!DOCTYPE html>
<html lang="fr">

<?php
include("includes/head.php");
?>

<body>
    <?php
    include("includes/navbar.php");
    include("includes/logo.php");
    ?>
    <hr>
    <?php
    include("includes/slider.php");
    include("includes/primaryBande.php");
    ?>
    <br>
    <br>
    <!-- on fait un foreach en php pour afficher toutes les publications enregistré dans la database -->
    <section class="contenu_secondaire">
        <?php
        foreach ($affiche_publi as $afp) {
        ?>
            <div class="card" style="width: 17rem; height: 20rem; margin-top: 10px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $afp['titre'] ?></h5>
                    <hr>
                    <p class="card-text"><?= $afp['contenu'] ?></p>
                    <hr>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $afp['date_publication'] ?> <?= $afp['nom_auteur'] ?></h6>
                    <!--pour avoir accès a la publications en commun avec la database on place un liens avec : ?id=...et le code php qui suit-->
                    <button type="button" class="btn btn-info"><a href="article.php?id=<?= $afp['id']; ?>">Voir</a></button>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</body>

</html>