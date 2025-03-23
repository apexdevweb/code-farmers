<?php
foreach ($affiche_publi as $afp) {
?>
    <div class="responsive_carte">
        <div class="card carte_hov" style="width: 15rem; height: auto; margin-top: 10px;background: url('assets/images/symbolehtml.jpg') no-repeat 50% 57%;background-size: cover; overflow:hidden;">
            <div class="card-body">
                <h5 class="card-title" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000; font-size: 1.4rem; backdrop-filter: blur(2px);"><?= $afp['titre'] ?></h5>
                <div style="color: #fff; border:1px solid #fff; box-shadow: 1px 2px 5px #000; border-radius:5px;"></div>
                <br>
                <img src="assets/userimgpubli/<?= $afp['img_publication']; ?>" style="width: 100%; height: 7rem; border-radius: 5px;">
                <h6 class="card-subtitle mb-2" style="color: #fff; backdrop-filter: blur(3px); text-shadow: 1px 2px 5px #000;"><?= $afp['date_publication'] ?> <?= $afp['nom_auteur'] ?></h6>
                <!--pour avoir accès a la publications en commun avec la database on place un liens avec : ?id=...et le code php qui suit-->
                <button type="button" class="btn btn-info"><a href="article.php?id=<?= $afp['id']; ?>" style="font-family: Share Tech Mono, monospace; color: #000; font-size:1rem; font-weight: 500;">Voir la publication</a></button>
            </div>
        </div>
    </div>
<?php
}
?>