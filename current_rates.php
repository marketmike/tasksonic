<?php
define('IN_SITE', 	true);
include_once("includes/common.php");

$tasker_commission = $config[WC_COMM_FROM_SELLER];
$task_owner_commission = $config[WC_COMM_FROM_BUYER];
$tasker_minimum = $config[WC_MINIMUM_COMM_SELLER];
$task_owner_minimum = $config[WC_MINIMUM_COMM_BUYER];


			$tpl->assign(array( "tasker_commission"					=>	$tasker_commission,
								"task_owner_commission"				=>	$task_owner_commission,
								"tasker_minimum"					=>	$tasker_minimum,
								"task_owner_minimum"				=>	$task_owner_minimum,								
			));
?>