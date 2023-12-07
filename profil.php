<?php
require('actionback/users/securityScript.php');
require('actionback/users/profilScript.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php
include('includes/head.php');
?>
<style>
    h6>p>a {
        font-size: 1rem;
    }

    h6 {
        font-size: 1.2rem;
    }

    @media only screen and (max-width: 600px) {
        h6>p>a {
            font-size: 0.9rem;
        }

        h6 {
            font-size: 1.1rem;
        }
    }
</style>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <br>
    <div class="container">
        <?php
        if (isset($userSelectInfo)) {
            include("includes/agecalcule.php");
        ?>
            <h3><i class="fa-solid fa-hashtag"></i><?= $user_name_select; ?></h3>
            <hr>
            <div class="container text-left">
                <div class="row">
                    <div class="col">
                        <div class="container-sm">
                            <img src="asset/image/<?= $user_avatar_select; ?>" style="width: 300px; height: 300px; border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col">
                        <h6><i class="fa-solid fa-cake-candles"></i>
                            <p><?= age($user_age_select); ?> ans</p>
                        </h6>
                        <h6><i class="fa-solid fa-venus-mars"></i> genre: <p><?= $user_genre_select; ?></p>
                        </h6>
                        <h6><i class="fa-solid fa-location-pin"></i> ville: <p><?= $user_city_select; ?></p>
                        </h6>
                        <h6><i class="fa-solid fa-code"></i> compétence: <p><?= $user_skill_select; ?></p>
                        </h6>
                        <h6><i class="fa-brands fa-github"></i> Github: <p><a href="<?= $user_git_select; ?>" target="_blank"><?= $user_git_select; ?></a></p>
                        </h6>
                        <h6><i class="fa-brands fa-youtube"></i> Youtube: <p><a href="<?= $user_tube_select; ?>" target="_blank"><?= $user_tube_select; ?></a></p>
                        </h6>
                        <h6><i class="fa-solid fa-globe"></i> site web:
                            <p><a href="<?= $user_lien_select; ?>" target="_blank"><?= $user_lien_select; ?></a></p>
                        </h6>
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