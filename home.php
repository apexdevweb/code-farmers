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
    include("includes/logo.php");
    ?>
    <hr>
    <?php
    include("includes/slider.php");
    ?>
    <br>
    <?php
    include("includes/subnav.php");
    include("includes/primaryBande.php");
    ?>
    <br>
    <br>
    <!-- on fait un foreach en php pour afficher toutes les publications enregistré dans la database -->
    <section class="contenu_secondaire">
        <?php
        foreach ($affiche_publi as $afp) {
        ?>
            <div class="responsive_carte">
                <div class="card carte_hov" style="width: 15rem; height: 18rem; margin-top: 10px;background: url('asset/wallpapper/bg404.jpg') no-repeat 50% 57%;background-size: cover;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #fff;  text-shadow: 1px 2px 5px #000; font-size: 1.5rem; backdrop-filter: blur(2px);"><?= $afp['titre'] ?></h5>
                        <p class="card-text" style="font-family: Share Tech Mono, monospace; color: #fff; text-shadow: 1px 2px 5px #000; font-size: 1.3rem;"><?= $afp['contenu'] ?></p>
                        <div style="color: #fff; border:1px solid #fff; box-shadow: 1px 2px 5px #000; border-radius:5px;"></div>
                        <br>
                        <h6 class="card-subtitle mb-2 text-body-secondary" style="color: #fff;"><?= $afp['date_publication'] ?> <?= $afp['nom_auteur'] ?></h6>
                        <!--pour avoir accès a la publications en commun avec la database on place un liens avec : ?id=...et le code php qui suit-->
                        <button type="button" class="btn btn-info"><a href="article.php?id=<?= $afp['id']; ?>" style="font-family: Share Tech Mono, monospace; color: #000; font-size:1.2rem;">Voir la publication</a></button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>