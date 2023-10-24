<?php
require("actionback/users/securityScript.php");
require("actionback/privateMessage/messagerieScript.php");
print_r($_GET);
var_dump($_GET);
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
    <div class="container">
        <h4>discussion privée avec: </h4>
        <br>
        <section id="messages">
            <div class="container-sm">
                <?php
                $recupMsg = $bdd->prepare("SELECT * FROM msgprive WHERE id_expediteur = ? AND id_destinataire = ?");
                $recupMsg->execute(array($_SESSION['id'], $_GET['id']));
                while ($message = $recupMsg->fetch()) {
                ?>
                    <p><?= $message ?></p>
                <?php
                }
                ?>
            </div>
        </section>
        <br>
        <form method="POST">
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="votre message" name="messagePV">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
        </form>
    </div>
</body>

</html>