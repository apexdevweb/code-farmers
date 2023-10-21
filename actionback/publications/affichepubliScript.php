<?php
require('actionback/database.php');
// ON RECUPERE LES PUBLICATIONS DANS LA TABLE PUBLICATIONS POUR LES AFFICHER SUR LES SITE
$affiche_publi = $bdd->prepare("SELECT * FROM `publications` ORDER BY `id` DESC");
$affiche_publi->execute();
