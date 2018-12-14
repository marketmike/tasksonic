<?php
define('IN_SITE', 		true);
define('IN_USER', 		true);
include_once("includes/common.php");

$referrer = $_GET['ref'];

// delete facbook cookie
setcookie("fbs_" . $fb_app_id, 'deleted', time()-3600, '/', 'tasksonic.com');

$user->Destroy();
	if($referrer){
	header("location: home.html?ref=$referrer");
	}else{
	header("location: home.html");	
	}
	exit();
?>