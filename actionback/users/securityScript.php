<?php
session_start();
if (!isset($_SESSION['valide'])) {
    header('Location: login.php');
}
