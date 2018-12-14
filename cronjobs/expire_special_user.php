<?php
///////deactivate special user status if 30 day period is over
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron 	 = new Cronjobs();
$emails  = new Email();

		global $db,$db1;
		$new_date = "";
		$sql = "SELECT * FROM ".MEMBER_MASTER." AS MM "
			 ." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
			 ." WHERE MM.special_user = '1' ";
		$db->query($sql);
		while($db->next_record())
		{
			$date_check = explode("-",$db->f('special_user_start_date') );
			
			$new_date = date('Y-m-d', mktime(0,0,0,$date_check[1]+1,($date_check[2]),$date_check[0]) );
			$today_date = date('Y-m-d');
			if($today_date >= $new_date)
			{
			$cron->One_Month_Special_User_Deactive($db->f("user_auth_id"));
			
			## Send Email That 30 Day Commission Free Task Posting Is Over - Note, that unawarded/accepted tasks will now be subject to commission.
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(SPECIAL_USER_PERIOD_OVER);
			$mail2->setFrom($sendinfo->email_adress);
				
			$mail2->setSubject($sendinfo->email_subject);
			$tpl2->assign(array(
								"user_name"				=>	$db->f("user_login_id"),
								"site_link"          	=>  '<a href="'.$virtual_path['Site_Root'].'">Go to Task Sonic</a>',							
								));
			
				$mail_content_reg = $tpl2->fetch("email_template:".SPECIAL_USER_PERIOD_OVER);	
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
			$result = $mail2->send(array($db->f("mem_email"))); 			
	
			}
		}


?>