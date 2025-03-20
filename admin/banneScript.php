<?php
require_once("../backend/connection/connexionDB.php");
if (isset($_GET["id"])) {
    $user_banne_id = (int) $_GET["id"];
    try {
        $admin_banne_users = $bdd->prepare("DELETE FROM users WHERE id = ?");
        $admin_banne_users->execute([$user_banne_id]);

        header("Location: activityUsers.php");
        exit();
    } catch (PDOException $e) {
        die("Erreur de suppression du compte" . $e->getMessage());
    }
}
