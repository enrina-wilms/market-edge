<?php
require_once '../../models/database.php';
require_once '../../models/user.php';


if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $u = new User();
    $count = $u->deleteUser($id, $dbcon);
    if($count){
        header("Location: users.php");
    }
}