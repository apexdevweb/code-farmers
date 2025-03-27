<?php
session_start();
if (!isset($_SESSION['valideAuth'])  && !isset($_SESSION['confirmkey']) && !isset($_SESSION['pro_Auth']) && !isset($_SESSION['adminAuth'])) {
    header('Location: login.php');
}
