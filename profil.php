<?php
require('actionback/users/securityScript.php');
require('actionback/users/profilScript.php');
require('actionback/users/personalPubliUser.php');
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
    <div class="container">
        <h3>Publication de <?= $user_name_select; ?> <i class="fa-solid fa-arrow-down"></i></h3>
        <div class="cntrPubli">
            <?php
            while ($publication = $publi_rescu->fetch()) {
            ?>
                <br>
                <div class="responsive_carte">
                    <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px;background: url('asset/wallpapper/symbolehtml.jpg') no-repeat 50% 57%;background-size: cover;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000; font-size: 1.4rem; backdrop-filter: blur(2px);"><?= $publication['titre'] ?></h5>
                            <div style="color: #fff; border:1px solid #fff; box-shadow: 1px 2px 5px #000; border-radius:5px;"></div>
                            <br>
                            <img src="asset/publimage/<?= $publication['img_publication'] ?>" style="width: 100%; height: 7rem; border-radius: 5px;">
                            <h6 class="card-subtitle mb-2" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000;"><?= $publication['date_publication'] ?> <?= $publication['nom_auteur'] ?></h6>
                            <!--pour avoir accès a la publications en commun avec la database on place un liens avec : ?id=...et le code php qui suit-->
                            <button type="button" class="btn btn-info"><a href="article.php?id=<?= $publication['id']; ?>" style="font-family: Share Tech Mono, monospace; color: #000; font-size:1rem; font-weight: 500;">Voir la publication</a></button>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>