<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/edit_task_success.php');

$pro = new project();

$details = $pro->GetprojectDetails($_GET['pro_id']);

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
$tpl->assign(array(		"T_Body"			=>	'edit_task_success'. $config['tplEx'],
						"Send_Msg"		    =>	$lang['Send_Msg'],
						"Send_Msg1"		    =>	$lang['Send_Msg1'],	
						"pro_title"      	=>  $details->project_title,
						"navigation"		=> '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>',
						"navigation1"		=> '<a href=edit_task_'.$_GET['pro_id'].'.html class=footerlink>'.$lang['Edit_project'].'</a>',
						"navigation2"		=> '<label class=navigation>'.$lang['Edit_Succ'].'</label>',
						));	

$tpl->display('default_layout'. $config['tplEx']);
?>