<?php
define('IN_SITE', 	true);
define('IN_CRON', 	true);
include_once("../includes/common.php");;
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Escrow.php');

$cron 	 = new Cronjobs();
$emails  = new Email();
$escrow	 = new Escrow();

		global $db;
		$sql = "SELECT * FROM ".PROJECT_MASTER." WHERE project_status = 5";
		$db->query($sql);
		while($db->next_record())
		{
			if ($db->f('task_owner_dispute') == 0){ // As long as the task has not been disputed
			$tasker_completed = $db->f('tasker_completed');
			$tasker_completed_date = $db->f('tasker_completed_date');
			$project_id = $db->f('project_id');
	#====================================================================================================
	#	Description 1	:  Convert tasker completed time to seconds, add 259200 seconds for three days
	#	Description 1	:  subtract as seconds current date/time
	#----------------------------------------------------------------------------------------------------
		if ($tasker_completed ==1){
			$tasker_completed_date = new Datetime($tasker_completed_date);
			$now = new Datetime();
			$add_3_days = $tasker_completed_date->format('U') + 259200;
			$add_5_days = $tasker_completed_date->format('U') + 432000;
			$seconds_remaining  = $add_3_days - $now->format('U');
			$seconds_remaining_5_day  = $add_5_days - $now->format('U');
		}
		if ($seconds_remaining_5_day <0){
					
			global $db1;
			$sql = "SELECT * FROM ".ESCROW_PAYMENT_MASTER
			." WHERE status = 1 AND project_id = '".$project_id."' ";
			$db1->query($sql);
				while($db1->next_record())
				{
				$ep_id = $db1->f('ep_id');				
				
				// Get the details for the selected escrow payment
				$details = $escrow->Get_Details($ep_id);
				
				$verify = $escrow->Verify_Proper_Release_Order($details->project_id);		
				
				//Deposit amount from Task Owner Account to Tasker  
				
				$escrow->Insert_Escrow_Payment_To_Tasker($details->from_user_auth_id,$details->from_user_login_id,$details->amount,$details->to_user_login_id,$details->project_title);

				//Deposit amount from Task Owner Account  
				
				$wallet_seller = Select_wallet_sum($details->to_user_auth_id);
						  
				$new_wallet1 = $wallet_seller + ($details->amount);
				
				Update_wallet_sum($details->to_user_auth_id,$new_wallet1); 
				
				$escrow->Insert_Escrow_Payment_From_Task_Owner($details->to_user_auth_id,$details->to_user_login_id,$details->amount,$details->from_user_login_id,$details->project_title);
				
				//updating status of payment like release or not
				$escrow->Update($ep_id);

					if($verify == 1){
					$final = 1;
						//updating status of project
						$escrow->Complete_project($details->project_id);
					}

						//email to Task Owner

						global $mail2;
						$mail2 = '';
						$mail2 = new htmlMimeMail();
						
						$tpl2 = new Smarty;
						$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
						
						$sendinfo = $emails->GetEmailDetails1(ESCROW_PAYMENT_RELE);
						
						$mail2->setSubject($sendinfo->email_subject);
						$mail2->setFrom($sendinfo->email_adress); 
						
						$tpl2->assign(array(
											"buyer_id"           =>  $details->to_user_login_id,
											"amount"                =>  number_format($details->amount,2),
											"project_title"         =>  $details->project_title,
											"flag"                  =>  0,
											"final"                 =>  $final,
										));
						
											
						$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
						$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
						$mail_content_reg = $tpl2->fetch("email_template:".ESCROW_PAYMENT_RELE);
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

						$send_to = GetEmailAddress($details->from_user_auth_id);
						
						$result = $mail2->send(array($send_to));
									
						//////////////////////////
						
					//email to Tasker

						global $mail2;
						$mail2 = '';
						$mail2 = new htmlMimeMail();
						
						$tpl2 = new Smarty;
						$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
						
						$sendinfo = $emails->GetEmailDetails1(ESCROW_PAYMENT_RELE);
							
						$mail2->setSubject($sendinfo->email_subject);
						$mail2->setFrom($sendinfo->email_adress); 
						
						$tpl2->assign(array("buyer_id"           	=>  $details->from_user_login_id,
											"amount"                =>  number_format($details->amount,2),
											"project_title"         =>  $details->project_title,
											"flag"                  =>  1,
											"final"                 =>  $final,						
										));
							
								$mail_content_reg = $tpl2->fetch("email_template:".ESCROW_PAYMENT_RELE);
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

						$send_to = GetEmailAddress($details->to_user_auth_id);
						
						$result = $mail2->send(array($send_to));			

					echo '<b>Task ID: </b>' . $details->project_id . ' - payment automated to tasker ' . $details->project_post_to . ' from task owner ' . $details->project_posted_by . '<br />';
					$log = '<b>Task ID: </b>' . $details->project_id . ' - payment automated to tasker ' . $details->project_post_to . 'from task owner ' . $details->project_posted_by . '<br />';
					
					// set path and name of log file (optional) 
					$cron->lfile('../cron_logs/payment_automated.log'); 
					// write message to the log file 
					$cron->lwrite($log);			
			
				}//end while for escrow payment release

		}elseif ($seconds_remaining <0){
						
			// Send email to Sonic Task Owner that they need to make payment to tasker
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$ret_user = $user->getUserDetails($db->f('auth_id_of_post_by'));
			$send_to = $ret_user->mem_email;
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(TASK_COMPLETED_NOTICE);
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);						
			$tpl2->assign(array("project_name"          =>  $db->f('project_title'), 
								"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$project_id."_".clean_url($db->f('project_title')).".html>".$db->f('project_title')."</a>",
								"task_owner" 			=> $db->f('project_posted_by'),
								"tasker" 				=> $db->f('project_post_to'),
								"tasker_reimburse" 		=> $db->f('tasker_reimburse'),
								"tasker_reimburse_desc" => $db->f('tasker_reimburse_desc'),
								"reminder" 				=> 1,								
						));
			
			$mail_content_reg = $tpl2->fetch("email_template:".TASK_COMPLETED_NOTICE);
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
			
			if ($seconds_remaining <0){
			echo '<b>Task ID: </b>' . $project_id . ' - payment needed message sent to task owner ' . $ret_user->mem_email . '<br />';
			$log = '<b>Task ID: </b>' . $project_id . ' - payment needed  message sent task owner ' . $ret_user->mem_email . '<br />';
			}
			
			// set path and name of log file (optional) 
			$cron->lfile('../cron_logs/payment_due.log'); 
			// write message to the log file 
			$cron->lwrite($log);
			
			}// end if $seconds_remaining <0
			}// disputed check
		}// end while
			 
?>