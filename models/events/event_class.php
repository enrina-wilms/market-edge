<?php

class Event
{
    public function getEventByID($id, $db){

        $sql = "SELECT * FROM events where id = :id";
        $pdost = $db->prepare($sql); 
        $pdost->bindParam(':id', $id);
        $pdost->execute();

        $event = $pdost->fetch(PDO::FETCH_OBJ);
        return $event;
    }
    /*This function is used for the update portion of CRUD. It uses an SQL query, 
    prepares the query, binds the parameters to the variables in the function then it's executed. 
    FETCH_OBJ fetches the results from the query and returns them as a object. It's purpose is to pull a 
    specific event to be updated.*/

    public function getAllEvents($dbcon){

        $sql = "SELECT * FROM events";
        $pdost = $dbcon->prepare($sql);
        $pdost->execute();

        $events = $pdost->fetchAll(PDO::FETCH_OBJ);
        return $events;
    }
    /*This function is used for both list pages and is used in much of the same way as the last
    ,however, it has no parameters to bind. It's used to get all the information about the event and then either 
    display it in a table in the admin page or in a list to be displayed on the clientside */

    public function addEvent($title, $description, $image, $date, $location, $db){

        $sql = "INSERT INTO events (title, description, image, event_date, location)
                    VALUES(:title, :description, :image, :event_date, :location)";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':title', $title);
        $pdost->bindParam(':description', $description);
        $pdost->bindParam(':image', $image);
        $pdost->bindParam(':event_date', $date);
        $pdost->bindParam(':location', $location);

        $count = $pdost->execute();
        return $count;
    }
    /*This function writes the submitted event inputs to the database using parameters that are 
    binded to variables and a prepare statment, using them as an extra layer of security against SQL injection. 
    The SQL statement is executed and the information for display is sent to the database. As a side note,
    the input field is a pathway to an images folder.*/

    public function deleteEvent($id, $db){
        $sql = "DELETE FROM events  WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);

        $count = $pdost->execute();
        return $count;
    }
    /* This function deletes the event from the database using the id parameter which is bound to a variable.
    It runs a delete sql query and removes a single record from the database. */

    public function updateEvent($id, $title, $description, $image, $date, $location, $db){
        $sql = "UPDATE events SET title = :title, description = :description,
                 image =  :image, event_date = :event_date, location = :location WHERE id = :id"; 
         $pdost = $db->prepare($sql);
         $pdost->bindParam(':id', $id);
         $pdost->bindParam(':title', $title);
         $pdost->bindParam(':description', $description);
         $pdost->bindParam(':image', $image);
         $pdost->bindParam(':event_date', $date);
         $pdost->bindParam(':location', $location);

         $count = $pdost->execute();
         return $count;
    }
    /* this is the other update function, it does the actually updating once the event is passed 
    through using the id, it uses an update sql and updates the parameters that are binded to the 
    variables in the function. It's called at the same time as the getEventByID method. That method gets the 
    event by the idea, and the updateEvent rewrites the parameters. */
}