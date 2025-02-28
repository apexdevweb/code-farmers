<?php
// on verifie que l'id est biens passé en URL si oui avec "
//intval on converti n'importe quel valeur passé en paramètre d'url en nombre entier si ce n'est pas le cas c'est définie sur 0

$profile_user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Récupérer le nombre de visites par mois
$stmt = $bdd->prepare("SELECT DATE_FORMAT(`date`, '%Y-%m-%d') AS month, COUNT(*) AS visits FROM visites WHERE `consulted_profile_id` = :profile_user_id GROUP BY month");
$stmt->bindParam(':profile_user_id', $profile_user_id, PDO::PARAM_INT);
$stmt->execute();

$months = [];
$visits = [];
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    $months[] = $row['month'];
    $visits[] = $row['visits'];
}
