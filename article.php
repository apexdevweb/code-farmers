<?php
require('actionback/publications/articleScript.php');
require('actionback/users/securityScript.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php
include('includes/head.php');
?>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <br>
    <div class="container">
        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }

        if (isset($publi_date_select)) {
        ?>
            <h3><?= $publi_titre_select; ?></h3>
            <hr>
            <p><?= $publi_contenu_select; ?></p>
            <hr>
            <small><?= $publi_date_select . " " . $publi_auteur_select; ?></small>
        <?php
        }
        ?>
    </div>

</body>

</html>