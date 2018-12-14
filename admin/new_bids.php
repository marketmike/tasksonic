<?php
#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include($physical_path['DB_Access']. 'Bid.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');

include EDITOR_ROOT. 'spaw_control.class.php';

#=======================================================================================================================================
# Define the action
#---------------------------------------------------------------------------------------------------------------------------------------
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');

# Initialize object
$bids 			= new Bid();
$project 		= new project();
$emails 		= new Email();

if($_POST['Submit'] == 'Cancel')
{
	header("location: new_bids.php");
	exit(0);
}
if($Action == 'Edit' && $_POST['Submit'] == 'Save')
{

	$bids->Update_bid_Status($_POST);
	########  Mail for activate your bid to bid user
	if($_POST['bid_visible'] == 1)
	{
	$member = $admins->GetMemberDetails(md5($_POST['user_name']));
	
	$set1 = $project->Getproject($_POST['project_id']);
	
	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();

	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

	
	$sendinfo = $emails->GetEmailDetails1(ACTIVATE_BID_ON_TASK);
	
	$mail2->setFrom($sendinfo->email_adress);
	
	$set1 = $project->Getproject($_POST['project_id']);

	$subject_text = ereg_replace("%project_title%",$set1->project_title,$sendinfo->email_subject);

	$mail2->setSubject($subject_text);
	
	$tpl2->assign(array(
						"user_name"			   =>  	$_POST['user_name'],
						"project_name"         =>  "<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id'].".html>".$set1->project_title."</a>",
					));
					
			$mail_content_reg = $tpl2->fetch("email_template:".ACTIVATE_BID_ON_TASK);	
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
	$result = $mail2->send(array($member->mem_email));

	########  If Notify me Option is selected then Mail to bid user
	
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
						"bider_name"           =>  "<a href=".$virtual_path['Site_Root']."tasker_profile_".$_POST['user_name'].".html>".$_POST['user_name']."</a>",  
						"link"  		       =>  "<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id'].".html>".$set1->project_title."</a>",  
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
	
	//If user selected notify me by mail when some one place a bid on my project	
	$user_details = $admins->GetChangeUserInfo1($set1->auth_id_of_post_by);

	if($user_details->mem_option == 1)
	{
	  	global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		
		$sendinfo = $emails->GetEmailDetails1(PLACE_BID_ON_TASK);
      	
		$mail2->setFrom($sendinfo->email_adress);
		
		$set1 = $project->Getproject($_POST['project_id']);

		$subject_text = ereg_replace("%project_title%",$set1->project_title,$sendinfo->email_subject);
	
		$mail2->setSubject($subject_text);
		
		$tpl2->assign(array(
							"bid_sender_link"      =>  "<a href=".$virtual_path['Site_Root']."tasker_profile_".$_POST['user_name'].".html>".$_POST['user_name']."</a>",
							"project_link"         =>  "<a href=".$virtual_path['Site_Root']."project_".$_POST['project_id'].".html>".$set1->project_title."</a>",
						));
					
		$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
		
		$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
		
		$mail_content_reg = $tpl2->fetch("email_template:".PLACE_BID_ON_TASK);	
		
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
		$result = $mail2->send(array($user_details->mem_email));
	}
	}
	header("location: new_bids.php");
	exit(0);
}

else if($Action == 'Delete')
{

	
	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();

	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

	
	$sendinfo = $emails->GetEmailDetails1(BID_DELETE_BY_ADMIN);
	
	$mail2->setFrom($sendinfo->email_adress);
	
	$set1 = $project->Getproject($_POST['project_id']);


	$mail2->setSubject($sendinfo->email_subject);
	
	$tpl2->assign(array(
						"user_name"     	   =>  "<a href=".$virtual_path['Site_Root']."tasker_profile_".$_POST['user_name'].".html>".$_POST['user_name']."</a>",
						"project_link"         =>  "<a href=".$virtual_path['Site_Root']."project_".$_POST['project_id'].".html>".$set1->project_title."</a>",
					));
				
	$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
	
	$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
	
	$mail_content_reg = $tpl2->fetch("email_template:".BID_DELETE_BY_ADMIN);	
	
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
	
	$member = $admins->GetMemberDetails(md5($_POST['user_name']));
	$result = $mail2->send(array($member->mem_email));
	$bids->Delete($_POST['bid_id']);
	header("location: new_bids.php?delete=true");
	exit(0);
}



if($Action == 'ShowAll' || $Action=='')
{
	if($_GET['delete'] == 'true')
	{
		$msg = "Bid deleted successfully";	
	}
	$tpl->assign(array("T_Body"					=>	'bid_showall'. $config['tplEx'],
						"JavaScript"			=>  array("new_bids.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$bids->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_bid[$i]['id']				= $db->f('bid_id');
		$arr_bid[$i]['bid_status']		= $db->f('bid_status');
		$arr_bid[$i]['project_id']		= $db->f('project_id');
		$arr_bid[$i]['bid_by_user']		= $db->f('bid_by_user');
		$arr_bid[$i]['bid_amount']		= $db->f('bid_amount');
		$arr_bid[$i]['project_title']	= $db->f('project_title');
		$i++;
	}
	
	$tpl->assign(array(	"arr_bid"		=>	$arr_bid,
						"Loop"			=>	$rscnt,
				));

	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}
elseif($Action == 'Edit')
{
	$info = $bids->GetBidDeatils($_POST['bid_id'],$_POST['project_id']);

	$tpl->assign(array( "T_Body"				=>	'edit_new_bids'. $config['tplEx'],
						"Action"				=>   $Action,
						"user_name"				=>   $info->bid_by_user,
						"bid"					=>   $info->bid_amount,
						"delivery"				=>   $info->delivery_within,
						"bid_id"				=>	 $_POST['bid_id'],	
						"project_id"			=>   $_POST['project_id'],
						"bid_status"			=>   ($info->bid_status == 1) ? 'checked' : '',
						"notification_alert"	=>   $info->notification_alert,
						));
			$sw = new SPAW_Wysiwyg('dec' /*name*/,		$info->bid_desc/*value*/,
				   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
				   '750px' /*width*/, '100px' /*height*/);					   
				   
				   
		$tpl->assign("EN_Page_Editor", $sw->getHtml());

}

$tpl->display('default_layout'. $config['tplEx']);
?>