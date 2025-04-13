<?php
require('backend/connection/connexionDB.php');

if (isset($_SESSION['pro_data']['pro_id']) && !empty($_SESSION['pro_data']['pro_id'])) {
    try {
        $my_job_rescu = $bdd->prepare("SELECT * FROM recrutement WHERE job_author_id = ? ORDER BY `id_recruitment` DESC");
        $my_job_rescu->execute([($_SESSION['pro_data']['pro_id'])]);
    } catch (PDOException $e) {
        die("Erreur de chargement des offres" . $e->getMessage());
    }
}
