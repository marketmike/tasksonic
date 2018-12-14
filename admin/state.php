<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'country.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$state = new State();

if ($_POST['Submit']=='Cancel')
{
	header("location: state.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add State
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $state->Insert($_POST);
	header("location: state.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit State
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
	$no = $state->Update($_POST);
	header("location: state.php?edit=true");
	exit();
}#----------------------------------------------------------------------------------------------------
# Delete selected State
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['state_id'])
{
	$val = $state->Delete($_POST['state_id']);
	header("location: state.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected States
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $state->Delete($val)?'true':'false';
	}

	header("location: state.php?del=true");
	exit();
}
elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$state->DisplayOrder_State($display_order[$i], $i);
	}
	header("location: state.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="State added successfully";
	elseif ($_GET['del']=='true')
		$msg="State deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="State updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'state_showall'. $config['tplEx'],
						"JavaScript"			=>  array("state.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$state->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_state_id[$i]				= $db->f('state_id');
		$arr_state_name[$i]				= $db->f('state_name');
		$i++;
	}
	$tpl->assign(array(	"state_id"		=>	$arr_state_id,
						"state_name"		=>	$arr_state_name,
						"Loop"				=>	$rscnt,
				));
					
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}

#----------------------------------------------------------------------------------------------------
# Add / Edit Country
#----------------------------------------------------------------------------------------------------

elseif($Action == 'Add')
{
	$tpl->assign(array("T_Body"					=>	'state_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("state.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $state->GetState($_POST['state_id']);

	
	$tpl->assign(array("T_Body"					=>	'state_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("state.js"),
						"Action"				=>	$Action,
						"state_name"			=>	$ret->state_name,
						"state_id"				=>	$ret->state_id,
						"status"				=>	$ret->status,						
						));

}

elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'state_order'. $config['tplEx'],
						"JavaScript"			=>  array("state.js"),
						"ACTION"				=>  'Order',
						));
						
	$state->View_State_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_state_id[$i]			= $db->f('state_id');
		$arr_state_title[$i]		= $db->f('state_name');
		$i++;
	}
	$tpl->assign(array(	"state_id"			=>	$arr_state_id,
						"state_title"		=>	$arr_state_title,
						"Loop"				=>	$rscnt,
				));
					
						
}
$tpl->display('default_layout'. $config['tplEx']);
?>