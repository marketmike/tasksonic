<?php
///////deactivate those user who are not logged in from last 31 days
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');



$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron 	 = new Cronjobs();
$emails  = new Email();
	
	
		$cron->Showall_Blocked_User();
		$cnt = $db1->num_rows();	// get num of rows

		$i=0;
		while($db1->next_record())		// loop till last record
		{
			$block_user_details[$i]['user_status']			= $db1->f('user_status');
			$block_user_details[$i]['user_auth_id']		    = $db1->f('user_auth_id');
			$block_user_details[$i]['mem_email']		    = $db1->f('mem_email');
				
			$block_user = $cron->Update_Block_User($db1->f('user_auth_id'));	
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(VISIBLE_BLOCK_USER);
			
			$mail2->setFrom($sendinfo->email_adress);
			
			$mail2->setSubject($sendinfo->email_subject);
		
			$mail_content_reg = $tpl2->fetch("email_template:".VISIBLE_BLOCK_USER);	
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
			$result = $mail2->send(array($db1->f('mem_email')));
			$i++;
		}
?>