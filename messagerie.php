<?php
require("backend/security/securityScript.php");
require("backend/connection/connexionDB.php");
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

//titre liste des contacts
$tilte_contact = "Liste des contacts";
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
    include("include/userpanel.php");
    ?>
    <br>

    <div class="container-sm main__container--msg-list">
        <cite><?= $tilte_contact ?></cite>
        <br>
        <br>
        <?php
        if (!empty($users)) {
            foreach ($users as $message_users) {
        ?>
                <div class="sub__container--msg-list">
                    <h6><img src="assets/usersimg/<?= $message_users['avatar']; ?>" style="width: 50px; height: 50px; border-radius: 50px;"><a href="mp.php?id=<?= $message_users['id']; ?>"><?= " " . $message_users['userName']; ?></a></h6>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>