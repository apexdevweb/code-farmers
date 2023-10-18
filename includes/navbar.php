<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Code-Farmer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../profile.php">Profil</a>
                </li>
                <?php
                if (isset($_SESSION['valideAuth'])) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mon profile
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../publication.php">Publier</a></li>
                            <li><a class="dropdown-item" href="maPublication.php">Mes Publications</a></li>
                            <li><a class="dropdown-item" href="actionback/users/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Sortie <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
        <?php
        if (isset($_SESSION['valideAuth'])) {
            echo "<h4> Bienvenue " . $_SESSION['userName'] . "</h4>";
        }
        ?>
    </div>
</nav>