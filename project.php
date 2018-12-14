<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Email.php');

include_once($physical_path['Site_Lang'].'/project.php');
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
	header("location: project_".$_POST['project_id']."_".$clear_title.".html#bid_list");
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
	
	$send_to = GetEmailAddress(md5($details->bid_by_user));
	
	$result = $mail2->send(array($send_to));
	
    $val = $seller->Delete($_POST['bid_id']);
	//header("location: project_".$_POST['project_id'].".html#bid_list");
	header("location: project_".$_POST['project_id']."_".clean_url($details->project_title).".html#bid_list");
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
			
			// get geo location
			$longitude = "";
$latitude = "";
$precision = "";

//Three parts to the querystring: q is address, output is the format (
$key = "ABQIAAAAoEP_1EsdlCLyI8rJbTagVxQmEmvkEfQYNQSqQxHym0z267Un4BSQ63v77s_EFY1bJMVcE3cmUm-71A";
$address = urlencode("$ret->location");
$url = "http://maps.google.com/maps/geo?q=".$address."&output=json&key=".$key;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$data = curl_exec($ch);
curl_close($ch);

$geo_json = json_decode($data, true);

//print_r($geo_json);

if ($geo_json['Status']['code'] == '200') {

$precision = $geo_json['Placemark'][0]['AddressDetails']['Accuracy'];
$longitude = $geo_json['Placemark'][0]['Point']['coordinates'][0];
$latitude = $geo_json['Placemark'][0]['Point']['coordinates'][1];

//echo "Precision: $precision \n";
//echo "Latutide: $latitude \n";
//echo "Longitude: $longitude \n";

} else {
//echo "Error in geocoding! Http error ".substr($data,0,3);
}

//finish getting geo location
			
			
			
			
			
			
			
			
			
			
			$tpl->assign(array(	"T_Body"					=>	'project'. $config['tplEx'],
								"JavaScript"				=>	array('project.js'),
			
								"Site_Title"				=>	stripslashes($ret->project_title)." ( ".Get_Cat_Names_project($ret->project_category)." )",
								"clear_title"				=>	clean_url($ret->project_title),
								"membership_id"				=>	$ret->membership_id,
								"project_id"				=>	$ret->project_id,
								"project_hide"				=>	$ret->project_hide,	
								"project_allow_bid"			=>	$ret->project_allow_bid,
								"project_posted_by"			=>	$ret->project_posted_by,
								"project_status"			=>	$ret->project_status,
								"project_location"			=>	$ret->location,
								"project_latitude"			=>	$latitude,
								"project_longitude"			=>	$longitude,
								"premium_project"           =>  $ret->premium_project, 
								"user_id"	                =>  $ret->auth_id_of_post_by,
								"project_title"				=>	stripslashes($ret->project_title),	
								"project_description"		=>	stripslashes(nl2br($ret->project_description)),	
								"project_file_1"			=>	substr($ret->project_file_1,25),
								"project_file_2"			=>	substr($ret->project_file_2,25),	
								"project_file_3"			=>	substr($ret->project_file_3,25),	
								"project_budget"			=>	$ret->development_title,	
								"project_posted_date"		=>	formatDate($ret->project_posted_date,'d-m-Y'),
			
								"filepath"               	=>  $virtual_path['project'], 
			
								"project_post_to"			=>	$ret->project_post_to,	
								"project_level"				=>	$ret->project_level,	
								"project_status"			=>	$ret->project_status,	
			
								"download_project_file_1"	=>	$ret->project_file_1,
								"download_project_file_2"	=>	$ret->project_file_2,
								"download_project_file_3"	=>	$ret->project_file_3,
								"categories"				=>  Get_Cat_Names_project($ret->project_category),
								
								));
								
				$ave_rating = number_format($buyer->Average_Buyer_Rating($ret->project_posted_by),2);		
	
				$tpl->assign(array(	
										"ave_rating"		  => $ave_rating,	
					));						
				$reviews =	$buyer->Average_Buyer_Rating_Count($ret->project_posted_by);	
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
				$str = $_SERVER['HTTP_REFERER'];
	
				$str1 = substr(strrchr($str,'/'),1);
	
				
				if($str1 == "all_projects.php")
				 {
					$navigation1 = '<label class=navigation>'.stripslashes($ret->project_title).'</label>';
					$navigation  = '<a href=all_projects.php class=footerlink>'.$lang['Find_project'].'</a>';
				 }	
				 else if($str1 == "my-account.html")
				 {
					$navigation1 = '<label class=navigation>'.stripslashes($ret->project_title).'</label>';
					$navigation  = '<a href=all_projects.php class=footerlink>'.$lang['Buyer_Activity'].'</a>';
				 }
				  else if($str1 == "my-posted-tasks.html")
				 {
					$navigation  = '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>';
					$navigation1 = '<a href=my-posted-tasks.html class=footerlink>'.$lang['View_My_All_project'].'</label>';
					$navigation2 = '<label class=navigation>'.stripslashes($ret->project_title).'</label>';
				 }		
				 else
				 {
					$navigation			=	'<label class=navigation>'.stripslashes($ret->project_title).'</label>';
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
								
								
				$result = $project->Get_Bids_By_Id($_GET['id']);	
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
					$i++;
				}	
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