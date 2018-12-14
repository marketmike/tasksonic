<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'forgotpasswd_success.php');

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"		        	=>	'Msg'. $config['tplEx'],
						"msg"						=>	$lang['Forgotpass_send'],
						"info"						=>	$lang['Forgotpass_send'],						
						"tab"						=>	4,
						));

$tpl->display('default_layout'. $config['tplEx']);
?>