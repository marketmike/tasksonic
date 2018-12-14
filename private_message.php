<?php
define('IN_SITE', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/private_message.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Payment.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$project 		= new Project();
$emails 		= new Email();
$pays 			= new Payment();


if($_POST['Submit']	== $lang['Button_Post'])
{
	if($_FILES['attch_file']['name'] != '')
		{
			$attach_file = fileUpload($_FILES['attch_file'],PRIVATE_MESSAGE);
		}
		
	 	$en_message_desc  = badWordDetect($_POST['en_message_desc']);
	 
	 	$project->Insert_Private_Msg($_POST,$_SESSION['User_Id'],$_SESSION['User_Name'],$en_message_desc,$attach_file);
	
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(PRIVATE_MESSAGE);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$result1 = $project->GetProject($_POST['project_id']);
		
		$subject_text = ereg_replace("%Project_title%",$result1->project_title,$sendinfo->email_subject);
		
		$mail2->setSubject($subject_text);
		
		$tpl2->assign(array("sender_name" 				=>	$_SESSION['User_Name'],
							"title"						=>  $result1->project_title,
							"msg"						=>  $en_message_desc,
							"link"      			    =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($result1->project_title).".html>".$result1->project_title."</a>",
							"link_inbox"         		=>	"<a href=".$virtual_path['Site_Root']."pm-inbox.html >Inbox</a>",

						));
	
		
			$mail_content_reg = $tpl2->fetch("email_template:".PRIVATE_MESSAGE);	
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
		$send_to = GetEmailAddress(md5($_POST['project_creator']));
     
	   	$result = $mail2->send(array($send_to));
	 
	 $tpl->assign(array(
						"title"             =>  $_POST['title'],
						"project_id"        =>  $_POST['project_id'],
						"project_creator"   =>  $_POST['project_creator'],
						"id"			    =>  $_POST['id'],
						));
    						
	header("location: private_message.php?project_id=".$_POST['project_id']."&id=".$_POST['id']);
	exit();
	
}
elseif($Action == 'Close')
{
  if($_POST['id'] == 1)
  {
	  echo "<script type=text/javascript> opener.location.href = 'project_".$_POST['project_id']."_".clean_url($_POST['title']).".html#';";
	  echo "window.close();";
  	  echo "</script>";
  }
  elseif($_POST['id'] == 2)
  {
	  echo "<script type=text/javascript> opener.location.href = 'shortlist_".$_POST['project_id']."_".clean_url($_POST['title']).".html#';";
	  echo "window.close();";
	  echo "</script>";
  }
  else
  {
	  echo "<script type=text/javascript> opener.location.href = 'decline_".$_POST['project_id']."_".clean_url($_POST['title']).".html#';";
	  echo "window.close();";
	  echo "</script>";
  }
}

	$proj_id = ($_GET['project_id'] ? $_GET['project_id'] : $_POST['project_id']);
	
	$set1 = $project->GetProject($proj_id);

	$check = $project->Checking($proj_id,$_SESSION['User_Name']); 

	if($check == 1)
	{   
			$result = $project->View_Private_Msg($proj_id,$_SESSION['User_Name'],$set1->project_posted_by);
			$privatecnt = $db->num_rows();
			$i=0;
			while($db->next_record())
			{
				$arr_private_msg[$i]['project_id']			= $db->f('project_id');
				$arr_private_msg[$i]['msg_dec']				= $db->f('private_msg_desc');
				$arr_private_msg[$i]['date']				= $db->f('date');
				$arr_private_msg[$i]['sender_login_id']		= $db->f('sender_login_id');
				$arr_private_msg[$i]['file']				= $db->f('file');
				$arr_private_msg[$i]['file1']				= substr($db->f('file'),25);
				
				$i++;
			}	
			$tpl->assign(array(
							   "arr_private_msg"   			=>	$arr_private_msg,
							   "Loop"						=>	$privatecnt,
						));
	}
	else
	{
	  $m1 = $lang['Msg'];
	  $tpl->assign(array(	"T_Body"			=>	'private_message'. $config['tplEx'],
	                        "m1"                =>  $m1,    
			             ));
	}				 
	$tpl->assign(array(	"T_Body"			=>	'private_message'. $config['tplEx'],
						"JavaScript"		=>	array('private_message.js'),  
						"lang"				=>  $lang,  
						"title"             =>  $set1->project_title,
						"project_id"        =>  $proj_id,
						"project_creator"   =>  $set1->project_posted_by,
						"project_status"    =>  $set1->project_status,
						"id"			    =>  $_GET['id'],	
						"user_name"         =>  $_SESSION['User_Name'],  
						"flag_flag"			=>	'1',	 
						));
	
	
$tpl->display('popupwin_layout_blank'. $config['tplEx']);
?>