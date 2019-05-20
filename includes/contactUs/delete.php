<?php
require_once '../../models/database.php';
require_once '../../models/contact.php';



	if (isset($_POST['delete'])){
	$id = $_POST['id'];
	$dbcon = Database::getDb();
    $c = new Contact();
    $count = $c->deleteContact($id, $dbcon);
    if($count){
        header("Location: messages.php");
    }
}
	
	
	



