<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/my_affiliates.php');
include_once($physical_path['DB_Access']. 'Affilates.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

$aff = new Affilates();


if($_POST['Submit'] == 'Transfer Money in Your Account')
{
	$msg= $lang['Money_Transfer'];
	$earn_by = $lang['Earn_By_Affilation'];
	$in_acc  = $lang['In_Account'];
	$user_auth_id = md5($_POST['user_id']);
	$affilates_earn=$_POST['total_earning'];
	$wallet_amt=Select_wallet_sum($user_auth_id);
	
	$wallet_total=$wallet_amt + $affilates_earn;
	
	$transfer_amt = $aff->Transfer_Amt($_POST['user_id']);
	$aff->Insert_Affilation_Transfer_Fees($user_auth_id,$_POST['user_id'],$affilates_earn,$earn_by,$in_acc);
	Update_wallet_sum($user_auth_id,$wallet_total);
}


	$signed_me = $aff->ViewAll($_SESSION['User_Name']);
	$cnt = $db->num_rows();

	$i = 0;
	$total_earning = 0;
	while($db->next_record())
	{
		
		$affi_id[$i]				=		$db->f('affi_id');
		$affilated_login_id[$i]		=		$db->f('affilated_login_id');	
		$signup_date[$i]			=		$db->f('signup_date');			
		$user_earning[$i]			=		$aff->GetEarningofAffilatedUser($db->f('affilated_login_id'),$db->f('signup_date'));
		$total_earning				=		$total_earning + $user_earning[$i];
		$i++;
	}
	$tpl->assign(array(	"T_Body"				=>	'my_affiliates'. $config['tplEx'],
						"Loop"					=>	$cnt,	
						"lang"					=>  $lang,
						"msg"	    			=>  $msg,	
						"affi_id"				=>	$affi_id,	
						"affilated_login_id"	=>	$affilated_login_id,	
						"user_earning"			=>	$user_earning,	
						"total_earning"			=>	$total_earning,	
						"signup_date"			=>	$signup_date,	
						"tab"					=>	4,
						"navigation"			=> '<a href="my-account.html" class=footerlink>'.$lang['My_Account'].'</a>',
						"navigation1"			=> '<label class=navigation>'.$lang['Affilates_Activity'].'</label>',
					));
#################################################################################################
			
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>