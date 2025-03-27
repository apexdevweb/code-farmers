<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Charger PHPMailer
require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

/**
 * Fonction pour envoyer un email de confirmation
 * 
 * @param string $destinataire L'adresse email du destinataire
 * @param int $userId ID de l'utilisateur dans la base de données
 * @param string $confirmkey La clé de confirmation
 * @return bool Retourne true si l'email est envoyé, false sinon
 */
function sendAutoMail($destinataire, $userId, $confirmkey)
{
    $proId = $_SESSION['id_enterprise'];
    $mail = new PHPMailer(true);

    try {
        // Paramètres SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'apexdevweb@gmail.com';
        $mail->Password = 'gduljheoebakocjx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Destinataire
        $mail->setFrom('apexdevweb@gmail.com', 'Code-Farmers');
        $mail->addAddress($destinataire);

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = 'Account confirmation';
        $mail->Body = '   <a href="http://codefarmers/backend/script/users/proVerifConfirme.php?id=' . $proId . '&confirmkey=' . $confirmkey . '">Activation de votre compte</a> ';
        $mail->AltBody = 'Cliquez sur le lien pour activer votre compte.';

        return $mail->send();
    } catch (Exception $e) {
        error_log("Erreur d'envoi d'email : " . $mail->ErrorInfo);
        return false;
    }
}
