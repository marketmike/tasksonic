<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Industry.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$industry = new Industry();

if ($_POST['Submit']=='Cancel')
{
	header("location: industry.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $industry->Insert($_POST);
	header("location: industry.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
	$no = $industry->Update($_POST);
	header("location: industry.php?edit=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Delete selected Country
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['industry_id'])
{
	$val = $industry->Delete($_POST['industry_id']);
	header("location: industry.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Countries
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $industry->Delete($val)?'true':'false';
	}

	header("location: industry.php?del=true");
	exit();
}

elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$industry->DisplayOrder_Industry($display_order[$i], $i);
	}
	header("location: industry.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="Industry added successfully";
	elseif ($_GET['del']=='true')
		$msg="Industry deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="Industry updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'industry_showall'. $config['tplEx'],
						"JavaScript"			=>  array("industry.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$industry->ViewAllIndustry();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_industry_id[$i]			= $db->f('industry_id');
		$arr_industry_name[$i]			= $db->f('industry_name');
		$i++;
	}
	$tpl->assign(array(	"industry_id"		=>	$arr_industry_id,
						"industry_name"		=>	$arr_industry_name,
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
	$tpl->assign(array("T_Body"					=>	'industry_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("industry.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $industry->GetIndustry($_POST['industry_id']);
	
	$tpl->assign(array("T_Body"					=>	'industry_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("industry.js"),
						"Action"				=>	$Action,
						"industry_name"			=>	$ret->industry_name,
						"industry_id"			=>	$ret->industry_id,
						));

}
elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'industry_order'. $config['tplEx'],
						"JavaScript"			=>  array("industry.js"),
						"ACTION"				=>  'Order',
						));
						
	$industry->View_Cat_Industry_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_industry_id[$i]			= $db->f('industry_id');
		$arr_industry_name[$i]			= $db->f('industry_name');
		$i++;
	}
	$tpl->assign(array(	"industry_id"		=>	$arr_industry_id,
						"industry_name"		=>	$arr_industry_name,
						"Loop"				=>	$rscnt,
				));
						
}

$tpl->display('default_layout'. $config['tplEx']);
?>