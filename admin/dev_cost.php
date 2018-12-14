<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Development.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$devlopment = new Development();

if ($_POST['Submit']=='Cancel')
{
	header("location: dev_cost.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $devlopment->Insert($_POST);
	header("location: dev_cost.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
	$no = $devlopment->Update($_POST);
	header("location: dev_cost.php?edit=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Delete selected Country
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['development_id'])
{
	$val = $devlopment->Delete($_POST['development_id']);
	header("location: dev_cost.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Countries
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $devlopment->Delete($val)?'true':'false';
	}

	header("location: dev_cost.php?del=true");
	exit();
}

elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$devlopment->DisplayOrder_Development($display_order[$i], $i);
	}
	header("location: dev_cost.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="Development Cost added successfully";
	elseif ($_GET['del']=='true')
		$msg="Development Cost deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="Development Cost updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'development_showall'. $config['tplEx'],
						"JavaScript"			=>  array("development.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$devlopment->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_development_id[$i]			= $db->f('development_id');
		$arr_development_title[$i]		= $db->f('development_title');
		$i++;
	}
	$tpl->assign(array(	"development_id"		=>	$arr_development_id,
						"development_title"		=>	$arr_development_title,
						"Loop"					=>	$rscnt,
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
	$tpl->assign(array("T_Body"					=>	'development_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("development.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $devlopment->GetDevelopment($_POST['development_id']);
	
	$tpl->assign(array( "T_Body"				=>	'development_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("development.js"),
						"Action"				=>	$Action,
						"development_title"		=>	$ret->development_title,
						"development_id"		=>	$ret->development_id,
						"dev_max_amount"		=>	$ret->dev_max_amount,
						));

}
elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'development_order'. $config['tplEx'],
						"JavaScript"			=>  array("development.js"),
						"ACTION"				=>  'Order',
						));
						
	$devlopment->View_Development_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_development_id[$i]			= $db->f('development_id');
		$arr_development_title[$i]		= $db->f('development_title');
		$i++;
	}
	$tpl->assign(array(	"development_id"		=>	$arr_development_id,
						"development_title"		=>	$arr_development_title,
						"Loop"					=>	$rscnt,
				));
					
						
}

$tpl->display('default_layout'. $config['tplEx']);
?>