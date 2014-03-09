<?php
session_start();
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
	case "news":
		$title = $servername." - News";
		$getpage = "public/news";
		break;
	case "login":
		$title = $servername." - Login";
		$getpage = "public/userpanel/login";
		break;
	case "logout":
		$title = $servername." - Logout";
		$getpage = "public/userpanel/logout";
		break;	
	case "settings":
		$title = $servername." - Account Settings";
		$getpage = "public/userpanel/settings";
		break;	
	case "charfix":
		$title = $servername." - Character Unstuck";
		$getpage = "public/userpanel/charfix";
		break;
	case "manage_news":
		$title = $servername." - Manage News";
		$getpage = "public/userpanel/manage_news";
		break;			
	default:
		$title = $servername."";
		$getpage = "public/home";
		break;
}

include_once('templates/header.php');
include_once('templates/navbar.php');
include_once('templates/sidebar.php'); 
include_once($getpage.".php");
include_once('templates/footer.php');
?>