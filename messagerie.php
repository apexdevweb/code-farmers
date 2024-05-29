<?php
require("actionback/users/securityScript.php");
require("actionback/database.php");
// ON RECUPERE LES MEMBRE INSCRIT DANS LA TABLE USERS POUR LES AFFICHER SUR LES SITE
$req_users = $bdd->query("SELECT * FROM users ORDER BY `id` DESC");


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
    <?php
    while ($message_users = $req_users->fetch()) {
    ?>
        <br>
        <div class="container-sm">
            <h6><img src="asset/image/<?= $message_users['avatar']; ?>" style="width: 50px; height: 50px; border-radius: 50px;"><a href="mp.php?id=<?= $message_users['id']; ?>"><?= $message_users['userName']; ?></a></h6>
        </div>

    <?php
    }
    //}
    ?>

</body>

</html>