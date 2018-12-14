<?php
//Handles mail send for Notify me of all new tasks posted on Task Sonic mem_pro_notice 1
// filtered by city as well
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Category.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron 	 = new Cronjobs();
$emails  = new Email();
$cate	 = new Category();



	$member_details = $cron->all_task_subscribe();//changes
	$cnt = $db3->num_rows();	// get num of rows

	$i=0;
	$j=0; 			
	while($db3->next_record())		// loop till last record
	{
		$member_info[$i]['user_login_id']				= $db3->f('user_login_id');
		$member_info[$i]['user_auth_id']			    = $db3->f('user_auth_id');
		$member_info[$i]['mem_email']			 	    = $db3->f('mem_email');
		$member_email =	 $member_info[$i]['mem_email'];
		$member_info[$i]['mem_city']			 		= $db3->f('mem_city');
		$membercity = $member_info[$i]['mem_city'];		
		$member_info[$i]['mem_category']			 	= $db3->f('mem_category');
		$member_info_cat     							= explode(",",$member_info[$i]['mem_category']);
		
		$cron->latest_tasks_by_city($membercity);
		$count = $db1->num_rows();
			
		while($db1->next_record())
		{
			$arr_related_project[$j]['id']					= $db1->f('project_id');
			$arr_related_project[$j]['title']		        = $db1->f('project_title');
			$arr_related_project[$j]['project_link']        = "<a href=".$virtual_path['Site_Root']."task_".$db1->f('project_id')."_".clean_url($db1->f('project_title')).".html>VIEW THIS TASK</a>";
			$j++;
		}
		if($count > 0)
		{
		
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			$sendinfo = $emails->GetEmailDetails1(SEND_ALL_TASKS);
			
			$subject_text = $sendinfo->email_subject;
		
			
			$tpl2->assign(array(	"view_task"					=>	$arr_related_project,
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
			$cron->Insert_In_PipeMail($member_email,$sendinfo->email_adress,$subject_text,$mail_html);
		}
		$i++;
	}
?>