<?php
require("backend/connection/connexionDB.php");
try {
    $affiche_secure_tools = $bdd->prepare("SELECT * FROM secure_tools WHERE scrt_id ORDER BY scrt_id DESC");
    $affiche_secure_tools->execute();
} catch (PDOException $e) {
    echo ("Erreur de récupération des outils de sécurité" . $e->getMessage());
}
