<?php
// Clé de chiffrement et IV (vecteur d'initialisation) pour AES-256-CBC
//define('ENCRYPTION_KEY', 'Votre-clé-decryptage-ici'); //<--(PREMIERE METHODE AVEC UNE CLE PREDEFINI);
define('ENCRYPTION_KEY', random_int(1000000, 9000000)); //<--(DEUXIEME METHODE AVEC UN random_int() QUI GENERE UN CRYPTAGE ALEATOIRE A CHAQUE ACTUALISATION)
define('IV', '1234567891011121'); // IV doit être de 16 octets

function encrypt($data)
{
    $key = hash('sha256', ENCRYPTION_KEY, true);
    $iv = IV;
    return base64_encode(openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
}

function decrypt($data)
{
    $key = hash('sha256', ENCRYPTION_KEY, true);
    $iv = IV;
    return openssl_decrypt(base64_decode($data), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}

// Exemple d'utilisation
if (isset($_GET['data'])) {
    $encrypted_data = $_GET['data'];
    $decrypted_data = decrypt($encrypted_data);
    //echo "Données décryptées : " . htmlspecialchars($decrypted_data);
} else {
    $data_to_encrypt = ["http://code-farmers999/home.php", "http://code-farmers999/signup.php", "http://code-farmers999/login.php"];
    $encrypted_data = encrypt($data_to_encrypt[0], [1], [2]);
    $url = ["http://code-farmers999/home.php?data=" . urlencode($encrypted_data), "http://code-farmers999/signup.php?data=" . urlencode($encrypted_data), "http://code-farmers999/login.php?data=" . urlencode($encrypted_data)];
    //echo "URL chiffrée : <a href=\"$url\">$url</a>";
}
