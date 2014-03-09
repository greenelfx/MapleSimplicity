<?php
if(basename($_SERVER["PHP_SELF"]) == "news.php"){
    die("403 - Access Forbidden");
}
if(isset($_GET['id'])){
	$id = $mysqli->real_escape_string(preg_replace("/[^0-9]/","",$_GET['id']));
	$gn = $mysqli->query("SELECT * FROM `website_news` WHERE `id`='".$id."'");
	$n = $gn->fetch_assoc();
	echo "
		<h3 class=\"text-left\">".$n['title']."  - By <b>".$n['author']."</b></h3><hr/>";
	echo nl2br(stripslashes($n['content']))."";
	echo "
		<hr/>
		Views: <b>".$n['views']."</b><br/>
		<a href=\"?page=home\">&laquo; Return Home</a>";
	$av = $mysqli->query("UPDATE `website_news` SET `views` = views + 1 WHERE `id`='".$id."'");
	echo "</p></td></tr>";
} else {
	echo "<h3 class=\"text-center\">".$servername." News</h3><hr/>";
	$gn = $mysqli->query("SELECT * FROM `website_news` ORDER BY `id` DESC");
	$rows = $gn->num_rows;
	if ($rows < 1) {
		echo "
		<div class=\"alert alert-danger\">There isn't any news right now.</div>";
	}
	echo "
	<table class=\"table table-bordered table-hover\">
		<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
	";
	while($n = $gn->fetch_assoc()){
		$title = $n['title'];
		$maxlength = 60;
		echo "
			<tr>
				<td>
				<a href=\"?page=news&amp;id=".$n['id']."\">";
				if(strlen($title) > $maxlength){
					echo stripslashes(shortTitle($title));
				} else {
					echo stripslashes($title);
				}
				echo " &raquo;</a>
				</td>
				<td>".$n['author']."</td>
				<td>".$n['date']."</td>";
	}
	echo  "
		</tbody>
	</table>
	";
}
?>