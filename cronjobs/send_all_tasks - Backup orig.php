<?php
//Handles mail send for Notify me of all new tasks posted on Task Sonic mem_pro_notice 1
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');;

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron 	 = new Cronjobs();
$emails  = new Email();

	$Avrage_Sum = $cron->SUM_Of_All_projects();

    //select project :::  
	$cron->All_projects();
	$cnt = $db->num_rows();	// get num of rows
	echo '<h1>Preview</h1>';
	$i=0;
	while($db->next_record())		// loop till last record
	{
		$view_pro[$i]['id']					= $db->f('project_id');
		$view_pro[$i]['title']		        = $db->f('project_title');
		$view_pro[$i]['project_link']       = "<a href=".$virtual_path['Site_Root']."task_".$db->f('project_id')."_".clean_url($db->f('project_title')).".html>VIEW THIS TASK</a>";
		$i++;
	}

	///send email to user who are select all tasks send option
	$email_address = $cron->all_emails();
	
	$mail_addresses = explode(",",$email_address);
    if($cnt > 0)
	{
	
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
		
		
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		$sendinfo = $emails->GetEmailDetails1(SEND_ALL_TASKS);
		
		$subject_text = $sendinfo->email_subject;
	
		
		$tpl2->assign(array(	"view_task"					=>	$view_pro,
								"Loop"						=>  $cnt,
								"path_post_project"			=>	"<a href=".$virtual_path['Site_Root']."post-new-task.html>POST TASK NOW</a>",
							));
	
			$mail_content_reg = $tpl2->fetch("email_template:".SEND_ALL_TASKS);	
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
		echo $mail_html;
		foreach($mail_addresses as $key => $val)
		{
		  $cron->Insert_In_PipeMail($val,$sendinfo->email_adress,$subject_text,$mail_html);
		}

		
	}	
	
?>