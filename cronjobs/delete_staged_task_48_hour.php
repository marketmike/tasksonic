<?php
// Runs a cleanup on staged task over 48 hours old

define('IN_SITE', 	true);
define('IN_CRON', 	true);
include_once("../includes/common.php");;
include_once($physical_path['DB_Access']. 'Cronjobs.php');
$cron = new Cronjobs();

$date = date("Y-m-d h:i:s");// current date
$date2 = strtotime(date("Y-m-d h:i:s", strtotime($date)) . " -2 day");
$expire_date = date("Y-m-d h:i:s", $date2);
$count = $cron->Delete_Expired_Staged_Task($expire_date);
if($count){
echo $count . ' staged tasks deleted';
}	
?>