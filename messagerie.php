<?php
require("actionback/users/securityScript.php");
require("actionback/privateMessage/messagerieScript.php");
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

    <?php
    while ($message_users = $reqMessage_users->fetch()) {
    ?>
        <br>
        <div class="container-sm">
            <h6><img src="asset/image/<?= $message_users['avatar']; ?>" style="width: 50px; height: 50px; border-radius: 50px;"><a href="mp.php?id=<?= $message_users['id']; ?>"><?= $message_users['userName']; ?></a></h6>
        </div>

    <?php
    }
    ?>

</body>

</html>