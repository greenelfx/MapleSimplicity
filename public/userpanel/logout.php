<?php
if(basename($_SERVER["PHP_SELF"]) == "logout.php"){
	die("403 - Access Forbidden");
}
session_destroy();
redirect('?page=home');
?>