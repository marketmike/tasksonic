<?php
///////Notice to prompt user to renew their membership when it has expired.
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron 	 = new Cronjobs();
$emails  = new Email();

$details = $cron->Membership();
$cnt = $db1->num_rows();	// get num of rows

	$i=0;

	while($db1->next_record())		// loop till last record
	{
		$member[$i]['user_login_id']				= $db1->f('user_login_id');
		$member[$i]['membership_name']		        = $db1->f('membership_name');
		$member[$i]['membership_buy_date']		    = $db1->f('membership_buy_date');
		$member[$i]['membership_finish_date']		= $db1->f('membership_finish_date');
		$member[$i]['mem_email']		  			= $db1->f('mem_email');
         
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
		
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
		$sendinfo = $emails->GetEmailDetails1(RENEW_MEMBERSHIP);
		$mail2->setFrom($sendinfo->email_adress);
			
		$mail2->setSubject($sendinfo->email_subject);
		$tpl2->assign(array(
		                    "member_name"				=>	$member[$i]['user_login_id'],
							"membership_name"			=>  $member[$i]['membership_name'],
							"buy_date"          		=>  $member[$i]['membership_buy_date'],
							"exp_date"          		=>  $member[$i]['membership_finish_date'],
							"site_link"          		=>  '<a href="'.$virtual_path['Site_Root'].'">Go to Task Sonic</a>',							
							));
		
			$mail_content_reg = $tpl2->fetch("email_template:".RENEW_MEMBERSHIP);	
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
		$result = $mail2->send(array($member[$i]['mem_email'])); 
		
		$details = $cron->Update($member[$i]['user_login_id']);
		$i++;
}	
?>