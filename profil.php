<?php
require('actionback/users/securityScript.php');
require('actionback/users/profilScript.php');
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
        if (isset($userSelectInfo)) {
        ?>
            <h3><?= $user_name_select; ?></h3>
            <hr>
            <img src="asset/image/<?= $user_avatar_select; ?>" style="width: 150px; height: 150px">
            <hr>
        <?php
        }
        ?>
    </div>

</body>

</html>