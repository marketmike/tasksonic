<?php
#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include($physical_path['DB_Access']. 'Others.php');
include($physical_path['DB_Access']. 'Bid.php');
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');

# Initialize object
$others 	= new Others();
$bid	 	= new Bid();
if(!in_array($Action, array('Add', 'Edit', 'Sort', 'View' , 'Send_Mail')))
{
	
	$tpl->assign(array("T_Body"			=>	'view_messages'. $config['tplEx'],
//						"JavaScript"	=>  array("users.js"),
						"user_id"		=>	$_GET['user_id'],
						"path"              =>  $virtual_path['Site_Root'],
				));
	$bid->GetBidBy_User($_GET['user_id']);
	$cnt_bid = $db->num_rows();
	$i = 0;
	while($db->next_record())
	{
		$arr_bid[$i]['bid_id']				= $db->f('bid_id');
		$arr_bid[$i]['bid_amount']			= $db->f('bid_amount');
		$arr_bid[$i]['delivery_within']		= $db->f('delivery_within');
		$arr_bid[$i]['bid_desc']			= $db->f('bid_desc');
		$arr_bid[$i]['date_2']				= $db->f('date_2');
		$arr_bid[$i]['project_title']		= $db->f('project_title');
		$i++;
	}

	$tpl->assign(array(	"bid_Loop"				=>	$cnt_bid,
						"arr_bid"      			=>  $arr_bid,
						));								



	$bid->GetPMBy_User($_GET['user_id']);
	$cnt_PM = $db->num_rows();
	$j = 0;
	while($db->next_record())
	{
		$arr_pms[$j]['pm_id']				= $db->f('pm_id');
		$arr_pms[$j]['project_title']		= $db->f('project_title');
		$arr_pms[$j]['recevier_login_id']	= $db->f('recevier_login_id');
		$arr_pms[$j]['private_msg_desc']	= $db->f('private_msg_desc');
		$arr_pms[$j]['file']				= $db->f('file');
		$arr_pms[$j]['date']				= $db->f('date');
		$j++;
	}

	$tpl->assign(array(	"pm_Loop"				=>	$cnt_PM,
						"arr_pms"      			=>  $arr_pms,
						));								



	$bid->GetMessageBoardBy_User($_GET['user_id']);
	$cnt_MB = $db->num_rows();
	$k = 0;
	while($db->next_record())
	{
		$arr_messages[$k]['message_id']				= $db->f('message_id');
		$arr_messages[$k]['project_title']			= $db->f('project_title');
		$arr_messages[$k]['receiver_login_id']		= $db->f('receiver_login_id');
		$arr_messages[$k]['message_desc']			= $db->f('message_desc');
		$arr_messages[$k]['dates']					= $db->f('dates');
		$k++;
	}

	$tpl->assign(array(	"messages_Loop"		=>	$cnt_MB,
						"arr_messages"  	=>  $arr_messages,
						));
						

	$bid->GetprojectPostedBy_User($_GET['user_id']);
	$cnt_project = $db->num_rows();
	$l = 0;
	while($db->next_record())
	{
		$arr_project[$l]['project_id']				= $db->f('project_id');
		$arr_project[$l]['project_title']			= $db->f('project_title');
		$arr_project[$l]['project_description']		= nl2br($db->f('project_description'));
		$arr_project[$l]['project_posted_date']		= $db->f('project_posted_date');
		$l++;
	}

	$tpl->assign(array(	"cnt_project"		=>	$cnt_project,
						"arr_project"  		=>  $arr_project,
						));
						
}
$tpl->display('default_layout'. $config['tplEx']);
?>