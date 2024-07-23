<?php
// Clé de chiffrement et IV (vecteur d'initialisation) pour AES-256-CBC
define('ENCRYPTION_KEY', 'your-encryption-key-here');
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
    echo "Données décryptées : " . htmlspecialchars($decrypted_data);
} else {
    $data_to_encrypt = "http://codefarmers02/home.php";
    $encrypted_data = encrypt($data_to_encrypt);
    $url = "http://codefarmers02/home.php?data=" . urlencode($encrypted_data);
    echo "URL chiffrée : <a href=\"$url\">$url</a>";
}
