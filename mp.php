<?php
require("actionback/users/securityScript.php");
require("actionback/privateMessage/messagerieScript.php");
if (isset($_GET['id'], $_SESSION['id']) && !empty($_GET['id']) && !empty($_SESSION['id'])) {
    $getid = $_GET['id'];
    $session = $_SESSION['id'];
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
    <a href="messagerie.php" class="btnRetour"><i class="fa-solid fa-arrow-left"></i> Retour</a>
    <br>
    <div class="container GlobalMsg">
        <section id="messages">
            <h5>Discussion avec : <img src="asset/image/<?= $_GET['id']; ?>" style="width: 60px; height: 60px; border-radius: 50px; border: 2px solid #fff;"></h5>
            <hr>
            <div class="containerMsgPv">
                <!--on récupère et affiche le message de l'expéditeur-->
                <?php
                $recupMsg = $bdd->prepare("SELECT * FROM msgprive WHERE id_expediteur = ? AND id_destinataire = ? OR id_expediteur = ? AND id_destinataire = ? ");
                $recupMsg->execute(array($session, $getid, $_GET['id'], $_SESSION['id']));
                while ($message = $recupMsg->fetch()) {
                    if ($message['id_destinataire'] == $_SESSION['id']) {
                ?>
                        <div class="containerExpe">
                            <img src="asset/image/<?= $_GET['id']; ?>" style="width: 50px; height: 50px; border-radius: 50px;">
                            <p><?= " " . $message['message']; ?></p>
                            <small><?= $message['msg_date'] . " " ?></small>
                        </div>

                    <?php
                    } elseif ($message['id_destinataire'] == $getid) {
                    ?>
                        <div class="containerExpe">
                            <img src="asset/image/<?= $_SESSION['id']; ?>" style="width: 50px; height: 50px; border-radius: 50px;">
                            <p><?= " " . $message['message']; ?></p>
                            <small><?= $message['msg_date'] . " " ?></small>
                        </div>
                <?php
                    }
                }
                ?>
                <!--on récupère et affiche le message de l'expéditeur FIN-->
                <!--on récupère et affiche le message du destinataire-->

                <!--on récupère et affiche le message du destinataire FIN-->
            </div>
            <hr>
        </section>
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