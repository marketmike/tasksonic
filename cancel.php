<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/cancel.php');


	session_unregister('amount');
	session_unregister('pay_mehtod');

   $tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
						"msg"		        =>	 $lang['Cancel_Return'],	
						));

$tpl->display('default_layout'. $config['tplEx']);					
?>