<?php
require('actionback/database.php');

$verifReponsExist = $bdd->prepare("SELECT * FROM comentaire WHERE `id_coment` = ?");
$verifReponsExist->execute(array($publi_select_id));
