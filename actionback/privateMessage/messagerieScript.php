<?php
require("actionback/database.php");

// ON RECUPERE LES MEMBRE INSCRIT DANS LA TABLE USERS POUR LES AFFICHER SUR LES SITE
$reqMessage_users = $bdd->query("SELECT * FROM users ORDER BY `id` DESC");
