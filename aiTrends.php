<?php
require("backend/security/securityScript.php");
require("backend/script/Ai/viewAi.php");
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
    <section class="AI__container--trends">
        <article class="ai__article">
            <div class="ai__subcontainer--trends">
                <hgroup class="ai__title--container">
                    <h3></h3>
                    <h4></h4>
                </hgroup>
                <p class="ai__descript"></p>
                <figure class="ai__fig">
                    <img src="" alt="aiLogo">
                    <figcaption></figcaption>
                </figure>
        </article>
        </div>
    </section>
    <br>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>