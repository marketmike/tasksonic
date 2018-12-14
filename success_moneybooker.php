<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Payment.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang'].'/success_moneybooker.php');
include_once($physical_path['Site_Lang'].'/deposit.php');

$pays 		= new Payment();
$emails 	= new Email();

if($_GET['check_value'] == $_SESSION['User_Id'])
{
	$desc = $lang['Deposite_Pending'];
	$pays->Pending_Moneybooker($_SESSION['User_Id'],$_SESSION['User_Name'],$_SESSION['amount'],$desc);

	global $mail2,$virtual_path,$physical_path;
	$mail2 = '';
	$mail2 = new htmlMimeMail();

	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

	$sendinfo = $emails->GetEmailDetails1(PENDING_REQUEST);
	 

	$mail2->setFrom($sendinfo->email_adress);
	$mail2->setSubject($sendinfo->email_subject);
  
	
	$tpl2->assign(array(    "amount"				=>	$_SESSION['amount'],
							"customer_name"			=>	$_SESSION['User_Name'],
						));
					
			$mail_content_reg = $tpl2->fetch("email_template:".PENDING_REQUEST);	
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
				
	$mail2->setHtml($mail_html,'',$physical_path['Email_Images']);
	
	$recevier = GetEmailAddress($_SESSION['User_Id']);
	
	$result = $mail2->send(array($recevier));
	
	session_unregister('amount');
	session_unregister('pay_mehtod');
	
	header("location: pending_request.php");
	exit(0);						
}						
else
{
   $msg = $lang['Msg']; 
   $tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
						"msg"		        =>	 $msg,	
						"lang"				=>	$lang,
						"Page_Title_1"		=>	$lang['Deposit_Money'],
						"From_Payment"		=>	1, // To show payment menu selected, instead of seller menu
						"Current_Page"		=>	'payment',
						"Submenu_Page" 		=> 'deposit_money',
						));
} 
$tpl->display('default_layout'. $config['tplEx']);					
?>