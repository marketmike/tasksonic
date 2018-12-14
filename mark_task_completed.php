<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'User.php');
include_once($physical_path['Site_Lang'].'mark_task_completed.php');
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

$proj 		= new project();
$emails 	= new Email();
$user 		= new User();
if($_POST['Submit']	== $lang['Accept_Submit'])
{

	if($_POST['tasker_completed']	!= 1){
	$ERROR = "Please mark the task as completed before submitting";
	}
	if($_POST['max_expense_budget'] != 999 && $_POST['tasker_reimburse']	> $_POST['max_expense_budget']){
	$ERROR = "You can not submit an expense greater than what the Task Owner has budgeted.";
	}

	if ($ERROR == ""){
		
					$project_id 			= $_POST['project_id'];
					$tasker_completed 		= $_POST['tasker_completed'];
					if ($_POST['tasker_reimburse'] == ''){
					$tasker_reimburse 		= 0.00;
					}else{
					$tasker_reimburse 		= $_POST['tasker_reimburse'];
					}
					$tasker_reimburse_desc 	= $_POST['tasker_reimburse_desc'];		
										
					$proj->Marked_Completed($project_id,$tasker_completed,$tasker_reimburse,$tasker_reimburse_desc);
					if($_POST['tasker_reimburse']	== ''){
					$proj->update_Escrow_Payment_Type($project_id);
					}
					// Publish accepted notice to latest_activity table for display on logged_in_home.tpl
					$activity = $proj->Getproject($_POST['project_id']);;
					$task_id = $activity->project_id;
					$task_owner = $activity->project_posted_by;
					$tasker = $_SESSION['User_Name'];
					$activity_type = "Accepted";
					$description = '<a href="tasker_profile_' . $tasker . '.html">' . $tasker . '</a> just completed the task for <a href="task_owner_profile_' . $task_owner . '.html">' . $task_owner . '</a> on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent;
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
									$facebook->api('/me/feed','post', array('message'=>'I just completed the task for ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just completed the task for ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $tasker . ' just completed the task for ' . $task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook	
			
		// sending mail to Task Owner
			
		// mail to project creator for deny	

			// Send email to Sonic Task Owner
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$ret_user = $user->getUserDetails($_POST['auth_id_of_post_by']);
			$send_to = $ret_user->mem_email;
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(TASK_COMPLETED_NOTICE);
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
			
			$ret  = $proj->Getproject($_POST['project_id']);
			
			$tpl2->assign(array("project_name"          =>  $ret->project_title, 
								"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
								"task_owner" 			=> $task_owner,
								"tasker" 				=> $tasker,
								"tasker_reimburse" 		=> $_POST['tasker_reimburse'],
								"tasker_reimburse_desc" => $_POST['tasker_reimburse_desc'],
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


					
				header("location: mark_task_completed_success.php?project_id=$task_id");
				exit(0);
			}else{
			$Action = A_VIEW_ALL;				
			} // End if ERROR
} // End if post			
	#############################################################################################
if($Action == ''|| $Action == A_VIEW_ALL)
{    
	$ret  = $proj->Getproject($_GET['project_id']);
		  
			if($_SESSION['User_Id'] == $ret->auth_id_of_post_to && $ret->tasker_completed == 0)
			{
				$tpl->assign(array(	"project_name"    		=>	stripslashes(strtoupper($ret->project_title)),
									"project_id"    		=>	$ret->project_id,
									"auth_id_of_post_by"	=>  $ret->auth_id_of_post_by ,
									"max_expense_budget"	=>  $ret->expense_budget ,									
							));
			}
			else
			{
				$error = 1;
			}
			
			$tpl->assign(array(	"T_Body"			=>	'mark_task_completed'. $config['tplEx'],
								"JavaScript"	    =>  array("mark_task_completed.js"),
								"arr_bids"    		=>	$arr_bids,
								"task_title"    	=>	$ret->project_title,
								"Loop"				=>	$cnt,
								"error"				=>  $error,
								"ERROR"				=>  $ERROR,								
								"lang"				=>  $lang,
						));
}    
$tpl->display('default_layout'. $config['tplEx']);
?>