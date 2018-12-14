<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'success.php');
include_once($physical_path['Site_Lang'].'/manage_payments.php');



$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$tpl->assign(array(	"T_Body"		   =>	'success'. $config['tplEx'],
					"lang"			   =>   $lang,					
					"Page_Title_1"		=>	$lang['Deposit_Money'],					
					"Current_Page"		=>	'payment',
					"Submenu_Page" 		=> 'deposit_money',
					));	
								
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
						
?>