<?php
require_once "../../config_test.php";
require_once MODELS_PATH . '/database.php';
require_once MODELS_FAQ_PATH . '/FAQ_class.php';

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $delFAQ = new FAQ();
    $count = $delFAQ->deleteFaq($id, $dbcon);

    if($count){
        header("Location: faqAdmin.php");
    }
}
