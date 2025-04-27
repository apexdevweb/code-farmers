<?php
session_start();
require_once("backend/connection/connexionDB.php");
try {
    $admin_view_tools = $bdd->prepare("SELECT * FROM secure_tools WHERE scrt_id ORDER BY scrt_id DESC");
    $admin_view_tools->execute();
} catch (PDOException $e) {
    die("Erreur d'affichage des outils de sécurité" . $e->getMessage());
}
$admin_announcement = "Espace Administration des outils de securité";

if (isset($_POST['tool_insert'])) {
    if (
        !empty($_POST['tool_name']) && !empty($_POST['tool_descript'])
        && !empty($_POST['tool_link']) && !empty($_FILES['logo_tool']  && !empty($_FILES['logo_tool']['name']))
    ) {

        $tool_name = htmlspecialchars(strip_tags($_POST['tool_name']));
        $tool_descript = htmlspecialchars(strip_tags($_POST['tool_descript']));
        $tool_link = htmlspecialchars(strip_tags($_POST['tool_link']));

        $tailleToolMax = 2097152;
        $extensionToolValide = array('jpg', 'jpeg', 'png', 'webp');


        if ($_FILES['logo_tool']['size'] <= $tailleToolMax) {
            $extToolUpload = strtolower(substr(strrchr($_FILES['logo_tool']['name'], '.'), 1));

            if (in_array($extToolUpload, $extensionToolValide)) {
                $uniqToolId = uniqid($_SESSION['data']['adm_id'] . "_", true);
                $routeTool = "assets/secureToolLogo/" . $uniqToolId . "_tool." . $extToolUpload;
                $toolUploaded = move_uploaded_file($_FILES['logo_tool']['tmp_name'], $routeTool);

                if ($toolUploaded) {
                    try {
                        $req_insert_tool = $bdd->prepare("INSERT INTO secure_tools (scrt_name,scrt_descript,scrt_link,scrt_logo) VALUES (?,?,?,?)");
                        $req_insert_tool->execute([$tool_name, $tool_descript, $tool_link, $routeTool]);
                    } catch (PDOException $e) {
                        die("Erreur d'insertion de l'outil" . $e->getMessage());
                    }
                    $successMsg = "Tool upload";
                } else {
                    echo "Erreur d'insertion des info de l'outil";
                }
            } else {
                echo "Votre image dois être au format : jpg, jpeg, png, webp";
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
                if ($admin_view_tools->rowCount() == 0) {
                    $Msg = "Aucun outil de sécurité pour le moment...";
            ?>
                    <br>
                    <p class="tempo_msg"><?= $Msg ?></p>
                    <?php
                } else if ($admin_view_tools->rowCount() != 0 || $admin_view_tools->rowCount() > 0) {
                    foreach ($admin_view_tools as $view_tools) {
                    ?>
                        <div class="responsive_carte">
                            <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px;background: url('../assets/images/symbolehtml.jpg') no-repeat 50% 57%;background-size: cover; overflow:hidden;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000; font-size: 1.4rem; backdrop-filter: blur(2px);"><?= $view_tools['scrt_name'] ?></h5>
                                    <div style="color: #fff; border:1px solid #fff; box-shadow: 1px 2px 5px #000; border-radius:5px;"></div>
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-info"><a href="admin/deleteAiScript.php?id=<?= $view_tools['scrt_id']; ?>">Supprimer</a></button>
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
                <li class="gestion__options--items" id="ia_add"><button><i class="fa-solid fa-plus"></i>Ajouter un outil de sécurité</button></li>
            </ul>
            <div class="gestion__ai--separator"></div>
            <div class="form__ai--container" id="ia_content">
                <form method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Nom de l'outil" name="tool_name">
                    <input type="text" placeholder="Description de l'outil" name="tool_descript">
                    <input type="text" placeholder="Liens vers l'outil" name="tool_link">
                    <label for="logo_tool">Logo de l'outil</label>
                    <input type="file" name="logo_tool">
                    <input type="submit" value="Ajouter" name="tool_insert">
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