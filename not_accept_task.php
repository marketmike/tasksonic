<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'not_accept_task.php');
include_once($physical_path['Site_Lang'].'accept_task.php');

$task_owner_flag = $_GET['task_owner_flag'];
$tasker_flag = $_GET['tasker_flag'];
$task_owner = $_GET['task_owner'];
$task_name = $_GET['task_name'];
$short = $_GET['short'];
$tasker = $_SESSION['User_Name'];
$task_name = str_replace('-',' ', $task_name);
$task_name = strtoupper($task_name);
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'not_accept_task'. $config['tplEx'],
						"task_owner_flag"	=>	$task_owner_flag,
						"lang"				=>	$lang,
						"tasker_link"		=>	$tasker,						
						"short"				=>	$short,
						"task_owner"		=>	$task_owner,
						"tasker_flag"		=>	$tasker_flag,
						"task_name"			=>	$task_name,						
						));

$tpl->display('default_layout'. $config['tplEx']);
?>