<?php
//on fait une requête pour afficher le nombre de publication par mois dans le graphique
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $reqGraph = $bdd->query("SELECT date_publication, id_auteur FROM publications ORDER BY `id` DESC");
}

//on fait une boucle foreach pour placer les données dans des tableaux
foreach ($reqGraph as $dataGraph) {
    $date_publi = $dataGraph['date_publication'];
    $auteur_publi = $dataGraph['id_auteur'];
}
var_dump($date_publi);
var_dump($auteur_publi);

?>

<div>
    <canvas id="myChart"></canvas>
</div>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3, 4, 20, 13, 5, 15, 14],
                borderWidth: 1,
                backgroundColor: '#ff3333',
                borderColor: '#000',
                pointBackgroundColor: '#ff3333',

            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>