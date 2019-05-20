<?php

class FAQ
{
    public function listApproval($dbcon){  //true = 1 false= 0
        
        $sql = "SELECT * FROM faq WHERE approve = '1'";
        $pdost = $dbcon->prepare($sql);
        $pdost->execute();

        $question = $pdost->fetchAll(PDO::FETCH_OBJ);
        return $question;
    }
    /*This Function connects to the database and selects all FAQs where the approve column
    is true or 1. Those FAQs are then displayed to the main FAQ Page using the ListFAQApproved file  */
    public function getFaqById($id, $db){ 

        $sql = "SELECT * FROM faq WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $pdost->execute();

        $question = $pdost->fetch(PDO::FETCH_OBJ);
        return $question;
    }
    /*This function is used for the update portion of CRUD. It uses an SQL query, 
    prepares the query, binds the parameters to the variables in the function then it's executed. 
    FETCH_OBJ fetches the results from the query and returns them as a object. It's purpose is to pull a 
    specific FAQ to be updated. */
    public function getAllIncomingQuestions($dbcon){

        $sql = "SELECT * FROM faq"; 
        $pdost = $dbcon->prepare($sql);
        $pdost->execute();

        $questions = $pdost->fetchAll(PDO::FETCH_OBJ);
        return $questions;
    }
    /* This function is for the Admin List, it gets everything from the FAQ table, and then returns it as an object*/
    public function addFaq($username, $useremail, $questiontitle, $questiondescription, $approval, $db){

        $sql = "INSERT INTO faq (name, email, title, description, approve)
            VALUES(:name, :email, :title, :description, :approve)";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':name', $username);
        $pdost->bindParam(':email', $useremail);
        $pdost->bindParam(':title', $questiontitle);
        $pdost->bindParam(':description', $questiondescription);
        $pdost->bindParam(':approve', $approval);

        $count = $pdost->execute();
        return $count;
    }
    /* This function writes the submitted FAQ inputs to the database using parameters that are 
    binded to variables and a prepare statment, using them as an extra layer of security against SQL injection. 
    The SQL statement is executed and the information for display, the title and descriptions parameters, and the information 
    for user records, name and email, are sent to the database. The approve field is set to 0 (false) outside of the form.
    
  */
    public function deleteFaq($id, $db){

        $sql = "DELETE FROM faq WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);

        $count = $pdost->execute();
        return $count; 
    }
    /*The delete method uses the ID from the database, and prepares it and binds it to a variable, 
    same as before but this time it runs a Delete SQL query and removes the single record from the database. 
    This method is run only on the admin list */
    public function updateFaq($id, $username,
     $useremail, $questiontitle, $questiondescription, $quesresponse, $approval, $db){

        $sql = "UPDATE faq 
            SET name = :name, email = :email, title = :title, 
            description = :description, response = :response, approve = :approve 
            where id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $pdost->bindParam(':name', $username);
        $pdost->bindParam(':email', $useremail);
        $pdost->bindParam(':title', $questiontitle);
        $pdost->bindParam(':description', $questiondescription);
        $pdost->bindParam(':response', $quesresponse);
        $pdost->bindParam(':approve', $approval);

        $count = $pdost->execute();
        return $count;
     }
     /*This method works in a similar way to the add writes to the database, but this method is 
     called in tandem with the getFaqById mtheod. The getFaqById method gets the FAQ by it's ID and 
     this updateFAQ rewrites the values of the parameters*/
     public function approveFAQ($approval, $id, $db){
        $sql = "UPDATE faq 
            SET approve = :approve where id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $pdost->bindparam(':approve', $approval);

        $count = $pdost->execute();
        return $count;
     }
     /*THis method is a bit of a misnomer as it is used for both setting the FAQ as approved 
     and to turn of the approval, which takes it out of the display. THis method is used twice in the approveFAQ file
     for both approval and disapproval, and each of those if(isset) statements corresponds to a button 
     in the listFAQ file. */
}   