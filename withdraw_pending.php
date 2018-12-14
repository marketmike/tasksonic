<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/manage_escrow.php');
include_once($physical_path['DB_Access']. 'Payment.php');

$pays 		= new Payment();

	$result = $pays->ViewAllwithdarw($_SESSION['User_Id']);
	$rscnt_withdraw = $db->num_rows();
	$i=0;
		while($db->next_record())
		{
			$arr_withdraw[$i]['id']				= $db->f('ww_id');
			$arr_withdraw[$i]['user_auth_id']	= $db->f('user_auth_id');
			$arr_withdraw[$i]['requested_date']	= $db->f('requested_date');
			$arr_withdraw[$i]['description']	= $db->f('details');
			$arr_withdraw[$i]['withdraw_type']	= $db->f('withdraw_type');
			$arr_withdraw[$i]['amount']			= $db->f('amount');
			$arr_withdraw[$i]['trans_type']		= $db->f('trans_type');
			$arr_withdraw[$i]['status']			= $db->f('status');
			$i++;
		}
		
		$tpl->assign(array(	"T_Body"			=>	'withdraw_pending'. $config['tplEx'],
							"Site_Title"		=>	$config[WC_SITE_TITLE]." - ".$lang['Payment'],
							"Loop1"				=>	$rscnt_withdraw,
							"awithdarw"         =>  $arr_withdraw,
							"lang"				=>  $lang,
							"tab"			 	=>  4,
							));	
							

$tpl->display('default_layout'. $config['tplEx']);
?>