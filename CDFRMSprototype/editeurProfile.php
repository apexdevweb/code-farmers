<?php
require('actionback/users/securityScript.php');
require("actionback/users/editeurInfoProfilScript.php");
require('actionback/users/profilScript.php');
require("actionback/users/avatarProfilScript.php");
require("actionback/users/updateProfilScript.php");
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
    <br>
    <?php
    include("includes/userpanel.php");
    ?>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <?php
                    if (isset($errorMsg)) {
                        echo $errorMsg;
                    }
                    if (isset($userSelectInfo)) {
                        include("includes/agecalcule.php");
                    ?>
                        <h3><?= $user_name_select; ?></h3>
                        <hr>
                        <img src="asset/image/<?= $user_avatar_select; ?>" class="img-fluid" style="width: 250px; height: 250px; border-radius: 10px;">
                        <hr>
                        <h6>âge: <?= age($user_age_select); ?></h6>
                        <h6>Genre: <?= $user_genre_select; ?></h6>
                        <h6>Ville: <?= $user_city_select; ?></h6>
                        <h6>Compétence: <?= $user_skill_select; ?></h6>
                        <h6>Github: <?= $user_git_select; ?></h6>
                        <h6>Youtube: <?= $user_tube_select; ?></h6>
                        <h6>Site web: <?= $user_lien_select; ?></h6>
                        <hr>
                    <?php
                    }
                    ?>
                    <div class="graphContainer" style="color:#fff;">
                        <h4 style="text-decoration: underline;">Statistiques de visite</h4>
                        <?php
                        include("includes/graph.php");
                        ?>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col">
                <div class="container-fluid">
                    <?php
                    if (isset($errorMsg,)) {
                        echo "<p>" . $errorMsg . "</p>";
                    }
                    ?>
                    <?php
                    if (isset($profilInfos)) {
                    ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Modifier votre nom</label>
                                <input type="text" class="form-control" name="profilName" value="<?= $profil_name ?>">
                            </div>
                            <label for="city" class="form-label">Modifier la province</label>
                            <div class="mb-3">
                                <select class="form-select form-select-sm" name="city">
                                    <option selected>...</option>
                                    <option value="Anvers">Anvers</option>
                                    <option value="Limbourg">Limbourg</option>
                                    <option value="Flandre orientale">Flandre orientale</option>
                                    <option value="Brabant famand">Brabant famand</option>
                                    <option value="Flandre occidenal">Flandre occidenal</option>
                                    <option value="Bruxelles">Bruxelles</option>
                                    <option value="Namur">Namur</option>
                                    <option value="Brabant wallon">Brabant wallon</option>
                                    <option value="Hainaut">Hainaut</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                </select>
                            </div>
                            <label for="langProg">Vos skill</label>
                            <br>
                            <br>
                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" value="html5" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck1"><i class="fa-brands fa-html5">HTML5</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" value="css3" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck2"><i class="fa-brands fa-css3-alt">CSS3</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" value="javascript" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck4"><i class="fa-brands fa-square-js">JAVASCRIPT</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off" value="php" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck5"><i class="fa-brands fa-php">PHP</i></label>
                            <hr>
                            <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off" value="mysql" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck6"><i class="fa-solid fa-database">MySQL</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off" value="python" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck7"><i class="fa-brands fa-python">PYTHON</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off" value="nodejs" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck8"><i class="fa-brands fa-node">NODEJS</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off" value="java" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck9"><i class="fa-brands fa-java">JAVA</i></label>
                            <hr>
                            <input type="checkbox" class="btn-check" id="btncheck10" autocomplete="off" value="bootstrap" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck10"><i class="fa-brands fa-bootstrap">BOOTSTRAP</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off" value="laravel" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck11"><i class="fa-brands fa-laravel">LARAVEL</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck12" autocomplete="off" value="symfony" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck12"><i class="fa-brands fa-symfony">SYMFONY</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck13" autocomplete="off" value="react" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck13"><i class="fa-brands fa-react">REACT</i></label>
                            <hr>
                            <input type="checkbox" class="btn-check" id="btncheck14" autocomplete="off" value="vueJs" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck14"><i class="fa-brands fa-vuejs">VUEJS</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck15" autocomplete="off" value="github" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck15"><i class="fa-brands fa-github">GITHUB</i></label>

                            <input type="checkbox" class="btn-check" id="btncheck16" autocomplete="off" value="gitkraken" name="skill[]">
                            <label class="btn btn-outline-primary" for="btncheck16"><i class="fa-brands fa-gitkraken">GITKRAKEN</i></label>
                            <br>
                            <br>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Profil github</label>
                                <input type="text" class="form-control" name="liengit" value="<?= $profil_gitlien ?>">
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">lien vers votre site</label>
                                <input type="text" class="form-control" name="lien" value="<?= $profil_webLien ?>">
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Votre chaîne youtube</label>
                                <input type="text" class="form-control" name="Ytube" value="<?= $profil_tubeLien ?>">
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Modifier votre avatar</label>
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>
                            <hr>
                            <div class="btnContainer">
                                <button type="submit" class="btn btn-primary" name="modifProfil">Enregistré les modifications</button>
                                <br>
                                <br>
                                <button type="button" class="btn btn-danger"><a href="actionback/users/deleteCompteScript.php?id=<?= $_SESSION['id'] ?>" style="color: #fff;">Supprimer votre compte</a></button>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>