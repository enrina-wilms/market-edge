<?php 

session_start();

$userid = $_SESSION['uid'];

if (empty($userid)){
    header("location: ../loginRegistration/login.php");   
}