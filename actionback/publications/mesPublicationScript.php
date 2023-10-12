<?php
require('actionback/database.php');
// ON RECUPERE TOUTE LES PUBLICATIONS DANS UN "array" "grâce à son ID" DU L'UTILISATEUR CONNECTER
$publi_rescu = $bdd->prepare("SELECT `id`, `titre`, `contenu` FROM publications WHERE id_auteur = ?");
$publi_rescu->execute(array($_SESSION['id']));
