<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/task.php');
include_once($physical_path['DB_Access']. 'Escrow.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['fblib']. 'facebook.php');

//facebook process used for publish to wall
// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => $fb_app_id,
  'secret' => $fb_app_secret,
  'cookie' => true,
));
$session = $facebook->getUser();

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$escrow		= new Escrow();
$emails 	= new Email();
$proj 		= new Project();

// Get the details for the selected escrow payment
$details = $escrow->Get_Details($_GET['id']);
$taskid =$details->project_id;
// If the escrow payment being released is a final payment for a partial payment (status 3), check to see if there are partial payments that have not yet been released prior to allowing final payment to be releasedd 
$verify = $escrow->Verify_Proper_Release_Order($details->project_id);	

if($details->payment_type == 3 && $verify == 0){
	$ERROR = 'You Must Release The "Escrow For Bid Total" Payment For Task Id: ' . $taskid . '<br />Before Releasing The "Expense Reimburse" Payment';
	header("location: my-escrow-payments.html?error=$ERROR");
	exit();	
}else{			
	
	//Deposit amount from Task Owner Account to Tasker  
	
	$escrow->Insert_Escrow_Payment_To_Tasker($details->from_user_auth_id,$details->from_user_login_id,$details->amount,$details->to_user_login_id,$details->project_title);

    //Deposit amount from Task Owner Account  
	
	$wallet_seller = Select_wallet_sum($details->to_user_auth_id);
			  
	$new_wallet1 = $wallet_seller + ($details->amount);
	
	Update_wallet_sum($details->to_user_auth_id,$new_wallet1); 
	
	$escrow->Insert_Escrow_Payment_From_Task_Owner($details->to_user_auth_id,$details->to_user_login_id,$details->amount,$details->from_user_login_id,$details->project_title);
    
	//updating status of payment like release or not
	$escrow->Update($_GET['id']);
	
	
	if($details->payment_type == 1 || $details->payment_type == 3)
	{
	$final = 1;
	
		//updating status of project
		$escrow->Complete_project($details->project_id);
		
			// Publish task complete notice to latest_activity table for display on logged_in_home.tpl
			$task_id = $details->project_id;
			$task_owner = $details->from_user_login_id;
			$tasker = $details->to_user_login_id;
			$activity_type = "Task Completed";
			$description = '<a href="task_owner_profile_' . $task_owner . '.html">' . $task_owner . '</a> just released final payment for the task "'.$details->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker <a href="tasker_profile_' . $tasker . '.html">' . $tasker . '</a>. The task is completed!';
			$activity_link = 'task_'.$task_id.'_'.clean_url($details->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish task complete notice to latest_activity table for display on logged_in_home.tpl			
		
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
									$facebook->api('/me/feed','post', array('message'=>'I just released final payment for the task "'.$details->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker ' . $tasker . ' The task is completed!', 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just released final payment for the task "'.$details->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker ' . $tasker . ' The task is completed!', 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $task_owner . ' just released final payment for the task "'.$details->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker ' . $tasker . ' The task is completed!', 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook			
	}
	//earning by the user
	
	$Earning_wallet_seller = Sellect_Earning_Wallet($details->to_user_auth_id);
	
	$new_earning_wallet = $Earning_wallet_seller + ($details->amount);
	
	Update_earning_wallet($details->to_user_auth_id,$new_earning_wallet); 
	
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
						"buyer_id"           	=>  $details->to_user_login_id,
						"tasker"        		=>  $details->project_post_to,						
						"amount"                =>  number_format($details->amount,2),
						"task_title"         	=>  $details->project_title,
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
						"tasker"        		=>  $details->project_post_to,
						"amount"                =>  number_format($details->amount,2),
						"task_title"        	=>  $details->project_title,
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
	$sucmsg = "Escrow Payment Released Successfully";
	header("location: my-escrow-payments.html?success=$sucmsg");
	exit();
} // End $verify check
$tpl->display('default_layout'. $config['tplEx']);
?>