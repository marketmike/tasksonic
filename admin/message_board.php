<?php

#------------------------------------------------------------------------------------------------------------------------------
#	Include required files
#------------------------------------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');

include EDITOR_ROOT. 'spaw_control.class.php';

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$project = new project();

	if($Action=='Delete' && $_POST['message_id'])
	{
		$val = $project->Delete_Message_Board($_POST['message_id']);
		header("location: message_board.php?project_id=".$_POST['project_id']."&del=true");
		exit();
	}
	else if($Action == 'Edit' && $_POST['Submit'] == 'Save')
	{
		$project->UpdateMessage($_POST);
		header("location: message_board.php?project_id=".$_POST['project_id']."&update=true");
		exit();
	}

	if ($_POST['Submit'] == 'Cancel')
	{
		header("location: message_board.php?project_id=".$_POST['project_id']);
		exit();
	}

	if ($_POST['Submit'] == 'Back')
	{
		header("location: project_list.php");
		exit();
	}
	
	if($_GET['del'] == true)
		 $SuccMsg = "Message Board deleted successfully.."; 
	elseif($_GET['update'] == true)
	 	 $SuccMsg = "Message Board updateed successfully.."; 

	$project->View_Msg($_GET['project_id']);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_msg[$i]['id']					   = $db->f('message_id');
	   	$arr_msg[$i]['sender_login_id']		   = $db->f('sender_login_id');
		$arr_msg[$i]['sender_auth_id']		   = $db->f('sender_auth_id');
		$arr_msg[$i]['receiver_login_id']	   = $db->f('receiver_login_id');
	   	$arr_msg[$i]['receiver_auth_id']	   = $db->f('receiver_auth_id');
		$arr_msg[$i]['dec']		      	 	   = $db->f("message_desc");
		$arr_msg[$i]['dates']				   = $db->f('dates');
		$arr_msg[$i]['project_posted_by']	   = $db->f('project_posted_by');
		$arr_msg[$i]['project_post_to']		   = $db->f('project_post_to');
		$i++;
	}
	$set1 = $project->Getproject($_GET['project_id']);
	
	$tpl->assign(array( "T_Body"			=>	'message_board'. $config['tplEx'],
						"JavaScript"		=>  array("message_board.js"),
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						"amsg"	    		=>	$arr_msg,
						"Loop"				=>	$rscnt,
						"project_id"        =>  $_GET['project_id'],
						"path"              =>  $virtual_path['Site_Root'],
						"SuccMsg"			=>	$SuccMsg,
						"title"             =>  $set1->project_title,
						));
				
	if($_SESSION['total_record'] > $_SESSION['page_size'])
		{
			$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
							));
		}	
if($Action=='Edit')
{
	$info = $project->GetMesaageBoardDetails($_POST['message_id'],$_POST['project_id']);
	
	
	$tpl->assign(array( "T_Body"			=>	'edit_message_board'. $config['tplEx'],
						"Action"			=>   $Action,
						"form"				=>   $info->sender_login_id,
						"to"				=>   $info->receiver_login_id,
						"date"				=>   $info->dates,
						"message_id"		=>	 $_POST['message_id'],	
						"project_id"		=>   $_POST['project_id'],
						"title"             =>  $set1->project_title,
						));

		$sw = new SPAW_Wysiwyg('dec' /*name*/,		$info->message_desc/*value*/,
				   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
				   '750px' /*width*/, '100px' /*height*/);					   
				   
		$tpl->assign("EN_Page_Editor", $sw->getHtml());

}
					
$tpl->display('default_layout'. $config['tplEx']);
?>
