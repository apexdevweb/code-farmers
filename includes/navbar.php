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
                    <a class="nav-link" href="../publication.php">Publier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mon profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="maPublication.php">Mes Publications</a></li>
                        <li><a class="dropdown-item" href="actionback/users/logout.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php
        echo "<h4> Bienvenue " . $_SESSION['userName'] . "</h4>";
        ?>
    </div>
</nav>