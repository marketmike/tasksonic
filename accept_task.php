<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Bid.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['Site_Lang'].'accept_task.php');
include_once($physical_path['DB_Access']. 'User.php');
include_once($physical_path['fblib']. 'facebook.php');

//facebook process used for publish to wall
// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => $fb_app_id,
  'secret' => $fb_app_secret,
  'cookie' => true,
));
$session = $facebook->getUser();

//end facebook process

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$bid  		= new Bid();
$proj 		= new project();
$emails 	= new Email();
$seller		= new Seller();
$user 		= new User();
if($_POST['Submit']	== $lang['Accept_Submit'])
{
	#############################################################################################
	##### if user decides not to accept the awarding of the task
	if($_POST['accept_deny'] == 2) // deny
	{
		// project denied
		$val = $bid->Accept_project_Deny($_POST['project_id']);

			// Publish turned down notice to latest_activity table for display on logged_in_home.tpl
			$activity = $proj->Getproject($_POST['project_id']);;
			$task_id = $activity->project_id;
			$task_owner = $activity->project_posted_by;
			$tasker = $_SESSION['User_Name'];
			$activity_type = "New Bid";
			$description = '<a href="tasker_profile_' . $tasker . '.html">' . $tasker . '</a>just turned down the task awarding from <a href="task_owner_profile_' . $tasker_owner . '.html">' . $task_owner . '</a> on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent;
			$activity_link = 'task_'.$task_id.'_'.clean_url($activity->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish turned down notice to latest_activity table for display on logged_in_home.tpl
		
			//////////////////////////////////////////
			///////// Publish to facebook
			//////////////////////////////////////////
			$retuser = $user->getauthUserDetails(md5($_SESSION['User_Name']));
			$fbid = $retuser->fbid;
			$fb_publish = $retuser->fb_publish;

						if($fb_publish && $fbid){				
							// Session based API call.		
							if($session){
									// Publish to user wall as user
									try { 
									$facebook->api('/me/feed','post', array('message'=>'I just turned down the task awarding from ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just turned down the task awarding from ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $tasker . ' just turned down the task awarding from ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook	
		
		// mail to Task Owner for deny	
		$ret = $user->getUserDetails($_POST['auth_id_of_post_by']);
		$send_to = $ret->mem_email;
	
		global $mail2,$virtual_path,$physical_path;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
	
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
		$sendinfo = $emails->GetEmailDetails1(BID_DENY);
	
		$mail2->setSubject($sendinfo->email_subject);
		$mail2->setFrom($sendinfo->email_adress);
		

		$ret  = $proj->Getproject($_POST['project_id']);
	
		$tpl2->assign(array("project_name"          =>  $ret->project_title, 
							"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
						));
		
			$mail_content_reg = $tpl2->fetch("email_template:".BID_DENY);
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
		$mail2->setHtml($mail_html,'',$physical_path['Email_Images']);
		$result = $mail2->send(array($send_to));
		// bid canceled since the user refused the task awarding
		$seller->Delete($_POST['bid_id']);
		header("location: my-account.html");
		exit();
	}
	#############################################################################################


	#############################################################################################
	# if the Tasker accepts the awarding of the task
	if($_POST['accept_deny'] == 1)
	{
		
	    ########################################################################################
		
		$tasker_flag = 999; // erroneous value to avoid being blank
		$task_owner_flag = 999; // erroneous value to avoid being blank
		$how_short = "";
		$ret  = $proj->Getproject($_POST['project_id']);
		
		################## If the task is not a premium we have some accouting work to do ##########################
		#####		check if user is special user or not
		$ret_special_user = $user->getUserDetails(md5($_SESSION['User_Name']));
			
		###############################################################################################

		if($ret->premium_project == 0 )
		{ // If the task is a premium there are no commissions to Task Owner or Tasker
		
		### First we'll check on the Task Owners finances ###

			if($ret->project_free == 0 && $ret_special_user->special_user == 0 ) // If task was not free and not special user
			{			
				$task_owner_vip = Check_Vip_User($ret->project_posted_by);
				if($task_owner_vip != 1)
				{ 			
				
				#### Find out how much money the Task Owner spent to post the Task ####			
				$refund  = $proj->Payapl_Tran($_POST['project_id']);
					
				
				#### Get current balance in their wallet ####
					$task_owner_wallet = Select_wallet_sum($ret->auth_id_of_post_by);
				#### Here we will retrieve bid amount and calculate commission based on bid amount ####	
					$bid_details2 = $proj->Bid_details_Of_User($_POST['project_id'],$ret->auth_id_of_post_to); 
				#### calculate Tasker commision based on bid amount ####	

					$task_owner_comm = number_format(($config[WC_COMM_FROM_BUYER] * $bid_details2)/100,2);
					$task_owner_comm_rounded = ceil($task_owner_comm);
					if($task_owner_comm > $config[WC_MINIMUM_COMM_BUYER] )
					{
						$amount_available_task_owner = $task_owner_wallet - $task_owner_comm;
						$amount_available_task_owner_plus_refund = $amount_available_task_owner + $refund;
						$task_owner_comm;
					}	 
					else
					{
						$amount_available_task_owner = $task_owner_wallet - $config[WC_MINIMUM_COMM_BUYER];
						$amount_available_task_owner_plus_refund = $amount_available_task_owner + $refund;
						$task_owner_comm		 = $config[WC_MINIMUM_COMM_BUYER];
					}
					//check for min. amount in wallet 
					if($amount_available_task_owner_plus_refund >=0)
					{
						$task_owner_flag = 1;
						$task_owner_cleared = 1;
					}
					else
					{
						$task_owner_flag = 0; // if task owner does not have enough money in wallet , do not accept the task and send mail regardig this
					}				
				}else{// If the Sonic Task Owner Is VIP then no commission will be charged and deposit will not be returned since if it was charged the Task Owner was not a vip before posting
				
					$task_owner_cleared = 1;
				
				} // End if Task Owner is VIP
			}else{ // End if Task is not free
					$task_owner_cleared = 1;
				
				}		
		
			### Now we'll check on the Tasker finances ##
			
			$tasker_vip = Check_Vip_User($ret->project_post_to);
			if($tasker_vip != 1)
			{ 
				// if Tasker is not VIP then commission will be charged to Tasker , accept the project and mail to both
				// get wallet amount
				$seller_wallet = Select_wallet_sum($ret->auth_id_of_post_to);
				$bid_details = $proj->Bid_details_Of_User($_POST['project_id'],$ret->auth_id_of_post_to); 
				//calculate Tasker commision based on bid amount
				$seller_comm = number_format(($config[WC_COMM_FROM_SELLER] * $bid_details)/100,2);
				$seller_comm_rounded = ceil($seller_comm); // Added for sending mail to Tasker if fund is not enough in his balance
				if($seller_comm > $config[WC_MINIMUM_COMM_SELLER] )
				{
					$amount_available_tasker = $seller_wallet - $seller_comm;
					$seller_comm		 = $seller_comm;
				}	 
				else
				{
					$amount_available_tasker = $seller_wallet - $config[WC_MINIMUM_COMM_SELLER];
					$seller_comm		 = $config[WC_MINIMUM_COMM_SELLER];
				}
				//check for min. amount in wallet 
				if($amount_available_tasker >=0)
				{
					$tasker_flag = 1;
					$tasker_cleared = 1;	
				}
				else
				{
					$tasker_flag = 0; // if tasker does not have enough money in wallet , do not accept the task and send mail regardig this
				}
					
			}else{
				// If the Sonic Tasker Is VIP then no commission will be charged
				// accept the task and send mail to both
				$tasker_cleared = 1;					
			}

		} else{
			$taskowner_cleared = 1;
			$tasker_cleared = 1;
		}
		
		#### If One Or More Does Not Have Enough Funds ERROR ####
		if($tasker_flag == 0 || $task_owner_flag == 0)
		{
			    // Send Email to Task Owner that Tasker does not have enough money in wallet to cover commission
				global $mail1,$virtual_path,$physical_path;
				$mail1 = '';
				$mail1 = new htmlMimeMail();
				$tpl1 = new Smarty;
				$tpl1->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
				$sendinfo = $emails->GetEmailDetails1(CAN_NOT_ACCEPT_TASK_BY_TASK_OWNER);
				$mail1->setSubject($sendinfo->email_subject);
				$mail1->setFrom($sendinfo->email_adress);
				$ret  = $proj->Getproject($_POST['project_id']);
				$tpl1->assign(array(
									"task_link"          	=>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
									"tasker_link"          	=>	"<a href=".$virtual_path['Site_Root']."tasker_profile_".$ret->project_post_to.".html>".$ret->project_post_to."</a>",
									"task_owner_link"       =>	"<a href=".$virtual_path['Site_Root']."task_owner_profile_".$ret->project_posted_by.".html>".$ret->project_posted_by."</a>",
									"tasker_flag"          	=>	$tasker_flag,
									"task_owner_flag"     	=>	$task_owner_flag,
									"to_task_owner"     	=>	0,
									"to_tasker"     		=>	1,									
									"how_short_task_owner"  =>	$amount_available_task_owner_plus_refund,
									"how_short_tasker"    	=>	$amount_available_tasker,										
								));
				$mail_content_header = $tpl1->fetch("email_template:".EMAIL_HEADER);	
				$mail_content_footer = $tpl1->fetch("email_template:".EMAIL_FOOTER);	
				$mail_content_reg = $tpl1->fetch("email_template:".CAN_NOT_ACCEPT_TASK_BY_TASK_OWNER);
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
				$mail1->setHtml($mail_html,'',$physical_path['Email_Images']);
				$send_to =GetEmailAddress($ret->auth_id_of_post_by);
				$result = $mail1->send(array($send_to));
				
			    // Send Email to Tasker that they do not have enough money in wallet to cover commission

				$mail2 = '';
				$send_to = '';
				$mail2 = new htmlMimeMail();
				$tpl2 = new Smarty;
				$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
				$sendinfo = $emails->GetEmailDetails1(CAN_NOT_ACCEPT_TASK_BY_TASK_OWNER);
				$mail2->setSubject($sendinfo->email_subject);
				$mail2->setFrom($sendinfo->email_adress);
				$ret  = $proj->Getproject($_POST['project_id']);
				$tpl2->assign(array(
									"task_link"          	=>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
									"tasker_link"          	=>	"<a href=".$virtual_path['Site_Root']."tasker_profile_".$ret->project_post_to.".html>".$ret->project_post_to."</a>",
									"task_owner_link"       =>	"<a href=".$virtual_path['Site_Root']."task_owner_profile_".$ret->project_posted_by.".html>".$ret->project_posted_by."</a>",
									"tasker_flag"          	=>	$tasker_flag,
									"task_owner_flag"     	=>	$task_owner_flag,
									"to_tasker"     		=>	0,
									"to_task_owner"     	=>	1,									
									"how_short_task_owner"  =>	$amount_available_task_owner_plus_refund,
									"how_short_tasker"    	=>	$amount_available_tasker,									
								));
				$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
				$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
				$mail_content_reg = $tpl2->fetch("email_template:".CAN_NOT_ACCEPT_TASK_BY_TASK_OWNER);
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
				$mail2->setHtml($mail_html,'',$physical_path['Email_Images']);
				$send_to =GetEmailAddress($ret->auth_id_of_post_to);
				$result = $mail2->send(array($send_to));							
		
				### Redirect to error page ###		
				$project_posted_by = $ret->project_posted_by;
				$project_title = $ret->project_title;
				header('location: accept-failed_' . $task_owner_flag . '_' . $tasker_flag . '_' . $new_tasker_wallet . '_' . $project_posted_by . '_' . clean_url($ret->project_title) . '.html');
				exit();
		} // End if fails

		#### If everything goes well and both parties have enough funds to cover commissions or are covered by VIP, FREE TASK, or Premium, finish the publishing steps ####		
		if($task_owner_cleared == 1 && $tasker_cleared == 1)
		{
			$ret  = $proj->Getproject($_POST['project_id']);
					#### Ok, if Task Owner needs to pay and has enough money in their wallets for commmission, wallet will be updated and task award accepted
						if($task_owner_flag == 1){
						
									#### Update Task Owner Finances ####
									if($refund > 0){
									$refund_task_owner_wallet = $task_owner_wallet + $refund;
									Update_wallet_sum($ret->auth_id_of_post_by,$refund_task_owner_wallet);// Put Deposit Back In Task Owner Wallet
									//	Generate unique transaction id to tie the records together
									srand((double)microtime()*1000000);
									$transaction_id = md5(uniqid(rand())) . '-' . time();
									
									#### Update to reflect deposit money being returned ###
									$proj->Return_Buyer_Paypal($ret->auth_id_of_post_by,$ret->project_posted_by,$refund,$ret->project_title,$transaction_id);					
									}
									#### Now update Task Owner finances ####
									//	Generate unique transaction id to tie the records together
									srand((double)microtime()*1000000);
									$transaction_id2 = md5(uniqid(rand())) . '-' . time();
								  
								Update_wallet_sum($ret->auth_id_of_post_by,$amount_available_task_owner_plus_refund);// Update Task Owner Wallet with commission subtracted but account for adding of refund if any since it was added back after last wallet check					
								#### Update to reflect amount of deposit money applied to commission ###
								$trans_group = 'commision';
								$task_id = $ret->project_id;
								$proj->Insert_Task_Owner_Paypal($ret->auth_id_of_post_by,$ret->project_posted_by,$task_owner_comm,$ret->project_title,$transaction_id2,$trans_group,$task_id);
								
																		
						}
					#### Ok, if Task Owner needs to pay and has enough money in their wallets for commmission, wallet will be updated and task award accepted
						if($tasker_flag == 1){						
								#### Update Tasker finances ####
														
								// Updateing Tasker Wallet	  
								Update_wallet_sum($ret->auth_id_of_post_to,$amount_available_tasker);
								//	Generate unique transaction id to tie the records together
									srand((double)microtime()*1000000);
									$transaction_id3 = md5(uniqid(rand())) . '-' . time();
								$trans_group = 'commision';
								$task_id = $ret->project_id;									
								$proj->Insert_Seller_Paypal($ret->auth_id_of_post_to,$ret->project_post_to,$seller_comm,$ret->project_title,$transaction_id,$trans_group,$task_id); // add new parameter to display project title																			
						}
								### If task was not free and not special user check if referral due ###
								if($ret->project_free == 0 && $ret_special_user->special_user == 0 ) 
								{	
									#### Check to see if referral commission due and if so pay ###
									$userid = $user->check_invite_code($ret->auth_id_of_post_by); // returns the referring users auth id if exist and not paid yet
									$referral = $config[WC_COMM_FOR_REFERRAL];
									$task_ID = $_POST['project_id'];
									$ref_transaction_id = 'Referral Payment For Task ID ' . $task_ID . '-' . $ret->project_title;
									
										if($userid != '' && $referral > 0){
											$ret_user = $user->getUserDetails($userid);
											$updated_wallet = number_format($ret_user->wallet_sum +  number_format($referral,2),2);
											Update_wallet_sum($userid,$updated_wallet);// Add the commission to the users wallet
											### Mark Paid In Auth User table field invitation_rewarded by changing value to 1 ###
											$user->invite_reward_paid($ret->auth_id_of_post_by);
											### Now add transaction to users transaction history and to sites commission records ###
											$proj->Insert_Referral_Comm_Record($userid,$ret_user->user_login_id,$referral,$ref_transaction_id);

											$proj->Insert_Referrals_Paid($task_ID,$referral,$ret_user->user_login_id);
											### Update Member Master Table For Reporting Total Referrals Paid ###
											$Select_Referrals_Wallet = Select_Referrals_Wallet($userid);
											$referral_total = number_format($Select_Referrals_Wallet +  number_format($referral,2),2);
											Update_Referrals_Wallet($userid,$referral_total);
										}
									#### End check to see if referral commission due and if so pay ###	
								}// If task was not free


						
			### Now Update Commissions Table ###
			if($task_owner_comm == ''){$task_owner_comm = 0;}
			if($seller_comm == ''){$seller_comm = 0;}
			$proj->Insert_Commission($_POST['project_id'],$task_owner_comm,$seller_comm);
		
			$proj->Accept_project($_POST['project_id']);
			
			// Publish accepted notice to latest_activity table for display on logged_in_home.tpl
			$activity = $proj->Getproject($_POST['project_id']);;
			$task_id = $activity->project_id;
			$task_owner = $activity->project_posted_by;
			$tasker = $_SESSION['User_Name'];
			$activity_type = "Accepted";
			$description = '<a href="tasker_profile_' . $tasker . '.html">' . $tasker . '</a> just accepted the task awarding from <a href="task_owner_profile_' . $task_owner . '.html">' . $task_owner . '</a> on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent;
			$activity_link = 'task_'.$task_id.'_'.clean_url($activity->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish accepted notice to latest_activity table for display on logged_in_home.tpl			

			//////////////////////////////////////////
			///////// Publish to facebook
			//////////////////////////////////////////
			$retuser = $user->getauthUserDetails(md5($_SESSION['User_Name']));
			$fbid = $retuser->fbid;
			$fb_publish = $retuser->fb_publish;

						if($fb_publish && $fbid){				
							// Session based API call.		
							if($session){
									// Publish to user wall as user
									try { 
									$facebook->api('/me/feed','post', array('message'=>'I just accepted the task awarding from ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just accepted the task awarding from ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $tasker . ' just accepted the task awarding from ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook	
			
			    // sending mail to Tasker
			
				global $mail2,$virtual_path,$physical_path;
				$mail2 = '';
				$mail2 = new htmlMimeMail();
				$tpl2 = new Smarty;
				$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
				$sendinfo = $emails->GetEmailDetails1(MAIL_TO_TASKER_AFTER_ACCEPT_TASK);
				$mail2->setSubject($sendinfo->email_subject);
				$mail2->setFrom($sendinfo->email_adress); 
				$ret  = $proj->Getproject($_POST['project_id']);
				$buyer_email = GetEmailAddress($ret->auth_id_of_post_by);
				$tpl2->assign(array(
								"email_of_task_owner"       =>  $buyer_email,
								"tasker_name"       		=>  $ret->project_post_to,
								"task_name"				=>  $ret->project_title,
								"commission_tasker"         =>  number_format($new_tasker_wallet,2),
								"task_link"         		=>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>", 
								"task_owner_link"         	=>	"<a href=".$virtual_path['Site_Root']."task_owner_profile_".$ret->project_posted_by.".html>".$ret->project_posted_by."</a>",
							));
				$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
				$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
				$mail_content_reg = $tpl2->fetch("email_template:".MAIL_TO_TASKER_AFTER_ACCEPT_TASK);
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
				$mail2->setHtml($mail_html,'',$physical_path['Email_Images']);
				$send_to = GetEmailAddress($ret->auth_id_of_post_to);
				$result = $mail2->send(array($send_to));
				
				//Sending mail to Task Owner
				global $mail2,$virtual_path,$physical_path;
				$mail2 = '';
				$mail2 = new htmlMimeMail();
				$tpl2 = new Smarty;
				$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
				$sendinfo = $emails->GetEmailDetails1(MAIL_TO_TASK_OWNER_AFTER_ACCEPT_TASK);
				$mail2->setSubject($sendinfo->email_subject);
				$mail2->setFrom($sendinfo->email_adress); 
				$ret  = $proj->Getproject($_POST['project_id']);
				$seller_email = GetEmailAddress($ret->auth_id_of_post_to);
				$tpl2->assign(array(
									"email_of_tasker"       =>  $seller_email,
									"task_owner"       		=>  $ret->project_posted_by,
									"commission_task_owner" =>  number_format($new_task_owner_wallet,2),
									"refundable_deposit"    =>  $refund,
									"task_name"				=>  $ret->project_title,
									"task_link"         	=>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>", 
									"tasker_link"         	=>	"<a href=".$virtual_path['Site_Root']."tasker_profile_".$ret->project_post_to.".html>".$ret->project_post_to."</a>",
									"flag"                  =>  ($ret->premium_project==1?0:1), // if project is premium then no deposit was taken
								));
				$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
				$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
				$mail_content_reg = $tpl2->fetch("email_template:".MAIL_TO_TASK_OWNER_AFTER_ACCEPT_TASK);	
				
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
				$mail2->setHtml($mail_html,'',$physical_path['Email_Images']);
				$send_to = GetEmailAddress($ret->auth_id_of_post_by);
				$result = $mail2->send(array($send_to));				
				
				//echo $mail_html; die;
				header("location: accept_task_success.php?task_id=$task_id");
				exit(0);
			} // End if all parties cleared		
	
	} // If accept
}// If post

###########################################################################
    
	$ret  = $proj->Getproject($_GET['id']);
	
	if($ret->project_status == 3)
	 {
	      		$tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
									"msg"	  			=>  $lang['Accept_Again'],
									));
	 }
	else
	 {
	  
			if($_SESSION['User_Id'] == $ret->auth_id_of_post_to)
			{
				$tpl->assign(array(	"project_name"    		=>	stripslashes(strtoupper($ret->project_title)),
									"project_id"    		=>	$ret->project_id,
									"auth_id_of_post_by"	=>  $ret->auth_id_of_post_by ,
									"Accept_Deny"			=>	fillArrayCombo($arr_langs["Accept_Deny_project"]),
							));
			}
			else
			{
				$error = 1;
			}
				$tpl->assign(array(	"T_Body"			=>	'accept_projects'. $config['tplEx'],
									"JavaScript"	    =>  array("award.js"),
									"arr_bids"    		=>	$arr_bids,
									"Loop"				=>	$cnt,
									"error"				=>  $error,
							));
     }
    
	$tpl->assign(array(  "lang"						=>  $lang,
						"Current_Page"				=>	'saller',
						"Submenu_Page"      		=> 'manage_bids',
						
				));
$tpl->display('default_layout'. $config['tplEx']);
?>