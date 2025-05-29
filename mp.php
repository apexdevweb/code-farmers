<?php
require("backend/security/securityScript.php");
require("backend/script/messagerieScript.php");

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
    <a href="messagerie.php" class="btnRetour"><i class="fa-solid fa-arrow-left"></i> Retour</a>
    <br>
    <div class="container GlobalMsg">
        <section id="messages">
            <h5 class="msg__title--profil">Discussion avec : <img src="assets/usersimg/<?= $_GET['id']; ?>" style="width: 60px; height: 60px; border-radius: 50px; border: 2px solid #fff;"></h5>
            <hr>
            <div class="containerMsgPv">
                <!--on récupère et affiche le message -->
                <?php
                while ($message = $recupMsg->fetch()) {
                    if ($message['id_destinataire'] == $_SESSION['id']) {
                ?>
                        <div class="containerDesti">
                            <img src="assets/usersimg/<?= $_GET['id']; ?>" style="width: 50px; height: 50px; border-radius: 50px;">
                            <p><?= " " . $message['message']; ?></p>
                            <small><?= $message['msg_date'] . " " ?></small>
                        </div>
                    <?php
                    } elseif ($message['id_destinataire'] == $getid) {
                    ?>
                        <div class="containerExpe">
                            <img src="assets/usersimg/<?= $_SESSION['id']; ?>" style="width: 50px; height: 50px; border-radius: 50px;">
                            <p><?= " " . $message['message']; ?></p>
                            <small><?= $message['msg_date'] . " " ?></small>
                        </div>
                <?php
                    }
                }
                ?>
                <!--on récupère et affiche le message FIN-->
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
    <br>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>