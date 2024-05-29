<?php
$recupMsg = $bdd->prepare("SELECT * FROM msgprive WHERE id_expediteur = ? AND id_destinataire = ?");
$recupMsg->execute(array($_GET['id'], $_SESSION['id']));
while ($message = $recupMsg->fetch()) {
?>
    <div class="containerDesti">
        <img src="asset/image/<?= $_GET['id']; ?>" style=" width: 50px; height: 50px; border-radius: 50px;">
        <p><?= " " . $message['message']; ?></p>
        <small><?= $message['msg_date'] . " "; ?></small>
    </div>
<?php
}
?>