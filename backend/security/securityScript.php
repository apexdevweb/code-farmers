<?php
session_start();
if (!isset($_SESSION['valideAuth']) && !isset($_SESSION['confirmkey'])) {
    header('Location: login.php');
}
