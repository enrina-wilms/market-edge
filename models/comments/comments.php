<?php  
class Comment
{
	public function addComment($comment,$comment_date, $blog_id, $db)
	{
		$sql = "INSERT INTO blogcomments ( comment, comment_date, blog_id) VALUES ( :comment, :comment_date, :blog_id) ";
		$pst = $db->prepare($sql);
        $pst->bindParam(':comment', $comment);
        $pst->bindParam(':comment_date', $comment_date);
		$pst->bindParam(':blog_id',$blog_id);
		$count = $pst->execute();
		return $count;
	}

	public function getCommentsByBlogId($blog_id, $db){
        $sql = "SELECT * FROM blogcomments WHERE blog_id = :blog_id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':blog_id', $blog_id);

        $pst->execute();

        $comments =  $pst->fetchAll(PDO::FETCH_OBJ);

        return $comments;
    }

    public function deleteComment($id, $db){
        $sql = "DELETE FROM blogcomments WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
}