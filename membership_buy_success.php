<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/membership_buy_success.php');
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'membership_buy_success'. $config['tplEx'],
						"Send_Msg"		    =>	$lang['Send_Accept_Membership'],	
						"navigation"		=>  '<a href=membership.php class=footerlink>'.$lang['Membership'].'</a>',
						"navigation1"		=>  '<label class=navigation>'.$lang['Buy_Success'].'</label>',
						));

$tpl->display('default_layout'. $config['tplEx']);
?>
