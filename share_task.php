<?php
define('IN_SITE', 	true);
//define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang'].'/share_task.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);
$pro = new project();
$emails 		= new Email();


if($Action == 'Send_Mail' && $_POST['Submit'] = $lang['Button_Submit'])
{
	if($_POST['email_address'] != '' && $_POST['Comment'] != '')
	{
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
	
        $Fromusername = GetEmailAddress($_SESSION['User_Id']);
			
		$mail2->setFrom($Fromusername);
		
		$sendinfo = $emails->GetEmailDetails(SEND_TASK);

		$mail2->setSubject($sendinfo->email_subject);
	
	$task = $pro->Getproject($_POST['project_id']);	
		
		$tpl2->assign(array(
							"project_id"            =>  $_POST['project_id'],  
							"title"                 =>  stripslashes($task->project_title), 
							"Comment"               =>  $_POST['Comment'], 
							"link"        			=>	'<a href="'.$virtual_path['Site_Root'].'task_'.$_POST['project_id'].'_'.clean_url($task->project_title).'.html?invitation_id=' . $_SESSION['User_Id'] . '">'.$task->project_title.'</a>',

						));
					
		
			$mail_content_reg = $tpl2->fetch("email_template:".SEND_TASK);			
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
		
       $result = $mail2->send(array($_POST['email_address']));
 	}	
	$tpl->assign(array(	"T_Body"			=>	'share_task'. $config['tplEx'],
						"JavaScript"		=>  array("share_task.js"),
						"title"             =>  stripslashes($task->project_title), 	
						"lang"				=>  $lang,
						"user_name"         =>  $_SESSION['User_Name'], 
						"pro_id"            =>  $_GET['task_id'],
						"message_sent"      =>  'true',
						"friend"            =>  $_POST['email_address'],
						"flag_flag"			=>	'1',

					));
}
else
{
	$task = $pro->Getproject($_GET['task_id']); 
	$tpl->assign(array(	"T_Body"			=>	'share_task'. $config['tplEx'],
						"JavaScript"		=>  array("share_task.js"),
						"title"             =>  stripslashes($task->project_title), 	
						"lang"				=>  $lang,
						"user_name"         =>  $_SESSION['User_Name'], 
						"pro_id"            =>  $_GET['task_id'],
						"flag_flag"			=>	'1',

					));


}
$tpl->display('popupwin_layout_blank'. $config['tplEx']);
?>