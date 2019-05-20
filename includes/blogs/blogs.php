<?php
require_once '../../config.php';
require_once   $includepath . "header.php";
require_once   $modelspath . "database.php";
require_once   $modelspath . "blogs/blog.php";
require_once   $modelspath . "comments/comments.php";

$dbcon = Database::getDb();
$s = new Blog();
$blogs =  $s->getAllBlogs(Database::getDb());
$blog_id="";
if(isset($_POST['comment']))
{
	$comment = $_POST['comment'];
	$blog_id = $_POST['blog_id'];
	$comment_date = date("d/m/Y");
	//echo $comment_date;
	$dbcon = Database::getDb();
	$c=new Comment();
	$c->addComment($comment, $comment_date, $blog_id, $dbcon);
}

?>
<link rel="stylesheet" href="../../css/blog.css">
<script type="text/javascript">
	var myVar;    
	function reloadpage(){
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        xmlhttp.open("GET","blogs.php",true);
        xmlhttp.send();
    }
	}
	$(document).ready(function(){
		myVar=setInterval("reloadpage()", 5000);
	});
</script>
<main id="main" style="margin-right: 5px; margin-left: 5px">
<h1>Blog</h1>
<div class="container">
<div class="row">
<?php
foreach($blogs as $blog)
{
	//CODE TO DISPLAY BLOGS TO PUBLIC AND TO ALLOW THEM TO POST COMMENTS FOR BLOGS
	echo "<div class=\"col-sm-4\"> " .
					"<div class=\"card\">" . 
						"<div class=\"card-body\">" . 
							"<h5 class=\"card-title\" title='Blog Title'>" . $blog->title . "</h5>" . 
					 		"<p class=\"card-text\">" . $blog->content . "</p>" .
						"</div>" .
						"<label>Comment: </label>" .
						"<form action = \"#\" method = POST >" .
							"<input type=\"hidden\" name=\"blog_id\" value =\"" . $blog->id . "\"/>" .
							"<input type=\"text\" class='form-control' name=\"comment\"></form>" ;
				$c = new Comment();
				$blogcomments =  $c->getCommentsByBlogId($blog->id, Database::getDb());
				//var_dump($blogcomments);
				if($blogcomments)
				{
					echo "<ul class=\"list-group list-group-flush\">" ;
					foreach($blogcomments as $blogcomment)
					{
						//echo $blogcomment;
							echo "<li class=\"list-group-item\">" . $blogcomment->comment . "</li>";
					}
					echo "</ul></div></div>" ;
				}
				else
				{
					echo "</div></div>" ;
				}

}
?>
	</div>
	</div>
</main>
<?php
require_once   $includepath . "footer.php";