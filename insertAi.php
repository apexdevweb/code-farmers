<?php
session_start();
require_once("backend/connection/connexionDB.php");
try {
    $admin_view_ai = $bdd->prepare("SELECT * FROM tendance_ai WHERE id_ai ORDER BY id_ai DESC");
    $admin_view_ai->execute();
} catch (PDOException $e) {
    die("Erreur d'affichage des i.a" . $e->getMessage());
}
$admin_announcement = "Espace Administration des i.a";

if (isset($_POST['ia_insert'])) {
    if (
        !empty($_POST['ia_name']) && !empty($_POST['ia_descript'])
        && !empty($_POST['ia_link']) && !empty($_FILES['logo_ia']  && !empty($_FILES['logo_ia']['name']))
    ) {

        $ai_name = htmlspecialchars(strip_tags($_POST['ia_name']));
        $ai_descript = htmlspecialchars(strip_tags($_POST['ia_descript']));
        $ai_link = htmlspecialchars(strip_tags($_POST['ia_link']));

        $tailleAiMax = 2097152;
        $extensionAiValide = array('jpg', 'jpeg', 'png', 'webp');


        if ($_FILES['logo_ia']['size'] <= $tailleAiMax) {
            $extAiUpload = strtolower(substr(strrchr($_FILES['logo_ia']['name'], '.'), 1));

            if (in_array($extAiUpload, $extensionAiValide)) {
                $uniqAiId = uniqid($_SESSION['data']['adm_id'] . "_", true);
                $routeAi = "assets/aiLogo/" . $uniqAiId . "_ia." . $extAiUpload;
                $aiUploaded = move_uploaded_file($_FILES['logo_ia']['tmp_name'], $routeAi);

                if ($aiUploaded) {
                    try {
                        $req_insert_ai = $bdd->prepare("INSERT INTO tendance_ai (ai_name,ai_description,ai_link,ai_logo) VALUES (?,?,?,?)");
                        $req_insert_ai->execute([$ai_name, $ai_descript, $ai_link, $routeAi]);
                    } catch (PDOException $e) {
                        die("Erreur d'insertion de l'i.a" . $e->getMessage());
                    }
                    $successMsg = "Ai upload";
                } else {
                    echo "Erreur d'insertion des info ai";
                }
            } else {
                echo "Votre image dois être au format : jpg, jpeg, png, pdf";
            }
        }
    }
}
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
    <main>
        <div class="adm__announce--container">
            <cite class="adm_announce"><?= $admin_announcement ?></cite>
        </div>
        <br>
        <a href="../home.php" class="btnRetour"><i class="fa-solid fa-arrow-left"></i> Retour</a>
        <br>
        <br>
        <section class="view__ai--container">
            <?php
            if (isset($_SESSION['adminAuth']) && isset($_SESSION['data']['adm_name'])) {
                if ($admin_view_ai->rowCount() == 0) {
                    $Msg = "Aucune i.a pour le moment...";
            ?>
                    <br>
                    <p class="tempo_msg"><?= $Msg ?></p>
                    <?php
                } else if ($admin_view_ai->rowCount() != 0 || $admin_view_ai->rowCount() > 0) {
                    foreach ($admin_view_ai as $view_ai) {
                    ?>
                        <div class="responsive_carte">
                            <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px;background: url('../assets/images/symbolehtml.jpg') no-repeat 50% 57%;background-size: cover; overflow:hidden;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000; font-size: 1.4rem; backdrop-filter: blur(2px);"><?= $view_ai['ai_name'] ?></h5>
                                    <div style="color: #fff; border:1px solid #fff; box-shadow: 1px 2px 5px #000; border-radius:5px;"></div>
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-info"><a href="deletePubScript.php?id=<?= $view_ai['id_ai']; ?>">Supprimer</a></button>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </section>
        <br>
        <section class="gestion__container--ai">
            <ul class="gestion__options--ai">
                <li class="gestion__options--items" id="ia_add"><button><i class="fa-solid fa-plus"></i>Ajouter une i.a</button></li>
            </ul>
            <div class="gestion__ai--separator"></div>
            <div class="form__ai--container" id="ia_content">
                <form method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Nom de l'iA" name="ia_name">
                    <input type="text" placeholder="Description de l'iA" name="ia_descript">
                    <input type="text" placeholder="Liens vers l'iA" name="ia_link">
                    <label for="logo_ia">Logo de l'i.A</label>
                    <input type="file" name="logo_ia">
                    <input type="submit" value="Ajouter" name="ia_insert">
                </form>
            </div>
        </section>
    </main>
    <br>
    <?php
    include("include/footer.php");
    ?>
    <script type="text/javascript" defer>
        const ajouter = document.getElementById("ia_add");
        const frmCtnr = document.getElementById("ia_content");
        ajouter.addEventListener("click", () => {
            if (frmCtnr.classList.contains("form__view")) {
                frmCtnr.classList.remove("form__view");
            } else {
                frmCtnr.classList.add("form__view");
            }
        });
    </script>
</body>

</html>