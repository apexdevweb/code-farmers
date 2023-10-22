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
include "includes/head.php";
?>

<body>
    <?php
    include "includes/navbar.php";
    ?>
    <br>
    <div class="infoPratique">
        <h4>Ici vous pouvez géré votre profil personnel</h4>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <?php
                    if (isset($errorMsg)) {
                        echo $errorMsg;
                    }
                    if (isset($userSelectInfo)) {
                    ?>
                        <h3><?= $user_name_select; ?></h3>
                        <hr>
                        <img src="asset/image/<?= $user_avatar_select; ?>" class="img-fluid" style="width: 250px; height: 250px">
                        <hr>
                        <h6>âge: <?= $user_age_select; ?></h6>
                        <h6>Genre: <?= $user_genre_select; ?></h6>
                        <h6>Ville: <?= $user_city_select; ?></h6>
                    <?php
                    }
                    ?>
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
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Modifier votre avatar</label>
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="modifProfil">Enregistré les modifications</button>
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