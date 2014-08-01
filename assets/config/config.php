<?php
//Important Configuration
$host['hostname'] = '127.0.0.1'; // Host name (Usually localhost or 127.0.0.1)
$host['user'] = 'root'; // DB Username
$host['password'] = ''; // DB Password
$host['database'] = 'moopledev'; // DB Name

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
$colvp = ""; // Vote Point Column Name
$colnx = ""; // NX Column Name
$gvp = 1; // How much VP should be given per vote?
$gnx = 10000; // How much NX should be given per vote?
$vtime = 86400; // How many hours (in seconds) should the vote cooldown be?

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

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?>