<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'place_bid.php');
include_once($physical_path['DB_Access']. 'task.php');
$project 		= new project();

$ret = $project->GetprojectDetails($_GET['project_id']);
$clean_url = clean_url($ret->project_title);

if($_GET['flag'] == '1')	
{
	$new_msg = $lang['Bid_Pending_Msg'];
}
if($_GET['flag'] == '0')	
{
	$new_msg = $lang['Bid_Success'];
}
if($_GET['flag'] == '2')	
{
	$new_msg = $lang['Bid_Update'];
}
if($_GET['flag'] == '0')	
{
	$page_name = 'Bid Submit Confirmation';
}
if($_GET['flag'] == '2')	
{
	$page_name = 'Bid Update Confirmation';
}
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
						"pagename"		   	=>	$page_name,
						"msg"		   		=>	$new_msg,
						"navigation"		=>	'<a href=task_'.$_GET['project_id'].'_' . $clean_url . '.html class=footerlink>Return to task</a>',
						"navigation1"		=>	'<a href=place_bid_'.$_GET['project_id'].'_'.$clean_url.'.html class=footerlink>Update Your Bid</a>',
						));

$tpl->display('default_layout'. $config['tplEx']);
?>