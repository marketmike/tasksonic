<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Others.php');
include_once($physical_path['DB_Access']. 'Member.php');
$others = new Others();
$member = new Member();

	$wallet_sum = $member->Sum_OF_Wallet();
	
	$earn_sum = $member->Sum_OF_Earn();
	
	$earn_mem = $member->Sum_OF_Membership_Earn();
	
	$referrals_paid = $member->Sum_OF_Referrals_Paid();
	
	$adjusted_earnings =  number_format($earn_sum - number_format($referrals_paid,2),2);
	
	$total_earnings =  number_format($earn_mem + number_format($adjusted_earnings,2),2);
	

$tpl->assign(array(	"T_Body"					   =>	'index'. $config['tplEx'],
					"reg_users"					   =>  $others->Count_Users(),
					"vip_users"          		   =>  $others->Count_VIP_Users(),
					"normal_users"      		   =>  $others->Count_Normal_Users(),
					"portfolio"    				   =>  $others->Count_Portfolio(),
					"project"					   =>  $others->Count_project(),
					"buyer"					       =>  $others->Count_Buyer(),
					"seller"				       =>  $others->Count_Seller(),
					"special"				       =>  $others->Count_Special_Users(),
					"special_Vip"			       =>  $others->Count_VIP_SPEC_Users(),
					"bid_pending"			       =>  $others->Count_Bid_Pending(),
					"withdraw_money_paypal"	       =>  $others->Count_Withdraw_Money_Form_Paypal(),
					"withdraw_money_moneybooker"   =>  $others->Count_Withdraw_Money_Form_Moneybooker(),
					"deposite_money_paypal"	       =>  $others->Count_Deposite_Money_Form_Paypal(),
					"deposite_money_moneybooker"   =>  $others->Count_Deposite_Money_Form_Moneybooker(),
					"last_week"					   =>  $others->Count_Last_Week_project(date('Y-m-d', mktime(0,0,0,date("m"),date("d")-7,date("y"))),date('Y-m-d')),
					"wallet_sum"                	=>  $wallet_sum,   
					"earn_sum"             			=>  $earn_sum,
					"referrals_paid"            	=>  $referrals_paid,
					"adjusted_earnings"         	=>  $adjusted_earnings,
					"earn_mem"         				=>  $earn_mem,
					"total_earnings"         		=>  $total_earnings,					
				));

$tpl->display('default_layout'. $config['tplEx']);

?>