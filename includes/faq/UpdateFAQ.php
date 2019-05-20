<?php
  	require_once "../../userSession.php";
	require_once "../../config_test.php";
    require_once MODELS_PATH . '/database.php';
    require_once MODELS_FAQ_PATH . '/FAQ_class.php';
    require_once '../../Validation/validation.php'; 

        if(isset($_POST['update'])){
            $id = $_POST['id'];

            $db = Database::getDb();
            $updFAQ = new FAQ();
            $question = $updFAQ->getFaqById($id, $db);
            
            $username = $question->name;
            $useremail = $question->email;
            $questiontitle = $question->title;
            $questiondescription = $question->description;
            $quesresponse = $question->response;
        }


    $questiontitle = "";

    if(isset($_POST['updfaq'])){

        $id = $_POST['fid'];
        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $questiontitle = $_POST['title'];
        $questiondescription = $_POST['description'];
        $quesresponse = $_POST['response'];
        //$approval = $_POST['approve']; It was saying that it was not defined
        $approval = "0";



        if($username == ""){
            echo "Please Enter a Name";
        }elseif($useremail == "") {
            echo "Please Enter an Email";
        }elseif($questiontitle == "default") {
            echo "Please Pick a Subject";
        }elseif($questiondescription == "") {
            echo "Please Enter a Question";
        }else{
            $db = Database::getDb();
            $updFAQ = new FAQ();
            $count = $updFAQ->updateFaq($id, $username, $useremail, $questiontitle, 
            $questiondescription, $quesresponse, $approval, $db);

            if($count){
                header("Location: faqAdmin.php");
            }
        }exit; 
    }


//  require_once "../../userSession.php";
//  require_once '../../config_test.php';
  require_once INCLUDES_PATH . '/header_admin.php';

?>

<form action="" method="post" id="updateFAQ">
    <h2>Update</h2>
    <input type="hidden" name="fid" value="<?= $question->id; ?>" />
    <div id="faqTheirName" class="faqInfo form-group">
        Your Name: <input type="text" class="faqInput" name="name" value="<?= $question->name; ?>" /><br/>
    </div>
    <div id="faqEmail" class="faqInfo form-group">
        Email: <input type="text" class="faqInput" name="email" value="<?= $question->email; ?>" /><br />
    </div>
    <div id="questionDiv" class="form-group">
        <label class="faqInput" for="questiontitle">Subject:</label>
        <select name="title" id="title">
                <option value="default" <?php if($question->title == 'default') echo "selected"; ?> >Choose a Subject!</option>
                <option value="portfolio" <?php if($question->title == 'portfolio') echo "selected"; ?> >Portfolio</option>
                <option value="stock" <?php if($question->title == 'stock') echo "selected"; ?> >Stock</option>
                <option value="general" <?php if($question->title == 'general') echo "selected"; ?> >General</option>
                </select><br />        
    </div>
    <div id="quesDescription" class="faqInfo form-group">
        Question: <input type="textarea" class="faqInput" name="description" value="<?= $question->description; ?>" /><br />
    </div>
    <div id="quesResponse" class="faqInfo form-group">
        Answer: <input type="textarea" class="faqInput" name="response" value="<?= $question->response; ?>" /><br />
    </div>
    <input type="submit" id="faqSubmit" name="updfaq" value="Update Question">
</form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery.slimscroll.min.js"></script>
    <script src="../../js/trial.js"></script>
</body>

</html>	 