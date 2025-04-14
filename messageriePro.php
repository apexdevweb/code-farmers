<?php
require("backend/security/securityScript.php");
require("backend/connection/connexionDB.php");
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
    <br>

    <?php
    include("include/footer.php");
    ?>
</body>

</html>