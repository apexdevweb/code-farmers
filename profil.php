<?php
require('actionback/users/securityScript.php');
require('actionback/users/profilScript.php');
require('actionback/users/calculeDateNaissance.php');
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
        if (isset($userSelectInfo)) {
        ?>
            <h3><i class="fa-solid fa-hashtag"></i><?= $user_name_select; ?></h3>
            <hr>
            <div class="container text-left">
                <div class="row">
                    <div class="col">
                        <img src="asset/image/<?= $user_avatar_select; ?>" style="width: 300px; height: 300px">
                    </div>
                    <div class="col">
                        <h6><i class="fa-solid fa-cake-candles"></i> <?= $user_age_select; ?></h6>
                        <h6><i class="fa-solid fa-venus-mars"></i> genre: <?= $user_genre_select; ?></h6>
                        <h6><i class="fa-solid fa-location-pin"></i> ville: <?= $user_city_select; ?></h6>
                        <h6><i class="fa-solid fa-code"></i> compétence: <?= $user_skill_select; ?></h6>
                        <h6><i class="fa-brands fa-youtube"></i> Youtube: <a href="<?= $user_tube_select; ?>" target="_blank"><?= $user_tube_select; ?></a></h6>
                        <h6><i class="fa-solid fa-globe"></i> site web: <a href="<?= $user_lien_select; ?>" target="_blank"><?= $user_lien_select; ?></a></h6>
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