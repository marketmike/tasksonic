<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/contact_us.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Contact_Us.php');
include_once($physical_path['DB_Access']. 'User.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

$user  			= new User();
$contact 		= new Contact();
$emails 		= new Email();

# Save tha data
if($_POST['Submit'] == $lang['Submit1'] && $Action = 'Send')
{

		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_CONTACT_TASKER);
		//$mail2->setFrom($_POST['user_email']);
		$mail2->setFrom($sendinfo->email_adress);
		
		//$mail2->setSubject($sendinfo->email_subject);
		$mail2->setSubject($_POST['contact_subject']);
        $tpl2->assign(array("user_name"						=>	$_POST['user_name'],
							"contact_subject"				=>	$_POST['contact_subject'],
							"contact_reason"				=>  $_POST['contact_reason'],
							"contact_message"				=>  $_POST['contact_message'],
						));

			$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_CONTACT_TASKER);	
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
		
		if ($_POST['contact_copy']){
		$recevier = $config[WC_SITE_EMAIL] . ',' . $_POST['user_email'];
		}else{
		$recevier = $config[WC_SITE_EMAIL];
		}
		
		$result = $mail2->send(array($recevier));	
			
	    $contact->Insert($_POST);
		$sucmsg	= 'Your contact submission was sent successfully! Someone will contact you shortly.';
		$contacting_user = $user->getUserDetails($_SESSION['User_Id']);		

		$tpl->assign(array("T_Body"					=>	'contact_us'. $config['tplEx'],
							"JavaScript"			=>	array('contact_us.js'),
							"lang"					=>  $lang,	
							"Contact_List"			=>	fillArrayCombo($lang["contact"]),
							"Action"				=>	'Send',
							"User_Id"               =>  $_SESSION['User_Id'],
							"User_Name"			    =>  $contacting_user->user_login_id,
							"User_Email"		    =>  $contacting_user->mem_email,						
							"sucmsg"               	=>  $sucmsg,
						));		
}else{
		 
	$contacting_user = $user->getUserDetails($_SESSION['User_Id']);		

 	$tpl->assign(array("T_Body"					=>	'contact_us'. $config['tplEx'],
						"JavaScript"			=>	array('contact_us.js'),
						"lang"					=>  $lang,	
						"Contact_List"			=>	fillArrayCombo($lang["contact"]),
						"Action"				=>	'Send',
						"User_Id"               =>  $_SESSION['User_Id'],
						"User_Name"			    =>  $contacting_user->user_login_id,
						"User_Email"		    =>  $contacting_user->mem_email,						
					));
} 		
$tpl->display('default_layout'. $config['tplEx']);								
?>