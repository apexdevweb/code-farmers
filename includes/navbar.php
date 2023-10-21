<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Code-Farmer</a>
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
                    <i class="fa-regular fa-user"></i> Mon profil</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="publication.php"><i class="fa-solid fa-file-pen"></i>Publier</a></li>
                    <li><a class="dropdown-item" href="maPublication.php"><i class="fa-regular fa-folder-open"></i>Mes Publications</a></li>
                    <li><a class="dropdown-item" href="editeurProfile.php?id=<?= $_SESSION['id'] ?>"><i class="fa-solid fa-gear"></i>Paramètre profil</a></li>
                    <li><a class="dropdown-item" href="actionback/users/logout.php"><i class="fa-solid fa-power-off"></i>Déconnexion</a></li>
                </ul>
            </li>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['valideAuth'])) {
            echo "<h4>  Bienvenue " . $_SESSION['userName'] . "</h4>";
        }
        ?>
    </div>
</nav>