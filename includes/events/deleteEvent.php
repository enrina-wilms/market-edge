<?php
require_once "../../config_test.php";
require_once MODELS_PATH . '/database.php';
require_once MODELS_PATH . '/events/event_class.php'; 
  

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $db = Database::getDb();
    $delEvent = new Event();
    $count = $delEvent->deleteEvent($id, $db);

    if($count){
        header("Location: eventsAdmin.php");
    }
}
