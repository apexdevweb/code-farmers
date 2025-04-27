<?php
require("backend/security/securityScript.php");
require("backend/script/Ai/viewAiScript.php");
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
    <img src="assets/images/aicerveau.png" alt="cryptoLogo" class="cryto-logo">
    <br>
    <br>
    <div class="affichage_mode">
        <h4><span>A</span>i <span>T</span>rends</h4>
    </div>
    <br>
    <section class="AI__container--trends">
        <?php
        if (isset($affiche_ai)) {
            foreach ($affiche_ai as $view_ai) {
        ?>
                <article class="ai__article">
                    <div class="ai__subcontainer--trends">
                        <hgroup class="ai__title--container">
                            <h3><?= $view_ai['ai_name'] ?></h3>
                        </hgroup>
                        <p class="ai__descript"><?= $view_ai['ai_description'] ?></p>
                        <figure class="ai__fig">
                            <img src="<?= $view_ai['ai_logo'] ?>" alt="aiLogo">
                            <figcaption><a href="<?= $view_ai['ai_link'] ?>">View Ai<i class="fa-solid fa-arrow-right"></i></a></figcaption>
                        </figure>
                    </div>
                </article>
        <?php
            }
        }
        ?>
    </section>
    <br>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>