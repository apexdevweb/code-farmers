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
                        <img src="asset/image/<?= $user_avatar_select; ?>" style="width: 150px; height: 150px">
                        <hr>
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
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Modifier votre photos</label>
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="modifProfil">Enregistré la modification</button>
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