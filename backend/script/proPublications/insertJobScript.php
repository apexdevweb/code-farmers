<?php
require_once('backend/connection/connexionDB.php');

if (isset($_POST['jobPublish'])) {
    if (
        !empty($_POST['jobTitle']) && !empty($_POST['jobDesc']) && !empty($_POST['jobLocation'])
        && !empty($_POST['jobTime']) && !empty($_POST['jobContract']) && !empty($_POST['jobDevice']) && !empty($_POST['device_mount'])
    ) {
        $job_title = htmlspecialchars(strip_tags($_POST['jobTitle']));
        $job_description = htmlspecialchars(strip_tags($_POST['jobDesc']));
        $job_location = htmlspecialchars(strip_tags($_POST['jobLocation']));
        $job_time = htmlspecialchars(strip_tags($_POST['jobTime']));
        $job_contract = htmlspecialchars(strip_tags($_POST['jobContract']));
        $job_device = htmlspecialchars(strip_tags($_POST['jobDevice']));
        $job_mount = htmlspecialchars(strip_tags($_POST['device_mount']));
        $job_id_author = $_SESSION['pro_data']['pro_id'];
        $job_author = $_SESSION['pro_data']['pro_name'];
        $job_identity_number = random_int(10000, 50000);

        try {
            $req_job_verif = $bdd->prepare("SELECT * FROM recrutement WHERE job_identification = ?");
            $req_job_verif->execute([$job_identity_number]);
        } catch (PDOException $e) {
            die("Erreur de vérification" . $e->getMessage());
        }

        if ($req_job_verif->rowCount() > 0) {
            echo "Cette offre d'emploi existe déjà";
        } else {
            try {
                $req_insert_job = $bdd->prepare("INSERT INTO recrutement (job_title,job_description,job_location,job_time,job_contract,job_device,job_salary,job_offer_author,job_author_id,job_identification) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $req_insert_job->execute([$job_title, $job_description, $job_location, $job_time, $job_contract, $job_device, $job_mount, $job_author, $job_id_author, $job_identity_number]);
            } catch (PDOException $e) {
                die("Erreur d'insertion" . $e->getMessage());
            }
            echo "Offre publier avec succès";
            header("Location: home.php");
            exit;
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
