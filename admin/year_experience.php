<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Experience.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$exp = new Experience();

if ($_POST['Submit']=='Cancel')
{
	header("location: year_experience.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Experience
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $exp->Insert($_POST);
	header("location: year_experience.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit Experience
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
  	$no = $exp->Update($_POST);
	header("location: year_experience.php?edit=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Delete selected Experience
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['year_expe_id'])
{
	$val = $exp->Delete($_POST['year_expe_id']);
	header("location: year_experience.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Experience
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $exp->Delete($val)?'true':'false';
	}

	header("location: year_experience.php?del=true");
	exit();
}

elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$exp->DisplayOrder_experience($display_order[$i], $i);
	}
	header("location: year_experience.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="Experience Year added successfully";
	elseif ($_GET['del']=='true')
		$msg="Experience Year deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="Experience Year updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'experience_showall'. $config['tplEx'],
						"JavaScript"			=>  array("experience.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$exp->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_experience_id[$i]			= $db->f('year_expe_id');
		$arr_experience_title[$i]		= $db->f('expe_title');
		$i++;
	}
	$tpl->assign(array(	"experience_id"			=>	$arr_experience_id,
						"experience_title"		=>	$arr_experience_title,
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
	$tpl->assign(array("T_Body"					=>	'experience_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("experience.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
   $ret = $exp->GetExperience($_POST['year_expe_id']);
  

	$tpl->assign(array("T_Body"					=>	'experience_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("experience.js"),
						"Action"				=>	$Action,
						"expe_title"			=>	$ret->expe_title,
						"year_expe_id"			=>	$ret->year_expe_id,
						));

}
elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'experience_order'. $config['tplEx'],
						"JavaScript"			=>  array("experience.js"),
						"ACTION"				=>  'Order',
						));
						
	$exp->View_experience_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_experience_id[$i]			= $db->f('year_expe_id');
		$arr_experience_title[$i]		= $db->f('expe_title');
		$i++;
	}
	$tpl->assign(array(	"experience_id"			=>	$arr_experience_id,
						"experience_title"		=>	$arr_experience_title,
						"Loop"					=>	$rscnt,
				));
}

$tpl->display('default_layout'. $config['tplEx']);
?>