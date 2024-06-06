<?php
//compteur de visite avec une condition pour vérifier que l'id de la session active est biens différent de l'id du profile à visiter
if ($_SESSION['id'] != $_GET['id']) {
    $stmt = $bdd->prepare("INSERT INTO visites (`date`) VALUES (CURRENT_TIMESTAMP)");
    $stmt->execute();
}
