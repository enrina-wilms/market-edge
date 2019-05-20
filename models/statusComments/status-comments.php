<?php

//create class for user comment

class Comments
{
	//getting a specific comment post
	public function getCommentsById($id, $db){
		
		$query = "SELECT * FROM statuscomments WHERE id = :id";
		$statement = $db->prepare($query);
		
		//bindParam = Binds a parameter to the specified variable name
		$statement->bindParam(':id', $id);
		$statement->execute();
		
		$comments = $statement->fetch(PDO::FETCH_OBJ);
		
		return $comments;
		
	}
	
	//getting a specific comment post
	public function getUserById($id, $db){
		
		$query = "SELECT * FROM users WHERE id = :id";
		$statement = $db->prepare($query);
		
		//bindParam = Binds a parameter to the specified variable name
		$statement->bindParam(':id', $id);
		$statement->execute();
		
		$comments = $statement->fetch(PDO::FETCH_OBJ);
		
		return $comments;
		
	}
	
	//getting all the comment created and save on the database
	public function getAllComments($db){
		
		$query = "SELECT * FROM statuscomments ORDER BY date_post Desc LIMIT 3";
		$statement = $db->prepare($query);
		$statement->execute();
		
		$comments = $statement->fetchAll(PDO::FETCH_OBJ);
		
		return $comments;
	}
	
	//adding comment
	public function addComment($comment, $date_post, $status_id, $db){
			
		$query = "INSERT INTO statuscomments(comment, date_post, status_id)
				  VALUES (:comment, :date_post, :status_id)";
		$statement = $db->prepare($query);
		$statement->bindParam(':comment', $comment);
		$statement->bindParam(':date_post', $date_post);
		$statement->bindParam(':status_id', $status_id);
		
		$comments = $statement->execute();
		
		return $comments;
	}
	
	//updating comment
	public function updateComment($id, $comment, $date_post, $db){
		
		$query = "UPDATE statuscomments
				  SET comment = :comment,
				  	  date_post = :date_post
				  WHERE id = :id";
		
		$statement = $db->prepare($query);
		$statement->bindParam(':id', $id);
		$statement->bindParam(':comment', $comment);
		$statement->bindParam(':date_post' , $date_post);
		
		$comments = $statement->execute();
		
		return $comments;
		
	}
	
	//deleting a comment
	public function deleteComment($id, $db){
		
		$query = "DELETE FROM statuscomments WHERE id = :id";
		$statement = $db->prepare($query);
		$statement->bindParam(':id', $id);
		
		$comments = $statement->execute();
		
		return $comments;
		
	}
}