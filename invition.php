<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/invition.php');
include_once($physical_path['DB_Access']. 'Email.php');

	$emails 		= new Email();

	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();
	
	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
	$from = GetEmailAddress(md5($_SESSION['User_Name']));
	
	$mail2->setFrom($from);
	
	$sendinfo = $emails->GetEmailDetails(EMAIL_INVITE_TAC);
	$mail2->setSubject($sendinfo->email_subject);
		

	$tpl2->assign(array(
						"user_id"				=>	$_POST['user_id'],
						"password"				=>  $_POST['password'],
						"email_id"				=>  $_POST['mem_email'],
					));

			$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_INVITE_TAC);	
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
					
	if($_POST['address'] != NULL)
	{
	  $count_address = count($_POST['address']);
	  $i = 0;
		foreach($_POST['address'] as $key => $val)
		{
	
           $result = $mail2->send(array($val));
 		
			$arr_val[$i] = $val;
			$i++;
		}
		$tpl->assign(array(  "T_Body"		=>	'invitation_success'. $config['tplEx'],
	                      	 "msg1"     	=> 	$arr_val,
							 "cnt"      	=> 	$count_address,
							 "flag_flag"	=>	'0',
						 	"lang" 			=> $lang,
						 ));
        
       }
	else
	{
	    $tpl->assign(array(  "T_Body"	   	=>	'Msg'. $config['tplEx'],
	                      	 "lang" 		=> $lang,
						 ));
	  
	}
$tpl->display('popupwin_layout'. $config['tplEx']);

?>