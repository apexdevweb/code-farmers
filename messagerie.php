<?php
require("actionback/users/securityScript.php");
require("actionback/database.php");
// Récupération de l'ID de l'utilisateur connecté depuis la session
$sessionUser = $_SESSION['id'];
// Préparation de la requête pour récupérer les utilisateurs sauf celui connecté
$req_users = $bdd->prepare("SELECT * FROM users WHERE id != :sessionUser ORDER BY id DESC");
// Liaison du paramètre
$req_users->bindParam(':sessionUser', $sessionUser, PDO::PARAM_INT);
// Exécution de la requête
$req_users->execute();
// Récupération des résultats
$users = $req_users->fetchAll(PDO::FETCH_ASSOC);


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
    if (!empty($users)) {
        foreach ($users as $message_users) {
    ?>
            <br>
            <div class="container-sm">
                <h6><img src="asset/image/<?= $message_users['avatar']; ?>" style="width: 50px; height: 50px; border-radius: 50px;"><a href="mp.php?id=<?= $message_users['id']; ?>"><?= $message_users['userName']; ?></a></h6>
            </div>

    <?php
        }
    }
    ?>

</body>

</html>