<?php
 require_once "../../models/database.php";
 
 
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
echo "<h1>Secure page</h1>";