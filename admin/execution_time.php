<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Execution_Time.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$exe_time = new Execution_Time();

if ($_POST['Submit']=='Cancel')
{
	header("location: execution_time.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $exe_time->Insert($_POST);
	header("location: execution_time.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
	$no = $exe_time->Update($_POST);
	header("location: execution_time.php?edit=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Delete selected Country
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['exe_id'])
{
	$val = $exe_time->Delete($_POST['exe_id']);
	header("location: execution_time.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Countries
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $exe_time->Delete($val)?'true':'false';
	}

	header("location: execution_time.php?del=true");
	exit();
}

elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$exe_time->DisplayOrder_ExeTime($display_order[$i], $i);
	}
	header("location: execution_time.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="Execution Time added successfully";
	elseif ($_GET['del']=='true')
		$msg="Execution Time deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="Execution Time updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'execution_showall'. $config['tplEx'],
						"JavaScript"			=>  array("exe_time.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$exe_time->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_exe_id[$i]			= $db->f('exe_id');
		$arr_exe_name[$i]		= $db->f('exe_name');
		$i++;
	}
	$tpl->assign(array(	"exe_id"		=>	$arr_exe_id,
						"exe_name"		=>	$arr_exe_name,
						"Loop"			=>	$rscnt,
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
	$tpl->assign(array("T_Body"					=>	'execution_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("exe_time.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $exe_time->GetExecutionTime($_POST['exe_id']);
	
	$tpl->assign(array("T_Body"					=>	'execution_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("exe_time.js"),
						"Action"				=>	$Action,
						"exe_name"				=>	$ret->exe_name,
						"exe_id"				=>	$ret->exe_id,
						));

}
elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'execution_order'. $config['tplEx'],
						"JavaScript"			=>  array("exe_time.js"),
						"ACTION"				=>  'Order',
						));
						
	$exe_time->View_ExecutionTime_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_exe_id[$i]			= $db->f('exe_id');
		$arr_exe_name[$i]		= $db->f('exe_name');
		$i++;
	}
	$tpl->assign(array(	"exe_id"		=>	$arr_exe_id,
						"exe_name"		=>	$arr_exe_name,
						"Loop"			=>	$rscnt,
				));
					
						
}

$tpl->display('default_layout'. $config['tplEx']);
?>