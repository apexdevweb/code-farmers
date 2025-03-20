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
            <div class="card carte_hov">
                <img src="assets/usersimg/<?= $afu['avatar'] ?>" class="card-img-top-fluid">
                <div class="card-body">
                    <h4 class="card-title"><?= $afu['userName'] ?></h4>
                    <h6 class="card-title"><?= $afu['ville'] ?></h6>
                    <hr>
                    <h5 class="card-title">fullstack web dev</h5>
                    <p class="card-text"></p>
                    <button type="button" class="btn btn-info"><a href="profil.php?id=<?= $afu['id']; ?>">Voir le profil</a></button>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</body>

</html>