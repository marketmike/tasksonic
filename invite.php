<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/invite.php');
include_once($physical_path['DB_Access']. 'Email.php');

// creating objects
$emails 		= new Email();

if($_POST['Submit'] == 'Send')
{
   $_SESSION['notes'] = "";
   $Fromusername = GetEmailAddress($_SESSION['User_Id']);
   $mail_addresses = explode(",",$_POST['mail_ids']);
   
   
	    global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$mail2->setFrom($Fromusername);
		$mail2->setFrom($site_email);
		$sendinfo = $emails->GetEmailDetails(EMAIL_INVITE_TAC);
		
		$mail2->setSubject($sendinfo->email_subject);
		$tpl2->assign(array("friend"				=>	$_SESSION['First_Name'],
							"join_link"    			=>  "<a href=".$virtual_path['Site_Root']."signup.php?invitation_id=".$_SESSION['User_Id'].">JOIN</a>",
							"join_now_link"    			=>  "<a href=".$virtual_path['Site_Root']."signup.php?invitation_id=".$_SESSION['User_Id'].">JOIN NOW</a>",							
							"site_link"    			=>  "<a href=".$virtual_path['Site_Root']."?invitation_id=".$_SESSION['User_Id'].">Tasksonic.com</a>",
							"friend_note" 			=> $_POST['notes'],							
							));	
		$mail_content1 = $tpl2->fetch("email_template:".EMAIL_INVITE_TAC);
		$mail_content_reg = $mail_content1;	
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

	if($_POST['mail_ids'] != NULL)
	{
	  foreach($mail_addresses as $key => $val)
		{
           $result = $mail2->send(array($val));
 		}
		
       	header('location: share_earn.html?send=true');
		exit();					
	}
	else
	{
        $tpl->assign(array( "ERROR"            =>  'No Email Addresses Entered',));  
	}		
}
  
     if($_GET['send'] == 'true')
	    $SuccMsg = 'Invitations have been emailed successfully!';

		


	$tpl->assign(array(
						"T_Body"			=>	'invite'. $config['tplEx'],
						"JavaScript"		=>	array('invite.js'),
						"lang"				=>	$lang,
						"sucmsg"            =>  $SuccMsg,
						"tab"				=>	4,
						"preview"			=>	$preview,
						"Invite"			=>	1,
						"hidemap"			=>	1,
						"mail_ids"			=>	$_POST['mail_ids'],
						"notes"				=>	$_POST['notes'],
						"referral_link"    	=>  $virtual_path['Site_Root']."?invitation_id=".$_SESSION['User_Id'],						
					));
			
  
$tpl->display('default_layout_invite'. $config['tplEx']);    // assign to layout template
?>