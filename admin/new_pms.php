<?php
#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include($physical_path['DB_Access']. 'Bid.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');

include EDITOR_ROOT. 'spaw_control.class.php';

#=======================================================================================================================================
# Define the action
#---------------------------------------------------------------------------------------------------------------------------------------
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');

# Initialize object
$project 		= new project();


if($_POST['Submit'] == 'Cancel')
{
	header("location: new_pms.php");
	exit(0);
}
if($Action == 'Edit' && $_POST['Submit'] == 'Save')
{

	$project->UpdatePrivateMessage_Checked($_POST);
	header("location: new_pms.php");
	exit(0);
}
if($Action == 'ShowAll' || $Action=='')
{
	$tpl->assign(array("T_Body"					=>	'pms_showall'. $config['tplEx'],
						"JavaScript"			=>  array("new_pms.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$project->ViewAll_PMS();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_bid[$i]['id']					= $db->f('pm_id');
		$arr_bid[$i]['sender_login_id']		= $db->f('sender_login_id');
		$arr_bid[$i]['recevier_login_id']	= $db->f('recevier_login_id');
		$i++;
	}
	
	$tpl->assign(array(	"arr_bid"		=>	$arr_bid,
						"Loop"			=>	$rscnt,
				));

	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}
elseif($Action == 'Edit')
{
	$info = $project->GetPMDetailsByID($_POST['pm_id']);

	$tpl->assign(array( "T_Body"				=>	'edit_new_pms'. $config['tplEx'],
						"Action"				=>   $Action,
						"sender_login_id"		=>   $info->sender_login_id,
						"recevier_login_id"		=>   $info->recevier_login_id,
						"pm_id"					=>   $info->pm_id,
						));
	$sw = new SPAW_Wysiwyg('private_msg_desc' /*name*/,		$info->private_msg_desc/*value*/,
		   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
		   '750px' /*width*/, '100px' /*height*/);					   
	$tpl->assign("EN_Page_Editor", $sw->getHtml());

}

$tpl->display('default_layout'. $config['tplEx']);
?>