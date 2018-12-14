<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/deposit.php');
include_once($physical_path['DB_Access']. 'Others.php');


$others 		= new Others();


$_SESSION['pay_method'] = '';
$_SESSION['amount'] = '';
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);
$ret = $others->getUserDetails(md5($_SESSION['User_Name']));

if($Action == 'Next_Step')
{
   //print("next");die;
   $_SESSION['pay_method'] = ($_SESSION['pay_method'] ? $_SESSION['pay_method'] : $_POST['pay_method']);
	$_SESSION['amount'] = ($_SESSION['amount'] ? $_SESSION['amount'] : $_POST['amount']);
	
	$task_staged_id = $_POST['task_staged_id'];
	
	if($_SESSION['pay_method']	==	'paypal')
	{ 

		$total1	=	($_SESSION['amount'] * $config[WC_PAYPAL_PERCENTAGE]) / 100 ;
			
		$total2	=	$_SESSION['amount'] + $total1;
		$total	=	$config[WC_PAYPAL_FIX_AMOUNT] + $total2;
			
		$tpl->assign(array(	"T_Body"			=>	'paypal'. $config['tplEx'],
							"lang"				=>  $lang,
							"paypal_id"			=>	$config[WC_PAYPAL_MAIL],
							"sandbox_check"		=>	$config[WC_PAYPAL_SENDBOX],
							"final_total"		=>	number_format($total,2),
							"requested_amount"	=>  number_format($_SESSION['amount'],2),
							"user_id"           =>  $_SESSION['User_Id'], 
							"user_name"         =>  $_SESSION['User_Name'],
							"pay_method"        =>  $_SESSION['pay_method'],
							"item_name"			=>	"Deposit on Task Sonic . Username: ".$_SESSION['User_Name'],
							"task_staged_id"	=>  $task_staged_id,							
							"tab"			 	=>  4,							
							
						));

	}
	if($_SESSION['pay_method']	==	'moneybooker')
	{ 
		$total1	=	($_SESSION['amount'] * $config[WC_MONEYBOOKER_PERCENTAGE_DEPOSIT]) / 100 ;
			
		$total2	=	$_SESSION['amount'] + $total1;
		$total	=	$config[WC_MONEYBOOKER_FIX_AMOUNT_DEPOSIT] + $total2;
			
		$tpl->assign(array(	"T_Body"			=>	'moneybooker'. $config['tplEx'],
							"lang"				=>  $lang,
							"moenybooker_id"	=>	$config[WC_MONEYBOOKER_MAIL],
							"final_total"		=>	number_format($total,2),
							"requested_amount"	=>  number_format($_SESSION['amount'],2),							
							"user_id"           =>  $_SESSION['User_Id'], 
							"user_name"         =>  $_SESSION['User_Name'],
							"pay_method"        =>  $_SESSION['pay_method'], 
							"item_name"			=>	'Deposit on ' . $site_title_absolute . ' ' .$_SESSION['User_Name'],
							"item_name2"		=>	'Deposit on ' . $site_title_absolute . ' ' .$_SESSION['User_Name'],
							"task_staged_id"	=>  $task_staged_id,							
							"tab"			 	=>  4,
						));

	}
}
else
{
// Get query params if available
$re_amount = $_GET['re_amount'];
$staged_id = $_GET['staged_id'];
$amt_short = $_GET['amt_short'];
$amt_short = str_replace('-','',$amt_short);
$totalamount = str_replace('+','',$totalamount);

if($re_amount && $totalamount && $amt_short){
$ERROR = 'The total cost to post your tasks was $' . $re_amount . ' and your currently have $' . $totalamount . ' in your ' . $site_title_absolute . ' account (wallet)!<br />Please deposit $' . $amt_short . ' in order to publish your task.';
}

$tpl->assign(array(	"T_Body"					=>	'deposit'. $config['tplEx'],
					"JavaScript"				=>	array('deposit.js'),    
					"lang"						=>  $lang,
					"fix_amount"				=>	$config[WC_PAYPAL_FIX_AMOUNT],
					"per_amount"				=>	$config[WC_PAYPAL_PERCENTAGE],
					"money_booker_fix_amount"	=>	$config[WC_MONEYBOOKER_FIX_AMOUNT_DEPOSIT],
					"money_booker_per_amount"	=>	$config[WC_MONEYBOOKER_PERCENTAGE_DEPOSIT],
					"JS_WC_POST_DEPOSIT"		=>	$config[WC_DEPOSIT_AMOUNT],
					"tab"			 			=>  4,
					"ERROR"         			=>  $ERROR,					
					"re_amount"         		=>  $re_amount,
					"staged_id"         		=>  $staged_id,
					"amt_short"         		=>  $amt_short,
					"paypal_status"		=>  $config[WC_PAYPAL_ACTIVE],
					"moneybooker_status"=>  $config[WC_MONEYBOOKER_ACTIVE],					
					
					
					));
					
}
$tpl->display('default_layout'. $config['tplEx']);
?>