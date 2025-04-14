<?php
require('backend/security/securityScript.php');
require('backend/script/proPublications/articleJobScript.php');
require('backend/script/proPublications/candidScript.php');
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
        if (isset($successMsg)) {
        ?>
            <em><?= $successMsg ?></em>
        <?php
        }
        if (isset($job_info)) {
        ?>
            <form method="POST" enctype="multipart/form-data">
                <?php
                if (isset($errorMsg)) {
                    echo "<p>" . $errorMsg . "</p>";
                }
                ?>
                <div class="mb-3">
                    <input type="hidden" name="candid_titre" value="<?= $job_title ?>">
                    <input type="hidden" name="candid_ref" value="<?= $job_identification_number ?>">
                    <h3><?= $job_title ?></h3>
                    <label for="applicantFirstName" class="form-label">REF :<?= $job_identification_number ?></label>
                    <input type="text" class="form-control" name="applicantFirstName" placeholder="Nom" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="applicantLastName" placeholder="Prenom" required>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="applicantMail" placeholder="E-mail" required>
                    <span class="input-group-text">@example.com</span>
                </div>
                <div class="input-group mb-3">
                    <input type="tel" class="form-control" name="applicantTel" placeholder="Tel ex: +32..." required>
                </div>

                <div class="input-group">
                    <span class="input-group-text">A propos de vous</span>
                    <textarea class="form-control" aria-label="With textarea" name="applicantAbout" required></textarea>
                </div>
                <br>
                <div class="mb-3">
                    <label for="userName" class="form-label">Curriculum vitae</label>
                    <input type="file" class="form-control" name="CV" required>
                    <br>
                    <label for="userName" class="form-label">Lettre de motivation</label>
                    <input type="file" class="form-control" name="LM" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="applyValide">Envoyer</button>
                <br>
                <br>
                <br>
            </form>
            <a href="articleJob.php?id=<?= $job_artcl_id ?>" class="btnRetour"><i class="fa-solid fa-arrow-left"></i> Retour</a>
        <?php
        }
        ?>
    </div>
    </div>
    <br>
    <br>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>