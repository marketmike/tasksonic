<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'User.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang'].'forgotpasswd.php');

$Action 	= isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

$emails 		= new Email();
//print($Action);die;
////////////first step validate data here
if($Action == 'Save' && $_POST['Submit'] = $lang['Button_Submit'])
{
 //  $uid = $user->Check_User_ID($_POST['user_id']);
 
  $mail = $user->Check_Email_ID_New($_POST['mem_email']);

   if($mail == 1)
	 {
		$msg = $lang['MailError_1'];
	 }   
   if($mail == 0)
     {
			
			$forgot_username = $user->Get_Username_New($_POST['mem_email']);
			
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(EMAIL_FORGET_USERNAME);
			
			
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
			
			$tpl2->assign(array("email_id"				 => $_POST['mem_email'],
								"username"				 => $forgot_username->user_login_id,
								
			));

			
			$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_FORGET_USERNAME);	
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

			$result = $mail2->send(array($_POST['mem_email']));
			
			header("location: forgotusername_success.html");
			exit();
		}


  $tpl->assign(array(	"T_Body"			=>	'forgotusername'. $config['tplEx'],
						"JavaScript"		=>	array('forgotpasswd.js'),
            			"msg"				=>	$msg,
						"tab"				=>	4,
				   ));
}

/*first step validate data here*/
$tpl->assign(array(	"T_Body"			=>	'forgotusername'. $config['tplEx'],
					"JavaScript"		=>	array('forgotpasswd.js'),
					"lang"				=>  $lang,	
					"Action"			=>	'Save',
					"tab"				=>	4,
					"navigation"		=>	'<label class=navigation>'.$lang['Recover_It'].'</label>'
					));
$tpl->display('default_layout'. $config['tplEx']);
?>