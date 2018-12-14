<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/message_board.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$project 		= new project();
$emails 		= new Email();


if($_POST['Submit']	== $lang['Button_Post'])
{
	 $en_message_desc  = badWordDetect($_POST['en_message_desc']);
	 
	 $project->Insert_Msg($_POST,$_SESSION['User_Id'],$_SESSION['User_Name'],$en_message_desc);
	 
	 $tpl->assign(array(
						"title"             =>  $_POST['title'],
						"project_id"        =>  $_POST['project_id'],
						"project_creator"   =>  $_POST['project_creator'],
						"id"			    =>  $_POST['id'],
						));
						
    $user_details = $user->GetChangeUserInfo1(md5($_POST['project_creator']));

	if($user_details->mem_option == 1 && $_SESSION['User_Name'] != $_POST['project_creator'])
	{
	  	global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		
		$sendinfo = $emails->GetEmailDetails1(MESSAGE_ON_TASK);

		$mail2->setFrom($sendinfo->email_adress);
		
		$set1 = $project->Getproject($_POST['project_id']);

		$subject_text = ereg_replace("%project_title%",$set1->project_title,$sendinfo->email_subject);
	
		$mail2->setSubject($subject_text);
	


		$tpl2->assign(array(
							"msg_sender_link"      =>	"<a href=".$virtual_path['Site_Root']."tasker_profile_".$_SESSION['User_Name'].".html>".$_SESSION['User_Name']."</a>",
							"link"       		   =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($set1->project_title).".html>".$set1->project_title."</a>",
							"task_owner"       	   =>	"<a href=".$virtual_path['Site_Root']."tasker_owner_profile_".$_POST['project_creator'].".html>".$_POST['project_creator']."</a>",							
							
						));
					

		
			$mail_content_reg = $tpl2->fetch("email_template:".MESSAGE_ON_TASK);	
		
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
		$result = $mail2->send(array($user_details->mem_email));
	}							
	header("location: message_board.php?project_id=".$_POST['project_id']."&project_creator=".$_POST['project_creator']."&id=".$_POST['id']);
	exit();
}

elseif($Action == 'Close')
{
  if($_POST['id'] == 1)
  {
	  echo "<script type=text/javascript> opener.location.href = 'project_".$_POST['project_id'].".html#bid_list';";
	  echo "opener.location.reload();";
	  echo "window.close();";
  	  echo "</script>";
  }
  elseif($_POST['id'] == 2)
  {
	  echo "<script type=text/javascript> opener.location.href = 'shortlist_".$_POST['project_id'].".html#short_list';";
	  echo "opener.location.reload();";
	  echo "window.close();";
	  echo "</script>";

  }
  elseif($_POST['id'] == 3)
  {
	  echo "<script type=text/javascript> opener.location.href = 'decline_".$_POST['project_id'].".html#decline_list';";
	  echo "opener.location.reload();";
	  echo "window.close();";
	  echo "</script>";

  }
  else
  {
	  echo "<script type=text/javascript> opener.location.href = 'my-account.html#';";
	  echo "window.close();";
	  echo "</script>";

  }
}
	
	$proj_id = ($_GET['project_id'] ? $_GET['project_id'] : $_POST['project_id']);
	
	$result = $project->View_Msg($proj_id);
	$rscnt = $db->num_rows();
	$i=0;
	while($db->next_record())
	{
		$arr_msg[$i]['project_id']			= $db->f('project_id');
	    $arr_msg[$i]['msg_dec']				= $db->f('message_desc');
		$arr_msg[$i]['dates']				= $db->f('dates');
		$arr_msg[$i]['sender_login_id']		= $db->f('sender_login_id');
		$arr_msg[$i]['receiver_login_id']	= $db->f('receiver_login_id');		
		$i++;
	}	

	$tpl->assign(array(
 					   "arr_msg"   			=>	$arr_msg,
					   "Loop"				=>	$rscnt,
				));
	
	$set1 = $project->Getproject($proj_id);
	
	$tpl->assign(array(	"T_Body"			=>	'message_board'. $config['tplEx'],
						"JavaScript"		=>	array('message_board.js'),   
						"lang"				=>	$lang,
						"js"                =>  $lang['JS_English_Msg'], 
						"title"             =>  $set1->project_title,
						"project_id"        =>  $_GET['project_id'],
						"project_creator"   =>  $_GET['project_creator'],
                        "id"			    =>  $_GET['id'],	
						"flag_flag"			=>	'1',
						"current_user"		=>	$_SESSION['User_Name'],						
						
						));
						
	 
$tpl->display('popupwin_layout_blank'. $config['tplEx']);
?>