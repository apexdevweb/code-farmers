<?php
require('actionback/users/securityScript.php');
require('actionback/publications/articleScript.php');
require('actionback/publications/reponseScript.php');
require('actionback/publications/reponsInfoScript.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php
include('includes/head.php');
?>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <br>
    <?php
    include("includes/userpanel.php");
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
                    <img id="myImg" src="asset/publimage/<?= $publi_img_select; ?>">
                    <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" src="asset/publimage/<?= $publi_img_select; ?>" id="img01">
                        <div id="caption"></div>
                    </div>
                </div>
                <div class="mastercode_container">
                    <h4><span>H</span>tml</h4>
                    <div class="codeContainer_code">
                        <code class="language-html" id="myCopy1"><?= $publi_html_select ?></code>
                    </div>
                </div>
                <div class="mastercode_container">
                    <h4><span>C</span>ss</h4>
                    <div class="codeContainer_code">
                        <code class="language-css" id="myCopy2"><?= $publi_css_select ?></code>
                    </div>
                </div>
                <div class="mastercode_container">
                    <h4><span>J</span>avascript</h4>
                    <div class="codeContainer_code">
                        <code class="language-javascript" id="myCopy3"><?= $publi_js_select ?></code>
                    </div>
                </div>
            </div>
            <hr>
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
                <div class="card" style="margin-top: 10px;">
                    <div class="card-header">
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
    <script src="asset/modalJs.js"></script>
</body>

</html>