<?php  
class Blog
{
	public function getAllBlogs($dbcon)
	{
		$sql= "SELECT * FROM blogs";
		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
 
		$blogs = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $blogs;
	}

	public function addBlog($title, $content, $blog_date, $user_id, $db)
	{
		$sql = "INSERT INTO blogs ( title, content, blog_date, user_id) VALUES ( :title, :content, :blog_date, :user_id) ";
		$pst = $db->prepare($sql);
		$pst->bindParam(':title', $title);
		$pst->bindParam(':content',$content);
		$pst->bindParam(':blog_date',$blog_date);
		$pst->bindParam(':user_id',$user_id);
		$count = $pst->execute();
		return $count;
	}

	public function getBlogById($id, $db){
        $sql = "SELECT * FROM blogs WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $blog =  $pst->fetch(PDO::FETCH_OBJ);

        return $blog;
    }

    public function deleteBlog($id, $db){
        $sql = "DELETE FROM blogs WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    public function updateBlog($id, $title, $content, $blog_date,$user_id, $db){
        $sql = "UPDATE blogs
                SET title = :title,
                content = :content,
                blog_date = :blog_date,
                user_id = :user_id
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':content', $content);
        $pst->bindParam(':blog_date', $blog_date);
        $pst->bindParam(':user_id', $user_id);

        $count = $pst->execute();
        return $count;
    }
}