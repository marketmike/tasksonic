<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Violation.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Others.php');
include_once($physical_path['DB_Access']. 'User.php');
include_once($physical_path['Site_Lang'].'/violation.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$violation 		= new Violation();
$emails 		= new Email();
$others			= new Others();
$user  		= new User();

if($_POST['Submit'] == $lang['Violation_Send'])
{
 		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(REPORT_VIOLATION);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject($sendinfo->email_subject);

        $tpl2->assign(array(
							"your_name"				=>	$_POST['your_name'],
							"your_email"			=>  $_POST['your_email'],
							"your_username"			=>  $_POST['your_username'],
							"violation_list"		=>  $_POST['violation_list'],
							"other_person_name"		=>  $_POST['other_person_name'],
							"url"					=>  $_POST['url'],
							"en_violation_details"	=>  $_POST['en_violation_details'],
						));
	
		
			$mail_content_reg = $tpl2->fetch("email_template:".REPORT_VIOLATION);	
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
		
		$result = $mail2->send(array($sendinfo->email_adress));
		
	   	$violation -> Insert($_POST);
		$sucmsg	= 'Thank You !! Violation details have been submitted successfully. We will soon investigate.';	
		//header("location: violation_success.html");
		//exit(0);
		$reporting_user = $user->getUserDetails($_SESSION['User_Id']);
		$user_fullname = $reporting_user->mem_fname . ' ' . $reporting_user->mem_lname;

			$tpl->assign(array(	"T_Body"			=>	'violation'. $config['tplEx'],
								"JavaScript"		=>  array("violation.js"),
								"lang"				=>  $lang,
								"User_Fullname"		=>  $user_fullname,
								"User_Name"			=>  $reporting_user->user_login_id,
								"User_Email"		=>  $reporting_user->mem_email,
								"violation_list"	=>	fillArrayCombo($lang["violation"]),				
								"sucmsg" 			=> 	$sucmsg,
								"tab"			 	=>  4,	
								"navigation"		=>	'<label class=navigation>'.$lang['Report_Violation'].'</label>'
						));	
}else{
						$reporting_user = $user->getUserDetails($_SESSION['User_Id']);
						$user_fullname = $reporting_user->mem_fname . ' ' . $reporting_user->mem_lname;

							$tpl->assign(array(	"T_Body"			=>	'violation'. $config['tplEx'],
												"JavaScript"		=>  array("violation.js"),
												"lang"				=>  $lang,
												"User_Fullname"		=>  $user_fullname,
												"User_Name"			=>  $reporting_user->user_login_id,
												"User_Email"		=>  $reporting_user->mem_email,
												"violation_list"	=>	fillArrayCombo($lang["violation"]),				
												"sucmsg" 			=> 	$sucmsg,
												"tab"			 	=>  4,	
												"navigation"		=>	'<label class=navigation>'.$lang['Report_Violation'].'</label>'
										));

} 

$tpl->display('default_layout'. $config['tplEx']);
?>