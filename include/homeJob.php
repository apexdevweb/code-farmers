<?php
foreach ($affiche_job as $afj) {
?>
    <div class="responsive_carte">
        <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px; overflow:hidden; background:none;">
            <div class="card-body">
                <h5 class="card-title" style="color: #000; text-shadow: 1px 2px 5px #000; font-size: 1.4rem; backdrop-filter: blur(2px);"><?= $afj['job_title'] ?></h5>
                <br>
                <h6 class="card-subtitle mb-2" style="color: #000; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000;">Par: <?= $afj['job_offer_author'] ?></h6>
                <!--pour avoir accès a la publications en commun avec la database on place un liens avec : ?id=...et le code php qui suit-->
                <button type="button" class="btn btn-info"><a href="articleJob.php?id=<?= $afj['id_recruitment']; ?>" style="font-family: Share Tech Mono, monospace; color: #000; font-size:1rem; font-weight: 500;">Voir l'offre</a></button>
            </div>
        </div>
    </div>
<?php
}
?>