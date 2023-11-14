<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../home.php"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../profileGlobale.php"><i class="fa-solid fa-users"></i> Profils</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../recherche.php"><i class="fa-solid fa-magnifying-glass"></i> Recherche</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-laptop-code"></i>
                        Utilitaire-frontend
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://html-css-js.com/html/generator/">Html-css-js.com</a></li>
                        <li><a class="dropdown-item" href="https://bennettfeely.com/clippy/">Bennettfeely.com</a></li>
                        <li><a class="dropdown-item" href="https://animejs.com/v2/documentation/#cssSelector">Anime.js</a></li>
                        <li><a class="dropdown-item" href="https://pixijs.com/examples/mesh-and-shaders/triangle">Pixijs.com</a></li>
                        <li><a class="dropdown-item" href="https://tobiasahlin.com/moving-letters/">Tobiasahlin.com</a></li>
                        <li><a class="dropdown-item" href="https://redstapler.co/10-stunning-css-3d-effect-must-see/">Redstapler.co</a></li>
                        <li><a class="dropdown-item" href="https://webcode.tools/css-generator/keyframe-animation">Webcode.tools</a></li>
                        <li><a class="dropdown-item" href="https://freefrontend.com/">Freefrontend.com</a></li>
                        <li><a class="dropdown-item" href="https://jenseign.com/apprendre-html-css/pratique-exemple/javascript-classlist/">Jenseigne.com</a></li>
                        <li><a class="dropdown-item" href="https://graphiste.com/blog/transitions-page-css/">Graphiste.com</a></li>
                        <li><a class="dropdown-item" href="https://getbootstrap.com/">Bootstrap.com</a></li>
                        <li><a class="dropdown-item" href="https://tailwindcss.com/">Tailwindcss.com</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-server"></i>
                        Utilitaire-backend
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://symfony.com/">Symfony.com</a></li>
                        <li><a class="dropdown-item" href="https://laravel.com/">Laravel.com</a></li>
                        <li><a class="dropdown-item" href="https://expressjs.com/fr/">Expressjs.com</a></li>
                        <li><a class="dropdown-item" href="https://cakephp.org/">CakePHP.org</a></li>
                        <li><a class="dropdown-item" href="https://www.djangoproject.com/">Djangoproject.com</a></li>
                        <li><a class="dropdown-item" href="https://flask.palletsprojects.com/en/3.0.x/">Flask.com</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-image"></i>
                        Image rework
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://photomosh.com/">Photomosh.com</a></li>
                        <li><a class="dropdown-item" href="https://www.text-image.com/convert/">Text-Image.com</a></li>
                        <li><a class="dropdown-item" href="https://www.remove.bg/fr">RemoveBG.fr</a></li>
                        <li><a class="dropdown-item" href="https://imageslidermaker.com/v2">SliderMaker.com</a></li>
                        <li><a class="dropdown-item" href="https://www.unscreen.com/upload">Unscreen.com</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Sortie <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
        <?php
        if (isset($_SESSION['valideAuth'])) {
        ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="asset/image/<?= $_SESSION['id']; ?>" style="width: 50px; height: 50px; border-radius: 50px;"></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="publication.php"><i class="fa-solid fa-file-pen"></i>Publier</a></li>
                    <li><a class="dropdown-item" href="maPublication.php"><i class="fa-regular fa-folder-open"></i>Mes Publications</a></li>
                    <li><a class="dropdown-item" href="messagerie.php"><i class="fa-regular fa-comments"></i>message privé</a></li>
                    <li><a class="dropdown-item" href="editeurProfile.php?id=<?= $_SESSION['id'] ?>"><i class="fa-solid fa-gear"></i>Géré profil</a></li>
                    <li><a class="dropdown-item" href="actionback/users/logout.php"><i class="fa-solid fa-power-off"></i>Déconnexion</a></li>
                </ul>
            </li>
        <?php
        }
        ?>
        <br>
        <br>
        <?php
        if (isset($_SESSION['valideAuth'])) {
            echo "<h4>  Bienvenue " . $_SESSION['userName'] . "</h4>";
        }
        ?>
    </div>
</nav>