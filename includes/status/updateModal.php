<?php
require_once "../../userSession.php";

require_once '../../config_test.php';

require_once MODELS_PATH . "/database.php";
require_once MODELS_STATUS_PATH . "/userStatus.php";
require_once '../../Validation/validation.php'; 

	$message ="";
	$statErr = "";
	$isValid = true;
//GETTING THE ID OF A SPECIFIC STATUS TO BE UPDATED BY THE USER
if(isset($_POST['updateStatus'])) {
	$id = $_POST['id'];
	
	$db = Database::getDb();
	$statusObj = new Status();
	$statusId = $statusObj->getStatusById($id, $db);
}

//UPADATING THE USER STATUS
	
if(isset($_POST['updateStatus'])) {
	$id = $_POST['statId'];
	$content = $_POST['updateContent'];
	date_default_timezone_set("America/Toronto");
	$date_post = date('Y-m-d h:i:sa');
	$user_id = $_SESSION['uid'];
	$user_fname = $_SESSION['uFname'];
	$user_lname = $_SESSION['uLname'];
	
	
	//UPDATING A SPECIFIC STAUS FROM USER
	$db = Database::getDb();
	$statusObj = new Status();
	$status = $statusObj->updateStatus($id, $content, $date_post, $user_id, $user_fname, $user_lname, $db);

}

$db = Database::getDb();
$statusObj = new Status();
$list = $statusObj->getAllStatus(Database::getDb());
?>
<script src="https://cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateTitle">
					Edit Post Status
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body status-modal-body">
				<div class="status-avatar-circle">
					<span class="status-initials"> <?php echo $firstChar . $secChar; ?> </span>
				</div>
				<form class="form-status" method="post" action="">
					<div class="input-group mb-3">
						<input type="hidden" name="statId" value="<?= $status->id ?>" />
						<label for="updateContent" class="sr-only">Status</label>
						<textarea id="updateContent" name="updateContent" class="form-control" aria-label="With textarea" placeholder="" row="2">
<!--						<?= $status->content; ?>-->
						</textarea>

						<!-- CKEDITOR-->
						<script>
							CKEDITOR.replace('updateContent', {
								width: '100%',
								height: '100px'
							});

						</script>

						<div class="modal-footer status-modal-footer">
							<button id="updateStatus" name="updateStatus" class="btn btn-outline-dark btn-block status-addStatus" type="submit">Post Status</button>
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
