<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=codefarmer;charset=utf8;', 'ApexDev', 'FarmersDev1389@');
} catch (Exception $e) {
    die('Une erreur a été trouver : ' . $e->getmessage());
}
