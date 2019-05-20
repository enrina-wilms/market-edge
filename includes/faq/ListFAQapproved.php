<?php
require_once "../../config_test.php";
require_once MODELS_PATH . '/database.php';
require_once MODELS_FAQ_PATH. '/FAQ_class.php';

$dbcon = Database::getDb();
$listAppFAQ = new FAQ();
$myfaq = $listAppFAQ->listApproval(Database::getDb());

foreach($myfaq as $question){
    echo "<div class='displayedFAQ'>" . 
    "<li class='myQuestions list-group-item'>" . 
    "<h2>$question->title </h2>" . "<br/>" . 
    "<p> $question->description </p>" . 
    "<p> $question->response </p>" .
    "</li>" .
    "</div>";
}