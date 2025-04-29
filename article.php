<?php
require('backend/security/securityScript.php');
require('backend/script/publications/articleScript.php');
require('backend/script/publications/reponseScript.php');
require('backend/script/publications/reponsInfoScript.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php
include('include/head.php');
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
    if (isset($_SESSION["adminAuth"])) {
        include("include/adminPannel.php");
    } elseif (isset($_SESSION["valideAuth"])) {
        include("include/userpanel.php");
    } elseif (isset($_SESSION['pro_Auth'])) {
        include("include/agencyPannel.php");
    }
    ?>
    <div class="container">

        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }
        if (isset($publiSelectInfo)) {

        ?>
            <h3><?= $publi_titre_select; ?></h3>
            <hr>
            <div class="sub_containerARTCL">
                <div class="codeContainer">
                    <i class="fa-solid fa-maximize" id="croix"></i>
                    <img id="myImg" src="assets/userimgpubli/<?= $publi_img_select; ?>">
                    <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" src="assets/userimgpubli/<?= $publi_img_select; ?>" id="img01">
                        <div id="caption"></div>
                    </div>
                </div>
                <div class="sub_code_ctnr">
                    <div class="mastercode_container">
                        <hgroup class="mastercode__title--container">
                            <h4><span>H</span>tml</h4>
                            <i class="fa-solid fa-expand exp"></i>
                        </hgroup>
                        <div id="editor-html" oninput="refreshpub()"></div>
                    </div>
                    <div class="mastercode_container">
                        <hgroup class="mastercode__title--container">
                            <h4><span>C</span>ss</h4>
                            <i class="fa-solid fa-expand exp"></i>
                        </hgroup>
                        <div id="editor-css" oninput="refreshpub()"></div>
                    </div>
                    <div class="mastercode_container">
                        <hgroup class="mastercode__title--container">
                            <h4><span>J</span>avascript</h4>
                            <i class="fa-solid fa-expand exp"></i>
                        </hgroup>
                        <div id="editor-js" oninput="refreshpub()"></div>
                    </div>
                </div>
            </div>
            <hr>
            <iframe id="res2"></iframe>
            <p><?= $publi_contenu_select; ?></p>
            <hr>
            <small><?= $publi_date_select . " " . $publi_auteur_select; ?></small>
            <br>
            <hr>
            <br>
            <!-- affichage des réponses-->
            <?php
            while ($reponses = $verifReponsExist->fetch()) {
            ?>
                <div class="card" style="margin-top: 10px; background:none;">
                    <div class="card-header" style="background:none;">
                        <h5><i class="fa-solid fa-hashtag"></i><?= $reponses['name_auteur']; ?></h5>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p><?= $reponses['contenu'] ?></p>
                        </blockquote>
                    </div>
                </div>
            <?php
            }
            ?>
            <hr>
            <!-- formulaire de réponse-->
            <form class="form-group" method="POST">
                <div class="mb-3">
                    <label for="reponse">Réponse :</label>
                    <textarea class="form-control" name="reponse" id="" cols="30" rows="10"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-warning" name="valideRepons">Répondre</button>
            </form>
        <?php
        }
        ?>
    </div>
    <!--script de l'éditeur de code de publication-->
    <!--script de l'éditeur de code de publication fin-->
    <script>

    </script>
    <script id="html-content" type="application/json">
        <?php echo json_encode($publi_html_select ?? ''); ?>
    </script>
    <script id="css-content" type="application/json">
        <?php echo json_encode($publi_css_select ?? ''); ?>
    </script>
    <script id="js-content" type="application/json">
        <?php echo json_encode($publi_js_select ?? ''); ?>
    </script>
    <script src="assets/js/modalJs.js"></script>
    <script src="assets/js/editcodepubli.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/monaco-editor@0.33.0/min/vs/loader.js"></script>
    <script src="assets/js/mncoEditorConfig.js"></script>
</body>

</html>