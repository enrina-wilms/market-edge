<?php
require_once '../../config.php';

require_once   $modelspath . "database.php";
require_once   $modelspath . "blogs/blog.php";

session_start();
if(!isset($_SESSION['blog_id'])){
    header("Location: ". $includepath . "loginRegistration/login.php");
}
else
{
    $page_head = "Edit Blog";
    
    require_once   $modelspath . "database.php";
    require_once   $modelspath . "blogs/blog.php";
    
    $blog_id=$_SESSION['blog_id'];
    //unset($_SESSION['blog_id']);
    $dbcon = Database::getDb();
    $b = new Blog();
    $blog = $b->getBlogById($blog_id, $dbcon);
    //Update operation with data sanitazation 
    if(isset($_POST['update'])){
        $id= $_POST['blog_id'];
        $title = $_POST['title'];
        $title=filter_var($title, FILTER_SANITIZE_STRING);
        $content = $_POST['content'];
        $content=filter_var($content, FILTER_SANITIZE_STRING);
        $blog_date = date("Y/m/d"); 
        $user_id=1;
    
        $db = Database::getDb();
        $s = new Blog();
        $c = $s->updateBlog($id, $title, $content, $blog_date, $user_id, $db);
        header("Location: " . $includepath ."blogs/bloglistAdmin.php");
    }

     $editform = "<div class=\"content\">" .
        "<main>" .
            "<div class=\"container-fluid\">" . 
                "<h1>Edit Blog</h1>" .
                "<form method=\"post\">" .
                        "<input type=\"hidden\" name=\"blog_id\" value=\"" . $blog->id . "\" />" .
                    "<div class=\"form-group\" style=\"width:400px; margin-left:10px;\">" .
                        "<label for='title'>Blog Title:</label>" . 
                        "<input type=\"text\" class='form-control' value=\"" . $blog->title . "\" name=\"title\" />" .
                    "</div><br/>" .
                    "<div class=\"form-group\" style=\"width:400px; margin-left:10px;\">" .
                        "<label for='content'>Blog Description:</label>" . 
                        "<textarea name=\"content\" class='form-control' style='resize: none;' rows='5' id=\"blog_content\" >" .  $blog->content . "</textarea>" .
                        '<script>CKEDITOR.replace( "content");config.resize_enabled = false;editor.resize( "100%", "350", true );</script>'.
                    "</div><br/>" .
                    "<div>" .
                        '<a href="bloglistAdmin.php" class="btn btn-primary" style="margin-left:200px;" title="Go to list of blogs">Back</a>' .
                        "<input class='btn btn-primary' style='margin-left:20px;' type=\"submit\" name=\"update\" value=\"UPDATE\">" .
                    "</div>" .
                "</form>" .
            "</div>" .
        "</main>" .
    "</div>" .
"</div>" ;
require_once   $includepath . "header_admin.php";
}

?>
       <?php echo $editform; 
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