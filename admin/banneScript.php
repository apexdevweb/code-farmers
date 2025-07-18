<?php
require_once("../backend/connection/connexionDB.php");
if (isset($_GET["id"])) {
    $user_banne_id = (int) $_GET["id"];
    try {
        $admin_select_user_ip = $bdd->prepare("SELECT user_ip FROM users WHERE id = ?");
        $admin_select_user_ip->execute([$user_banne_id]);

        if ($admin_select_user_ip->rowCount() > 0) {

            $admin_banne_users = $bdd->prepare("DELETE FROM users WHERE id = ?");
            $admin_banne_users->execute([$user_banne_id]);
        }
        header("Location: activityUsers.php");
        exit();
    } catch (PDOException $e) {
        echo ("Erreur de suppression de l'utilisateur" . $e->getMessage());
    }
}
