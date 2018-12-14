<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/violate_user.php');
include_once($physical_path['DB_Access']. 'Others.php');
include_once($physical_path['DB_Access']. 'Email.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$others		= new Others();
$emails 	= new Email();


if($Action == 'violate')
{
	$others->ToggleStatusUser(md5($_GET['user_id']),0);// 
	// send mail to admin to inform that this user has violated site terms
	
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
		$sendinfo = $emails->GetEmailDetails1(INFORM_TO_ADMIN_VIOLATE_USER);
		$mail2->setSubject($sendinfo->email_subject);
		$mail2->setFrom($sendinfo->email_adress);
						
		$mail2->setSubject($sendinfo->email_subject);

		$tpl2->assign(array(
								"user"			=>	$_GET['user_id'],
								"reported_by"	=>	$_GET['reportedby'],
								"terms_link"	=>	'<a href="'. $site_url . 'terms_conditions.html">Terms & Conditions</a>',								
								
						));
	
		
			$mail_content_reg = $tpl2->fetch("email_template:".INFORM_TO_ADMIN_VIOLATE_USER);	
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
	
	
	// Notify user that their account has been temporarily suspened
	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();

	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

	$sendinfo2 = $emails->GetEmailDetails1(VIOLATE_USER);

	$mail2->setSubject($sendinfo2->email_subject);
	$mail2->setFrom($sendinfo2->email_adress);

	$tpl2->assign(array(
						"user"			=>	$_GET['user_id'],
						"reported_by"	=>	$_GET['reportedby'],
						"terms_link"	=>	'<a href="'. $site_url . '/terms_conditions.html">Terms & Conditions</a>',
						"contact_us"	=>	'<a href="'. $site_url . '/contact_us.html">Contact Us</a>',						
						
				));

	$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
	$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
	$mail_content_reg = $tpl2->fetch("email_template:".VIOLATE_USER);	
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

	$send_to2 = GetEmailAddress(md5($_GET['user_id']));

	$result = $mail2->send(array($send_to2));
	
	//////////////////////////////////////////////////////////////////
	
	$tpl->assign(array(	"T_Body"			=>	'violation_success'. $config['tplEx'],
						"lang"				=>	$lang,	
						"flag_flag"			=>	'1',	 
						));
}
$tpl->display('popupwin_layout_blank'. $config['tplEx']);
?>