<?php
session_start();
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
    ?>
    <div class="titre_contenu">
        <h1>Code-Farmers</h1>
    </div>
    <br>
    <section>
        <div class="container">
            <form method="GET">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="search" name="chercher" class="form-control" id="look">
                    <button type="submit" class="btn btn-primary" name="valideRch" onclick="crypt()">Rechercher</button>
                </div>
                <br>
                <br>
                <div class="container_recherche">
                    <?php
                    //on fais une boucle while avec un fetch() pour récupéré les données dans un tableaux
                    while ($publi = $affiche_publiSearch->fetch()) {
                    ?>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $publi['titre'] ?></h5>
                                <hr>
                                <p class="card-text"><?= $publi['contenu'] ?></p>
                                <hr>
                                <h6 class="card-subtitle mb-2 text-body-secondary"><?= $publi['date_publication'] ?> <?= $publi['nom_auteur'] ?></h6>
                                <button type="button" class="btn btn-info"><a href="article.php?id=<?= $publi['id']; ?>">Voir</a></button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </section>
</body>

</html>