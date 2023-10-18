<?php
require('actionback/database.php');
// ON RECUPERE LES MEMBRE INSCRIT DANS LA TABLE USERS POUR LES AFFICHER SUR LES SITE
$affiche_publi = $bdd->prepare("SELECT * FROM `publications` ORDER BY `id` DESC");
$affiche_publi->execute();
