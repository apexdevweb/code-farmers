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
    include("includes/logo.php");
    include("includes/navbar.php");
    ?>
    <br>
    <?php
    include("includes/userpanel.php");
    ?>
    <br>
    <section>
        <div class="container">
            <form method="GET">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="search" name="chercher" class="form-control">
                    <button type="submit" class="btn btn-primary" name="valideRch">Rechercher</button>
                </div>
                <br>
                <br>
                <div class="container_recherche">
                    <?php
                    //on fais une boucle while avec un fetch() pour récupéré les données dans un tableaux
                    while ($publi = $affiche_publiSearch->fetch()) {
                    ?>
                        <div class="responsive_carte">
                            <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px;background: url('asset/wallpapper/symbolehtml.jpg') no-repeat 50% 57%;background-size: cover;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #fff; backdrop-filter: blur(3px);  text-shadow: 1px 2px 5px #000; font-size: 1.5rem; backdrop-filter: blur(2px);"><?= $publi['titre'] ?></h5>
                                    <div style="color: #fff; border:1px solid #fff; box-shadow: 1px 2px 5px #000; border-radius:5px;"></div>
                                    <br>
                                    <img src="asset/publimage/<?= $publi['img_publication']; ?>" style="width: 100%; height: 7rem; border-radius:5px;">
                                    <h6 class="card-subtitle mb-2" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000;"><?= $publi['date_publication'] ?> <?= $publi['nom_auteur'] ?></h6>
                                    <button type="button" class="btn btn-info"><a href="article.php?id=<?= $publi['id']; ?>" style="font-family: Share Tech Mono, monospace; color: #000; font-size:1rem; font-weight: 500;">Voir la publication</a></button>
                                </div>
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