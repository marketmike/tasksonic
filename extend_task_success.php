<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
print hi;die;
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/extend_task_success.php');

$pro = new project();

$details = $pro->GetprojectDetails($_GET['pro_id']);

$tpl->assign(array(		"T_Body"		=>	'extend_task_success'. $config['tplEx'],
						"Send_Msg2"		=>	$lang['Send_Msg2'],
						"Send_Msg3"		=>	$lang['Send_Msg3'],	
						"pro_title"     =>  stripslashes($details->project_title),
						"days"          =>  $_GET['days'],
						"navigation"	=> '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>',
						"navigation1"	=> '<a href=extend_task_'.$_GET['pro_id'].'.html class=footerlink>'.$lang['Ext_Proj'].'</a>',
						"navigation2"	=> '<label class=navigation>'.$lang['Ext_Succ'].'</label>',
						));

$tpl->display('default_layout'. $config['tplEx']);
?>