<?php
require('backend/security/securityScript.php');
require('backend/script/proPublications/articleJobScript.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php
include('include/head.php');
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
    } elseif (isset($_SESSION['pro_Auth'])) {
        include("include/agencyPannel.php");
    }
    ?>
    <div class="container">
        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }
        if (isset($job_info)) {
        ?>
            <h3><?= $job_title ?></h3><span>REF: <?= $job_identification_number ?></span>
            <hr>
            <div class="sub__container--job">
                <h6 class="sub__title--infojob">Fonction</h6>
                <p><?= $job_descript; ?></p>
                <hr>
                <h6 class="sub__title--infojob">Lieu</h6>
                <p><?= $job_location; ?></p>
                <br>
                <hr>
                <h6 class="sub__title--infojob">Temps de travail</h6>
                <p><?= $job_work_time; ?> Heures / semaine</p>
                <br>
                <hr>
                <h6 class="sub__title--infojob">Type de contrat</h6>
                <p><?= $job_contract_type; ?></p>
                <br>
                <hr>
                <h6 class="sub__title--infojob">Devise de paiement & salaire net</h6>
                <p><?= $job_device_type; ?></p>
                <p><?= $job_salary; ?> / mois</p>
                <br>
                <hr>
                <div class="foot__container--job">
                    <a href="#">Par : <?= $job_employer; ?></a><a href="#"><i class="fa-regular fa-star"></i> Favoris</a><a href="#">Postuler <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            <?php
        }
            ?>
            </div>
    </div>
    <br>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>