<?php
require("backend/security/securityScript.php");
require("backend/script/proPublications/affichCandidScript.php");
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
    if (isset($_SESSION['pro_Auth'])) {
        include("include/agencyPannel.php");
    }
    ?>
    <br>
    <div class="container">
        <?php
        if (isset($affiche_candid)) {
        ?>
            <article class="apply__container">
                <hgroup class="apply__title--container">
                    <h3>Candidature pour : <?= $apply_titre ?></h3>
                    <h4>REF: <?= $apply_ref ?></h4>
                </hgroup>
                <ul class="apply__infos">
                    <li><?= $apply_fname ?></li>
                    <li><?= $apply_lname ?></li>
                    <li><?= $apply_mail ?></li>
                    <li><?= $apply_tel ?></li>
                    <li><?= $apply_descript ?></li>
                </ul>
                <figure class="apply__img--container">
                    <label for="applyCV">Curriculum vitae</label>
                    <a href="" download="assets/candidImg/<?= $apply_cv; ?>" id="applyCv"><img src="assets/images/dwnld.png" alt="download_cv"></a>
                    <label for="applyLm">Lettre motivation</label>
                    <a href="" download="assets/candidImg/<?= $apply_lm; ?>" id="applyLm"><img src="assets/images/dwnld.png" alt="download_lm"></a>
                </figure>
            </article>
        <?php
        }
        ?>
    </div>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>