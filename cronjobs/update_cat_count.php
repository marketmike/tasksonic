<?php
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
$cron        = new Cronjobs();
$cron->New_Update_Category_Count();

?>