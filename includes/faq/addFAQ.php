<?php
	require_once "../../config_test.php";
    require_once MODELS_PATH . '/database.php';
    require_once MODELS_FAQ_PATH .'/FAQ_class.php';
    require_once '../../Validation/validation.php'; 

    $nameErr = "";
    $emailErr = "";
    $titleErr = "";
    $descErr = "";
    $isValid = true;

    $username = $useremail = $questiontitle =$questiondescription = "";
    if(isset($_POST['addfaq'])){

        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $questiontitle = $_POST['title'];
        $questiondescription = $_POST['description'];
        $approval = "0";

       
        if(checkEmpty($username)){
            $nameErr = " Please Enter Your Name";
            $isValid = false;
        }
        if(checkEmpty($useremail)){
            $emailErr = " Please Enter Your Email";
            $isValid = false;
        }
        if(checkDropDown($questiontitle,"default")){
            $titleErr = "Please Select a Value";
            $isValid = false;
        }
        if(checkEmpty($questiondescription)){
            $descErr = " Please Enter Your Question";
            $isValid = false;
        }


        if($isValid === true){
           
            $db = Database::getDb();
            $addFAQ = new FAQ();
            $count = $addFAQ->addFaq($username, $useremail, 
            $questiontitle, $questiondescription, $approval, $db);

            if($count){
                
                echo "<p class='faqSuccess'>Your Question is Under Review </p>";
            }   
            
        }
        
    }

   

   
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 center-div">
            <form action="" method="post">
            <div id="myFAQ">
                <div id="faqTheirName" class="faqInfo form-group">
                    Your Name: <input class="faqInput form-control" type="text" name="name" /><br/>
                    <span id="nameErr" style="color:red;">
                        <?php
                            if(isset($nameErr)) {
                                echo $nameErr;
                                        }
                        ?>
                    </span>
                </div>
                <div id="faqEmail" class="faqInfo form-group">
                    Email: <input class="faqInput form-control" type="text" name="email" /><br />
                    <span id="emailErr" style="color:red;">
                        <?php
                            if(isset($emailErr)) {
                                echo $emailErr;
                                        }
                        ?>
                    </span>
                </div>
                <div id="questionDiv" class="form-group">
                <label for="faqTitle">Subject:</label>
                        <select name="title" id="title" class="form-control">
                        <option value="default">Choose a Subject!</option>
                        <option value="portfolio">Portfolio</option>
                        <option value="stock">Stock</option>
                        <option value="general">General</option>
                        </select><br /> 
                        <span id="titleErr" style="color:red;">
                            <?php
                                if(isset( $titleErr)) {
                                    echo  $titleErr;
                                            }
                            ?>
                        </span> 
                </div>
                <div id="quesDescription" class="faqInfo form-group">
                    Question: <input id="quesDescInput" class="faqInput form-control" type="textarea" name="description" /><br />
                    <span id="descErr" style="color:red;">
                        <?php
                            if(isset( $descErr)) {
                                echo  $descErr;
                                        }
                        ?>
                    </span> 
                </div>

                <input id="submitFAQ" class="form-control" type="submit" name="addfaq" value="Add Question">
            </div>
            </form>
        </div>
    </div>
</div>