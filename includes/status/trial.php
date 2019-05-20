<?php
require_once "../../userSession.php";

require_once '../../config_test.php';

require_once MODELS_PATH . "/database.php";
require_once MODELS_STATUS_PATH . "/userStatus.php";
require_once '../../Validation/validation.php'; 

//require_once MODELS_STATUSCOMMENTS_PATH . "/status-comments.php";
//include '../includes/add-status.php';
//add this to every page. if user is not login it will redirect to login page

	$message ="";
	$statErr = "";
	$isValid = true;
//GETTING THE ID OF A SPECIFIC STATUS TO BE UPDATED BY THE USER
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$db = Database::getDb();
	$statusObj = new Status();
	$status = $statusObj->getStatusById($id, $db);
}

//UPADATING THE USER STATUS
	
if(isset($_POST['updBtn'])) {
	$id = $_POST['statId'];
	$content = $_POST['content'];
	date_default_timezone_set("America/Toronto");
	$date_post = date('Y-m-d h:i:sa');
	$user_id = $_SESSION['uid'];
	$user_fname = $_SESSION['uFname'];
	$user_lname = $_SESSION['uLname'];
	
	if(checkEmpty($content)){
            $statErr = "Please enter your status";
            $isValid = false;
	}

//IF INPUT TEXTAREA IS NOT EMPTY THEEN FORM WILL BE SUBMITTED AND SAVE TO THE DATABASE
if($isValid === true) {
	
	//UPDATING A SPECIFIC STAUS FROM USER
	$db = Database::getDb();
	$statusObj = new Status();
	$status = $statusObj->updateStatus($id, $content, $date_post, $user_id, $user_fname, $user_lname, $db);
	
	if($status) {
		header("Location:../homepage/homepage.php");
	} else{
		echo "PROBLEM UPDATING STATUS";
	}
}
}

/*THIS GET THE LIST OF STATUS STORED FROM THE DATABASE TABLE STATUS*/
$db = Database::getDb();
$statusObj = new Status();
$list = $statusObj->getAllStatus(Database::getDb());

?>

<div class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">
					Update your status <?php echo $_SESSION['uFname'];?>? &nbsp;Share It!
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body status-modal-body">
				<div class="avatar-circle">
					<span class="initials"> <?php echo $firstChar . $secChar; ?> </span>
				</div>
				<form class="form-status" method="post" action="">
					<div class="input-group mb-3">
						<label for="content" class="sr-only">Update Status</label>
						<textarea id="content" name="content" class="form-control" aria-label="With textarea" placeholder="What's on your mind <?php echo $_SESSION['uFname'];?>?Share It!" row="2">
						</textarea>
						
						<!-- CKEDITOR-->
						<script>
							CKEDITOR.replace('content', {
								width: '100%',
								height: '100px'
							});

						</script>

						<div class="modal-footer status-modal-footer">
							<button id="updBtn" name="update" class="btn btn-outline-dark btn-block status-addStatus" type="submit">Post Status</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
						</div>
					</div>
				</form>
				<!-- CONTAINER FOR MESASGE ERROR IF INPUT FILED IS EMPTY-->
				<div>
					<span class="status-error"><?php echo $statErr; ?></span>
				</div>
			</div>
		</div>
	</div>
</div>