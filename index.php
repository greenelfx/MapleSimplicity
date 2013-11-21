<?php
include_once('assets/config/config.php');

$page = @$_GET['page'];
switch ($page) {
	case null:
	case "home":
		$title = $servername;
		$getpage = "public/home";
		break;
	case "register":
		$title = $servername." - Registration";
		$getpage = "public/register";
		break;
	case "download":
		$title = $servername." - Download";
		$getpage = "public/download";
		break;
	case "donate":
		$title = $servername." - Donation";
		$getpage = "public/donate";
		break;
	case "rankings":
		$title = $servername." - Rankings";
		$getpage = "public/rankings";
		break;
	case "vote":
		$title = $servername." - Vote";
		$getpage = "public/vote";
		break;
		
	default:
		$title = $servername."";
		$getpage = "public/home";
		break;
}

include_once('templates/index-top.php');
include_once('templates/navbar.php');
include_once('templates/sidebar.php'); 
include_once($getpage.".php");
include_once('templates/footer.php');
?>