<?php
require("actionback/users/securityScript.php");
require("actionback/database.php");
print_r($_POST);
var_dump($_GET);

if (isset($_GET['id']) && !empty($_GET['id'])) {

    if (isset($_POST['envoyer'])) {
        if (!empty($_POST['messagePV'])) {

            $message = strip_tags($_POST['messagePV']);
            $getid = $_GET['id'];
            $lasess = $_SESSION['id'];

            $insertMessage = $bdd->prepare("INSERT INTO msgprive(`message`, id_destinataire, id_expediteur) VALUES ('?,?,?')");
            $insertMessage->execute(array($message, $getid, $lasess));
        }
    }
}

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
                $recupMsg->execute(array($_SESSION['id'], $getid));
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