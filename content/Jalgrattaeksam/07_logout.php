<?php
session_start();
if (!isset($_SESSION['tuvastamine'])) {
    header('Location: Teooriaeksam.php');
    exit();
}
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: 07_login.php');
    exit();
}
?>