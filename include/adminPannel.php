<?php
if (isset($_SESSION['adminAuth'])) {
    if (isset($_SESSION['data']['adm_name'])) {
?>
        <button class="openbtn" onclick="openNav()"><i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i> <i class="fa-regular fa-user"></i></button>
        <br>
        <br>
        <div class="Panel_container" id="mySidepanel">
            <div class="Panel_containerSecond">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-xmark" style="color:#000;"></i></a>
            </div>
            <h5 class="title__admin--pannel">Administrateur: <?= $_SESSION['data']['adm_name'] ?></h5>
            <ul class="admin__nav">
                <li class="admin__nav--item"><a href="admin/activityUsers.php"><i class="fa-solid fa-users"></i>Utilisateurs</a></li>
                <li class="admin__nav--item"><a href="admin/activityPubli.php"><i class="fa-regular fa-folder-open"></i>Publications</a></li>
                <li class="admin__nav--item"><a href="insertAi.php"><i class="fa-solid fa-microchip"></i>Gestion des i.a</a></li>
                <li class="admin__nav--item"><a href="insertTool.php"><i class="fa-solid fa-shield-halved"></i>Gestion secure tools</a></li>
                <li class="admin__nav--item"><a href="../backend/security/logout.php"><i class="fa-solid fa-power-off"></i>Déconnexion</a></li>
            </ul>
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