<?php
require('backend/connection/connexionDB.php');
// ON RECUPERE LES MEMBRE INSCRIT DANS LA TABLE USERS POUR LES AFFICHER SUR LES SITE
$affiche_users = $bdd->prepare("SELECT * FROM users ORDER BY `id` DESC");
$affiche_users->execute();
