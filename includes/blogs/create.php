<?php
require_once '../../config.php';
require_once   $modelspath . "database.php";
require_once   $modelspath . "blogs/blog.php";

if(isset($_POST['submit'])){
	$title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	$content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
	$blog_date = date("Y/m/d");
    $user_id=1;

	$db = Database::getDb();
    $s = new Blog();
   
	$c = $s->addBlog($title, $content, $blog_date, $user_id, $db);
	header("Location: " . $includepath ."blogs/bloglistAdmin.php");
}
require_once   $includepath . "header_admin.php";

?>
<!-- FORM TO CREATE BLOG -->
        <div class="content">

            <main>
                <div class="container-fluid">

                    <h1>New Blog</h1>
                    <form method=POST action="#">
                        <div class="form-group" style="width:400px; margin-left:10px;">
                            <label for="title">Blog Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        
                        <div class="form-group" style="width:400px; margin-left:10px;">
                            <label for="content">Blog Content:</label>
                            <textarea class="form-control" style="resize: none;" id="content"  name="content" rows="10" cols="50"></textarea>
                        <script>
                                CKEDITOR.replace( 'content');
                                
                        </script>
                        
                        </div>
                        <a href="bloglistAdmin.php" class="btn btn-primary" style="margin-left:200px;" title="Go to list of blogs">Back</a>
                        <input type="submit" name="submit"  class="btn btn-primary" style="margin-left:20px;" value="Create" id="submit">

                    </form>
                    
                    
                </div>
            </main>
        </div>
    </div>

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