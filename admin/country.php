<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Country.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$country = new Country();

if ($_POST['Submit']=='Cancel')
{
	header("location: country.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $country->Insert($_POST);
	header("location: country.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
	$no = $country->UpdateCategory($_POST);
	header("location: country.php?edit=true");
	exit();
}#----------------------------------------------------------------------------------------------------
# Delete selected Country
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['country_id'])
{
	$val = $country->Delete($_POST['country_id']);
	header("location: country.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Countries
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $country->Delete($val)?'true':'false';
	}

	header("location: country.php?del=true");
	exit();
}
elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$country->DisplayOrder_Country($display_order[$i], $i);
	}
	header("location: country.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="Country added successfully";
	elseif ($_GET['del']=='true')
		$msg="Country deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="Country updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'country_showall'. $config['tplEx'],
						"JavaScript"			=>  array("country.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$country->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_country_id[$i]				= $db->f('country_id');
		$arr_country_name[$i]			= $db->f('country_name');
		$i++;
	}
	$tpl->assign(array(	"country_id"		=>	$arr_country_id,
						"country_name"		=>	$arr_country_name,
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
	$tpl->assign(array("T_Body"					=>	'country_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("country.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $country->GetCountry($_POST['country_id']);

	
	$tpl->assign(array("T_Body"					=>	'country_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("country.js"),
						"Action"				=>	$Action,
						"country_name"			=>	$ret->country_name,
						"country_id"			=>	$ret->country_id,
						));

}

elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'country_order'. $config['tplEx'],
						"JavaScript"			=>  array("country.js"),
						"ACTION"				=>  'Order',
						));
						
	$country->View_Country_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_country_id[$i]			= $db->f('country_id');
		$arr_country_title[$i]		= $db->f('country_name');
		$i++;
	}
	$tpl->assign(array(	"country_id"		=>	$arr_country_id,
						"country_title"		=>	$arr_country_title,
						"Loop"				=>	$rscnt,
				));
					
						
}
$tpl->display('default_layout'. $config['tplEx']);
?>