<?php 
if(isset($_SESSION['id'])){
	echo "<h2 class=\"text-center\">Disconnect Account <small>Powered by <a href=\"https://github.com/greenelf/maplebit\">MapleBit</a></small></h2><hr/>";
	if(!isset($_POST['dc'])){
		echo "
			Are you trying to log in to the game, but can't because it says your account is already logged in? This happens when you don't log off safely on server restarts, and can be fixed easily. All you have to do, is pressing the button below!
			<hr/>
			<form method=\"post\">
					<input type=\"submit\" name=\"dc\" value=\"Disconnect Account &raquo;\" class=\"btn btn-info\"/>
			</form>";
		}else{
			$name = $_SESSION['name'];
			$g = $mysqli->query("SELECT * FROM `accounts` WHERE `name`='".$name."'") or die();
			$u = $g->fetch_assoc();
			$s = $mysqli->query("UPDATE accounts SET loggedin='0' WHERE name='".$name."'") or die();
			echo "<div class=\"alert alert-success\">Your account has been fixed! You should be able to log in normally now.</div>";
		}
}else{
	header('Location: ?page=home');
}
?>