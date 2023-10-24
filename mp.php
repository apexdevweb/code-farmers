<?php
require("actionback/users/securityScript.php");
require("actionback/database.php");

print_r($_GET);
var_dump($_GET);

/////////////////////////////////////////////////////////////////////////////////////////////
//TRAITEMENT DE LA MESSAGERIE
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $messGetId = $_GET['id'];
    $recupUser = $bdd->prepare("SELECT * FROM users WHERE `id` = ?");
    $recupUser->execute(array($messGetId));

    if ($recupUser->rowCount() > 0) {

        if (isset($_POST['envoi_pv'], $_POST['msg_pv']) && !empty($_POST['msg_pv'])) {

            $message = strip_tags($_POST['msg_pv']);
            $destinataire = $_GET['id'];
            $expediteur = $_SESSION['id'];

            $insertMessage = $bdd->prepare("INSERT INTO msgprive(`message`, `id_destinataire`, `id_expediteur`) VALUES ('?,?,?')");
            $insertMessage->execute(array($message, $destinataire, $expediteur));
        } else {
            echo "aucun message n'as été trouvé";
        }
    } else {
        echo "aucun utilisateur trouvé";
    }
} else {
    echo "aucun identifiant a été trouvé";
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
                <input type="text" class="form-control" placeholder="votre message" name="msg_pv">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="envoi_pv">Envoyer</button>
        </form>
    </div>
</body>

</html>