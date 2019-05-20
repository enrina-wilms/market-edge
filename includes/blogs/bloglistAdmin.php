<?php
require_once '../../config.php';

require_once   $modelspath . "database.php";
require_once   $modelspath . "blogs/blog.php";

session_start();
$dbcon = Database::getDb();
$s = new Blog();
$blogs =  $s->getAllBlogs(Database::getDb());
//For Delete Click
if(isset($_POST['delete']))
{
    $id = $_POST['blog_id'];
    $count = $s->deleteBlog($id, $dbcon); 
}
//For Edit Click
else if(isset($_POST['edit']))
{
    $id = $_POST['blog_id'];
    $_SESSION['blog_id'] = $id;//Session create to store blog which needs to edit.
    //$_SESSION['admin_id']= "1"; //This is to store admin id in session and transfer it to editblog.php page. so that to store the admin id
    header("Location: ". $includepath . "blogs/edit.php");
}
//For Details Click
else if(isset($_POST['details']))
{
    $id = $_POST['blog_id'];
    $_SESSION['blog_id'] = $id;
    header("Location: ". $includepath . "blogs/details.php");
}
require_once   $includepath . "header_admin.php";
?>
        <div class="content">
            <main>
                <div class="container-fluid">
                    <h1>Blogs</h1>
                    <!--<span class="fas fa-cog"></span>
                    <a href="create.php" title="Create Blog" class="oi oi-plus" ></a>-->
                    <a href="create.php" title="Create Blog" class="btn btn-info btn-lg">
                        <span class="glyphicon glyphicon-plus"></span> Create 
                    </a>
                    <table class="table table-borderless" style="background-color:#fff; border-radius:5px; margin-top:10px;">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($blogs as $blog)
                                {
                                    echo "<tr>" .
                                            "<td>" . $blog->title . "</td>" .
                                            "<td></td>" .
                                            "<td>" . $blog->blog_date . "</td>" .
                                            "<td><form method=POST action=\"#\">" .
                                            "<input type=\"hidden\" name=\"blog_id\" value =\"" . $blog->id . "\"/>" . 
                                            "<button type='submit' name='delete' title='Delete' class='blogbuttons far fa-trash-alt'></button>" .
                                            "<button type='submit' class='blogbuttons far fa-edit' title='Edit' name='edit'></button>" .
                                            "<button type='submit' class='blogbuttons fas fa-info-circle' title='Details' name='details'></button></form></td>" .
                                        "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery.slimscroll.min.js"></script>
    <script src="../../js/trial.js"></script>
</body>

</html>