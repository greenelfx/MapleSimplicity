<?php
if(basename($_SERVER["PHP_SELF"]) == "home.php"){
    die("403 - Access Forbidden");
}
if(isset($_SESSION['success'])){
	echo "<br/><div class=\"alert alert-success\">Successfully logged in.</div>";
	unset($_SESSION['success']);
}
?>
<h2 class="text-center">Welcome to <?php echo $servername;?></h2>
<hr/>
<p>
Hello, and welcome to <?php echo $servername; ?>. This website was created by greenelf(x), to show how maplestory websites can use modern elements, such as MySQLi, HTML5, and CSS3.
</p>
<?php
	include ("news.php");
?>