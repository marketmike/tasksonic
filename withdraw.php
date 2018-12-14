<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/withdraw.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Payment.php');
include_once($physical_path['Site_Lang'].'/task.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$emails 		= new Email();
$pays 			= new Payment();
$project 		= new project();

//print_r($_SESSION);
if($Action == 'Next_Step1')
{
    $_SESSION['amount'] = ($_SESSION['amount'] ? $_SESSION['amount'] : $_POST['amount']);
	$_SESSION['withdraw_amount'] = ($_SESSION['withdraw_amount'] ? $_SESSION['withdraw_amount'] : $_POST['withdraw_amount']);
	$_SESSION['paypal_emil_add'] = ($_SESSION['paypal_emil_add'] ? $_SESSION['paypal_emil_add'] : $_POST['paypal_emil_add']);
	$_SESSION['pay_mehtod'] = ($_SESSION['pay_mehtod'] ? $_SESSION['pay_mehtod'] : $_POST['pay_mehtod']);
	
	$amount_clean = substr($_SESSION['amount'],1);
	$amount	=	str_replace(",","",$amount_clean);

	if($_SESSION['withdraw_amount'] > $amount)
	{
	    header("location: request-withdraw.html?amount=true");
		exit();  
	}
	elseif(number_format($_SESSION['withdraw_amount'],2) < number_format($config[WC_WITHDRAW_AMOUNT],2))
	{
	    header("location: request-withdraw.html?amount=low");
		exit();  
	}
	else
	{
	    if($_SESSION['pay_mehtod'] == 'paypal')
		{
		   	$total1	=	($_SESSION['withdraw_amount'] * $config[WC_PAYPAL_DEPOSIT]) / 100 ;
			$total2	=	 ($_SESSION['withdraw_amount'] * $config[WC_PAYPAL_PERCENTAGE_DEPOSIT]) / 100;
		
			$total	=	number_format($config[WC_PAYPAL_FIX_AMOUNT_DEPOSIT] + $total1 + $total2,2);
		}
		if($_SESSION['pay_mehtod'] == 'moneybooker')
		{
			$total1	=	($_SESSION['withdraw_amount'] * $config[WC_MONEYBOOKER_FIX_AMOUNT_WITHDRAW]) / 100 ;
			$total2	=	 ($_SESSION['withdraw_amount'] * $config[WC_MONEYBOOKER_PERCENTAGE_WITHDRAW]) / 100;
		
			$total	=	number_format($total1 + $total2,2);
		}
		
		$received = $_SESSION['withdraw_amount'] - $total;

	
		$tpl->assign(array(	"T_Body"			=>	'withdraw_confirm'. $config['tplEx'],
							"lang"				=>  $lang,
							"TOP_TITLE"         =>  strtoupper($lang['Seller']),    
							"paypal_add"        =>  $_SESSION['paypal_emil_add'],
							"with_amount"       =>  number_format($_SESSION['withdraw_amount'],2),
							"total"             =>  number_format($total,2), 
							"rec_amount"        =>  number_format($received,2), 
							"requested_date"    =>  date('m/d/y \a\t H:i T'),
							"etimate_date1"     =>  date('m/d/y ', mktime(0,0,0,date("m"),date("d")+7,date("y")) ),
							"etimate_date2"     =>  date('m/d/y ', mktime(0,0,0,date("m"),date("d")+8,date("y")) ),
							"method"            =>  $_SESSION['pay_mehtod'],
							"tab"			 	=>  4,
					));
					
		
	}				 
}
elseif($_POST['Submit']	==	$lang['Button_Back'])
{
	session_unregister('amount');
	session_unregister('withdraw_amount');
	session_unregister('paypal_emil_add');
	session_unregister('pay_mehtod');
	header("location: request-withdraw.html");
	exit();
}
elseif($_POST['Submit']	==	$lang['Button_Submit'])
{
        global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$recevier = GetEmailAddress($_SESSION['User_Id']);
	
		$mail2->setFrom($recevier);
		$sendinfo = $emails->GetEmailDetails1(WITHDRAW_MONEY);
						
		$mail2->setSubject($sendinfo->email_subject);

		$tpl2->assign(array("with_amount"				=>	$_SESSION['withdraw_amount'],
							"total"						=>  $_POST['total'],
							"rec_amount"				=>  $_POST['rec_amount'],
							"requested_date"			=>  $_POST['requested_date'],
							"method"					=>  $_SESSION['pay_mehtod'],
							"paypal_add"				=>  $_SESSION['paypal_emil_add'],
							"user_name"                 =>  $_SESSION['User_Name'],
							"check_status"    			=> '<a href="' . $site_url . '/pending-withdraw.html">Pending Withdraws</a>',
							"user_name"					=>	$_SESSION['User_Name'],
							
						));

			$mail_content_reg = $tpl2->fetch("email_template:".WITHDRAW_MONEY);	
			$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
			$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);			
			$mail_html = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td>'.stripslashes($mail_content_header).'</td>
							</tr>
							<tr>
								<td><table align="center" width="600" cellpadding="15" cellspacing="2" bgcolor="#dfe0e0"><tr><td>'.stripslashes($mail_content_reg).'</td></tr></table></td>
							</tr>
							<tr>
								<td>'.stripslashes($mail_content_footer).'</td>
							</tr>
						</table>';
		$mail2->setHtml($mail_html);
		
		
		$send_to = $config[WC_SITE_EMAIL];
		
		$result = $mail2->send(array($send_to));
				
		if($_SESSION['pay_mehtod'] == 'paypal')
			{
				$method  =  "Paypal";  
				$details =  $lang['PayPal_Text'].$_SESSION['paypal_emil_add'];
			}
		if($_SESSION['pay_mehtod'] == 'moneybooker')
			{
				$method  =  "Moneybooker";  
				$details =  $lang['Money_Booker_Text'].$_SESSION['paypal_emil_add'];
			}
		$etimate_date = $_POST['etimate_date1']." - ".$_POST['etimate_date2']; 
		
	    $pays->InsertWithdraw($_SESSION['User_Id'],$_SESSION['User_Name'],$_POST['requested_date'],$_SESSION['withdraw_amount'],$method,$details,$etimate_date,$_POST['rec_amount'],$_POST['paypal_email']);
		
		$wallet = Select_wallet_sum($_SESSION['User_Id']);
		     
		$new_wallet = $wallet - $_SESSION['withdraw_amount'];

		Update_wallet_sum($_SESSION['User_Id'],$new_wallet); 
		//	Generate unique transaction id to tie the records together
		srand((double)microtime()*1000000);
		$transaction_id = md5(uniqid(rand())) . '-' . time();
		$desc = 'Withdraw Pending - Funds Frozen';
	
		$project->Insert_Withdraw_Funds_Hold($_SESSION['User_Id'],$_SESSION['User_Name'],$_SESSION['withdraw_amount'],$_SESSION['paypal_emil_add'],$transaction_id,$desc);
		
		
		session_unregister('amount');
		session_unregister('withdraw_amount');
		session_unregister('paypal_emil_add');
		session_unregister('pay_mehtod');
   		header("location: request-withdraw.html?Action=send");
	  	exit();
}
elseif($Action == 'send')
{
   		header("location: pending-withdraw.html");
	  	exit();
}
else
{
	
	if ($_GET['amount']=='true')
	{
		$amount_msg = $lang['JS_Withdraw_1'];
		$email_add	=	$_SESSION['paypal_emil_add'];
		
		session_unregister('amount');
		session_unregister('withdraw_amount');
		session_unregister('paypal_emil_add');
		session_unregister('pay_mehtod');
	
	}	
	if ($_GET['amount']=='low')
	{
		$amount_msg = 'You Must Withdraw At Least $' . $config[WC_WITHDRAW_AMOUNT];
		$email_add	=	$_SESSION['paypal_emil_add'];
		
		session_unregister('amount');
		session_unregister('withdraw_amount');
		session_unregister('paypal_emil_add');
		session_unregister('pay_mehtod');
	
	}
	
	//$totalamount = TotalAmount_Of_Traction($_SESSION['User_Id']);
	$totalamount1 = Select_wallet_sum($_SESSION['User_Id']);
	$tpl->assign(array(	"T_Body"			=>	'withdraw'. $config['tplEx'],
						"lang"				=>  $lang,
						"TOP_TITLE"         =>  strtoupper($lang['Withdraw_Msg']),
						"JavaScript"		=>	array('withdraw.js'),    
						"amount_deposit"	=>	$config[WC_PAYPAL_DEPOSIT],
						"per_amount_deposit"=>	$config[WC_PAYPAL_PERCENTAGE_DEPOSIT],
						"fix_amount_deposit"=>	$config[WC_PAYPAL_FIX_AMOUNT_DEPOSIT],
						"totalamount1"      =>  $totalamount1,
						"amount_msg"      	=>  $amount_msg,
						"tab"			 	=>  4,
						"JS_WC_WITHDRAW_AMOUNT"=>	$config[WC_WITHDRAW_AMOUNT],
						"ERROR"				=>	$amount_msg,
						"email_add"			=>	$email_add,
						));
	
}
$tpl->display('default_layout'. $config['tplEx']);
?>