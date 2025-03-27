<?php
if (isset($_SESSION['pro_Auth'])) {
    if (isset($_SESSION['pro_data']['pro_name'])) {
?>
        <button class="openbtn" onclick="openNav()"><i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i> <i class="fa-regular fa-user"></i></button>
        <br>
        <br>
        <div class="Panel_container" id="mySidepanel">
            <div class="Panel_containerSecond">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h5 style="text-shadow: 1px 2px 3px #000;text-decoration: none; text-align: center;">Bonjour <?= $_SESSION['pro_data']['pro_name'] ?></h5>
            <li class="nav-item dropdown" style="color:#fff;">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 3.5rem; color:#E60000;">
                    <img src="assets/usersimg/<?= $_SESSION['pro_data']['pro_banner']; ?>" class="img-fluid"></a>
                <ul class="dropdown-menu">
                    <li style="color:#333;"><a class="dropdown-item" href="publication.php"><i class="fa-solid fa-file-pen" style="color:#333;"></i>Publier</a></li>
                    <li style="color:#333;"><a class="dropdown-item" href="maPublication.php"><i class="fa-regular fa-folder-open" style="color:#333;"></i>Mes Publications</a></li>
                    <li style="color:#333;"><a class="dropdown-item" href="messagerie.php"><i class="fa-regular fa-comments" style="color:#333;"></i>Message</a></li>
                    <li style="color:#333;"><a class="dropdown-item" href="https://discord.gg/NjcmEd7n/"><i class="fa-brands fa-discord" style="color:#333;"></i>Officiale-Discord-Europe</a></li>
                    <li style="color:#333;"><a class="dropdown-item" href="editeurCpgnyProfil.php?id=<?= $_SESSION['pro_data']['pro_id'] ?>"><i class="fa-solid fa-gear" style="color:#333;"></i>Gérer profil</a></li>
                    <li style="color:#333;"><a class="dropdown-item" href="../backend/security/logout.php"><i class="fa-solid fa-power-off" style="color:#333;"></i>Déconnexion</a></li>
                </ul>
            </li>
        </div>

<?php
    }
}
?>
<script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "350px";
        document.getElementById("mySidepanel").style.opacity = "1";

    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0px";
        document.getElementById("mySidepanel").style.opacity = "0";
    }
</script>