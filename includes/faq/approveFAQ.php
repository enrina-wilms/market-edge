<?php
require_once "../../config_test.php";
require_once MODELS_PATH . '/database.php';
require_once MODELS_FAQ_PATH . '/FAQ_class.php';

if(isset($_POST['approval'])){
    $id = $_POST['id'];

    $db = Database::getDb();
    $id = $_POST['id'];
    $approval ="1";

    $db = Database::getDb();
    $appFAQ = new FAQ();
    $count = $appFAQ->approveFAQ($approval, $id, $db);

    if($count){
        header("Location: faqAdmin.php");
    }else{
        echo "Problem Updating";
    }
   
}
if(isset($_POST['disapproval'])){
    $id = $_POST['id'];

    $db = Database::getDb();
    $id = $_POST['id'];
    $approval ="0";

    $db = Database::getDb();
    $appFAQ = new FAQ();
    $count = $appFAQ->approveFAQ($approval, $id, $db);

    if($count){
        header("Location: faqAdmin.php");
    }else{
        echo "Problem Updating";
    }

}