<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Member.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$member = new Member();

#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------
if($_GET['user_auth_id'])
{
	$msg="No transaction has been made yet";
	
	$tpl->assign(array( "T_Body"			=>	'view_user_account'. $config['tplEx'],
						"msg"				=> $msg,
					));
					
    // for paypal//								
    $member->ViewPaypal($_GET['user_auth_id']);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$paypal_account[$i]['user_login_id']	= $db->f('user_login_id');
		$paypal_account[$i]['amount']			= $db->f('amount');
		$paypal_account[$i]['trans_type']		= $db->f('trans_type');
		$paypal_account[$i]['description']		= $db->f('description');
		$paypal_account[$i]['date']				= $db->f('date');
		
		$i++;
	}
	
	$tpl->assign(array(	"paypal_account"	   	=>	$paypal_account,
						"Loop"					=>	$rscnt,
						"msg"					=>  $msg,
					));
	
	
	 // for Money Booker//								
    $member->ViewMoneybooker($_GET['user_auth_id']);
	$rscnt1 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$moneybooker_account[$i]['user_login_id']	= $db->f('user_login_id');
		$moneybooker_account[$i]['amount']			= $db->f('amount');
		$moneybooker_account[$i]['trans_type']		= $db->f('trans_type');
		$moneybooker_account[$i]['description']		= $db->f('description');
		$moneybooker_account[$i]['pending_date']	= $db->f('pending_date');
		$moneybooker_account[$i]['status']			= $db->f('status');
		
		$i++;
	}
	
	$tpl->assign(array(	"moneybooker_account"	   	=>	$moneybooker_account,
						"Loop1"						=>	$rscnt1,
						"msg"						=> $msg,
					));	
					
	 // for Money Booker//								
    $member->ViewEscrow($_GET['user_auth_id']);
	$rscnt2 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$escrow_account[$i]['from_user_login_id']	= $db->f('from_user_login_id');
		$escrow_account[$i]['to_user_login_id']		= $db->f('to_user_login_id');
		$escrow_account[$i]['amount']				= $db->f('amount');
		$escrow_account[$i]['payment_type']			= $db->f('payment_type');
		$escrow_account[$i]['status']				= $db->f('status');
		$escrow_account[$i]['date']					= $db->f('date');
		$i++;
	}
	
	$tpl->assign(array(	"escrow_account"	   	=>	$escrow_account,
						"Loop2"					=>	$rscnt2,
						"msg"					=>  $msg,
					));				
	
}	

elseif($Action == 'ViewAll' || $Action == '')
{
	
	$tpl->assign(array( "T_Body"			=>	'user_account'. $config['tplEx'],
						
					));
					
    // form membership//								
    $member->ViewAccount();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$membership_payment[$i]['user_auth_id']			= $db->f('user_auth_id');
		$membership_payment[$i]['user_login_id']		= $db->f('user_login_id');
		$membership_payment[$i]['wallet_sum']			= $db->f('wallet_sum');
		$membership_payment[$i]['earn_by_site']			= $db->f('earn_by_site');
		$membership_payment[$i]['referrals_earned']		= $db->f('referrals_earned');		
		$membership_payment[$i]['vip_earned']			= $member->Membership_Earn_By_User($db->f('user_auth_id'));		
		$i++;
	}
	
	
	$wallet_sum = $member->Sum_OF_Wallet();
	
	$earn_sum = $member->Sum_OF_Earn();
	
	$earn_mem = $member->Sum_OF_Membership_Earn();
	
	$referrals_paid = $member->Sum_OF_Referrals_Paid();
	
	$adjusted_earnings =  number_format($earn_sum - number_format($referrals_paid,2),2);
	
	$total_earnings =  number_format($earn_mem + number_format($adjusted_earnings,2),2);
	
	$tpl->assign(array(	"membership_payment"	   	=>	$membership_payment,
						"Loop"						=>	$rscnt,
						"PageSize_List"				=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),	
						"wallet_sum"                =>  $wallet_sum,   
						"earn_sum"             		=>  $earn_sum,
						"referrals_paid"            =>  $referrals_paid,
						"adjusted_earnings"         =>  $adjusted_earnings,
						"earn_mem"         			=>  $earn_mem,
						"total_earnings"         	=>  $total_earnings,							
					));
			
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}	

$tpl->display('default_layout'. $config['tplEx']);
?>