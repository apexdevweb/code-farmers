<?php
// Récupérer le nombre de visites par mois
$stmt = $bdd->prepare("SELECT DATE_FORMAT(`date`, '%Y-%m-%D') AS month, COUNT(*) AS visits FROM visites GROUP BY month");
$stmt->execute();

$months = [];
$visits = [];
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    $months[] = $row['month'];
    $visits[] = $row['visits'];
}
