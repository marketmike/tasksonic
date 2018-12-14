<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Country.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$city = new City();

if ($_POST['Submit']=='Cancel')
{
	header("location: city.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add City
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $city->Insert($_POST);
	header("location: city.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit City
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
	$no = $city->Update($_POST);
	header("location: city.php?edit=true");
	exit();
}#----------------------------------------------------------------------------------------------------
# Delete selected Country
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['city_id'])
{
	$val = $city->Delete($_POST['city_id']);
	header("location: city.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Cities
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $city->Delete($val)?'true':'false';
	}

	header("location: city.php?del=true");
	exit();
}
elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$city->DisplayOrder_City($display_order[$i], $i);
	}
	header("location: city.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all Cities	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="City added successfully";
	elseif ($_GET['del']=='true')
		$msg="City deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="City updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'city_showall'. $config['tplEx'],
						"JavaScript"			=>  array("city.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$city->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_city_id[$i]				= $db->f('city_id');
		$arr_city_name[$i]				= $db->f('city_name');
		$i++;
	}
	$tpl->assign(array(	"city_id"		=>	$arr_city_id,
						"city_name"		=>	$arr_city_name,
						"Loop"				=>	$rscnt,
				));
					
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}

#----------------------------------------------------------------------------------------------------
# Add / Edit Cityy
#----------------------------------------------------------------------------------------------------

elseif($Action == 'Add')
{
	$tpl->assign(array("T_Body"					=>	'city_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("city.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $city->GetCity($_POST['city_id']);

	
	$tpl->assign(array("T_Body"					=>	'city_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("city.js"),
						"Action"				=>	$Action,
						"city_name"				=>	$ret->city_name,
						"city_id"				=>	$ret->city_id,
						"status"				=>	$ret->status,							
						));

}

elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'city_order'. $config['tplEx'],
						"JavaScript"			=>  array("city.js"),
						"ACTION"				=>  'Order',
						));
						
	$city->View_City_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_city_id[$i]			= $db->f('city_id');
		$arr_city_title[$i]			= $db->f('city_name');
		$i++;
	}
	$tpl->assign(array(	"city_id"			=>	$arr_city_id,
						"city_title"		=>	$arr_city_title,
						"Loop"				=>	$rscnt,
				));
					
						
}
$tpl->display('default_layout'. $config['tplEx']);
?>