<?php
if(basename($_SERVER["PHP_SELF"]) == "vote.php"){
	die("403 - Access Forbidden");
}
if(empty($_POST['username']) || empty($_POST['password'])){
	echo "
	<h2 class=\"text-left\">Login Error</h2><hr/>
	<div class=\"alert alert-danger\">Please fill in all the fields</div>";
}
else {
	$username = $mysqli->real_escape_string($_POST['username']);
	$password = sha1($mysqli->real_escape_string($_POST['password']));
	$check = $mysqli->query("SELECT * from accounts WHERE name = '".$username."' AND password = '".$password."'");
	if($check->num_rows == 1){
		$account = $check->fetch_assoc();
		$_SESSION['id'] = $account['id'];
		$_SESSION['name'] = $account['name'];
		if($account['webadmin'] == 1) {
			$_SESSION['admin'] = $account['webadmin'];
		}
		$_SESSION['success'] = 1;
		redirect('?page=home');
	}
	else {
		echo "
		<h2 class=\"text-left\">Login Error</h2><hr/>
		<div class=\"alert alert-danger\">Either the account or password is incorrect. Please try again.</div>";
	}
}
?>