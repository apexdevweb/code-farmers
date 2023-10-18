<?php
session_start();
require('actionback/publications/afficheRecherche.php');
require('actionback/publications/affichepubliScript.php');
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
    <div class="titre_contenu">
        <h1>Code-Farmer</h1>
    </div>
    <br>
    <section>
        <div class="container">
            <form method="GET">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="search" name="chercher" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Rechercher</button>
                <?php
                $search = $_GET['chercher'];
                var_dump($search);
                ?>
            </form>
        </div>

    </section>
    <!-- on fait un foreach en php pour afficher tout les utilisateur enregistré dans la database -->
    <section class="contenu_secondaire">
        <?php
        foreach ($affiche_publi as $afp) {
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $afp['titre'] ?></h5>
                    <hr>
                    <p class="card-text"><?= $afp['contenu'] ?></p>
                    <hr>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $afp['date_publication'] ?> <?= $afp['nom_auteur'] ?></h6>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</body>

</html>