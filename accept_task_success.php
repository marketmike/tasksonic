<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'accept_task_success.php');
include_once($physical_path['Site_Lang'].'accept_task.php');
include_once($physical_path['DB_Access']. 'task.php');
$project 		= new project();

$ret = $project->GetprojectDetails($_GET['task_id']);
$clean_url = clean_url($ret->project_title);

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
						"msg"		   		=>	$lang['Send_Accept_project'],
						"info"		   		=>	$lang['info'],
						"pagename"			=>	'Task Accepted',
						"navigation"		=>	'<a href=task_'.$_GET['task_id'].'_' . $clean_url . '.html class=footerlink>Return to Task</a>',
						"navigation2"		=>	'<label class=navigation>'.$lang['Placed_Success'].'</label>',	
						));

$tpl->display('default_layout'. $config['tplEx']);
?>