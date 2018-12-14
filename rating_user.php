<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Rating.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/rating_user.php');
include_once($physical_path['fblib']. 'facebook.php');

//facebook process used for publish to wall
// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => $fb_app_id,
  'secret' => $fb_app_secret,
  'cookie' => true,
));
$session = $facebook->getUser();

$rate =  new Rating();
$proj =  new Project();

if($_POST['Submit'] == $lang['Button_Rate'])
{
	if($_POST['user_type'] == 'task_owner')
	{
	  $en_comm 	   = badWordDetect($_POST['en_comm']);
	 
	  //inserting into Buyer table
	  
	  $rate->Insert_Buyer($_POST['project_id'],$_SESSION['User_Name'],$_POST,$en_comm);
	  
			// Publish new Task Owner feedback to latest_activity table for display on logged_in_home.tpl
			$activity = $proj->Getproject($_POST['project_id']);
			$task_id = $activity->project_id;
			$task_owner = $_GET['to'];
			$tasker = $_SESSION['User_Name'];
			$activity_type = "Task Owner Feedback";
			$description = '<a href="tasker_profile_' . $tasker . '.html">'  . $tasker . '</a> just provided feedback for the task owner <a href="task_owner_profile_' . $task_owner . '.html">'  .$task_owner . '</a> on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent;
			$activity_link = 'task_'.$task_id.'_'.clean_url($activity->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish new Task Owner feedback to latest_activity table for display on logged_in_home.tpl		  
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
									$facebook->api('/me/feed','post', array('message'=>'I just provided feedback for the task owner '  .$task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just provided feedback for the task owner '  .$task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $tasker . ' just provided feedback for the task owner '  .$task_owner . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook			  
					//email to Task Owner

					global $mail2;
					$mail2 = '';
					$mail2 = new htmlMimeMail();
					
					$tpl2 = new Smarty;
					$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
					
					$sendinfo = $emails->GetEmailDetails1(FEEDBACK_LEFT);
					
					$mail2->setSubject($sendinfo->email_subject);
					$mail2->setFrom($sendinfo->email_adress); 
					
					$tpl2->assign(array(
										"message"           	=>  $Site_Title. ' user ' . $tasker . ' just provided feedback for you on task '.$activity->project_title,
										"activity_link"         =>  '<a href="' . $virtual_path['Site_Root'] . '/' . $activity_link . '">' .$activity->project_title.'</a>',
										"to" 					=> $task_owner,
										"from" 					=> $tasker,										
										"flag"                  =>  0,
									));
					
										
					$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
					$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
					$mail_content_reg = $tpl2->fetch("email_template:".FEEDBACK_LEFT);
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

					$send_to = GetEmailAddress($activity->from_user_auth_id);
					
					$result = $mail2->send(array($send_to));
								
					//////////////////////////
					
				//email to Tasker	  
	  //redirect to page
	  header("location: task_owner_rating.php");
	  exit();
	}
	else
	{
	  $en_comm 	   = badWordDetect($_POST['en_comm']);

  	  //inserting into Seller table
	  
	  $rate->Insert_Seller($_POST['project_id'],$_SESSION['User_Name'],$_POST,$en_comm);
	  
			// Publish new Tasker feedback to latest_activity table for display on logged_in_home.tpl
			$activity = $proj->Getproject($_POST['project_id']);
			$task_id = $activity->project_id;
			$task_owner = $activity->project_posted_by;
			$tasker = $_GET['to'];
			$activity_type = "Tasker Feedback";
			$description = '<a href="task_owner_profile_' . $task_owner . '.html";>' . $task_owner . '</a> just provided feedback for the tasker <a href="tasker_profile_' . $tasker . '.html">' . $tasker . '</a> on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent;
			$activity_link = 'task_'.$task_id.'_'.clean_url($activity->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish new Tasker feedback to latest_activity table for display on logged_in_home.tpl		  

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
									$facebook->api('/me/feed','post', array('message'=>'I just provided feedback for the tasker ' . $tasker . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just provided feedback for the tasker ' . $tasker . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $task_owner . ' just provided feedback for the tasker ' . $tasker . ' on task "'.$activity->project_title.'" posted on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook		
					//email to Tasker

					global $mail2;
					$mail2 = '';
					$mail2 = new htmlMimeMail();
					
					$tpl2 = new Smarty;
					$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
					
					$sendinfo = $emails->GetEmailDetails1(FEEDBACK_LEFT);
					
					$mail2->setSubject($sendinfo->email_subject);
					$mail2->setFrom($sendinfo->email_adress); 
					
					$tpl2->assign(array(
										"message"           	=>  $Site_Title. ' user ' . $task_owner . ' just provided feedback for you on task '.$activity->project_title,
										"activity_link"         =>  '<a href="' . $virtual_path['Site_Root'] . '/' . $activity_link . '">' .$activity->project_title.'</a>',
										"to" 					=> $tasker,
										"from" 					=> $task_owner,										
										"flag"                  =>  0,
		
									));
					
										
					$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
					$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
					$mail_content_reg = $tpl2->fetch("email_template:".FEEDBACK_LEFT);
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
			
	  //redirect to page
	  header("location: tasker_rating.php");
	  exit();
	}
}

////////
# if  project_id,rating_to,rating_from

if($_GET['User_type'] == 'task_owner')
{
    $value = $rate->Check_Rating_Buyer($_GET['project_id'],$_GET['to'],$_SESSION['User_Name']);
	
	if ($value == 0)
	{

	   $tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
							"msg"		        =>	"You have already rated ".$_GET['to']." for this task" ,	
					));		
	}
	else
	{
		$tpl->assign(array(	"T_Body"			=>	'rating_user'. $config['tplEx'],
							"JavaScript"		=>  array("rating.js"),
							"user"              =>  $_GET['to'],
							"user_type"         =>  $_GET['User_type'],
							"project_id"        =>  $_GET['project_id'],
							"rating_List"		=>	fillArrayCombo($arr_langs["rating"],'5'),
							
					));
	}
}
else
{
    $value = $rate->Check_Rating_Seller($_GET['project_id'],$_GET['to'],$_SESSION['User_Name']);
		
	if ($value == 0)
	{
	   
	   $tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
							"msg"		        =>	"You have already rated ".$_GET['to']." for this task" ,	
					));		
	}
	else
	{
		$tpl->assign(array(	"T_Body"			=>	'rating_user'. $config['tplEx'],
							"JavaScript"		=>  array("rating.js"),
							"user"              =>  $_GET['to'],
							"user_type"         =>  $_GET['User_type'],
							"project_id"        =>  $_GET['project_id'],
							"rating_List"		=>	fillArrayCombo($arr_langs["rating"],'5'),
							
					));
	}
}
/* assign language */
	$activity = $proj->Getproject($_GET['project_id']);
	$tpl->assign(array(	"lang"						=>  $lang,
						"navigation"				=> '<a href="my-account.html" class=footerlink>My Account</a>',
						"navigation1"				=> '<a href=home.html class=footerlink>Home</a>',
						"navigation2"				=> '<a href="task_'.$activity->project_id.'_'.clean_url($activity->project_title).'.html">Return To Task</a>',
						));
						
$tpl->display('default_layout'. $config['tplEx']);					
?>