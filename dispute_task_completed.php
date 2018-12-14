<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'User.php');
include_once($physical_path['Site_Lang'].'mark_task_completed.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$proj 		= new project();
$emails 	= new Email();
$user 		= new User();
if($_POST['Submit']	== 'Comment' && $_POST['action'] == 'comment')
{
	if($_POST['disp_comment'] == ""){ // Validation server side 
	$ERROR = "Your must provide a comment in the comment field"; 
	}else{
	$project_id 			= $_POST['project_id'];
	$disp_comment 			= $_POST['disp_comment'];
	$posted_by 				= $_POST['posted_by'];
	$posted_to 				= $_POST['posted_to'];
	
	$proj->Insert_dispute_comment($project_id,$posted_by,$disp_comment);
	
			// New comment email
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$ret_user = $user->getUserDetails(md5($posted_to));
			$send_to = $ret_user->mem_email;
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(TASK_COMPLETED_DISPUTE_NOTICE);
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
			
			$ret  = $proj->Getproject($project_id);
			
			$tpl2->assign(array("project_name"          =>  $ret->project_title, 
								"resolution_link"       =>	"<a href=".$virtual_path['Site_Root']."dispute-completed_".$project_id.".html>Resolution Board</a>",
								"posted_to" 			=>  $posted_to,
								"posted_by" 			=>  $posted_by,
								"flag"					=>  2,
						));
			
			$mail_content_reg = $tpl2->fetch("email_template:".TASK_COMPLETED_DISPUTE_NOTICE);
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

			$mail2->send(array($send_to));	
	
	
	$sucmsg = "Your comment has been posted ad the other party has been emailed";
	$Action = A_VIEW_ALL;
	}
}
if($_POST['Submit']	== 'update' && $_POST['action'] == 'update')
{
	if($_POST['task_owner_dispute'] == 1){ // Validation server side
	$ERROR = "The Task Is Already Being Disputed, Please Make Another Selection";
	}else{
	$project_id 					= $_POST['project_id'];
	$task_owner_dispute 			= $_POST['task_owner_dispute'];

	$proj->Update_Dispute($project_id,$task_owner_dispute);
	$sucmsg = "The status of the dispute has been updated";
	$Action = A_VIEW_ALL;
	}
}
if($_POST['Submit']	== $lang['Accept_Submit'])
{

	if($_POST['task_owner_dispute']	== 0){
	$ERROR = "You must select dispute before submitting";
	}
	if($_POST['task_owner_dispute_reason']	== ''){
	$ERROR = "You must provide a reason for the dispute!";
	}	

	if ($ERROR == ""){
		
					$project_id 				= $_POST['project_id'];
					$task_owner_dispute 		= $_POST['task_owner_dispute'];
					$task_owner_dispute_reason 	= $_POST['task_owner_dispute_reason'];		
										
					$proj->Dispute_Completed($project_id,$task_owner_dispute,$task_owner_dispute_reason);
				

			// Send email to Sonic Tasker
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$ret_user = $user->getUserDetails($_POST['auth_id_of_post_to']);
			$send_to = $ret_user->mem_email;
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(TASK_COMPLETED_DISPUTE_NOTICE);
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
			
			$ret  = $proj->Getproject($_POST['project_id']);
			
			$tpl2->assign(array("project_name"          	=>  $ret->project_title, 
								"resolution_link"       	=>	"<a href=".$virtual_path['Site_Root']."dispute-completed_".$project_id.".html>Resolution Board</a>",
								"task_owner" 				=> $task_owner,
								"tasker" 					=> $tasker,
								"flag"						=> 1,
								"task_owner_dispute" 		=> $_POST['task_owner_dispute'],
								"task_owner_dispute_reason" => $_POST['task_owner_dispute_reason'],
						));
			
			$mail_content_reg = $tpl2->fetch("email_template:".TASK_COMPLETED_DISPUTE_NOTICE);
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

			$mail2->send(array($send_to));


					
				header("location: dispute_task_completed_success.php?project_id=$project_id");
				exit(0);
			}else{
			$Action = A_VIEW_ALL;				
			} // End if ERROR
} // End if post			
	#############################################################################################
if($Action == ''|| $Action == A_VIEW_ALL)
{    
	$ret  = $proj->Getproject($_GET['project_id']);
	
	// calculate seven days
	
			$task_owner_dispute_date = new Datetime($ret->task_owner_dispute_date);
			$now = new Datetime();
			$add_7_days = $task_owner_dispute_date->format('U') + 604800;
			$seconds_remaining_7_day  = $add_7_days - $now->format('U');	
			
			$mode = 999; // so it doesn't match
		  
			if($_SESSION['User_Id'] == $ret->auth_id_of_post_by && $ret->task_owner_dispute == 0)
			{
				$mode = 999; // so it doesn't match
				$tpl->assign(array(	"project_id"    			=>	$ret->project_id,
									"auth_id_of_post_to"		=>  $ret->auth_id_of_post_to,
									"task_owner_dispute"		=>  $ret->task_owner_dispute, 									
									"task_owner_dispute_reason"	=>  $ret->task_owner_dispute_reason, 								
							));
			}
			elseif ($_SESSION['User_Id'] == $ret->auth_id_of_post_by && $ret->task_owner_dispute == 1) //form for Task Owner
			{			
				$mode = 1;
				$proj->Getdisputethread($ret->project_id);
				$cnt = $db->num_rows();	// get num of rows
				$i=0;
				while($db->next_record())		// loop till last record
				{ 
					$view_disp[$i]['date']					= $db->f('date');
					$view_disp[$i]['posted_by']				= $db->f('posted_by');
					$view_disp[$i]['disp_comment']			= $db->f('disp_comment');
					$i++;
				}	
			
			$tpl->assign(array(	"project_id"    			=>	$ret->project_id,
								"project_posted_by"			=>  $ret->project_posted_by,
								"task_owner_dispute"		=>  $ret->task_owner_dispute, 									
								"task_owner_dispute_reason"	=>  $ret->task_owner_dispute_reason,
								"task_owner_dispute_date"	=>  $ret->task_owner_dispute_date,								
								"view_disp"    				=>	$view_disp,
								"Loop"						=>	$cnt,
								"comment_posted_by"			=>  $ret->project_posted_by,
								"comment_posted_to"			=>  $ret->project_post_to,								
								"sucmsg"					=>	$sucmsg,								
						));
			}
			elseif ($_SESSION['User_Id'] == $ret->auth_id_of_post_to && $ret->task_owner_dispute == 1) // form for tasker
			{			
				$mode = 2;
				$proj->Getdisputethread($ret->project_id);
				$cnt = $db->num_rows();	// get num of rows
				$i=0;
				while($db->next_record())		// loop till last record
				{ 
					$view_disp[$i]['date']					= $db->f('date');
					$view_disp[$i]['posted_by']				= $db->f('posted_by');
					$view_disp[$i]['disp_comment']			= $db->f('disp_comment');
					$i++;
				}	
			
			$tpl->assign(array(	"project_id"    			=>	$ret->project_id,
								"project_posted_by"			=>  $ret->project_posted_by,
								"task_owner_dispute"		=>  $ret->task_owner_dispute, 									
								"task_owner_dispute_reason"	=>  $ret->task_owner_dispute_reason,
								"task_owner_dispute_date"	=>  $ret->task_owner_dispute_date,								
								"view_disp"    				=>	$view_disp,
								"Loop"						=>	$cnt, 
								"comment_posted_by"			=>  $ret->project_post_to,
								"comment_posted_to"			=>  $ret->project_posted_by,								
								"sucmsg"					=>	$sucmsg								
						));
			}
			elseif ($ret->task_owner_dispute == 2)
			{
			$mode = 3;
			$resolve_status = "This dispute has been resolved by the parties";
			}
			elseif ($ret->task_owner_dispute == 3)
			{
			$mode = 3;
			$resolve_status = 'This dispute has been marked as unable to resolve by ' . $ret->project_posted_by;			
			}else{
			$mode = 0;
			$ERROR = "You do not appear to be involved in a dispute on this task";
			}
			
			$tpl->assign(array(	"T_Body"			=>	'dispute_task_completed'. $config['tplEx'],
								"JavaScript"	    =>  array("mark_task_completed.js"),
								"task_title"    	=>	stripslashes(strtoupper($ret->project_title)),								
								"error"				=>  $error,
								"ERROR"				=>  $ERROR,								
								"lang"				=>  $lang,
								"resolution_mode"	=>  $mode,
								"resolve_status"	=>  $resolve_status,
								"seconds_remaining_7_day"	=>  $seconds_remaining_7_day,																
								"task_link"			=>  '<a href="task_' . $ret->project_id . '_' . clean_url($ret->project_title) .'.html">Return to Task</a>',								
						));
}    
$tpl->display('default_layout'. $config['tplEx']);
?>