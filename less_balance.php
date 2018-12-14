<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/less_balance.php');

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'less_balance'. $config['tplEx'],
						"amount"            =>  $config[WC_POST_DEPOSIT],
						"Less_Amount"	    =>  $lang['Less_Amount'],
						"Less_Amount_1"	    =>  $lang['Less_Amount_1'],
						"Less_Amount_2"	    =>  $lang['Less_Amount_2'],
						"re_amount"         =>  $_GET['re_amount'],
						"staged_id"         =>  $_GET['staged_id'],
						"amt_short"         =>  $_GET['amt_short'], 						
						"Less_Amount_3"		=>  $lang['Less_Amount_3'],
						"Reuired"			=>  $lang['Reuired'],
						"Note5"				=>  $lang['Note5'],
						"Note6"				=>  $lang['Note6'],
						"Note7"				=>  $lang['Note7'],
						"Note8"				=>  $lang['Note8'],
						));

$tpl->display('default_layout'. $config['tplEx']);
?>