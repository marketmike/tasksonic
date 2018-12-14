<?php
	#====================================================================================================
	#	File	:   expire_bidding.php
	#	Purpose	:   Check for task with status of 1 that the bidding date has expired
	#   Purpose   : Updates project_closed_date and send first email giving user 7 days to award
	#   Purpose: Set the project status to 7 if still not awarded seven days after first email, send second email
	#   Schedule: Once daily after midnight 		
	#   Dev Note: Make sure project_closed_date is set back to 00:00:00 if awarded 	
	#----------------------------------------------------------------------------------------------------	
	
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'task.php');
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron = new Cronjobs();
$emails  = new Email();
$project  = new Project();

$cron->project_status();

$cron->send_mail_to_closedproject();
$cnt = $db3->num_rows();	// get num of rows
// Get number of bids for the project

$i=0;
while($db3->next_record())		// loop till last record
{		
	$project_details[$i]['project_id']					= $db3->f('project_id');
	$project_details[$i]['project_title']				= $db3->f('project_title');
	$project_details[$i]['project_posted_by']			= $db3->f('project_posted_by');
	$project_details[$i]['auth_id_of_post_by']			= $db3->f('auth_id_of_post_by');
	$project_details[$i]['mem_email']			 	    = $db3->f('mem_email');
	$project_details[$i]['project_closed_date']			= $db3->f('project_closed_date');
	$a = explode("-",$db3->f('project_closed_date'));
	$project_details[$i]['project_new_date']			= date('Y-m-d', mktime(0,0,0,$a[1],($a[2]),$a[0]) ); // First email sent on next cron run following the closed date matching today date.
	$project_details[$i]['project_new_date1']			= date('Y-m-d', mktime(0,0,0,$a[1],($a[2]+ 3),$a[0]) ); // Second email sent 3 days after closed date
		
	$today_date = date('Y-m-d');
	$bid_count = $project->Get_Bid_Count_By_Id($db3->f('project_id'));
	if($today_date == $project_details[$i]['project_new_date'] && $bid_count > 0)// First email sent one day after closed date. Done to prevent missing for tasks that close close to midnight
	{
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
		
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
		$sendinfo = $emails->GetEmailDetails1(TASK_CLOSED_WARNING);
		$mail2->setFrom($sendinfo->email_adress);
		$mail2->setSubject($sendinfo->email_subject);
		
		$tpl2->assign(array(	"user_id"					=>	$project_details[$i]['project_posted_by'],
								"project_name"				=>  "<a href=".$site_path."task_".$project_details[$i]['project_id']."_".clean_url($project_details[$i]['project_title']).".html>".$project_details[$i]['project_title']."</a>",
								"path"          			=>  $site_path,
								"path_post_project"			=>	"<a href=".$site_path."post-new-task.html>POST TASK NOW</a>",
			));
		
			$mail_content_reg = $tpl2->fetch("email_template:".TASK_CLOSED_WARNING);	
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
		$mail2->send(array($project_details[$i]['mem_email']));
		
		//Add three days to bidding end time and task completion
		$cron->auto_extend_bid_and_completion_dates($project_details[$i]['project_id']);
		
		echo 'Record ' . $project_details[$i]['project_id'] . ' updated to project status 5, the task owner has three days to award the task and has been emailed a warning. We have also added three days to the project completion date<br />';						
	}
	
	if($today_date == $project_details[$i]['project_new_date1'] || $bid_count == 0) // Second email sent 3 days after closed date
	{
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
		
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
		$sendinfo = $emails->GetEmailDetails1(TASK_CLOSED);
		$mail2->setFrom($sendinfo->email_adress);
		$mail2->setSubject($sendinfo->email_subject);
		
		if ($bid_count == 0){
		$bid_count_notice = 'and received 0 bids';
		}else{
		$bid_count_notice = 'and has not been awarded';
		}
		
		$tpl2->assign(array(	"user_id"					=>	$project_details[$i]['project_posted_by'],
								"project_name"				=>  "<a href=".$site_path."task_".$project_details[$i]['project_id']."_".clean_url($project_details[$i]['project_title']).".html>".$project_details[$i]['project_title']."</a>",
								"path"          			=>  $site_path,
								"path_post_project"			=>	"<a href=".$site_path."post-new-task.html>POST TASK NOW</a>",
								"bid_count_notice"			=>  $bid_count_notice,
								"signature"					=>  $site_title_absolute,
			));
		
		$mail_content_reg = $tpl2->fetch("email_template:".TASK_CLOSED);	
		$mail_html = "<table border=0 cellpadding=0 cellspacing=0 width=75%>
						<tr>
							<td>".$mail_content_header."</td>
						</tr>
						<tr>
							<td>".$mail_content_reg."</td>
						</tr>
						<tr>
							<td>".$mail_content_footer."</td>
						</tr>
					</table>";
		$mail2->setHtml($mail_html);
		$mail2->send(array($project_details[$i]['mem_email']));
		
		$cron->Update_Status_Of_project($project_details[$i]['project_id']);
		echo 'Record ' . $project_details[$i]['project_id'] . ' updated to project status 7 and closed, an email has been sent to task owner<br />';		
	}
	$i++;

}
?>