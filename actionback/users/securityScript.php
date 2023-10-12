<?php
if (!isset($_SESSION['valide'])) {
    header('Location: login.php');
}
