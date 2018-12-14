<?php
define('IN_SITE', 	true);
define('IN_CRON', 	true);
include_once("../includes/common.php");;
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Escrow.php');

$esc	= new Escrow();
$proj 	= new project();
$cron = new Cronjobs();
$emails  = new Email();

		global $db,$db1;
		$sql = "SELECT * FROM ".PROJECT_MASTER." WHERE project_status = 3";
		$db->query($sql);
		while($db->next_record())
		{
			$completed_by  = $db->f('completed_by');
			$completed_time = $db->f('completed_time');			
			$project_posted_date = $db->f('project_posted_date'); 
			$project_id = $db->f('project_id');
			$project_title = $db->f('project_title');
			$project_post_time = $db->f('project_post_time');
			
			$auth_id_of_post_by = $db->f('auth_id_of_post_by');
			$project_posted_by 	= $db->f('project_posted_by');
			$auth_id_of_post_to = $db->f('auth_id_of_post_to');
			$project_posted_to 	= $db->f('project_post_to');
	#====================================================================================================
	#	Description 1	:  Used to calulcate when task completed date and time has expired using date and time settings
	#----------------------------------------------------------------------------------------------------

		$task_completed_date 	=  date('Y-m-d', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$completed_by day"));
		$task_end = new Datetime($task_completed_date. ' ' . $completed_time);
		$posted_datetime = new Datetime($project_post_time);
		$now = new Datetime();
		$seconds_remaining = $task_end->format('U') - $now->format('U');

		$time_remaining = sec2hms ($seconds_remaining);	// function call to establish time remaining on bidding
				
		$seconds_between_end_and_post = $task_end->format('U') - $posted_datetime->format('U');// seconds between completed end date and task posted date
		
		$notice_interval = $db->f('notice_interval_completed');//Notice interval stamp used to indicate a notice has occured to avoid resend on next cron run if time condition still applies

		$notice_status = 0;
		$mail_template = '';
		
		if ($seconds_between_end_and_post >= 0 && $seconds_between_end_and_post <= 86400 ){ // time between task posted and completed end date is 1 day or less
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} // Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;}// 9999 used for indicating completed ended
		} // time between task posted and completed end date is 1 day or less
		
		elseif ($seconds_between_end_and_post > 86400 && $seconds_between_end_and_post <= 172800){// time between task posted and completed end date is 2 days or less
				if($seconds_remaining > 3600 && $seconds_remaining <= 86400 && $notice_interval != 86400){$notice_status = 86400;} // Send 1 day remaining note
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} // Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;}// 9999 used for indicating completed ended
		} // time between task posted and completed end date is 2 day or less
		
		elseif ($seconds_between_end_and_post > 172800 && $seconds_between_end_and_post <= 259200){// time between task posted and completed end date is 3 days or less
				if($seconds_remaining > 86400 && $seconds_remaining <= 172800 && $notice_interval != 172800){$notice_status = 172800;} //Send 2 day remaining note
				if($seconds_remaining > 3600 && $seconds_remaining <= 86400 && $notice_interval != 86400){$notice_status = 86400;} //Send 1 day remaining note
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} //Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;}// 9999 used for indicating completed ended
		} // time between task posted and completed end date is 3 day or less
		
		elseif ($seconds_between_end_and_post > 259200){ // time between task posted and completed end date is greater then 3 days
				if($seconds_remaining > 86400 && $seconds_remaining <= 172800 && $notice_interval != 172800){$notice_status = 172800;} //Send 2 day remaining note
				if($seconds_remaining > 10800 && $seconds_remaining <= 86400 && $notice_interval != 86400){$notice_status = 86400;} //Send 1 day remaining note
				if($seconds_remaining > 3600 && $seconds_remaining <= 10800 && $notice_interval != 10800){$notice_status = 10800;} //Send 3 hour remaining note				
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} //Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;} // 9999 used for indicating completed ended
		} // time between task posted and completed end date is greater then 3 days

		if ($notice_status == 172800){
			$cron->update_notice_interval_completed($project_id,172800); //Send 2 day remaining note
			}
		elseif ($notice_status == 86400){
			$cron->update_notice_interval_completed($project_id,86400); //Send 1 day remaining note
			}
		elseif ($notice_status == 10800){
			$cron->update_notice_interval_completed($project_id,10800); //Send 3 hour remaining note
			}
		elseif ($notice_status == 3600){				
			$cron->update_notice_interval_completed($project_id,3600); //Send 1 hour remaining note
			}
		elseif ($notice_status == 9999){
			$cron->update_notice_interval_completed($project_id,9999); // 9999 used for indicating completed ended
			$cron->Update_Status_Of_project($project_id); // This  should mark the task failed but we also need to handle the task fee.			
					
			### Check on commission paid by Task Owner ###
			$task_owner_paid_commission = $proj->Commission_Paid_By_Task_Owner($project_id,$auth_id_of_post_by);
			
			### Check on commission paid by Task Owner ###
			$tasker_paid_commission = $proj->Commission_Paid_By_Tasker($project_id,$auth_id_of_post_to);			
			
			$bid_details = $proj->Bid_details_Of_User($project_id,$auth_id_of_post_to);
			
			### Check if escrow payment type 2 was created ###
			$escrow = $proj->Check_If_Escrow_Created($project_id);
			
				if($escrow == $bid_details){
				### Let's refund the Task Owner the commission paid as it appears they created the escrow payment. We're making the assumption that the Tasker never followed through ###
					$refund = $task_owner_paid_commission;
					$task_owner_wallet = Select_wallet_sum($auth_id_of_post_by);
					$refund_task_owner_wallet = $task_owner_wallet + $refund;
					
					Update_wallet_sum($auth_id_of_post_by,$refund_task_owner_wallet);// Put Deposit Back In Task Owner Wallet
					srand((double)microtime()*1000000);
					$transaction_id = md5(uniqid(rand())) . '-' . time();
					$trans_group = 'commission refund';
					#### Update to reflect deposit money being returned ###
					$proj->Return_Commission($auth_id_of_post_by,$project_posted_by,$refund,$project_title,$transaction_id,$trans_group,$project_id);			
				
				### Now let's loop through the escrow payments for the task and for each create a refund ###
				
				$escrow = $proj->Get_Task_Escrow($project_id);
				foreach ($escrow as $escrow_item){
					$refund = $escrow_item->amount;
					$task_owner_wallet = Select_wallet_sum($auth_id_of_post_by);
					$refund_task_owner_wallet = $task_owner_wallet + $refund;
					
					Update_wallet_sum($auth_id_of_post_by,$refund_task_owner_wallet);// Put Deposit Back In Task Owner Wallet
					srand((double)microtime()*1000000);
					$transaction_id = md5(uniqid(rand())) . '-' . time();
					$trans_group = 'escrow refund';
					#### Update to reflect deposit money being returned ###
					$desc = "Escrow refunded incomplete task:<strong>$project_title</strong>";
					$esc->Insert_Record_Of_Escrow_Refund($auth_id_of_post_by,$project_posted_by,$refund,$project_title,$desc,$transaction_id,$trans_group,$project_id);							
					$esc->Delete_by_amount($project_id,$refund);
					}
		
				}else{
				### Otherwise if no escrow was created we'll assume the Task Owner dropped the ball and only refund the tasker ###
					$refund = $tasker_paid_commission;
					$tasker_wallet = Select_wallet_sum($auth_id_of_post_to);
					$refund_tasker_wallet = $tasker_wallet + $refund;
					
					Update_wallet_sum($auth_id_of_post_to,$refund_tasker_wallet);// Put Deposit Back In Task Owner Wallet
					srand((double)microtime()*1000000);
					$transaction_id = md5(uniqid(rand())) . '-' . time();
					$trans_group = 'commission refund';
					#### Update to reflect deposit money being returned ###
					$proj->Return_Commission($auth_id_of_post_to,$project_posted_to,$refund,$project_title,$transaction_id,$trans_group,$project_id);			
			
				}

			}
		else {
			echo 'no records update';

		}
		
		
		if ($notice_status == 172800 || $notice_status == 86400 || $notice_status == 10800 || $notice_status == 3600 || $notice_status == 9999){
			
			$ret_user_task = $cron->get_details_for_mail($project_id); // Get the users email and the task information
			$tasker_id = $ret_user_task->auth_id_of_post_to;
			$tasker_data = $cron->get_tasker_email($tasker_id);
			
			// Send email to Sonic Task Owner
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(AWARDED_COMPLETION_DATE_NEAR);
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
			
			$tpl2->assign(array(	"task_owner"					=>	$ret_user_task->project_posted_by,
									"tasker"						=>	$ret_user_task->project_post_to,
									"task_name"						=>  $ret_user_task->project_title,
									"task_url"          			=>  '<a href="' .$site_url. '/task_' . $ret_user_task->project_id . '_'. clean_url($ret_user_task->project_title) . '.html">'. $ret_user_task->project_title . '</a>',
									"task_end"						=>  $task_end->format('l F d, Y g:i A'),
									"notice_status"					=>  $notice_status,
									"type"							=>  1,										
									));
			
			$mail_content_reg = $tpl2->fetch("email_template:".AWARDED_COMPLETION_DATE_NEAR);
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

			$mail2->send(array($ret_user_task->mem_email));
			
			// Send email to Sonic Tasker
			global $mail3;
			$mail3 = '';
			$mail3 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			$sendinfo = $emails->GetEmailDetails1(AWARDED_COMPLETION_DATE_NEAR);
			$mail3->setFrom($sendinfo->email_adress);
			$mail3->setSubject($sendinfo->email_subject);
			
			$tpl2->assign(array(	"task_owner"					=>	$ret_user_task->project_posted_by,
									"tasker"						=>	$ret_user_task->project_post_to,
									"task_name"						=>  $ret_user_task->project_title,
									"task_url"          			=>  '<a href="' .$site_url. '/task_' . $ret_user_task->project_id . '_'. clean_url($ret_user_task->project_title) . '.html">'. $ret_user_task->project_title . '</a>',
									"task_end"						=>  $task_end->format('l F d, Y g:i A'),
									"notice_status"					=>  $notice_status,
									"type"							=>  2,									
									));
			
			$mail_content_reg = $tpl2->fetch("email_template:".AWARDED_COMPLETION_DATE_NEAR);			
			
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
			$mail3->setHtml($mail_html);

			$mail3->send(array($tasker_data->mem_email));			
			
			if ($notice_status == 9999){
			echo '<b>Task ID: </b>' . $ret_user_task->project_id . ' - completion ended message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker_data->mem_email . '<br />';
			$log = '<b>Task ID: </b>' . $ret_user_task->project_id . ' - completion ended message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker_data->mem_email . '<br />';
			}else{
			echo '<b>Task ID: </b>' . $ret_user_task->project_id . ' - ' . sec2hms ($notice_status) . ' message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker_data->mem_email . '<br />';
			$log = '<b>Task ID: </b>' . $ret_user_task->project_id . ' - ' . sec2hms ($notice_status) . ' message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker_data->mem_email . '<br />';			
			}
			
			// set path and name of log file (optional) 
			$cron->lfile('../cron_logs/awarded_accepted_completion_nearing_notification.log'); 
			// write message to the log file 
			$cron->lwrite($log);	
			}// end if notice status
	
		}// end while
			 
?>