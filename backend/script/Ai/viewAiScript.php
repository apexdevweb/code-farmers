<?php
require("backend/connection/connexionDB.php");
try {
    $affiche_ai = $bdd->prepare("SELECT * FROM tendance_ai WHERE id_ai ORDER BY id_ai DESC");
    $affiche_ai->execute();
} catch (PDOException $e) {
    echo ("Erreur de récupération des i.a" . $e->getMessage());
}
