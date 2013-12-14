<?php
//Important Configuration
$host['hostname'] = '127.0.0.1'; // Host name (Usually localhost or 127.0.0.1)
$host['user'] = 'root'; // DB Username
$host['password'] = ''; // DB Password
$host['database'] = 'mapleblade'; // DB Name

//Server Information
$servername = 'MapleSimplicity'; // Server Name
$version = '83'; // Version
$exp = "500x"; // EXP Rate
$meso = "400x"; // Meso Rate
$drop = "300x"; // Drop Rate

//Links
$forums = "/forums"; // Forum link
$client = "#client"; //Client Download Link
$setup = "#setup"; // Maplestory Setup Link

//Vote
$vlink = "http://www.gtop100.com/maplestory";

######################################################################################
// Don't change anything from here on out!
######################################################################################

//Connect to MySQL
$mysqli = new MySQLi($host['hostname'],$host['user'],$host['password'],$host['database']);

if(basename($_SERVER["PHP_SELF"]) == "config.php"){
	die("Error!");
}

//Count Online
$countonline = $mysqli->query("SELECT * FROM accounts where loggedin = 2");
$onlineppl = $countonline->num_rows;
?>