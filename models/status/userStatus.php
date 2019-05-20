<?php

//create class for user status

class Status
{
	//getting a specific status post
	public function getStatusById($id, $db){
		
		$query = "SELECT * FROM status WHERE id = :id";
		$pdost = $db->prepare($query);
		
		//bindParam = Binds a parameter to the specified variable name
		$pdost->bindParam(':id', $id);
		$pdost->execute();
		
		$status = $pdost->fetch(PDO::FETCH_OBJ);
		
		return $status;
		
	}

	//getting all the status created and save on the database
	public function getAllStatus($db){
		
		$query = "SELECT * FROM status ORDER BY date_post Desc";
		$pdost = $db->prepare($query);
		$pdost->execute();
		
		$status = $pdost->fetchAll(PDO::FETCH_OBJ);
		
		return $status;
	}
	
	//adding status
	public function addStatus($content, $date_post, $user_id, $user_fname, $user_lname, $db){
			
		$query = "INSERT INTO status(content, date_post, user_id, user_fname, user_lname)
				  VALUES (:content, :date_post , :user_id, :user_fname, :user_lname)";
		$pdost = $db->prepare($query);
		$pdost->bindParam(':content', $content);
		$pdost->bindParam(':date_post', $date_post);
		$pdost->bindParam(':user_id', $user_id);
		$pdost->bindParam(':user_fname', $user_fname);
		$pdost->bindParam(':user_lname', $user_lname);
		
		$status = $pdost->execute();
		
		return $status;
	}
	
	//updating status
	public function updateStatus($id, $content, $date_post, $user_id, $user_fname, $user_lname, $db){
		
		$query = "UPDATE status
				  SET content = :content,
				  	  date_post = :date_post,
					  user_id = :user_id,
					  user_fname = :user_fname,
					  user_lname = :user_lname
				  WHERE id = :id";
		
		$pdost = $db->prepare($query);
		$pdost->bindParam(':id', $id);
		$pdost->bindParam(':content', $content);
		$pdost->bindParam(':date_post' , $date_post);
		$pdost->bindParam(':user_id' , $user_id);
		$pdost->bindParam(':user_fname' , $user_fname);
		$pdost->bindParam(':user_lname' , $user_lname);
		
		$status = $pdost->execute();
		
		return $status;
		
	}
	
	//deleting a status
	public function deleteStatus($id, $db){
		
		$query = "DELETE FROM status WHERE id = :id";
		$pdost = $db->prepare($query);
		$pdost->bindParam(':id', $id);
		
		$status = $pdost->execute();
		
		return $status;
		
	}
}