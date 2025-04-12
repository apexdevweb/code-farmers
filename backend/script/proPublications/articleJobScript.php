<?php
require_once('backend/connection/connexionDB.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $job_artcl_id = (int) htmlspecialchars(strip_tags($_GET['id']));

    try {
        $affiche_artcl_job = $bdd->prepare("SELECT * FROM `recrutement` WHERE id_recruitment = ?");
        $affiche_artcl_job->execute([$job_artcl_id]);
    } catch (PDOException $e) {
        die("Erreur de récupération de l'offres" . $e->getMessage());
    }

    if ($affiche_artcl_job->rowCount() > 0) {

        $job_info = $affiche_artcl_job->fetch();

        $job_title = $job_info['job_title'];
        $job_descript = $job_info['job_description'];
        $job_location = $job_info['job_location'];
        $job_work_time = $job_info['job_time'];
        $job_contract_type = $job_info['job_contract'];
        $job_device_type = $job_info['job_device'];
        $job_salary = $job_info['job_salary'];
        $job_employer = $job_info['job_offer_author'];
        $job_identification_number = $job_info['job_identification'];
    } else {
        echo "Aucune offre n'a été trouver";
    }
}
