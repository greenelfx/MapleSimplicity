<?php
if(basename($_SERVER["PHP_SELF"]) == "download.php"){
    die("403 - Access Forbidden");
}
?>
<h2 class="text-center"><?php echo $servername; ?> Downloads</h2>
<hr/>
<a href="<?php echo $client; ?>"><img src="http://placehold.it/450x100" style="margin: 0 auto;" class="img-responsive" alt="Client"></a>
<br/>
<a href="<?php echo $setup; ?>"><img src="http://placehold.it/450x100" style="margin: 0 auto;" class="img-responsive" alt="Setup"></a>
