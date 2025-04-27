<?php
require_once("../backend/connection/connexionDB.php");
if (isset($_GET["id"])) {
    $ai_banne_id = (int) $_GET["id"];
    try {
        $admin_banne_ai = $bdd->prepare("DELETE FROM tendance_ai WHERE id_ai = ?");
        $admin_banne_ai->execute([$ai_banne_id]);

        header("Location: ../insertAi.php");
        exit();
    } catch (PDOException $e) {
        die("Erreur de suppression de l'ia'" . $e->getMessage());
    }
}
