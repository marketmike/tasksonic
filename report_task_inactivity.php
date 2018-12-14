<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'report_task_inactivity.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Others.php');
include_once($physical_path['DB_Access']. 'User.php');
include_once($physical_path['Site_Lang'].'/report_task_inactivity.php');
include_once($physical_path['DB_Access']. 'task.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);
$project 		= new project();
$Inactivity 		= new Inactivity();
$emails 		= new Email();
$others			= new Others();
$user  		= new User();

if($_POST['Submit'] == $lang['Inactivity_Send'])
{
 /*		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(REPORT_inactivity);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject($sendinfo->email_subject);

        $tpl2->assign(array(
							"your_name"				=>	$_POST['your_name'],
							"your_email"			=>  $_POST['your_email'],
							"your_username"			=>  $_POST['your_username'],
							"inactivity_list"		=>  $_POST['inactivity_list'],
							"other_person_name"		=>  $_POST['other_person_name'],
							"url"					=>  $_POST['url'],
							"en_inactivity_details"	=>  $_POST['en_inactivity_details'],
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
		*/
	   	$Inactivity->Insert($_POST);
		$sucmsg	= 'Thank You !! inactivity details have been submitted successfully. We will soon investigate.';	

		
		$reporting_user = $user->getUserDetails($_SESSION['User_Id']);
		$user_fullname = $reporting_user->mem_fname . ' ' . $reporting_user->mem_lname;
		
			$ret = $project->GetprojectDetails($_GET['project_id']);
			$tpl->assign(array(	"T_Body"			=>	'report_task_inactivity'. $config['tplEx'],
								"JavaScript"		=>  array("report_task_inactivity.js"),
								"lang"				=>  $lang,
								"User_Fullname"		=>  $user_fullname,
								"User_Name"			=>  $reporting_user->user_login_id,
								"User_Email"		=>  $reporting_user->mem_email,
								"project_posted_by" =>	$ret->project_posted_by,
								"project_post_to" 	=>	$ret->project_post_to,
								"task_title" 	=>	$ret->project_title,								
								"inactivity_list"	=>	fillArrayCombo($lang["inactivity"]),				
								"sucmsg" 			=> 	$sucmsg,
								"project_id"		=>  $_GET['project_id'],
								"tab"			 	=>  4,	
								"navigation"		=>	'<label class=navigation>'.$lang['Report_Inactivity'].'</label>'
						));	
}else{
						$ret = $project->GetprojectDetails($_GET['project_id']);
						$reporting_user = $user->getUserDetails($_SESSION['User_Id']);
						$user_fullname = $reporting_user->mem_fname . ' ' . $reporting_user->mem_lname;

							$tpl->assign(array(	"T_Body"			=>	'report_task_inactivity'. $config['tplEx'],
												"JavaScript"		=>  array("report_task_inactivity.js"),
												"lang"				=>  $lang,
												"User_Fullname"		=>  $user_fullname,
												"User_Name"			=>  $reporting_user->user_login_id,
												"User_Email"		=>  $reporting_user->mem_email,
												"project_posted_by" =>	$ret->project_posted_by,
												"project_post_to" 	=>	$ret->project_post_to,
												"task_title" 	=>	$ret->project_title,												
												"inactivity_list"	=>	fillArrayCombo($lang["inactivity"]),				
												"sucmsg" 			=> 	$sucmsg,
												"project_id"		=>  $_GET['project_id'],
												"tab"			 	=>  4,	
												"navigation"		=>	'<label class=navigation>'.$lang['Report_inactivity'].'</label>'
										));

} 

$tpl->display('default_layout'. $config['tplEx']);
?>