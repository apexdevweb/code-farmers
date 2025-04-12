<?php
require_once('backend/connection/connexionDB.php');
try {
    $affiche_job = $bdd->prepare("SELECT * FROM `recrutement` WHERE id_recruitment ORDER BY id_recruitment DESC");
    $affiche_job->execute();
} catch (PDOException $e) {
    die("Erreur de récupération des offres d'emploi" . $e->getMessage());
}
