<?php
session_start();
require_once("../backend/connection/connexionDB.php");
try {
    $admin_view_users = $bdd->prepare("SELECT * FROM users");
    $admin_view_users->execute();
} catch (PDOException $e) {
    die("Erreur d'affichage des utilisateurs" . $e->getMessage());
}
$admin_announcement = "Espace Administration des utilisateurs";
$Msg = "Aucun utilisateur pour le moment...";
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("../include/head.php");
?>

<body>
    <header>
        <?php
        include("../include/logo.php");
        include("../include/nav.php");
        ?>
    </header>
    <main>
        <div class="adm__announce--container">
            <cite class="adm_announce"><?= $admin_announcement ?></cite>
        </div>
        <br>
        <a href="../home.php" class="btnRetour"><i class="fa-solid fa-arrow-left"></i> Retour</a>
        <section class="view__users--container">
            <?php
            if (isset($_SESSION['adminAuth']) && isset($_SESSION['data']['adm_name'])) {
                if ($admin_view_users->rowCount() == 0) {
            ?>
                    <br>
                    <p class="tempo_msg"><?= $Msg ?></p>
                    <?php
                } else if ($admin_view_users->rowCount() != 0 || $admin_view_users->rowCount() > 0) {
                    foreach ($admin_view_users as $view_users) {
                    ?>
                        <div class="card carte_hov">
                            <img src="../assets/usersimg/<?= $view_users['avatar'] ?>" class="card-img-top-fluid" style="width: cover; height: 150px; border-radius: 5px">
                            <div class="card-body">
                                <h5 class="card-title"><?= $view_users['userName'] ?></h5>
                                <hr>
                                <h6 class="card-title"><?= $view_users['ville'] ?></h6>
                                <p class="card-text"></p>
                                <button type="button" class="btn btn-info"><a href="../profil.php?id=<?= $view_users['id']; ?>">Voir le profil</a></button>
                                <br>
                                <br>
                                <button type="button" class="btn btn-info"><a href="banneScript.php?id=<?= $view_users['id']; ?>">Bannir</a></button>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </section>
    </main>
    <?php
    include("../include/footer.php");
    ?>
</body>

</html>