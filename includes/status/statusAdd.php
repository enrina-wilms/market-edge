<?php

//SESSIONS AND LOGIN STILL NOT IMPLEMENTED

//require_once '../../config_test.php';
require_once MODELS_PATH . "/database.php";
require_once MODELS_STATUS_PATH . "/userStatus.php";
require_once '../../Validation/validation.php'; 

//add this to every page. if user is not login it will redirect to login page

$message ="";
$statErr = "";
$isValid = true;
if(isset($_POST['addStatus'])) {
	
	$content_post = $_POST['content'];
	
	// I WANT THE CAPTURE DATETIME TO BE TOROONTO TIMEZONE
	date_default_timezone_set("America/Toronto");
	$date_post = date('Y-m-d h:i:sa');
	
	//THIS IS A TEMPORARY USERID SO I CAN TRY WRITING A NEW STATUS POST ON THE DATABASE
	//SESSIONS AND LOGIN STILL NOT IMPLEMENTED
	$user_id = $_SESSION['uid'];
	$user_fname = $_SESSION['uFname'];
	$user_lname = $_SESSION['uLname'];
	
	//VALIDATION FOR INPUT TEXTAREA IF EMPTY A MESSAGE WILL APPEAR
	if(checkEmpty($content_post)){
            $statErr = "Please enter your status";
            $isValid = false;
	}
	
	//IF INPUT TEXTAREA IS NOT EMPTY THEEN FORM WILL BE SUBMITTED AND SAVE TO THE DATABASE
	if($isValid === true) {
		
	$db = Database::getDb();
	$statusObj = new Status();
	$add = $statusObj->addStatus($content_post, $date_post, $user_id, $user_fname, $user_lname, $db);

	if($add) {
		//DISPLAY STATUS
		header("Location:homepage.php")	;
	} else{
		$message = "Problem posting a status!";
	}
	exit;
}
}
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$db = Database::getDb();
	$statusObj = new Status();
	$statusId = $statusObj->getStatusById($id, $db);
}
if(isset($_POST['delStatus'])){
	$id = $_POST['id'];
	$db = Database::getDb();
		$statusObj = new Status();
		$delete = $statusObj->deleteStatus($id, $db);
	if($delete) {
		header("Location:homepage.php");
	}
	}

//if(isset($_POST['update'])) {
//	
//	//VALIDATION FOR INPUT TEXTAREA IF EMPTY A MESSAGE WILL APPEAR
//	if(checkEmpty($content_post)){
//		$statErr = "Please enter your status";
//		$isValid = false;
//	}
//	
//	//IF INPUT TEXTAREA IS NOT EMPTY THEEN FORM WILL BE SUBMITTED AND SAVE TO THE DATABASE
//	if($isValid === true) {
//	
//		$id = $_POST['id'];
//		$db = Database::getDb();
//		$statusObj = new Status();
//		$statusObjtatus = $statusObj->getStatusById($id, $db);
//	}
//}

//TO DISPLAY THE LIST OF THE STATUS STORED IN THE DATABASE
$db = Database::getDb();
$statusObj = new Status();
$list = $statusObj->getAllStatus(Database::getDb());


//EOF