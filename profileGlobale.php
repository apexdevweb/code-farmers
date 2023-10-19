<?php
session_start();
require('actionback/users/afficheUserScript.php');
?>

<!DOCTYPE html>
<html lang="fr">

<?php
include("includes/head.php");
?>

<body>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre_contenu">
        <h1>Code-Farmer</h1>
    </div>
    <!-- on fait un foreach en php pour afficher tout les utilisateur enregistré dans la database -->
    <section class="contenu_secondaire">
        <?php
        foreach ($affiche_users as $afu) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $afu['userName'] ?></h5>
                    <hr>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="button" class="btn btn-info"><a href="#">Voir le profil</a></button>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</body>

</html>