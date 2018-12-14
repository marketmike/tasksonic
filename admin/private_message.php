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

	if($Action=='Delete' && $_POST['pm_id'])
	{
		$val = $project->Delete_Private_Msg($_POST['pm_id']);
		header("location: private_message.php?project_id=".$_POST['project_id']."&del=true");
		exit();
	}
	else if($Action == 'Edit' && $_POST['Submit'] == 'Save')
	{
		$project->UpdatePrivateMessage($_POST);
		header("location: private_message.php?project_id=".$_POST['project_id']."&update=true");
		exit();
	}

	if ($_POST['Submit'] == 'Cancel')
	{
		header("location: private_message.php?project_id=".$_POST['project_id']);
		exit();
	}

	if ($_POST['Submit'] == 'Back')
	{
		header("location: project_list.php");
		exit();
	}
	if($Action == 'ViewAll')
	{
		if($_GET['del'] == true)
			 $SuccMsg = "Private Message deleted successfully.."; 
		elseif($_GET['update'] == true)
	 		 $SuccMsg = "Private Message updateed successfully.."; 
	 
		$project->View_Private_Msg_Admin($_GET['project_id']);
		$rscnt = $db->num_rows();
		
		$i=0;
		while($db->next_record())
		{
			$arr_msg[$i]['id']					   = $db->f('pm_id');
			$arr_msg[$i]['sender_login_id']		   = $db->f('sender_login_id');
			$arr_msg[$i]['sender_auth_id']		   = $db->f('sender_auth_id');
			$arr_msg[$i]['recevier_login_id']	   = $db->f('recevier_login_id');
			$arr_msg[$i]['recevier_auth_id']	   = $db->f('recevier_auth_id');
			$arr_msg[$i]['dec']		      	 	   = $db->f('private_msg_desc');
			$arr_msg[$i]['date']				   = $db->f('date');
			$arr_msg[$i]['project_posted_by']	   = $db->f('project_posted_by');
			$arr_msg[$i]['project_post_to']		   = $db->f('project_post_to');
			$i++;
		}
		$pro_name=$project->Getproject($_GET['project_id']);
		$tpl->assign(array( "T_Body"			=>	'private_msg'. $config['tplEx'],
							"JavaScript"		=>  array("private_msg.js"),
							"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
							"amsg"	    		=>	$arr_msg,
							"Loop"				=>	$rscnt,
							"SuccMsg"			=>	$SuccMsg,
							"pro_name"			=>  $pro_name->project_title,
							"path"              =>  $virtual_path['Site_Root'],
							"project_id"        =>  $_GET['project_id'], 
							));
					
		if($_SESSION['total_record'] > $_SESSION['page_size'])
			{
				$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
								));
			}
	}	
if($Action=='Edit')
{
	$info = $project->GetPrivateMessageDetails($_POST['pm_id'],$_POST['project_id']);
	
	$tpl->assign(array( "T_Body"			=>	'edit_private_message'. $config['tplEx'],
						"Action"			=>   $Action,
						"form"				=>   $info->sender_login_id,
						"to"				=>   $info->recevier_login_id,
						"date"				=>   $info->date,
						"pm_id"				=>	 $_POST['pm_id'],	
						"project_id"		=>   $_POST['project_id'],
						));

		$sw = new SPAW_Wysiwyg('dec' /*name*/,		$info->private_msg_desc/*value*/,
				   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
				   '750px' /*width*/, '100px' /*height*/);					   
				   
		$tpl->assign("EN_Page_Editor", $sw->getHtml());

}
				
$tpl->display('default_layout'. $config['tplEx']);
?>
