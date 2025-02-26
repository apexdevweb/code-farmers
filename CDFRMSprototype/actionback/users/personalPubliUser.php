<?php
require('actionback/database.php');
// ON RECUPERE TOUTE LES PUBLICATIONS DANS UN "array" "grâce à son ID" DU L'UTILISATEUR CONNECTER
$publi_rescu = $bdd->prepare("SELECT `id`, `titre`, `contenu`,`nom_auteur`,`date_publication`, `img_publication` FROM publications WHERE id_auteur = ? ORDER BY `id` DESC");
$publi_rescu->execute(array($_GET['id']));
