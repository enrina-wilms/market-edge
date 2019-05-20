<?php
require_once '../../config.php';

require_once   $modelspath . "database.php";
require_once   $modelspath . "blogs/blog.php";
require_once   $modelspath . "comments/comments.php";

session_start();
if(!isset($_SESSION['blog_id'])){
    header("Location: ". $includepath . "loginRegistration/login.php");
}
else
{   
    $comments ="";
    $page_head = "Edit Blog";
   
    $blog_id=$_SESSION['blog_id'];
    //unset($_SESSION['blog_id']);
    $dbcon = Database::getDb();
    $b = new Blog();
    $blog = $b->getBlogById($blog_id, $dbcon);
    //Comments for particular blog
    $c = new Comment();
    $blogcomments =  $c->getCommentsByBlogId($blog->id, $dbcon);
    //LOGIC FOR DELETING COMMENTS
    if(isset($_POST['delete']))
    {
        $id = $_POST['comment_id'];
        $count = $c->deleteComment($id, $dbcon); 
        header("Location: details.php");
    }
    if($blogcomments)
    {
        $comments = "<ul class=\"list-group list-group-flush\">" ;
        //To fetch comments for particular blog
        foreach($blogcomments as $blogcomment)
        {
            //echo $blogcomment;
            $comments .= "<li style='color:#1C2833;' class=\"list-group-item\"> " . $blogcomment->comment . 
                        "<form method=POST action=\"#\">" .
                        "<input type=\"hidden\" name=\"comment_id\" value =\"" . $blogcomment->id . "\"/>" . 
                        "<button style='margin-left:5px; class='btn btn-danger' type='submit' name='delete' title='Delete comment'>Delete</button></form>".
                        "</li>";
        }
        $comments .= "</ul>" ;
    }
    else
    {
        $comments= "<h5 style='color:black; margin-left:10px;'>Not Yet..</h5>" ;
    }
    //To display details of blog including comments for it
    $details = "<div class=\"blogbody content\"><main><div class=\" jumbotron jumbotron-fluid \"> ".
                    "<div class=\"container\">" .
                    "<h1 class=\"blogtitle display-4\">" . $blog->title . "</h1><p class=\"lead\">" . $blog->content . "</p></div>" .
                     "<h2 style='color:black; margin-left:10px;'>Comments:</h2>".$comments .   
                    "<a style=\"text-decoration:none; color:white; margin-top:10px; margin-left:10px; \" class=\"btn btn-primary\" href=\"" . $includepath ."blogs/bloglistAdmin.php\" title='Back to Blog list' name='Back'>Back</a>" . 
                    "</div></main>" .
                "</div> <br />";

    
    //var_dump($blogcomments);
    
    require_once   $includepath . "header_admin.php";
}

?>
       <?php 
            echo $details; 
            //echo $comments;
             
       ?>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.slimscroll.min.js"></script>
    <script src="../js/trial.js"></script>
</body>

</html>