<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/place_bid.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'task.php');
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
$project 		= new project();
$emails 		= new Email();

if($_POST['Submit'] == $lang['Place_Bid'])
{
	$bid_details = $project->GetBidDetails($_SESSION['User_Name'],$_POST['project_id']);
	if($bid_details == 1)
	{
		$en_bid_desc  	   = badWordDetect($_POST['en_bid_desc']);
	
			$project->InsertBid($_POST,$_SESSION['User_Name'],$en_bid_desc);
			
			// Publish bid notice to latest_activity table for display on logged_in_home.tpl
			$activity = $project->Getproject($_POST['project_id']);
			$task_id = $activity->project_id;
			$task_owner = $activity->project_posted_by;
			$tasker = $_SESSION['User_Name'];
			$activity_type = "New Bid";
			$description = '<a href="tasker_profile_' . $tasker . '.html">' . $tasker . '</a> just submitted a bid on <a href="task_owner_profile_' . $task_owner . '.html">' .  $task_owner . '&#039;s</a> task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent;
			$activity_link = 'task_'.$task_id.'_'.clean_url($activity->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish bid notice to latest_activity table for display on logged_in_home.tpl			

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
									$facebook->api('/me/feed','post', array('message'=>'I just submitted a bid on ' .  $task_owner . 's task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just submitted a bid on ' .  $task_owner . 's task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $tasker . ' just submitted a bid on ' .  $task_owner . 's task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook

			
			
			$new_flag = 0;
		
	}

	elseif($bid_details == 0)
	{
		$en_bid_desc  	   = badWordDetect($_POST['en_bid_desc']);
		
			$project->UpdateBid($_POST,$_SESSION['User_Name'],$en_bid_desc);
			
			// Publish bid notice to latest_activity table for display on logged_in_home.tpl
			$activity = $project->Getproject($_POST['project_id']);
			$task_id = $activity->project_id;
			$task_owner = $activity->project_posted_by;
			$tasker = $_SESSION['User_Name'];
			$activity_type = "Update Bid";
			$description = '<a href="tasker_profile_' . $tasker . '.html">' . $tasker . '</a> just updated their bid on <a href="task_owner_profile_' . $task_owner . '.html">' .  $task_owner . '&#039;s</a> task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent;
			$activity_link = 'task_'.$task_id.'_'.clean_url($activity->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish bid notice to latest_activity table for display on logged_in_home.tpl			

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
									$facebook->api('/me/feed','post', array('message'=>'I just updated my bid on ' .  $task_owner . 's task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);										
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just updated my bid on ' .  $task_owner . 's task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $tasker . ' just updated their bid on ' .  $task_owner . 's task "'.$activity->project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook	
			$new_flag = 2;
	}
	
	$set1 = $project->Getproject($_POST['project_id']); // Get task info for mailings	
	
	// Email the tasker
	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();

	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

	
	$sendinfo = $emails->GetEmailDetails1(BID_PLACE_IN_PENDING);
	
	$mail2->setSubject(str_replace("%task_title%","'".$set1->project_title."'",$sendinfo->email_subject));

	$mail2->setFrom($sendinfo->email_adress);
	
	
	
	$tpl2->assign(array("task_owner" 		   =>  $set1->project_posted_by,
						"task_link"            =>  "<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($set1->project_title).".html>".$set1->project_title."</a>",
						"task_title"		   =>  $set1->project_title,	
						"tasker"      		   =>  "<a href=".$virtual_path['Site_Root']."tasker_profile_".$_SESSION['User_Name'].".html>".$_SESSION['User_Name']."</a>",			
							));

	
			$mail_content_reg = $tpl2->fetch("email_template:".BID_PLACE_IN_PENDING);		
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
	
	$email_address = $user->GetMemberDetails($_SESSION['User_Id']);

	$result = $mail2->send(array($email_address->mem_email));
	
	
	// Email the task owner
	
	$user_rec = $project->Getprojectdelete($_POST['project_id']);
	
	if($user_rec->mem_option == 1)
	{
		global $mail2,$virtual_path,$physical_path;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
	
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
		$sendinfo = $emails->GetEmailDetails1(PLACE_BID_ON_TASK);
		
		$mail2->setSubject(str_replace("%task_title%","'".$set1->project_title."'",$sendinfo->email_subject));
	
		$mail2->setFrom($sendinfo->email_adress);
			
		$tpl2->assign(array("task_owner" 		   =>  $set1->project_posted_by,
							"task_link"            =>  "<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($set1->project_title).".html>".$set1->project_title."</a>",
							"task_title"		   =>  $set1->project_title,	
							"tasker"      		   =>  "<a href=".$virtual_path['Site_Root']."tasker_profile_".$_SESSION['User_Name'].".html>".$_SESSION['User_Name']."</a>",			
								));
				
					
		$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
		
		$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
		
		$mail_content_reg = $tpl2->fetch("email_template:".PLACE_BID_ON_TASK);				
		
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
				
		$result1 = $mail2->send(array($user_rec->mem_email));
	}
				#### Send notices of Outbid to those who selected ####

					$reult1 = $project->find_less_than_bid($_POST['project_id'],$_POST['bid_amount']);
					$rscnt1 = $db->num_rows();

					if($rscnt1 != 0)
					{
						$i=0;
						while($db->next_record())
						{
							$arr_email[$i]			= $db->f('mem_email');
							$i++;
						}
					
					}	

					global $mail2;
					$mail2 = '';
					$mail2 = new htmlMimeMail();

					$tpl2 = new Smarty;
					$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

					
					$sendinfo = $emails->GetEmailDetails1(OUTBID_NOTICE);
					
					$mail2->setFrom($sendinfo->email_adress);
					

					$subject_text = ereg_replace("%project_title%",$set1->project_title,$sendinfo->email_subject);

					$mail2->setSubject($subject_text);
					

					$tpl2->assign(array(
										"project_name"         =>  $set1->project_title,
										"bidder_name"           =>  "<a href=".$virtual_path['Site_Root']."tasker_profile_".$_POST['user_name'].".html>".$_POST['user_name']."</a>",  
										"link"  		       =>  "<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']. "_" .clean_url($set1->project_title).".html>".$set1->project_title."</a>",  
									));
										
								
					$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
					
					$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
					
					$mail_content_reg = $tpl2->fetch("email_template:".OUTBID_NOTICE);	
					
					$mail_html = "<table border=0 cellpadding=0 cellspacing=0 width=75%>
									<tr>
										<td>".$mail_content_header."</td>
									</tr>
									<tr>
										<td>".$mail_content_reg."</td>
									</tr>
									<tr>
										<td>".$mail_content_footer."</td>
									</tr>
								</table>";
								
					$mail2->setHtml($mail_html);
					if($rscnt1 != 0)
					{
					   foreach($arr_email as $key => $val)
						{
						   $result = $mail2->send(array($val));
						}
					}	
				#### End Send notices of Outbid to those who selected ####		
	
	
	header("location: place_bid_successfully.php?project_id=".$_POST['project_id']."&flag=".$new_flag);
	exit(0);
 } 
//////////////////////////////////////
	$ret = $project->GetprojectDetails($_GET['project']);
	$totalamount = Select_wallet_sum($_SESSION['User_Id']);
	$test = substr($totalamount,1);
	$test2	=	str_replace(",","",$test);
	$task_owner_vip	=Check_Vip_User($_SESSION['User_Name']);
	$project_allow_bid =	$ret->project_allow_bid;
	
	if ($task_owner_vip != 1 && $project_allow_bid == 1){
	header("location: home.html");
	die();
	}	
	elseif($ret->project_status != 1)
	{
					$tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
										"msg"      			=>  $lang['project_Close_or_Win'],   
									));	
	}
	else
	{
	
		if($ret->project_allow_bid == 1)
		{
			$val = $project->Check_BID($_SESSION['User_Name'],$_GET['project']);
			
				if($val == 1)
				{
					if($_SESSION['Membership_Name'] != "")
					{
						$bid_user = $project->GetBid($_GET['project'],$_SESSION['User_Name']); 	
						$tpl->assign(array(		"T_Body"			=>	'place_bid'. $config['tplEx'],
												"JavaScript"		=>	array('bid.js'),
												"project_id"		=>	$ret->project_id,
												"project_posted_by"	=>	$ret->project_posted_by,												
												"project_title"		=>	stripslashes($ret->project_title),	
												"min_bid_amount"	=>	$config[WC_BID_DEPOSIT],
												"user_id"           =>  $_SESSION['User_Id'],
												"post_id"           =>  $ret->auth_id_of_post_by,
												"bid_amount"        =>  $bid_user->bid_amount,
												"delivery_within"   =>  $bid_user->delivery_within,
												"en_bid_desc"  		=>  $bid_user->bid_desc, 
												"chechked"			=> ($bid_user->notification_alert == 1) ? 'checked' : '',
												"status"            =>  $ret->project_status,
												"msg"      			=>  $lang['project_closing'],
										));
					}
					else
					{
						$tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
											"msg"      			=>  $lang['Premium_Msg'],   
										));	
					} 
				}
				if($val == 0)
				{
					$bid_user = $project->GetBid($_GET['project'],$_SESSION['User_Name']); 	 
					
					$tpl->assign(array(	"T_Body"			=>	'place_bid'. $config['tplEx'],
										"JavaScript"		=>	array('bid.js'),
									));		
									
						$tpl->assign(array(	"T_Body"			=>	'place_bid'. $config['tplEx'],
											"JavaScript"		=>	array('bid.js'),
											"project_id"		=>	$ret->project_id,
											"project_posted_by"	=>	$ret->project_posted_by,											
											"project_title"		=>	stripslashes($ret->project_title),	
											"min_bid_amount"	=>	$config[WC_BID_DEPOSIT],
											"user_id"           =>  $_SESSION['User_Id'],
											"post_id"           =>  $ret->auth_id_of_post_by,
											"bid_amount"        =>  $bid_user->bid_amount,
											"status"            =>  $ret->project_status,
											"delivery_within"   =>  $bid_user->delivery_within,
											"en_bid_desc"  		=>  $bid_user->bid_desc, 
											"chechked"			=> ($bid_user->notification_alert == 1) ? 'checked' : '',
											"msg"      			=>  $lang['project_closing'],
										));

				} 
		}
		else
		{
		
			$val = $project->Check_BID($_SESSION['User_Name'],$_GET['project']);
			
			if($val == 1)
			{
				$tpl->assign(array(	"T_Body"			=>	'place_bid'. $config['tplEx'],
									"JavaScript"		=>	array('bid.js'),
									"user_id"           =>  $_SESSION['User_Id'],
									"project_id"        =>  $_GET['project'],
									"status"            =>  $ret->project_status,
								));	
			}
			else
			{
					$bid_user = $project->GetBid($_GET['project'],$_SESSION['User_Name']); 	 
					
					$tpl->assign(array(	"T_Body"			=>	'place_bid'. $config['tplEx'],
										"JavaScript"		=>	array('bid.js'),
									));		
									
						$tpl->assign(array(	"T_Body"			=>	'place_bid'. $config['tplEx'],
											"JavaScript"		=>	array('bid.js'),
											"project_id"		=>	$ret->project_id,
											"project_posted_by"	=>	$ret->project_posted_by,											
											"project_title"		=>	stripslashes($ret->project_title),	
											"min_bid_amount"	=>	$config[WC_BID_DEPOSIT],
											"user_id"           =>  $_SESSION['User_Id'],
											"post_id"           =>  $ret->auth_id_of_post_by,
											"bid_amount"        =>  $bid_user->bid_amount,
											"status"            =>  $ret->project_status,
											"delivery_within"   =>  $bid_user->delivery_within,
											"en_bid_desc"  		=>  $bid_user->bid_desc, 
											"chechked"			=> ($bid_user->notification_alert == 1) ? 'checked' : '',
											"msg"      			=>  $lang['project_closing'],
										));

				
			}
								

		}	 	
	}
	

		$completed_by  = $ret->completed_by;
		$project_posted_date = $ret->project_posted_date; 
		$completed_time = $ret->completed_time;	
	/* assign languaga */
	$tpl->assign(array(		"project_title"		=>	stripslashes($ret->project_title),	
							"lang"              =>  $lang,
							"completed_by"	 	=>  date('l F d, Y', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$completed_by day")),
							"completed_time"	=>  date("g:i a", strtotime($completed_time)),							
	 					 ));

$tpl->display('default_layout'. $config['tplEx']);
?>