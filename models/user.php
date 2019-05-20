<?php
 require_once "database.php";
 require_once "session.php";
 
  
 class User {
	 
	 public function getUserById($id, $db){
        $sql = "SELECT * FROM users WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $user =  $pst->fetch(PDO::FETCH_OBJ);
        return $user;
	}
	
    public function getAllUsers($dbcon){
        $sql = "SELECT * FROM users";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }
	
    public function addUser($fname, $lname,$email, $phone, $password,$db)
    {
		$role = 'user';
        $sql = "INSERT INTO users (fname,lname, email, phone, password, role) 
              VALUES (:fname,:lname, :email, :phone, :password, :role)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':fname', $fname);
		$pst->bindParam(':lname', $lname);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
		$pst->bindParam(':password', $password);
		$pst->bindParam(':role', $role);
	
        $count = $pst->execute();
        return $count;
    }
		  
		public  function userLogin ($email, $password, $db){
				
			
		$sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";	
		$psd = $db->prepare($sql);
		$pst->bindParam(':email', $email);
		$count = $pst->execute();
        return $count;
		}
		
		/*public function checkEmail ( $email, $db){
			
			$sql = "SELECT email FROM users WHERE email = ?" ;
			$psd = $db->prepare($sql);
			$psd->binParam(1, $email);
			$count = $pst->execute();
			return $count;
		}*/
	     	
	public function updateUser($id, $fname, $lname, $email,$phone,$password, $role,  $db)
	{
        $sql = "UPDATE users
                SET fname = :fname,
				lname = :lname,
                email = :email,
				phone = :phone,
				password = :password,
				role = :role
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':fname', $fname);
		$pst->bindParam(':lname', $lname); 
        $pst->bindParam(':email', $email);
		$pst->bindParam(':phone', $phone);
		$pst->bindParam(':password', $password);
		$pst->bindParam(':role', $role);
        $count = $pst->execute();
        return $count;
    }
	public function deleteUser($id, $db){
        $sql = "DELETE FROM users WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public function detailUser($id, $fname, $lname, $email, $phone, $password, $role,$db){
        $sql = "SELECT * FROM users
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':fname', $fname);
		$pst->bindParam(':lname', $lname);
		$pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':password', $password);
		$pst->bindParam(':role', $role);
        $count = $pst->execute();
        return $count;
    }
 }
	
?>