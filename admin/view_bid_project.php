<?php

#------------------------------------------------------------------------------------------------------------------------------
#	Include required files
#------------------------------------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Bid.php');
include_once($physical_path['DB_Access']. 'task.php');
include EDITOR_ROOT. 'spaw_control.class.php';

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
//print_r($_GET);die;
$bid = new Bid();
$project = new project();
if($Action=='Delete' && $_POST['bid_id'])
{
    $val = $bid->Delete($_POST['bid_id']);
	header("location: view_bid_project.php?project_id=".$_POST['project_id']."&del=true");
	exit();
}
else if($Action == 'Edit' && $_POST['Submit'] == 'Save')
{
	$bid->UpdateBid($_POST);
	header("location: view_bid_project.php?project_id=".$_POST['project_id']."&update=true");
	exit();
}

if ($_POST['Submit'] == 'Cancel')
{
	header("location: view_bid_project.php?project_id=".$_POST['project_id']);
	exit();
}

if ($_POST['Submit'] == 'Back')
{
	header("location: project_list.php");
	exit();
}

if($_GET['del'] == true)
	 $SuccMsg = "Bid deleted successfully.."; 
elseif($_GET['update'] == true)
	 $SuccMsg = "Bid updateed successfully.."; 
	   
	$bid->View_Bidding($_GET['project_id']);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_bid[$i]['id']					= $db->f('bid_id');
	   	$arr_bid[$i]['project_id']			= $db->f('project_id');
		$arr_bid[$i]['bid_by_user']			= $db->f('bid_by_user');
		$arr_bid[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_bid[$i]['bid_amount']			= $db->f('bid_amount');
		$arr_bid[$i]['delivery_within']		= $db->f('delivery_within');
		$arr_bid[$i]['dec']		      	    = $db->f('bid_desc');
		$i++;
	}
	$set1 = $project->Getproject($_GET['project_id']);	
	$tpl->assign(array( "T_Body"			=>	'view_bid_project'. $config['tplEx'],
						"JavaScript"		=>  array("bid_project.js"),
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						"abid"	    		=>	$arr_bid,
						"Loop"				=>	$rscnt,
						"project_id"        =>  $_GET['project_id'], 
						"SuccMsg"			=>	$SuccMsg,
						"path"              =>  $virtual_path['Site_Root'],
						"title"             =>  $set1->project_title,
						));
				
	if($_SESSION['total_record'] > $_SESSION['page_size'])
		{
			$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
							));
		}			
if($Action=='Edit')
{
	$info = $bid->GetBidDeatils($_POST['bid_id'],$_POST['project_id']);
	
	$tpl->assign(array( "T_Body"			=>	'edit_bid_project'. $config['tplEx'],
						"Action"			=>   $Action,
						"user_name"			=>   $info->bid_by_user,
						"bid"				=>   $info->bid_amount,
						"delivery"			=>   $info->delivery_within,
						"bid_id"			=>	 $_POST['bid_id'],	
						"project_id"		=>   $_POST['project_id'],
						));

		$sw = new SPAW_Wysiwyg('dec' /*name*/,		$info->bid_desc/*value*/,
				   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
				   '750px' /*width*/, '100px' /*height*/);					   
				   
		$tpl->assign("EN_Page_Editor", $sw->getHtml());

}
			
$tpl->display('default_layout'. $config['tplEx']);
?>