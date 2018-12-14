<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');


$proj 			= new project();
$emails 		= new Email();
	
	// Send email to user to let them know the task owner has re-tracted the award.
	$tasker_email = $proj->notify_re_award($_GET['id']);

	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();

	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

	$sendinfo = $emails->GetEmailDetails1(BID_RETRACTED);

	$mail2->setSubject($sendinfo->email_subject);
	$mail2->setFrom($sendinfo->email_adress);

	$ret  = $proj->Getproject($_GET['id']);

	$tpl2->assign(array("project_name"          =>  $ret->project_title, 
						"project_link"          =>  $virtual_path['Site_Root']."task_".$_GET['id']."_".clean_url($ret->project_title).".html",  
					));

	
			$mail_content_reg = $tpl2->fetch("email_template:".BID_RETRACTED);	
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
	$result = $mail2->send(array($tasker_email));	
	// End Send email to	
	$proj->Update_Award_project($_GET['id']);
	
			// Publish award notice to latest_activity table for display on logged_in_home.tpl
			$task_id = $ret->project_id;
			$task_owner = $ret->project_posted_by;
			$tasker = $awarded_user;
			$activity_type = "Task Awarded Retracted";
			$description = '<a href="task_owner_profile_' . $task_owner . '.html">' . $task_owner . '</a> has retracted the awarding of the task "'.$ret->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . '. Another bid may now be awarded!';
			$activity_link = 'task_'.$task_id.'_'.clean_url($ret->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish award notice to latest_activity table for display on logged_in_home.tpl	
	
	
	header("location: award_task_".$_GET['id']."_".clean_url($ret->project_title).".html");
	
$tpl->display('default_layout'. $config['tplEx']);
?>
