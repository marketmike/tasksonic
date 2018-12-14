<?php
define('IN_SITE', 	true);
define('IN_USER',	true);

include_once("includes/common.php");

include_once($physical_path['Site_Lang'].'/post_task.php');
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Development.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Others.php');
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

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

$cats 			= new Category();
$development 	= new Development();
$project        = new project();
$emails 		= new Email();
$others 		= new Others();
$user 			= new User();
if(stripslashes($_POST['Submit']) == $lang['Submit'] && $Action == 'Add')
{
    if($_SESSION['User_Name'] != '')  
	{
		$ERROR = "";
	if($_POST['cat_prod'] != '')
	{
	   $selected_cat = $_POST['cat_prod'];
	}
if($_POST['en_project_title'] == ''){	
$ERROR = $ERROR."You'll Need A Title For Your Task";
}

if($_POST["bidding"] && $_POST["bidding_time"] && $_POST["completed_by"] &&$_POST["completed_time"]){
	// Check to make sure bid date and task completion date are not out of whack
	$currentDate = date("Y-m-d");// current date
	$bidding = $_POST["bidding"] - 1;
	$bidding_time = $_POST["bidding_time"];
	$completed_by = $_POST["completed_by"] - 1;
	$completed_time = $_POST["completed_time"];
	$bidding_end_date = date('Y-m-d', strtotime(date("Y-m-d", strtotime($currentDate)) . " +$bidding day"));
	$task_end_date = date('Y-m-d', strtotime(date("Y-m-d", strtotime($currentDate)) . " +$completed_by day"));
// Assemble new datetime for each
		$bid_end = new Datetime($bidding_end_date. ' ' . $bidding_time);
		$task_end = new Datetime($task_end_date. ' ' . $completed_time);
		$now = new Datetime();
		$bid_end_datetime = $bid_end->format('U');
		$now_datetime = $now->format('U');
		$completed_end_datetime = $task_end->format('U');

		if($bid_end_datetime <= $now_datetime + 10800)// Add three hours to bid_end_time to make sure it is at least 3 hours later then now
		{
		$bidding_end_date_new =  $bid_end->format('h:i A');
		$current_date = $now->format('h:i A');
		$ERROR .=  "Your bidding end time $bidding_end_date_new must be at least three hours later then the current time $current_date.<br /> Please adjust accordingly!" ;
		}	
		elseif($bid_end_datetime + 10740 >= $completed_end_datetime)// Add three hours (less 60 seconds) to bid_end_time to make sure completed date is at least 3 hours later
		{
		$bidding_end_date_new = $bid_end->format('l F d, Y h:i A');
		$task_end_date_new = $task_end->format('l F d, Y h:i A');
		$ERROR .=  "Your task completion date $task_end_date_new must be at least three hours later<br />then the bidding end date $bidding_end_date_new.<br /> Please adjust accordingly!" ;
		}
// Check to make sure bid date and task completion date are not out of whack
}else{
$ERROR = $ERROR."Please check your task completion times and/or bidding completion times, something appears to be missing<br/>";
}	
if($_POST['en_project_city'] == ''){	
$ERROR = $ERROR."You Need to Provide a Valid City, State Zip for the Task<br/>";
}
if($_POST['cat_prod'] == ''){	
$ERROR = $ERROR."Please Choose A Category For Your Task<br/>";
}
if($_POST['dev'] == ''){	
$ERROR = $ERROR."You'll Need Provide A Budget Range For Your Task<br/>";
}
if($_POST['agree1'] == ''){	
$ERROR = $ERROR."You must agree to the Task Sonic Terms & Conditions in order to post your task<br/>";
}

// Check to see if we can Geo Code the Address
				$location = $_POST["en_project_city"];
				$key = $config[WC_MAP_KEY];
				$address = urlencode("$location");

				//$url = "http://maps.google.com/maps/geo?q=".$address."&output=json&key=".$key;
				$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=".$key;
				$ch = curl_init();
				//curl_setopt($ch, CURLOPT_URL, $url);
				//curl_setopt($ch, CURLOPT_HEADER,0);
				//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
				//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				$data = curl_exec($ch);
				curl_close($ch);
				$geo_json = json_decode($data, true);
				
				if ($geo_json['Status']['code'] == '200') {
				$precision = $geo_json['Placemark'][0]['AddressDetails']['Accuracy'];
				$longitude = $geo_json['Placemark'][0]['Point']['coordinates'][0];
				$latitude = $geo_json['Placemark'][0]['Point']['coordinates'][1];
				} else {
				$ERROR = $ERROR.= "The address $location could not be geocoded, please check to make sure it is correct, City, State Zip";
				} 
//End // Check to see if we can Geo Code the Address		


/// check file size of file 1
		if($HTTP_POST_FILES['project_file_1']['size'] > 1048576 )
		{
			$ERROR = $ERROR."You can't upload 1st file more than 5 KB Size";
		}
		/// check file size of file 2
		if($HTTP_POST_FILES['project_file_2']['size'] > 1048576 )
		{
			$ERROR = $ERROR."<br> You can't upload 2nd file more than 5 KB Size";
		}
		/// check file size of file 3
		if($HTTP_POST_FILES['project_file_3']['size'] > 1048576 )
		{
			$ERROR = $ERROR."<br> You can't upload 3rd file more than 5 KB Size";
		}
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
		//// if no error in file size or other than
		if($ERROR == "")
		{


			###########################################################################################
			#####		calulate min required wallet sum
			$required_wallet_sum = 0;
			$required_wallet_sum = $required_wallet_sum + $config[WC_FEES_OF_POST_project];
			###########################################################################################
	
			###############################################################################################
			#####		check which project is selected first
			###############################################################################################
			if($_POST['premium_project'] == 1)		// if premium project is selected
			{
				$required_wallet_sum = $required_wallet_sum + $config[WC_PREMIUM_project];
			}
			if($_POST['urgent_project'] == 1)		// if urgent project is selected
			{
				$required_wallet_sum = $required_wallet_sum + $config[WC_URGENT_project];
			}
	
			###############################################################################################
			#####		bad word detection
			$en_project_title 	 		= addslashes(badWordDetect($_POST['en_project_title']));
			$en_project_description     = addslashes(badWordDetect($_POST['en_project_description']));
			$en_project_location     	= addslashes(badWordDetect($_POST['en_project_location']));
			$en_project_city     		= addslashes(badWordDetect($_POST['en_project_city']));			
			###############################################################################################
	
			###############################################################################################
			#####		check if user is special user or not
			$ret = $others->getUserDetails(md5($_SESSION['User_Name']));
			#####		check if user is VIP user or not
			$task_owner_vip = Check_Vip_User($_SESSION['User_Name']);
			
			###############################################################################################
			if($ret->special_user == 1)		// if user is special user than no deposit required
			{
				###########################################################################################
				#####		post task for special users
				
				if($HTTP_POST_FILES['project_file_1']['name'] != '')
				{
					$project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
				}
				if($HTTP_POST_FILES['project_file_2']['name'] != '')
				{
					  $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
				}
				if($HTTP_POST_FILES['project_file_3']['name'] != '')
				{
					$project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
				}
	
				$paypal_id					=	0;
				$premium_transaction_id		=	0;
				$urgent_transaction_id		=	0;
				$project_posted = $project->Check_project($_SESSION['User_Id']);
				$project_free				=	0;
				
				$insertid = $project->Insert($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
								$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
								$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
				
				###########################################################################################
			}elseif($task_owner_vip == 1){ ##### If task owner is a VIP member at time of post no fee required
			
					if($HTTP_POST_FILES['project_file_1']['name'] != '')
					{
						$project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
					}
					if($HTTP_POST_FILES['project_file_2']['name'] != '')
					{
						  $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
					}
					if($HTTP_POST_FILES['project_file_3']['name'] != '')
					{
						$project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
					}
					/// VIP Task Owner so task posting is free
					$paypal_id					=	0;
					$premium_transaction_id		=	0;
					$urgent_transaction_id		=	0;
					$project_free				=	0;
					
					$insertid = $project->Insert($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
									$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
									$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);			
			}else{	// if user is not a VIP user move on

			    ###########################################################################################
				#####	If this is the Task Owners First Posted Task its free
				$project_posted = $project->Check_project($_SESSION['User_Id']);

				if($project_posted == 1)
				{
					if($HTTP_POST_FILES['project_file_1']['name'] != '')
					{
						$project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
					}
					if($HTTP_POST_FILES['project_file_2']['name'] != '')
					{
						  $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
					}
					if($HTTP_POST_FILES['project_file_3']['name'] != '')
					{
						$project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
					}
					/// free project posting for first user
					$paypal_id					=	0;
					$premium_transaction_id		=	0;
					$urgent_transaction_id		=	0;
					$project_free				=	1;
					
					$insertid = $project->Insert($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
									$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
									$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
				}
				###########################################################################################
	
				###########################################################################################
				#####	If Task Not Free Move On Through Conditions
				else
				{

					###########################################################################################
	
					###########################################################################################

						if($HTTP_POST_FILES['project_file_1']['name'] != '')
						{
							$project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
						}
						if($HTTP_POST_FILES['project_file_2']['name'] != '')
						{
							  $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
						}
						if($HTTP_POST_FILES['project_file_3']['name'] != '')
						{
							$project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
						}
						###########################################################################################
						#####	If the task is premium only
						if($_POST['premium_project'] == 1 && $_POST['urgent_project'] != 1)
						{
							//print("prem");die;
							////compare minimum amount 
							$minimum = number_format($_POST['amount'] -  number_format($required_wallet_sum,2),2);
							//print_r($_POST['amount']);die;
							###########################################################################################
							#####		if amount goes in negative than show error
							if($minimum < 0)		// if amount is minimum than show error message.
							{
							//Temporarily save the task posted by user to allow them time to add to their balance
							$project_free = 0;
							$paypal_id = ""; // Not recorded since payment has not taken place yet
							$premium_transaction_id = ""; // Not recorded since payment has not taken place yet
							$urgent_transaction_id = ""; // Not recorded since payment has not taken place yet
							$stageid = $project->Stage_For_Payment($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							// Send email notificaton to give a link back to the task for publishing		
									global $mail2;
									$mail2 = '';
									$mail2 = new htmlMimeMail();
									
									$tpl2 = new Smarty;
									$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
									
									$sendinfo = $emails->GetEmailDetails1(TASK_STAGED);
									
									$mail2->setSubject($sendinfo->email_subject);
									$mail2->setFrom($sendinfo->email_adress);
									
									$tpl2->assign(array("user_name"               =>  $_SESSION['User_Name'],
														"lang"			   =>  $lang,
														"task_title"       =>  $en_project_title,
														"task_cost"        => $required_wallet_sum,														
														"how_short"        =>  $minimum,
														"task_link"        =>  '<a href="' . $site_url . '/staged_task_' . $stageid . '_'. clean_url($en_project_title) . '.html">' . $en_project_title . '</a>',		
												));
							
									$mail_content_reg 	 = $tpl2->fetch("email_template:".TASK_STAGED);			
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
									$send_to = GetEmailAddress(md5($_SESSION['User_Name']));
									$result = $mail2->send(array($send_to));							
							// Redirect to insufficient balance page				
								header("location: make-deposit_".$required_wallet_sum."_".$minimum."_".$stageid.".html");	
								exit(0);
							}
							###########################################################################################
							else
							{
							//	Generate unique transaction id to tie the records together
							srand((double)microtime()*1000000);
							$transaction_id = md5(uniqid(rand())) . '-' . time();	
							//print("else");die;
							$wallet = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet = $wallet - $config[WC_FEES_OF_POST_project];
	
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet); 
							
							$desc = $lang["Post_project"]."<br /><strong> ".$en_project_title."</strong>";
							$paypal_id = $project->Insert_Post_project_Fees($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_FEES_OF_POST_project],$en_project_title,$transaction_id,$desc);
							
							$wallet1 = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet1 = $wallet1 - $config[WC_PREMIUM_project];
	
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet1); 
							$premium_desc = $lang["Premium_project"]."<br /><strong> ".$en_project_title."</strong>";
							$premium_transaction_id = $project->Insert_Post_project_Fees_Premium($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_PREMIUM_project],$en_project_title,$transaction_id,$premium_desc);
	
							$urgent_transaction_id = "";
							$project_free = 0;
	
							$insertid = $project->Insert($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							}				
						}
						###########################################################################################
	
						###########################################################################################
						#####		if urgent project only
						if($_POST['premium_project'] != 1 && $_POST['urgent_project'] == 1)
						{
							////compare minimum amount 
							$minimum = number_format($_POST['amount'] -  number_format($required_wallet_sum,2),2);
							###########################################################################################
							#####		if amount goes in negative than show error
							if($minimum < 0)		// if amount is minimum than show error message.
							{
							//Temporarily save the task posted by user to allow them time to add to their balance
							$project_free = 0;
							$paypal_id = ""; // Not recorded since payment has not taken place yet
							$premium_transaction_id = ""; // Not recorded since payment has not taken place yet
							$urgent_transaction_id = ""; // Not recorded since payment has not taken place yet
							$stageid = $project->Stage_For_Payment($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							// Send email notificaton to give a link back to the task for publishing		
									global $mail2;
									$mail2 = '';
									$mail2 = new htmlMimeMail();
									
									$tpl2 = new Smarty;
									$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
									
									$sendinfo = $emails->GetEmailDetails1(TASK_STAGED);
									
									$mail2->setSubject($sendinfo->email_subject);
									$mail2->setFrom($sendinfo->email_adress);
									
									$tpl2->assign(array("user_name"               =>  $_SESSION['User_Name'],
														"lang"			   =>  $lang,
														"task_title"       =>  $en_project_title,
														"task_cost"        => $required_wallet_sum,														
														"how_short"        =>  $minimum,
														"task_link"        =>  '<a href="' . $site_url . '/staged_task_' . $stageid . '_'. clean_url($en_project_title) . '.html">' . $en_project_title . '</a>',	
												));
							
									$mail_content_reg 	 = $tpl2->fetch("email_template:".TASK_STAGED);			
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
									$send_to = GetEmailAddress(md5($_SESSION['User_Name']));
									$result = $mail2->send(array($send_to));							
							// Redirect to insufficient balance page				
								header("location: make-deposit_".$required_wallet_sum."_".$minimum."_".$stageid.".html");	
								exit(0);
							}
							###########################################################################################
							else
							{
							//	Generate unique transaction id to tie the records together
							srand((double)microtime()*1000000);
							$transaction_id = md5(uniqid(rand())) . '-' . time();	
							
							$wallet = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet = $wallet - $config[WC_FEES_OF_POST_project];
	
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet); 
							$desc = $lang["Post_project"]."<br /><strong> ".$en_project_title."</strong>";
							$paypal_id = $project->Insert_Post_project_Fees($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_FEES_OF_POST_project],$en_project_title,$transaction_id,$desc);
							
							$wallet1 = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet1 = $wallet1 - $config[WC_URGENT_project];
	
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet1); 
							$urgent_desc = $lang["Urgent_project"]."<br /><strong> ".$en_project_title."</strong>";
							$urgent_transaction_id = $project->Insert_Urgent_project_Fees($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_URGENT_project],$en_project_title,$transaction_id,$urgent_desc);
	
							$premium_transaction_id = "";
							$project_free = 0;

	
							$insertid = $project->Insert($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							}				
						}
						###########################################################################################
	
						###########################################################################################
						#####		if premium and urgent project
						if($_POST['premium_project'] == 1 && $_POST['urgent_project'] == 1)
						{
							////compare minimum amount 
							$minimum = number_format($_POST['amount'] -  number_format($required_wallet_sum,2),2);
							###########################################################################################
							#####		if amount goes in negative than show error
							if($minimum < 0)		// if amount is minimum than show error message.
							{
							//Temporarily save the task posted by user to allow them time to add to their balance
							$project_free = 0;
							$paypal_id = ""; // Not recorded since payment has not taken place yet
							$premium_transaction_id = ""; // Not recorded since payment has not taken place yet
							$urgent_transaction_id = ""; // Not recorded since payment has not taken place yet
							$stageid = $project->Stage_For_Payment($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							// Send email notificaton to give a link back to the task for publishing		
									global $mail2;
									$mail2 = '';
									$mail2 = new htmlMimeMail();
									
									$tpl2 = new Smarty;
									$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
									
									$sendinfo = $emails->GetEmailDetails1(TASK_STAGED);
									
									$mail2->setSubject($sendinfo->email_subject);
									$mail2->setFrom($sendinfo->email_adress);
									
									$tpl2->assign(array("user_name"               =>  $_SESSION['User_Name'],
														"lang"			   =>  $lang,
														"task_title"       =>  $en_project_title,
														"task_cost"        => $required_wallet_sum,														
														"how_short"        =>  $minimum,
														"task_link"        =>  '<a href="' . $site_url . '/staged_task_' . $stageid . '_'. clean_url($en_project_title) . '.html">' . $en_project_title . '</a>',	
												));
							
									$mail_content_reg 	 = $tpl2->fetch("email_template:".TASK_STAGED);			
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
									$send_to = GetEmailAddress(md5($_SESSION['User_Name']));
									$result = $mail2->send(array($send_to));							
							// Redirect to insufficient balance page				
								header("location: make-deposit_".$required_wallet_sum."_".$minimum."_".$stageid.".html");	
								exit(0);
							}
							###########################################################################################
							else
							{
							//	Generate unique transaction id to tie the records together
							srand((double)microtime()*1000000);
							$transaction_id = md5(uniqid(rand())) . '-' . time();	
							
							$wallet = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet = $wallet - $config[WC_FEES_OF_POST_project];
							
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet); 
							
							$desc = $lang["Post_project"]."<br /><strong> ".$en_project_title."</strong>";

							$paypal_id = $project->Insert_Post_project_Fees($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_FEES_OF_POST_project],$en_project_title,$transaction_id,$desc);
							
							$wallet2 = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet2 = $wallet2 - $config[WC_URGENT_project];
							
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet2); 
							$urgent_desc = $lang["Urgent_project"]."<br /><strong> ".$en_project_title."</strong>";
							$urgent_transaction_id = $project->Insert_Urgent_project_Fees($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_URGENT_project],$en_project_title,$transaction_id,$urgent_desc);
							
							$wallet1 = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet1 = $wallet1 - $config[WC_PREMIUM_project];
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet1); 

							$premium_desc = $lang["Premium_project"]."<br /><strong> ".$en_project_title."</strong>";
							$premium_transaction_id = $project->Insert_Post_project_Fees_Premium($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_PREMIUM_project],$en_project_title,$transaction_id,$premium_desc);
							
							$project_free = 0;
							
							$insertid = $project->Insert($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							}				
						}
						###########################################################################################
	
						###########################################################################################
						#####		if premium and urgent not selected   (standard project)
						if($_POST['premium_project'] != 1 && $_POST['urgent_project'] != 1)
						{

							////compare minimum amount 
							$minimum = number_format($_POST['amount'] -  number_format($required_wallet_sum,2),2);
							###########################################################################################
							#####		if amount goes in negative than show error
							if($minimum < 0)		// if amount is minimum than show error message.
							{
							//Temporarily save the task posted by user to allow them time to add to their balance							
							$project_free = 0;
							$paypal_id = ""; // Not recorded since payment has not taken place yet
							$premium_transaction_id = ""; // Not recorded since payment has not taken place yet
							$urgent_transaction_id = ""; // Not recorded since payment has not taken place yet
							$stageid = $project->Stage_For_Payment($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							// Send email notificaton to give a link back to the task for publishing		
									global $mail2;
									$mail2 = '';
									$mail2 = new htmlMimeMail();
									
									$tpl2 = new Smarty;
									$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
									
									$sendinfo = $emails->GetEmailDetails1(TASK_STAGED);
									
									$mail2->setSubject($sendinfo->email_subject);
									$mail2->setFrom($sendinfo->email_adress);
									
									$tpl2->assign(array("user_name"        =>  $_SESSION['User_Name'],
														"lang"			   =>  $lang,
														"task_title"       =>  $en_project_title,
														"task_cost"        =>  $required_wallet_sum,														
														"how_short"        =>  $minimum,
														"task_link"        =>  '<a href="' . $site_url . '/staged_task_' . $stageid . '_'. clean_url($en_project_title) . '.html">' . $en_project_title . '</a>',														
	
												));
							
									$mail_content_reg 	 = $tpl2->fetch("email_template:".TASK_STAGED);			
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
									$send_to = GetEmailAddress(md5($_SESSION['User_Name']));
									$result = $mail2->send(array($send_to));							
							// Redirect to insufficient balance page				
								header("location: make-deposit_".$required_wallet_sum."_".$minimum."_".$stageid.".html");	
								exit(0);
							}
							###########################################################################################
							else
							{
													
							//	Generate unique transaction id to tie the records together
							srand((double)microtime()*1000000);
							$transaction_id = md5(uniqid(rand())) . '-' . time();	
							
							$wallet = Select_wallet_sum($_SESSION['User_Id']);
							$new_wallet = $wallet - $config[WC_FEES_OF_POST_project];
	
							Update_wallet_sum($_SESSION['User_Id'],$new_wallet); 
							$desc = $lang["Post_project"]."<br /><strong> ".$en_project_title."</strong>";
							$paypal_id = $project->Insert_Post_project_Fees($_SESSION['User_Id'],$_SESSION['User_Name'],$config[WC_FEES_OF_POST_project],$en_project_title,$transaction_id,$desc);							 

							$urgent_transaction_id = "";
							$premium_transaction_id = "";
							$project_free = 0;
	
							$insertid = $project->Insert($_POST,$_SESSION['User_Name'],$project_file_1,$project_file_2,$project_file_3,
											$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,
											$urgent_transaction_id,$project_free,$en_project_location,$en_project_city,$latitude,$longitude,$citycurrent);
							}				
						}
						###########################################################################################
					//}
					###########################################################################################
				}
				###########################################################################################
			}
			$project->Update_Category_Count($_POST['cat_prod']); // update category count
			
			///////send mail of confirmation to project poster		
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(EMAIL_TO_POST_TASK);
			
			$mail2->setSubject($sendinfo->email_subject);
			$mail2->setFrom($sendinfo->email_adress);
			
			$tpl2->assign(array("user_name"               =>  $_SESSION['User_Name'],
								"lang"					  =>  $lang,
								"en_project_title"        =>  $en_project_title,
								"post_project_fee"        =>  ($ret->special_user == 1)?'0':$config[WC_FEES_OF_POST_project],
								"flag"                    =>  ($_POST['premium_project'] == 1 )?1:0,
								"urgent"                  =>  ($_POST['urgent_project'] == 1 )?1:0, 
								"premium_fees"			  =>  $config[WC_PREMIUM_project],	
								"urgent_fees"			  =>  $config[WC_URGENT_project],
								"task_link"        =>  '<a href="' . $site_url . '/task_' . $insertid . '_'. clean_url($en_project_title) . '.html">' . $en_project_title . '</a>',								
						));
	
			$mail_content_reg 	 = $tpl2->fetch("email_template:".EMAIL_TO_POST_TASK);			
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
			$send_to = GetEmailAddress(md5($_SESSION['User_Name']));
			$result = $mail2->send(array($send_to));
			

			// Publish to latest_activity table for display on logged_in_home.tpl			
			$task_owner = $_SESSION['User_Name'];
			$activity_type = "New Task";
			$description = '<a href="task_owner_profile_' . $task_owner . '.html">' . $task_owner . '</a> just posted the task "'.$en_project_title.'" on '.$Site_Title. ' in ' .$citycurrent;
			$activity_link = "task_".$insertid."_".clean_url($en_project_title).".html";
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish to latest_activity table for display on logged_in_home.tpl

			
			//////////////////////////////////////////
			///////// Publish to facebook
			//////////////////////////////////////////
			$retuser = $user->getauthUserDetails(md5($_SESSION['User_Name']));
			$fbid = $retuser->fbid;
			$fb_publish = $retuser->fb_publish;
			$retnewproject = $project->Getproject($insertid);
			// Convert special characters for Facebook
			$new_project_title = stripslashes($retnewproject->project_title);			
			$project_description = stripslashes($retnewproject->project_description);
			$user_name = $_SESSION['User_Name'];
						if($fb_publish ==1 && $fbid){				
							// Session based API call.		
							if($session){
									// Publish to user wall as user
									try { 
									$facebook->api('/me/feed','post', array('message'=>'I just posted the task "'.$new_project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$new_project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => "Check out my new task!", 'description'=>$project_description, 'link'=>$virtual_path['Site_Root']."task_".$insertid."_".clean_url($en_project_title).".html", 'actions' => array(array('name' => 'Bid On My Task', 'link' => $virtual_path['Site_Root']."task_".$insertid."_".clean_url($en_project_title).".html"))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just posted the task "'.$new_project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$new_project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => "Check out my new task!", 'description'=>$project_description, 'link'=>$virtual_path['Site_Root']."task_".$insertid."_".clean_url($en_project_title).".html", 'actions' => array(array('name' => 'Bid On My Task', 'link' => $virtual_path['Site_Root']."task_".$insertid."_".clean_url($en_project_title).".html"))));
										  } catch (FacebookApiException $e) {
											error_log($e);											
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
					
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. "'s " .$user_name .' just posted the task "'.$new_project_title.'" on '.$Site_Title. ' in ' .$citycurrent, 'name'=>$new_project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => "Check out their new task!", 'description'=>$project_description, 'link'=>$virtual_path['Site_Root']."task_".$insertid."_".clean_url($en_project_title).".html", 'actions' => array(array('name' => "Bid On " .$user_name. "'s Task", 'link' => $virtual_path['Site_Root']."task_".$insertid."_".clean_url($en_project_title).".html"))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}										
						} // end if $fb_publish && $fbid									
			//Publish to facebook
			
			//////////////////////////////////////////
			///////// invite user to bid on mail
			//////////////////////////////////////////
			if($_POST['user_name'] != "")
			{
				global $mail2;
				$mail2 = '';
				$mail2 = new htmlMimeMail();
				
				$tpl2 = new Smarty;
				$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
				
				
				$sendinfo = $emails->GetEmailDetails1(INVITE_FRIEND_FOR_BIDDING_ON_TASK);
				
				$mail2->setSubject($sendinfo->email_subject);
				$mail2->setFrom($sendinfo->email_adress);
				
				$tpl2->assign(array("lang"					  =>  $lang,
									"tasker"                  =>  $_POST['user_name'],
									"en_project_title"        =>  $en_project_title,
									"project_link"  		  =>  "<a href=".$virtual_path['Site_Root']."task_".$project_id."_".clean_url($en_project_title).".html>".$en_project_title."</a>", 
									"task_creator_link"    =>  "<a href=".$virtual_path['Site_Root']."tasker_profile_".$_SESSION['User_Name'].".html>".$_SESSION['User_Name']."</a>", 
							));
							
				$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
				$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
				$mail_content_reg = $tpl2->fetch("email_template:".INVITE_FRIEND_FOR_BIDDING_ON_TASK);	
				
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
						
				$send_to = GetEmailAddress(md5($_POST['user_name']));
				$result = $mail2->send(array($send_to));						
			}
						
			header("location: task_post_success.html");	
			exit(); 
		}
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
		/// if any error in file size than
		else
		{
			$Action = A_VIEW;
		}
	}
	else
	{
	    header("location: session_expried.php");	
		exit(); 
	}	
}
if($Action == ''|| $Action == A_VIEW)
{
	if ($_GET['project']=='false')
		 $SuccMsg = $lang['Post_Msg'];
		 
	$totalamount = Select_wallet_sum($_SESSION['User_Id']);
	
	$inwallet	= str_replace(",","",$totalamount);

	if($_SESSION['User_Id'] == md5($_GET['user_name']))
	{
		$SuccMsg = $lang['Error_Msg'];
	}		 	 
		
    $result2 = $development->View_Development_Order();
	$Development_List	=	fillDbCombo($result2,'development_id','development_title',$_POST['dev']);
	
	$free = $project->Check_project($_SESSION['User_Id']); // free returns 0 if this is not my first posted task and returns 1 if this is my first posted task
	
	###############################################################################################
	#####		check if user is special user or not
	$ret = $others->getUserDetails(md5($_SESSION['User_Name']));
	#####		check if user is VIP user or not
	$task_owner_vip = Check_Vip_User($_SESSION['User_Name']);

			if($ret->special_user == 1)		// if user is special user than no deposit required
			{
				$special_user = 1;
			}else{
				$special_user = 0;
			}
			if($task_owner_vip == 1)
			{
				$task_owner_vip = 1;
			}else{
				$task_owner_vip = 0;
			}			

	if($free == 1)
	{
	   $flag = 1;
	}
	elseif($free == 0)
	{
	   $flag = 0;
	}
	
	$needed_to_purchase = $required_wallet_sum + $config[WC_FEES_OF_POST_project];
	$how_short = number_format($inwallet -  number_format($needed_to_purchase,2),2);
	
	$profile = $user->GetUserComplete($_SESSION['User_Id']); // get the users profile info so we can get their address

	$profile_address1 = $profile->mem_address;
	$profile_address2 = $profile->mem_city . ', ' . $profile->state_name . ' ' . $profile->mem_zip_code ;
	
	$tpl->assign(array(	"T_Body"			  => 'post_task'. $config['tplEx'],
						"JavaScript"		  =>  array("post_task.js"),
						"lang"				  =>  $lang,
						"Development_List"	  =>  $Development_List,
						"sucmsg"              =>  $SuccMsg,
						"User_Id"             =>  $_SESSION['User_Id'], 
						"user_name"           =>  $_GET['user_name'],
						"Recevier_id"         =>  md5($_GET['user_name']),
						"amount"              =>  $inwallet, 
						"Bidding_List"        =>  fillArrayCombo($lang['days_for_bidding'],$_POST['bidding']),
						"Completed_List"      =>  fillArrayCombo($lang['task_completed_dates'],$_POST['completed_by']),
						"Time_List"      	  =>  fillArrayCombo($lang['time_of_day'],$_POST['bidding_time']),
						"Time_List2"      	  =>  fillArrayCombo($lang['time_of_day'],$_POST['completed_time']),
						"Tasker_Expenses_List" =>  fillArrayCombo($lang['Expenses'],$_POST['tasker_expenses']),
						"ERROR"				  =>  $ERROR,
						"flag"				  =>  $flag,
						"special_user"		  =>  $special_user,
						"task_owner_vip"	  =>  $task_owner_vip,						
						"free"				  =>  $free,						
						"Premium_Fees"		  =>  $config[WC_PREMIUM_project],
						"Urgent_Fees"		  =>  $config[WC_URGENT_project],
						"needed_to_purchase"  =>  $needed_to_purchase,
						"how_short"  		  =>  $how_short,
						"project_hide" 	  	  => ($_POST['project_hide'] == 1) ? 'checked' : '',
						"project_allow_bid"   => ($_POST['project_allow_bid'] == 1) ? 'checked' : '',
						"premium_project"  	  => ($_POST['premium_project'] == 1) ? 'checked' : '',
						"urgent_project"  	  => ($_POST['urgent_project'] == 1) ? 'checked' : '',
						"project_online"  	  => ($_POST['project_online'] == 1) ? 'checked' : '',						
						"profile_address1"			=> $profile_address1,
						"profile_address2"			=> $profile_address2,							
					
					));
	$results = $cats->Get_Category_Listing();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f('cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$arr_disp_title[$i]			= $db->f('disp_title');
		$arr_sub_cat[$i]			= $cats->GetCategorybyParent($db->f('cat_id'));
		$i++;
	}	
	
	$navigation			=	'<label class=navigation>'.$lang['Post_Proj'].'</label>';
	
	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
 					   "sub_cat"   			=>	$arr_sub_cat,
 					   "disp_title"   		=>	$arr_disp_title,					   
					   "Loop"				=>	$rscnt,
					   "tab"				=>  4,	
					   "selected_cat"			=>	$selected_cat,
					  
					));	
}					
$tpl->display('default_layout'. $config['tplEx']);
?>