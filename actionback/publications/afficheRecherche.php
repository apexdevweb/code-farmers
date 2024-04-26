<?php
require("actionback/database.php");

$affiche_publiSearch = $bdd->query('SELECT `id`, `id_auteur`, `titre`, `contenu`, `nom_auteur`, `date_publication`, `img_publication` FROM publications ORDER BY `id` DESC LIMIT 0,5');

if (isset($_GET['valideRch']) && !empty($_GET['chercher'])) {
    $userRecherche = $_GET['chercher'];

    $affiche_publiSearch = $bdd->query('SELECT `id`, `id_auteur`, `titre`, `contenu`, `nom_auteur`, `date_publication`, `img_publication` FROM publications WHERE titre LIKE "%' . $userRecherche . '%" ORDER BY `id` DESC');
}
