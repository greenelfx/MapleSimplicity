<script src="assets/libs/cksimple/ckeditor.js"></script>
<?php 
if(isset($_SESSION['id'])){
	if(isset($_SESSION['admin'])){
		if(empty($_GET['action'])){
			echo "<h2 class=\"text-center\">Manage News <small>Powered by <a href=\"https://github.com/greenelf/maplebit\">MapleBit</a></small></h2><hr/>
				<a href=\"?page=manage_news&amp;action=add\"><b>Add News &raquo;</b></a><br/>
				<a href=\"?page=manage_news&amp;action=del\">Delete News</a><br/>
			";
		}
		elseif($_GET['action']=="add"){
			echo "
			<h2 class=\"text-center\">Add News <small>Powered by <a href=\"https://github.com/greenelf/maplebit\">MapleBit</a></small></h2><hr/>";
			if(!isset($_POST['add'])){
			echo "
			<form method=\"post\" role=\"form\">
			<div class=\"form-group\">
				<label for=\"title\">Title</label>
				<input type=\"text\" name=\"title\" class=\"form-control\" id=\"title\" placeholder=\"Title\" required/>
			</div>
			<b>Author:</b> ".$_SESSION['name']."<hr/>
			<b>Content:</b>
			<textarea name=\"content\" style=\"height:300px;\" class=\"form-control\" id=\"content\"></textarea><br/>
			<input type=\"submit\" name=\"add\" class=\"btn btn-primary\" value=\"Add News Article &raquo;\" />
		</form>";
				}else{
					$title = $mysqli->real_escape_string($_POST['title']);
					$author = $_SESSION['name'];
					$date = date("m.d");
					$content = $mysqli->real_escape_string($_POST['content']);
					if($title == ""){
						echo "<div class=\"alert alert-danger\">You must enter a title.</div><hr/><a href=\"?page=manage_news&action=add\" class=\"btn btn-primary\">&laquo; Go Back</a>";
					}elseif($content == ""){
						echo "<div class=\"alert alert-danger\">You must enter some content.</div><hr/><a href=\"?page=manage_news&action=add\" class=\"btn btn-primary\">&laquo; Go Back</a>";
					}else{
						$i = $mysqli->query("INSERT INTO website_news (title, author, type, date, content) VALUES ('".$title."','".$author."', 'news', '".$date."','".$content."')") or die();
						echo "<div class=\"alert alert-success\">Your news article has been posted.</div><hr/><a href=\"?page=manage_news\" class=\"btn btn-primary\">&laquo; Go Back</a>";
					}
				}
			
			echo "
		";
		} elseif($_GET['action']=="del"){
			echo "
			<h2 class=\"text-left\">Delete a News Article <small>Powered by <a href=\"https://github.com/greenelf/maplebit\">MapleBit</a></small></h2><hr/>";
			if(!isset($_POST['del'])){
				echo "
			<form method=\"post\">
			<div class=\"form-group\">
				<label for=\"deleteArticle\">Select a news article to delete:</label>
				<select name=\"art\" class=\"form-control\" id=\"deleteArticle\" required>
					<option value=\"\" disabled selected>Please select...</option>";
				$gn = $mysqli->query("SELECT * FROM website_news ORDER BY id DESC") or die();
				while($n = $gn->fetch_assoc()){
					echo "
						<option value=\"".$n['id']."\">#".$n['id']." - ".$n['title']."</option>";
				}
				echo "
				</select>
				</div>
				<hr/>
				<input type=\"submit\" name=\"del\" value=\"Delete &raquo;\" class=\"btn btn-danger\"/>
			</form>";
			}else{
				$art = $mysqli->real_escape_string($_POST['art']);
				if($art == ""){
					echo "<div class=\"alert alert-danger\">Please select a news article to delete.</div><hr/><button onclick=\"goBack()\" class=\"btn btn-primary\">&laquo; Go Back</button>";
				}else{
					$d = $mysqli->query("DELETE FROM website_news WHERE id='".$art."'") or die();
					echo "<div class=\"alert alert-success\">The news article has been deleted.</div>";
				}
			}
		} else {
			header('Location: ?page=home');
		}
	}
}else{
	header('Location: ?page=home');
}
?>
<script>
	CKEDITOR.replace( 'content' );
</script>