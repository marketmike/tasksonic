<?php
define('IN_SITE', 	true);
define('IN_CRON', 	true);
include_once("../includes/common.php");;
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'task.php');

$proj 	= new project();
$cron = new Cronjobs();
$emails  = new Email();

		global $db,$db1;
		$sql = "SELECT * FROM ".PROJECT_MASTER." WHERE project_status = 2";
		$db->query($sql);
		while($db->next_record())
		{

			$project_days_open = $db->f('project_days_open');
			$completed_by  = $db->f('completed_by');
			$project_posted_date = $db->f('project_posted_date'); 
			$bidding_time = $db->f('bidding_time');
			$project_id = $db->f('project_id');
			$project_post_time = $db->f('project_post_time');
			
			$auth_id_of_post_by = $db->f('auth_id_of_post_by');
			$project_posted_by 	= $db->f('project_posted_by');
			$project_title 		= $db->f('project_title');				

	#====================================================================================================
	#	Description 1	:  Used to calulcate when bidding time has expired using date and time settings
	#----------------------------------------------------------------------------------------------------

		$bidding_end_date 	=  date('Y-m-d', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$bid_end = new Datetime($bidding_end_date. ' ' . $bidding_time);
		$posted_datetime = new Datetime($project_post_time);
		$now = new Datetime();
		$seconds_remaining = $bid_end->format('U') - $now->format('U');

		$time_remaining = sec2hms ($seconds_remaining);	// function call to establish time remaining on bidding
		
		$seconds_between_end_and_post = $bid_end->format('U') - $posted_datetime->format('U');// seconds between bidding end date and task posted date
		
		$notice_interval = $db->f('notice_interval_awarded_expiring');//Notice interval stamp used to indicate a notice has occured to avoid resend on next cron run if time condition still applies

		$notice_status = 0;
		$mail_template = '';
		
		if ($seconds_between_end_and_post >= 0 && $seconds_between_end_and_post <= 86400 ){ // time between task posted and bidding end date is 1 day or less
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} // Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;}// 9999 used for indicating bidding ended
		} // time between task posted and bidding end date is 1 day or less
		
		elseif ($seconds_between_end_and_post > 86400 && $seconds_between_end_and_post <= 172800){// time between task posted and bidding end date is 2 days or less
				if($seconds_remaining > 3600 && $seconds_remaining <= 86400 && $notice_interval != 86400){$notice_status = 86400;} // Send 1 day remaining note
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} // Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;}// 9999 used for indicating bidding ended
		} // time between task posted and bidding end date is 2 day or less
		
		elseif ($seconds_between_end_and_post > 172800 && $seconds_between_end_and_post <= 259200){// time between task posted and bidding end date is 3 days or less
				if($seconds_remaining > 86400 && $seconds_remaining <= 172800 && $notice_interval != 172800){$notice_status = 172800;} //Send 2 day remaining note
				if($seconds_remaining > 3600 && $seconds_remaining <= 86400 && $notice_interval != 86400){$notice_status = 86400;} //Send 1 day remaining note
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} //Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;}// 9999 used for indicating bidding ended
		} // time between task posted and bidding end date is 3 day or less
		
		elseif ($seconds_between_end_and_post > 259200){ // time between task posted and bidding end date is greater then 3 days
				if($seconds_remaining > 86400 && $seconds_remaining <= 172800 && $notice_interval != 172800){$notice_status = 172800;} //Send 2 day remaining note
				if($seconds_remaining > 10800 && $seconds_remaining <= 86400 && $notice_interval != 86400){$notice_status = 86400;} //Send 1 day remaining note
				if($seconds_remaining > 3600 && $seconds_remaining <= 10800 && $notice_interval != 10800){$notice_status = 10800;} //Send 3 hour remaining note				
				if($seconds_remaining > 0 && $seconds_remaining <= 3600 && $notice_interval != 3600){$notice_status = 3600;} //Send 1 hour remaining note
				if($seconds_remaining <= 0 && $notice_interval != 9999){$notice_status = 9999;} // 9999 used for indicating bidding ended
		} // time between task posted and bidding end date is greater then 3 days

		if ($notice_status == 172800){
			$mail_template = AWARDED_BIDDING_END_TWO_DAY; $cron->update_notice_interval_awarded_expiring($project_id,172800); //Send 2 day remaining note
			}
		elseif ($notice_status == 86400){
			$mail_template = AWARDED_BIDDING_END_ONE_DAY; $cron->update_notice_interval_awarded_expiring($project_id,86400); //Send 1 day remaining note
			}
		elseif ($notice_status == 10800){
			$mail_template = AWARDED_BIDDING_END_THREE_HOUR; $cron->update_notice_interval_awarded_expiring($project_id,10800); //Send 3 hour remaining note
			}
		elseif ($notice_status == 3600){				
			$mail_template = AWARDED_BIDDING_END_ONE_HOUR; $cron->update_notice_interval_awarded_expiring($project_id,3600); //Send 1 hour remaining note
			}
		elseif ($notice_status == 9999){
			$mail_template = AWARDED_BIDDING_ENDED; $cron->update_bid_status($project_id); /* Set project status to 7*/ $cron->update_notice_interval_awarded_expiring($project_id,9999); // 9999 used for indicating bidding ended	
			#### Find out how much money the Task Owner spent to post the Task ####
			$refund  = $proj->Payapl_Tran($project_id);
				if($refund>0){
				$refund_issued =1;								
				$task_owner_wallet = Select_wallet_sum($auth_id_of_post_by);
				$refund_task_owner_wallet = $task_owner_wallet + $refund;
				
				Update_wallet_sum($auth_id_of_post_by,$refund_task_owner_wallet);// Put Deposit Back In Task Owner Wallet
				srand((double)microtime()*1000000);
				$transaction_id = md5(uniqid(rand())) . '-' . time();
				#### Update to reflect deposit money being returned ###
				$proj->Return_Buyer_Paypal($auth_id_of_post_by,$project_posted_by,$refund,$project_title,$transaction_id);
				}					
			}
		else {
			echo 'no records update';
		}
		
		
		if ($notice_status == 172800 || $notice_status == 86400 || $notice_status == 10800 || $notice_status == 3600 || $notice_status == 9999){
			
			$ret_user_task = $cron->get_details_for_mail($project_id); // Get the users email and the task information
			$tasker_id = $ret_user_task->auth_id_of_post_to;
			$tasker = $cron->get_tasker_email($tasker_id);
			
			// Send email to Sonic Task Owner
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1($mail_template);
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
			
			$tpl2->assign(array(	"task_owner"					=>	$ret_user_task->project_posted_by,
									"tasker"						=>	$ret_user_task->project_posted_to,
									"task_name"						=>  $ret_user_task->project_title,
									"task_url"          			=>  '<a href="' .$site_url. '/task_' . $ret_user_task->project_id . '_'. clean_url($ret_user_task->project_title) . '.html">'. $ret_user_task->project_title . '</a>',
									"bidding_end"					=>  $bid_end->format('l F d, Y g:i A'),	
									"refund_issued"					=>  $refund_issued,
									"refund"						=>  $refund,										
									));
			
			$mail_content_reg = $tpl2->fetch("email_template:".$mail_template);
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
			if ($notice_status == 9999){
			$sendinfo = $emails->GetEmailDetails1(ACCEPT_DECLINE_NOTICE_OVER);
			}else{
			$sendinfo = $emails->GetEmailDetails1(ACCEPT_DECLINE_NOTICE);
			}
			$mail3->setFrom($sendinfo->email_adress);
			$mail3->setSubject($sendinfo->email_subject);
			
			$tpl2->assign(array(	"task_owner"					=>	$ret_user_task->project_posted_by,
									"tasker"						=>	$ret_user_task->project_posted_to,
									"task_name"						=>  $ret_user_task->project_title,
									"task_url"          			=>  '<a href="' .$site_url. '/task_' . $ret_user_task->project_id . '_'. clean_url($ret_user_task->project_title) . '.html">'. $ret_user_task->project_title . '</a>',
									"bidding_end"					=>  $bid_end->format('l F d, Y g:i A'),									
									));
			
			if ($notice_status == 9999){
			$mail_content_reg = $tpl2->fetch("email_template:".ACCEPT_DECLINE_NOTICE_OVER);
			}else{
			$mail_content_reg = $tpl2->fetch("email_template:".ACCEPT_DECLINE_NOTICE);			
			}			
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

			$mail3->send(array($tasker->mem_email));			
			
			if ($notice_status == 9999){
			echo '<b>Task ID: </b>' . $ret_user_task->project_id . ' - bidding ended message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker->mem_email . '<br />';
			$log = '<b>Task ID: </b>' . $ret_user_task->project_id . ' - bidding ended message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker->mem_email . '<br />';
			}else{
			echo '<b>Task ID: </b>' . $ret_user_task->project_id . ' - ' . sec2hms ($notice_status) . ' message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker->mem_email . '<br />';
			$log = '<b>Task ID: </b>' . $ret_user_task->project_id . ' - ' . sec2hms ($notice_status) . ' message sent to users ' . $ret_user_task->mem_email . ' and ' . $tasker->mem_email . '<br />';			
			}
			
			// set path and name of log file (optional) 
			$cron->lfile('../cron_logs/awarded_bidding_expiring_notification.log'); 
			// write message to the log file 
			$cron->lwrite($log);	
			}// end if notice status
	
		}// end while
			 
?>