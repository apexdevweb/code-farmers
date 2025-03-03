<?php
require("backend/security/securityScript.php");
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
    <img src="assets/images/exploit.png" alt="cryptoLogo" class="cryto-logo">
    <br>
    <br>
    <div class="affichage_mode">
        <h4><span>S</span>ecurity</h4>
    </div>

    <?php
    include("include/footer.php");
    ?>
</body>

</html>