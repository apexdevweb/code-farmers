<?php
session_start();
require('backend/script/publications/affichepubliScript.php');
require('backend/script/publications/afficheRecherche.php');
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
    if (isset($_SESSION["adminAuth"])) {
        include("include/adminPannel.php");
    } elseif (isset($_SESSION["valideAuth"])) {
        include("include/userpanel.php");
    }

    include("include/slider.php");
    ?>
    <div class="wrapper">
        <?php
        include("include/artificialintel.php");
        include("include/crypto.php");
        ?>
    </div>
    <div class="wrapper">
        <?php
        include("include/ethicalH4ck.php");
        ?>
    </div>
    <?php
    include("include/primaryBande.php");
    ?>
    <br>
    <br>
    <div class="affichage_mode">
        <a href="home.php?page=publications#contenu">
            <h4><span>P</span>ublications</h4>
        </a>
        <a href="home.php?page=emplois#contenu">
            <h4><span>E</span>mplois</h4>
        </a>
    </div>
    <section id="contenu" class="contenu_secondaire">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 'home';
        }
        switch ($page) {
            case 'publications':
                include("include/homePubli.php");
                break;
            case 'emplois':
                include 'include/homeJob.php';
                break;
            default:
                include("include/homePubli.php");
                break;
        }
        ?>
    </section>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>