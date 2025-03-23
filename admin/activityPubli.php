<?php
session_start();
require_once("../backend/connection/connexionDB.php");
try {
    $admin_view_publi = $bdd->prepare("SELECT * FROM publications");
    $admin_view_publi->execute();
} catch (PDOException $e) {
    die("Erreur d'affichage des utilisateurs" . $e->getMessage());
}
$admin_announcement = "Espace Administration des publications"
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
                if ($admin_view_publi->rowCount() == 0) {
                    $Msg = "Aucun utilisateur pour le moment...";
            ?>
                    <br>
                    <p class="tempo_msg"><?= $Msg ?></p>
                    <?php
                } else if ($admin_view_publi->rowCount() != 0 || $admin_view_users->rowCount() > 0) {
                    foreach ($admin_view_publi as $view_publi) {
                    ?>
                        <div class="responsive_carte">
                            <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px;background: url('../assets/images/symbolehtml.jpg') no-repeat 50% 57%;background-size: cover; overflow:hidden;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000; font-size: 1.4rem; backdrop-filter: blur(2px);"><?= $view_publi['titre'] ?></h5>
                                    <div style="color: #fff; border:1px solid #fff; box-shadow: 1px 2px 5px #000; border-radius:5px;"></div>
                                    <br>
                                    <img src="../assets/userimgpubli/<?= $view_publi['img_publication']; ?>" style="width: 100%; height: 7rem; border-radius: 5px;">
                                    <h6 class="card-subtitle mb-2" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000;"><?= $view_publi['date_publication'] ?> <?= $view_publi['nom_auteur'] ?></h6>
                                    <!--pour avoir accès a la publications en commun avec la database on place un liens avec : ?id=...et le code php qui suit-->
                                    <button type="button" class="btn btn-info"><a href="../article.php?id=<?= $view_publi['id']; ?>" style="font-family: Share Tech Mono, monospace; color: #000; font-size:1rem; font-weight: 500;">Voir la publication</a></button>
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-info"><a href="deletePubScript.php?id=<?= $view_publi['id']; ?>">Supprimer</a></button>
                                </div>
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