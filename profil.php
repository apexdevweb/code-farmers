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
            <div class="container text-left">
                <div class="row">
                    <div class="col">
                        <img src="asset/image/<?= $user_avatar_select; ?>" style="width: 300px; height: 300px">
                    </div>
                    <div class="col">
                        <h6>âge: <?= $user_age_select; ?></h6>
                        <h6>genre: <?= $user_genre_select; ?></h6>
                        <h6>ville: <?= $user_city_select; ?></h6>
                    </div>
                </div>
            </div>
            <hr>
        <?php
        }
        ?>
    </div>

</body>

</html>