<?php
require_once("../backend/connection/connexionDB.php");
if (isset($_GET["id"])) {
    $user_banne_id = (int) $_GET["id"];
    try {
        $target_user_ip = $bdd->prepare("SELECT user_ip FROM users WHERE id");
        $target_user_ip->execute([$user_banne_id]);

        if ($target_user_ip) {
            $admin_banne_users = $bdd->prepare("DELETE FROM users WHERE id = ?");
            $admin_banne_users->execute([$user_banne_id]);

            header("Location: activityUsers.php");
            exit();
        } else {
            echo "Impossible de trouver l'adresse ip de l'utilisateur";
        }
    } catch (PDOException $e) {
        die("Erreur de suppression du compte" . $e->getMessage());
    }
}
