<?php
require_once "../../config_test.php";
require_once MODELS_PATH . '/database.php';
require_once MODELS_PATH . '/events/event_class.php'; 

$dbcon = Database::getDb();
$listEventAdmin = new Event();
$myeve = $listEventAdmin->getAllEvents(Database::getDb());


//for the admin page 
foreach($myeve as $event){
    echo     
    "<tr>" .
    "<td> $event->title </td>" .
    "<td> $event->description </td>" .
    "<td> $event->image </td>" .
    "<td> $event->event_date </td>" .
    "<td> $event->location </td>" .
    "<td>" .
        "<form action='updateEvent.php' method='post'>" . 
            "<input type='hidden' value='$event->id' name='id' />" . 
            "<input type='submit' value='Update' name='update' />" .
        "</form>" .
    "</td>" .
    "<td>" .
        "<form action='deleteEvent.php' method='post'>" . 
            "<input type='hidden' value='$event->id' name='id' />" . 
            "<input type='submit' value='Delete' name='delete' />" . 
        "</form>" . 
    "</td>" .
"</tr>";
}
