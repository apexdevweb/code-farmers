<?php
require("backend/connection/connexionDB.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    try {
        $req_candid_rescu = $bdd->prepare("SELECT * FROM candidature");
        $req_candid_rescu->execute();
    } catch (PDOException $e) {
        echo "Erreur de récuperation des candidatures" . $e->getMessage();
    }

    if ($req_candid_rescu->rowCount() > 0) {
        $affiche_candid = $req_candid_rescu->fetch();

        $apply_titre = $affiche_candid['candid_title'];
        $apply_ref = $affiche_candid['candid_ref'];
        $apply_fname = $affiche_candid['candid_fname'];
        $apply_lname = $affiche_candid['candid_lname'];
        $apply_mail = $affiche_candid['candid_mail'];
        $apply_tel = $affiche_candid['candid_tel'];
        $apply_descript = $affiche_candid['candid_description'];
        $apply_cv = $affiche_candid['candid_cv'];
        $apply_lm = $affiche_candid['candid_lm'];
    } else {
        echo "Aucune candidature trouver";
    }
}
