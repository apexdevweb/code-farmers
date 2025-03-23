<?php
require_once("../backend/connection/connexionDB.php");
if (isset($_GET["id"])) {
    $publi_banne_id = (int) $_GET["id"];
    try {
        $admin_banne_publi = $bdd->prepare("DELETE FROM publications WHERE id = ?");
        $admin_banne_publi->execute([$publi_banne_id]);

        header("Location: activityPubli.php");
        exit();
    } catch (PDOException $e) {
        die("Erreur de suppression de la publication" . $e->getMessage());
    }
}
