<?php
#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include_once($physical_path['Site_Lang']. '/common.php');
include_once($physical_path['DB_Access']. 'Newletter.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Cronjobs.php');

#=======================================================================================================================================
# Define the action
#---------------------------------------------------------------------------------------------------------------------------------------
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');
$user_ids = isset($_GET['user_auth_id']) ? $_GET['user_auth_id'] : (isset($_POST['user_auth_id']) ? $_POST['user_auth_id'] : 'ShowAll');
# Initialize object

$emails 	= 	 new Email();
$newsletter = new Newletter();
$cron 	 = new Cronjobs();
### Send the newsletter to pipeline ###

if($_POST['Submit'] == 'Send')
{

	$member_details = $cron->all_newsletter_subscribe();//changes
	$cnt = $db3->num_rows();	// get num of rows
	$i=0;
		
	while($db3->next_record())		// loop till last record
	{
		$member_info[$i]['mem_email']	= $db3->f('mem_email');
		$member_email 					=	 $member_info[$i]['mem_email'];

  		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_SEND_USER);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$subject_text = 'New At Task Sonic!';

		$newsletter->Newletter();
		$rscnt = $db->num_rows();
		
		$j=0;
		while($db->next_record())
		{
			$mail_content_reg =  $mail_content_reg.$db->f('news_description').'<br />';
			$j++;
		}		
				
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
		
		$cron->Insert_In_PipeMail($member_email,$sendinfo->email_adress,$subject_text,$mail_html);
		$i++;
	}	
	header("location: newsletter_send.php?send=true");
	exit();
}
if($_GET['send'] == 'true')
{
	$tpl->assign(array("newsletter_sent"	=>	'Newsetter Sent',));
}
if($_GET['fetch'] == 'true'){
### Preview The Newsletter   
  		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_SEND_USER);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject('New At Task Sonic!');


				$newsletter->Newletter();
				$rscnt = $db->num_rows();
				
				$h=0;
				while($db->next_record())
				{
					$mail_content_reg =  $mail_content_reg.$db->f('news_description').'<br />';
					$h++;
				}		
			
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
		
	$tpl->assign(array(
						"T_Body"			=>	'newsletter_fetch'. $config['tplEx'],
						"Action"			=>	$Action,
						"preview"			=>	$mail_html,						
						));
$tpl->display('default_layout_blank'. $config['tplEx']);
}elseif($_GET['viewhtml'] == 'true'){
### Preview The Newsletter   
  		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_SEND_USER);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject('New At Task Sonic!');


				$newsletter->Newletter();
				$rscnt = $db->num_rows();
				
				$h=0;
				while($db->next_record())
				{
					$mail_content_reg =  $mail_content_reg.$db->f('news_description').'<br />';
					$h++;
				}		
			
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
		
	$tpl->assign(array(
						"T_Body"			=>	'newsletter_viewhtml'. $config['tplEx'],
						"Action"			=>	$Action,
						"preview"			=>	$mail_html,						
						));
$tpl->display('default_layout_blank'. $config['tplEx']);						
}else{						
### Preview The Newsletter   
  		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_SEND_USER);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject('New At Task Sonic!');


				$newsletter->Newletter();
				$rscnt = $db->num_rows();
				
				$h=0;
				while($db->next_record())
				{
					$mail_content_reg =  $mail_content_reg.$db->f('news_description').'<br />';
					$h++;
				}		
			
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
		
	$tpl->assign(array(
						"T_Body"			=>	'newsletter_send'. $config['tplEx'],
						"Action"			=>	$Action,
						"preview"			=>	$mail_html,						
						));

$tpl->display('default_layout'. $config['tplEx']);
} //end if fetch
?>						