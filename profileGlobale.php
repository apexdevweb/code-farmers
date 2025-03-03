<?php
session_start();
require('backend/script/users/afficheUserScript.php');
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
    <!-- on fait un foreach en php pour afficher tout les utilisateur enregistré dans la database -->
    <section class="contenu_secondaire">
        <?php
        foreach ($affiche_users as $afu) {
        ?>

            <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px;  background: url('assets/images/bgerre.jpg') no-repeat 50% -5%;  background-size: 100%;">
                <img src="asset/image/<?= $afu['avatar'] ?>" class="card-img-top-fluid" style="width: cover; height: 150px; border-radius: 5px">
                <div class="card-body">
                    <h5 class="card-title" style="color: #fff;  text-shadow: 1px 2px 5px #000; font-size: 1.5rem; backdrop-filter: blur(2px);"><?= $afu['userName'] ?></h5>
                    <hr>
                    <h6 class="card-title" style="font-family: Share Tech Mono, monospace; color: #fff; text-shadow: 1px 2px 5px #000; font-size: 1.3rem;"><?= $afu['ville'] ?></h6>
                    <p class="card-text"></p>
                    <button type="button" class="btn btn-info"><a href="profil.php?id=<?= $afu['id']; ?>" style="font-family: Share Tech Mono, monospace; color: #000">Voir le profil</a></button>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</body>

</html>