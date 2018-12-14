<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Escrow.php');
include_once($physical_path['DB_Access']. 'Email.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$escrow		= new Escrow();
$emails 	= new Email();


$details = $escrow->Get_Details($_GET['id']);
$wallet = Select_wallet_sum($details->from_user_auth_id);
	 			  
$new_wallet2 = $wallet + ($details->amount);
  	
Update_wallet_sum($details->from_user_auth_id,$new_wallet2);

//email to buyer

	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();
	
	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
	$sendinfo = $emails->GetEmailDetails1(CANCEL_PAYMENT);
	
	$mail2->setSubject($sendinfo->email_subject);
	$mail2->setFrom($sendinfo->email_adress); 
	
	$tpl2->assign(array(
						"cancle_user"           =>  $details->to_user_login_id,
						"amount"                =>  number_format($details->amount,2),
						"flag"                  =>  0,
					));
	
			$mail_content_reg = $tpl2->fetch("email_template:".CANCEL_PAYMENT);
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

	$send_to = GetEmailAddress($details->from_user_auth_id);
	
	$result = $mail2->send(array($send_to));
				
	//////////////////////////
	
//email to seller

	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();
	
	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
	$sendinfo = $emails->GetEmailDetails1(CANCEL_PAYMENT);
		
	$mail2->setSubject($sendinfo->email_subject);
	$mail2->setFrom($sendinfo->email_adress); 
	
	$tpl2->assign(array("seller_user"           =>  $details->from_user_login_id,
						"amount"                =>  number_format($details->amount,2),
						"flag"                  =>  1,
					));
	
						
	$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
	$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
	$mail_content_reg = $tpl2->fetch("email_template:".CANCEL_PAYMENT);
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

	
	$send_to = GetEmailAddress($details->to_user_auth_id);
	
	$result = $mail2->send(array($send_to));
				
	//////////////////////////	

$escrow->Delete($_GET['id']);

header("location: manage_escrow.php");
exit();

$tpl->display('default_layout'. $config['tplEx']);
?>