<?php
require_once "../../config_test.php";
require_once MODELS_PATH . '/database.php';
require_once MODELS_FAQ_PATH . '/FAQ_class.php';

    $dbcon = Database::getDb();
    $listFAQ = new FAQ();
    $myfaq = $listFAQ->getAllIncomingQuestions(Database::getDb());

/*THis is for the Admin List FAQ */
foreach($myfaq as $question){
    echo 
    "<tr>" .
        "<td> $question->name </td>" .
        "<td> $question->email </td>" .
        "<td> $question->title </td>" .
        "<td> $question->description </td>" .
        "<td> $question->response </td>" .
        "<td> $question->approve </td>" .
        "<td>" .
            "<form action='UpdateFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Update' name='update' />" .
            "</form>" .
        "</td>" .
        "<td>" .
            "<form action='DeleteFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Delete' name='delete' />" . 
            "</form>" . 
        "</td>" .
        "<td>" .
            "<form action='approveFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Approve' name='approval' />" . 
            "</form>" .
        "</td>" .
        "<td>" .
            "<form action='approveFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Disapprove' name='disapproval' />" . 
            "</form>" .
        "</td>" .
    "</tr>";

}