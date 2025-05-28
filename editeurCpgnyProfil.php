<?php
require('backend/security/securityScript.php');
require('backend/script/pro/profilCpgnyScript.php');
require("backend/script/pro/proEditeurInfoScript.php");
require("backend/script/pro/updateProScript.php");
require("backend/script/pro/avatarCpgnyScript.php");

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
    include("include/agencyPannel.php");
    ?>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <?php
                    if (isset($cpgnySelectInfo)) {
                    ?>
                        <h3><?= $cpgny_name_select; ?></h3>
                        <hr>
                        <img src="assets/proBanner/<?= $cpgny_avatar_select; ?>" class="img-fluid" style="width: 250px; height: 250px; border-radius: 10px;">
                        <hr>
                        <div class="info__editor--profil">
                            <h6><span class="editor__profil--item">Secteur:</span> <?= $cpgny_sector_select; ?></h6>
                            <h6><span class="editor__profil--item">E-mail:</span> <?= $cpgny_mail_select; ?></h6>
                            <h6><span class="editor__profil--item">identifiant entreprise:</span> <?= $cpgny_number_select; ?></h6>
                            <h6><span class="editor__profil--item">Ville:</span> <?= $cpgny_city_select; ?></h6>
                            <h6><span class="editor__profil--item">Lien vers votre site web:</span> <?= $cpgny_link_select; ?></h6>
                            <h6><span class="editor__profil--item">Description:</span> <?= $cpgny_descript_select; ?></h6>
                        </div>
                        <hr>
                    <?php
                    }
                    ?>
                    <div class="graphContainer" style="color:#fff;">
                        <h4 style="text-decoration: underline;">Statistiques de visite</h4>
                        <?php
                        include("include/graph.php");
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
                    if (isset($profilProInfos)) {
                    ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Modifier votre nom</label>
                                <input type="text" class="form-control" name="proName" value="<?= $pro_info_name ?>">
                            </div>
                            <label for="city" class="form-label">Modifier la province</label>
                            <div class="mb-3">
                                <select class="form-select form-select-sm" name="proCity">
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
                            <label for="proActivity">Votre secteur d'activité </label>
                            <br>
                            <br>
                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" value="Developpement web" name="proSkill[]">
                            <label class="btn btn-outline-primary" for="btncheck1">Developpement web</label>
                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" value="Crypto & Finance" name="proSkill[]">
                            <label class="btn btn-outline-primary" for="btncheck2">Crypto & Finance</label>
                            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" value="Securite" name="proSkill[]">
                            <label class="btn btn-outline-primary" for="btncheck3">Securite</label>
                            <br>
                            <br>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">lien vers votre site</label>
                                <input type="text" class="form-control" name="proLien" value="<?= $pro_info_link; ?>">
                            </div>
                            <br>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text">Description de l'entreprise</span>
                                <textarea class="form-control" aria-label="With textarea" name="proDescript"></textarea>
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Modifier votre Bannière</label>
                                    <input type="file" class="form-control" name="proAvatar">
                                </div>
                            </div>
                            <hr>
                            <div class="btnContainer">
                                <button type="submit" class="btn btn-primary" name="proModif">Enregistré les modifications</button>
                                <br>
                                <br>
                                <button type="button" class="btn btn-danger"><a href="actionback/users/deleteCompteScript.php?id=<?= $_SESSION['pro_data']['pro_id'] ?>" style="color: #fff;">Supprimer votre compte</a></button>
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