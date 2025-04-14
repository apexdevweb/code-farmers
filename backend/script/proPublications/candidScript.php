<?php
require_once('backend/connection/connexionDB.php');

if (isset($_POST['applyValide'])) {
    if (
        !empty($_POST['candid_titre']) && !empty($_POST['candid_ref']) && !empty($_POST['applicantFirstName']) && !empty($_POST['applicantLastName']) && !empty($_POST['applicantMail'])
        && !empty($_POST['applicantTel']) && !empty($_POST['applicantAbout']) && !empty($_FILES['CV']) && !empty($_FILES['LM'])
    ) {
        $apply_title = htmlspecialchars($_POST['candid_titre']);
        $apply_ref = htmlspecialchars($_POST['candid_ref']);
        $apply_f_name = htmlspecialchars(strip_tags($_POST['applicantFirstName']));
        $apply_l_name = htmlspecialchars(strip_tags($_POST['applicantLastName']));
        $apply_mail = filter_var($_POST['applicantMail'], FILTER_VALIDATE_EMAIL);
        $apply_tel = htmlspecialchars(strip_tags($_POST['applicantTel']));
        $apply_tel_sanitized =  str_replace([' ', '-', '.', '(', ')'], '', $apply_tel);
        $apply_about = htmlspecialchars(strip_tags($_POST['applicantAbout']));


        if (preg_match('/^\+?[1-9]\d{7,14}$/',  $apply_tel_sanitized)) {

            $sizeMax = 5097152;
            $extension = array('jpg', 'jpeg', 'png', 'webp', 'pdf', 'txt', 'rtf');

            if ($_FILES['CV']['size'] <= $sizeMax && $_FILES['LM']['size'] <= $sizeMax) {
                $extCvUpload = strtolower(substr(strrchr($_FILES['CV']['name'], '.'), 1));
                $extLmUpload = strtolower(substr(strrchr($_FILES['LM']['name'], '.'), 1));

                if (in_array($extCvUpload, $extension) && in_array($extLmUpload, $extension)) {
                    $routeCv = "assets/candidImg/" . $_SESSION['id'] . "_cv." . $extCvUpload;
                    $routeLm = "assets/candidImg/" . $_SESSION['id'] . "_lm." . $extLmUpload;

                    $cvUploaded = move_uploaded_file($_FILES['CV']['tmp_name'], $routeCv);
                    $lmUploaded = move_uploaded_file($_FILES['LM']['tmp_name'], $routeLm);

                    if ($cvUploaded && $lmUploaded) {
                        $req_insert_apply = $bdd->prepare("INSERT INTO candidature (candid_title,candid_ref,candid_fname,candid_lname,candid_mail,candid_tel,candid_description,candid_cv,candid_lm) VALUES (?,?,?,?,?,?,?,?,?)");
                        $req_insert_apply->execute([$apply_title, $apply_ref, $apply_f_name, $apply_l_name, $apply_mail, $apply_tel_sanitized,  $apply_about,  $cvUploaded, $lmUploaded]);

                        $successMsg = "Candidature envoyer";
                    } else {
                        echo "Erreur de transfert des documents";
                    }
                } else {
                    echo "Votre image dois être au format : jpg, jpeg, png, pdf";
                }
            } else {
                echo "Votre image ne dois pas dépasser 5mo";
            }
        } else {
            echo "Numéro de téléphone invalide";
        }
    } else {
        echo "Veuillez remplir tout les champs";
    }
}
