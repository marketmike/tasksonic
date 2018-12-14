<?php
define('IN_SITE', 	true);
include_once("includes/common.php");


global $mail2;
$mail2 = '';
$mail2 = new htmlMimeMail();

$tpl2 = new Smarty;
$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
$tpl2->assign(array("friend"				=>	$_SESSION['First_Name'],
					"join_link"    			=>  "<a href=".$virtual_path['Site_Root']."signup.php?invitation_id=".$_SESSION['User_Id'].">JOIN</a>",
					"join_now_link"    			=>  "<a href=".$virtual_path['Site_Root']."signup.php?invitation_id=".$_SESSION['User_Id'].">JOIN NOW</a>",					
					"site_link"    			=>  "<a href=".$virtual_path['Site_Root']."?invitation_id=".$_SESSION['User_Id'].">Tasksonic.com</a>",
					"friend_note" 			=> 	"YOUR MESSAGE GOES HERE",							
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
//$a = $mail2->html;

	$tpl->assign(array(  "T_Body"		=>	'preview_invite'. $config['tplEx'],
						 "a"    	 	=> 	$mail2->html,
				));
$tpl->display('popupwin_layout_invite_preview'. $config['tplEx']);
?>