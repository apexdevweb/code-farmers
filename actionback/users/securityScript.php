<?php
session_start();
if (!isset($_SESSION['valideAuth'])) {
    header('Location: login.php');
}
