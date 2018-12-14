<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Email.php');

include_once($physical_path['Site_Lang'].'/task.php');
$project 		= new project();
$buyer 			= new Buyers();
$seller			= new Seller();
$category		= new Category();
$emails 		= new Email();

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

if($Action == 'ChangeStatus')
{
    $val=$project->ToggleStatusBid($_POST['bid_id'],$_POST['status']);
	$ret_rec = $project->GetprojectDetails($_POST['project_id']);
	
	$clear_title = clean_url($ret_rec->project_title);
	header("location: task_".$_POST['project_id']."_".$clear_title.".html#bid_list");
	exit();
}
if($Action=='Delete' && $_POST['bid_id'])
{
    $details = $project->Get_details_form_bidid($_POST['bid_id']);
	////////To  Buyer
    global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();
	
	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
	$sendinfo = $emails->GetEmailDetails1(BID_CANCEL);
					
	$mail2->setSubject($sendinfo->email_subject);
	$mail2->setFrom($sendinfo->email_adress); 
	
	$tpl2->assign(array(
						"seller_link"           =>	"<a href=".$virtual_path['Site_Root']."tasker_profile_".$details->bid_by_user.".html>".$details->bid_by_user."</a>",
						"project_link"          =>	'<label class=navigation>'.$details->project_title."</label>",
						"flag"                  =>  0,  
					));
	
			$mail_content_reg = $tpl2->fetch("email_template:".BID_CANCEL);
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
	
	$send_to = GetEmailAddress($details->auth_id_of_post_by);
	
	$result = $mail2->send(array($send_to));
	
	/////// To Seller
	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();
	
	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
	$sendinfo = $emails->GetEmailDetails1(BID_CANCEL);
					
	$mail2->setSubject($sendinfo->email_subject);
	$mail2->setFrom($sendinfo->email_adress); 
	
	$tpl2->assign(array(
						"project_link"          =>	'<label class=navigation>'.$details->project_title."</label>",
					    "flag"					=>  1,	 
					));
	
						
	$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
	$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
	$mail_content_reg = $tpl2->fetch("email_template:".BID_CANCEL);
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
	
	$send_to = GetEmailAddress(mdd5($details->bid_by_user));
	
	$result = $mail2->send(array($send_to));
	
    $val = $seller->Delete($_POST['bid_id']);
	//header("location: task_".$_POST['project_id'].".html#bid_list");
	header("location: task_".$_POST['project_id']."_".clean_url($details->project_title).".html#bid_list");
	exit();
}
		
	$project_exit = $project->Checkproject_Id($_GET['id']);
		

	
	
		if($project_exit == 1)
		{
			$tpl->assign(array(	"T_Body"					=>	'Msg'. $config['tplEx'],
								"msg"						=>   $lang['project_Exit'],
								"lang"						=>   $lang,
							   ));	
		}
		if($project_exit == 0)
		{
	
$ret = $project->GetprojectDetails($_GET['id']);			
			$unde=$ret->location;
			//print "Aici: $unde";
			

$project_days_open = $ret->project_days_open;
$completed_by  = $ret->completed_by;
$project_posted_date = $ret->project_posted_date; 
$bidding_time = $ret->bidding_time;

	#====================================================================================================
	#	Description 1	:  Used to calulcate when bidding time has expired using date and time settings
	#   Description 2   : function call to establish time remaining on bidding
	#   Used In   : task.php home.php	
	#----------------------------------------------------------------------------------------------------

#   Used for javascript counter
		/*
			G - 24 hour c (0-23) at the moment, G seems to work
			H - 2 digit 24 hour (00-23)
		*/

		$year 	= date('y', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$month 	= date('m', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$day 	= date('d', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$hour 	= date('G', strtotime($ret->bidding_time));
		$min 	= date('i', strtotime($ret->bidding_time));
		$sec 	= date('s', strtotime($ret->bidding_time));		
#   Used for php counter	
		$bidding_end_date 	=  date('Y-m-d', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$bid_end = new Datetime($bidding_end_date. ' ' . $bidding_time);
		$now = new Datetime();
		$seconds_remaining = $bid_end->format('U') - $now->format('U');
		
		$time_remaining = sec2hms ($seconds_remaining);	// function call to establish time remaining on bidding
		
		if ($bid_end->format('U') > $now->format('U')) {
			$bid_status = 1;
		}else{
			$bid_status = 0;
		}
		if ($bid_status == 0 && $project_status == 5){
		$Error = 'Time For Bidding Has Expired For This Task! If you are the Task Owner, you can either select a bid or extend the bidding time.';
		}
	#====================================================================================================
	#	End
	#----------------------------------------------------------------------------------------------------

		
			$tpl->assign(array(	"T_Body"					=>	'task'. $config['tplEx'],
								"JavaScript"				=>	array('task.js'),
								'hidemap' 				 	=> 'hide',				
								"Site_Title"				=>	stripslashes($ret->project_title)." ( ".Get_Cat_Names_project($ret->project_category)." )",
								"clear_title"				=>	clean_url($ret->project_title),
								"membership_id"				=>	$ret->membership_id,
								"project_id"				=>	$ret->project_id,
								"project_hide"				=>	$ret->project_hide,	
								"project_allow_bid"			=>	$ret->project_allow_bid,
								"project_posted_by"			=>	$ret->project_posted_by,
								"project_status"			=>	$ret->project_status,
								"project_location"			=>	$ret->location,
								"project_city"				=>	$ret->city,								
								"project_latitude"			=>	$ret->latitude,
								"project_longitude"			=>	$ret->longitude,
								"premium_project"           =>  $ret->premium_project, 
								"user_id"	                =>  $ret->auth_id_of_post_by,
								"project_title"				=>	stripslashes($ret->project_title),	
								"project_description"		=>	stripslashes(nl2br($ret->project_description)),	
								"project_file_1"			=>	substr($ret->project_file_1,25),
								"project_file_2"			=>	substr($ret->project_file_2,25),	
								"project_file_3"			=>	substr($ret->project_file_3,25),	
								"project_budget"			=>	$ret->development_title,	
								"project_posted_date"		=>	formatDate($ret->project_posted_date,'l F d, Y'),
								"title"						=> urlencode($ret->project_title),
								"url"						=> urlencode($config[WC_SITE_URL] . '/task_' . $ret->project_id . '_' . clean_url($ret->project_title) . '.html'),
								"summary"					=> urlencode('Check Out This Cool Task On Task Sonic'),
								"image"						=> urlencode($config[WC_SITE_URL] . '/images/logo.png'),								
			
								"filepath"               	=>  $virtual_path['project'], 
			
								"project_post_to"			=>	$ret->project_post_to,	
								"project_level"				=>	$ret->project_level,	
								"project_status"			=>	$ret->project_status,	
								"tasker_reimburse"			=>	$ret->tasker_reimburse,
								"task_owner_dispute"		=>	$ret->task_owner_dispute,																
								"download_project_file_1"	=>	$ret->project_file_1,
								"download_project_file_2"	=>	$ret->project_file_2,
								"download_project_file_3"	=>	$ret->project_file_3,
								"categories"				=>  Get_Cat_Names_project($ret->project_category),
								"project_days_left" 		=>  date('l F d, Y', strtotime(date("Y-m-d", strtotime($ret->project_posted_date)) . " +$project_days_open day")),
								"bidding_time"	 			=>  date("g:i a", strtotime($ret->bidding_time)),	
								"completed_by"	 			=>  date('l F d, Y', strtotime(date("Y-m-d", strtotime($ret->project_posted_date)) . " +$completed_by day")),
								"completed_time"	 		=>  date("g:i a", strtotime($ret->completed_time)),
								'time_remaining' 			=> $time_remaining,
								'bid_status' 				=> $bid_status,
								'ERROR' 				    => $Error,
								'year' 					    => $year,								
								'month' 				    => $month,
								'day' 				 		=> $day,
								'hour' 				 		=> $hour,	
								'min' 				 		=> $min,	
								'sec' 				 		=> $sec,							
								'fb_verfy'		 			=> if_is_fb_connec($ret->auth_id_of_post_by),
								'email_verfy'		 		=> if_is_email_verified($ret->auth_id_of_post_by),								
								'human_verfy'		 		=> if_is_human_verified($ret->auth_id_of_post_by),
								'background_verfy' 			=> if_is_background_chk($ret->auth_id_of_post_by),
								'address_verfy' 	 		=> if_is_address_verify($ret->auth_id_of_post_by),
								'project_closed_date' 		=> date('l F d, Y', strtotime(date("Y-m-d", strtotime($ret->project_closed_date)) . " +3 day")),
								"Task_Escrow_List"			=> $project->Get_Task_Escrow($ret->project_id),
								### Check if escrow payment type 2 was created ###
								"Escrow_Created"			=> $project->Check_If_Escrow_Created($ret->project_id),
								##### check if user is VIP user or not
								"task_owner_vip" => Check_Vip_User($_SESSION['User_Name']),
								"bid_type" 					=> 'all',									
							
								));
								
				$ave_rating = number_format($buyer->Average_Buyer_Rating($ret->project_posted_by),2);		
	
				$tpl->assign(array(	
										"ave_rating"		  => $ave_rating,	
					));						
				$reviews =	$buyer->Total_Ratings_By_Tasker($ret->project_posted_by);	
				$tpl->assign(array(	
										"reviews"		  => $reviews,	
					));			
				///////  Related project Listing......
				$cat_array = explode(",",$ret->project_category);
				$project->GetprojectByCategory123($cat_array);	
				$count_related_project = $db->num_rows();
				$i=0; 			
				
				while($db->next_record())
				{
					$arr_related_project[$i]['project_id']		     = $db->f('project_id');
					$arr_related_project[$i]['project_title']	 	 = $db->f('project_title');
					$arr_related_project[$i]['clear_title']	 	 	 = clean_url($db->f('project_title'));
					$i++;
				}

				
				 $tpl->assign(array(	"arr_related_project"	=>	$arr_related_project,
										"Related_Loop"		    =>	$count_related_project,	
										"navigation"			=>	$navigation,
										"navigation1"			=>	$navigation1,
										"navigation2"			=>	$navigation2,
									));
			/// to calculate days remaining
			
			//	if $remain_days in negative than project closed and >0 than $remain_days left.
				$a = explode("-",$ret->project_posted_date);
				$date1 = date('Y-m-d ', mktime(0,0,0,$a[1],($a[2]+$ret->project_days_open),$a[0]) );
				$date2 = date('Y-m-d');
				$s = strtotime($date1)-strtotime($date2);
				$d = intval($s/86400); 
				$s -= $d*86400;
				$h = intval($s/3600);
				$s -= $h*3600;
				$m = intval($s/60); 
				$s -= $m*60;	
				$remain_days = $d;
			
				$tpl->assign(array(	"project_days_open"				=>	$remain_days,	
								));
								
								
				$rscnt = $project->Get_Bids_By_Id($_GET['id']);	
				$rscnt = $db1->num_rows();
				$i=0; 			
				
				while($db1->next_record())
				{
					$arr_Bid[$i]['bid_id']		     = $db1->f('bid_id');
					$arr_Bid[$i]['User_Name']		 = $db1->f('bid_by_user');
					$arr_Bid[$i]['User_Id']			 = md5($db1->f('bid_by_user'));
					$arr_Bid[$i]['Location']	     = $db1->f('mem_city').",".$db1->f('country_name');
					$arr_Bid[$i]['Bid_Amount']	     = $db1->f('bid_amount');
					$arr_Bid[$i]['Delivery_Time']	 = $db1->f('delivery_within');
					$arr_Bid[$i]['Bid_Desc']	 	 = $db1->f('bid_desc');
					$arr_Bid[$i]['Bid_Time']	 	 = $db1->f('date_2');
					$arr_Bid[$i]['Bid_Shortlist']	 = $db1->f('shortlist');
					$arr_Bid[$i]['Bid_Decline']		 = $db1->f('decline');
					$arr_Bid[$i]['Bid_Time']	 	 = $db1->f('date_2');
					$arr_Bid[$i]['Premium_Member']	 = $db1->f('membership_id');
					$arr_Bid[$i]['reviews']			 = $seller->Average_Seller_Rating_Count($db1->f('bid_by_user'));
					$arr_Bid[$i]['rating']			 = number_format($seller->Average_Seller_Rating($db1->f('bid_by_user')),2);
					$arr_Bid[$i]['buyer_logo'] 		 = Get_Profile_Img($db1->f('user_auth_id'));	// get profile picture
					$fb_profile_img[$i] = Get_FB_ID($arr_Bid[$i]['User_Name']);
					if($fb_profile_img[$i] != NULL || $fb_profile_img[$i] != '')
					{
					$arr_Bid[$i]['fb_profile_img']		= '<img id="image" src="https://graph.facebook.com/' . $fb_profile_img[$i] . '/picture" width="70" style="vertical-align:middle;" />';		
					}					
					$arr_Bid[$i]['fb_verfy']		 = if_is_fb_connec($arr_Bid[$i]['User_Id']);
					$arr_Bid[$i]['email_verfy']		 = if_is_email_verified($arr_Bid[$i]['User_Id']);					
					$arr_Bid[$i]['human_verfy']		 = if_is_human_verified($arr_Bid[$i]['User_Id']);
					$arr_Bid[$i]['background_verfy'] = if_is_background_chk($arr_Bid[$i]['User_Id']);
					$arr_Bid[$i]['address_verfy'] 	 = if_is_address_verify($arr_Bid[$i]['User_Id']);					
					$i++;
				}	
	
			#### Get count of current messages ####
			$result = $project->View_Private_Msg($ret->project_id,$_SESSION['User_Name'],$ret->project_posted_by);
			$privatecnt = $db->num_rows();		
				
				#### Get The Bid For Current Logged In User ####
				$current_user_bid = $project->Get_Bid_Current_User($_GET['id'],$_SESSION['User_Name']);
				$fb_profile_img_tasker   = Get_FB_ID($current_user_bid->bid_by_user);
				if($fb_profile_img_tasker != NULL || $fb_profile_img_tasker != '')
				{
				$fb_profile_img_tasker	= '<img id="image" src="https://graph.facebook.com/' . $fb_profile_img_tasker . '/picture" width="70" style="vertical-align:middle;" />';		
				}
				$tpl->assign(array(	"bid_id"		     	=> $current_user_bid->bid_id,
									"Tasker"		 		=> $current_user_bid->bid_by_user,
									"User_Id"			 	=> md5($current_user_bid->bid_by_user),
									"Location"	     		=> $current_user_bid->mem_city.",".$current_user_bid->country_name,
									"Bid_Amount"	     	=> $current_user_bid->bid_amount,
									"Delivery_Time"	 		=> $current_user_bid->delivery_within,
									"Bid_Desc"	 	 		=> $current_user_bid->bid_desc,
									"Bid_Time"	 	 		=> $current_user_bid->date_2,
									"Bid_Shortlist"	 		=> $current_user_bid->shortlist,
									"Bid_Decline"		 	=> $current_user_bid->decline,
									"Bid_Time"	 	 		=> $current_user_bid->date_2,
									"Premium_Member"	 	=> $current_user_bid->membership_id,
									"reviews"			 	=> $seller->Average_Seller_Rating_Count($current_user_bid->bid_by_user),
									"rating"			 	=> number_format($seller->Average_Seller_Rating($current_user_bid->bid_by_user),2),
									"buyer_logo" 		 	=> Get_Profile_Img($current_user_bid->user_auth_id),	// get profile picture
									"fb_profile_img_tasker"			=> $fb_profile_img_tasker, 								
									"fb_verfy_tasker"		 		=> if_is_fb_connec($current_user_bid->user_auth_id),
									"email_verfy_tasker"		 	=> if_is_email_verified($current_user_bid->user_auth_id),					
									"human_verfy_tasker"		 	=> if_is_human_verified($current_user_bid->user_auth_id),
									"background_verfy_tasker" 		=> if_is_background_chk($current_user_bid->user_auth_id),
									"address_verfy_tasker" 			=> if_is_address_verify($current_user_bid->user_auth_id),
									"privatecnt" 					=> $privatecnt,
								));






				
				
				$tpl->assign(array(	"arr_Bid"				=>	$arr_Bid,
									"Loop"				    =>	$rscnt,	
								));				
				$result = $project->Get_Bids_By_Id1($_GET['id']);		
				
				list($count,$Average_Bid,$Average_Bid_Time) = explode(",",$result);		
				
				if($count != 0)
				{
					 $Bid = number_format($Average_Bid/$count,2);
					 $Time = round($Average_Bid_Time/$count,0);
				}	 
				


				$tpl->assign(array(	"Bid"				=>	$Bid,
										"Time"			    =>	$Time,	
										"count"             => $count,
										"path"              =>  $virtual_path['Seller_Logo'],
										"Accept_Deny"		=>	fillArrayCombo($arr_langs["Accept_Deny_project"]),
								));
								
				$additional = $project->Get_Additional_Info($_GET['id']);
				$additionalcnt = $db->num_rows();
				$i=0; 			
				
				while($db->next_record())
				{
					$arr_additional[$i]['Desc']	 			 = $db->f('description');
					$arr_additional[$i]['filename1']		 = $db->f('filename');
					$arr_additional[$i]['filename']			 = substr($db->f('filename'),25);
					$arr_additional[$i]['Date_add']	         = $db->f('edit_date');
					$i++;
				}	
			
				$tpl->assign(array(	"arr_additional"				=>	$arr_additional,
									"additionalcnt"				    =>	$additionalcnt,	
								));		
								
				$shortlist = $project->Get_Bids_Shortlist($_GET['id']);	
				$shortlistcnt = $db1->num_rows();	
				
				$tpl->assign(array(	"shortlistcnt"				=>	$shortlistcnt,
								));		
								
				$decline = $project->Get_Bids_Decline($_GET['id']);	
				$declinecnt = $db1->num_rows();	
				
				$tpl->assign(array(	"declinecnt"				=>	$declinecnt,
								));			
								
				$msgboard = $project->View_Msg($_GET['id']);		
				$msgboardcnt = $db->num_rows();	
				
				$tpl->assign(array(	"msgboardcnt"				=>	$msgboardcnt,
								));	
							
           	}																	
				 
			 #language 					
			$tpl->assign(array(	"lang"                   =>  $lang,
								
							 ));						
				 
$tpl->display('default_layout'. $config['tplEx']);
?>