<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Subadmin.php');
//include_once($physical_path['DB_Access']. 'User.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$subadmin = new Subadmin();

if ($_POST['Submit']=='Cancel')
{
	header("location: subadmin.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
    $uid = $subadmin->Check_User_ID($_POST['user_login_id']);
	
	if($uid == 1)
	{
	   $subadmin->Insert($_POST);
		header("location: subadmin.php?add=true");
		exit(); 
	}
	elseif($uid == 0)
	{
		header('location: subadmin.php?Action=Add&Msg=true');
		exit(0);
	}
	
	
}
#----------------------------------------------------------------------------------------------------
# Delete selected Country
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete')
{
 	$subadmin->Delete($_POST['user_auth_id']);
	header("location: subadmin.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Countries
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $subadmin->Delete($val)?'true':'false';
	}

	header("location: subadmin.php?del=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="SubAdmin added successfully";
	elseif ($_GET['del']=='true')
		$msg="SubAdmin deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="SubAdmin updated successfully";
	
	
	$tpl->assign(array("T_Body"					=>	'subadmin_showall'. $config['tplEx'],
						"JavaScript"			=>  array("subadmin.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
	$subadmin->ViewAll();
	$rscnt = $db->num_rows();
	$i=0;
	while($db->next_record())
	{
	   	$arr_subadmin[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_subadmin[$i]['user_login_id']		= $db->f('user_login_id');
		$arr_subadmin[$i]['user_type']			= $db->f('user_type');
		$i++;
	}
	$tpl->assign(array(	"arr_subadmin"		=>	$arr_subadmin,
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
    if ($_GET['Msg']=='true')
		$msg="User Login Id is taken";
	$tpl->assign(array( "T_Body"				=>	'subadmin_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("subadmin.js"),
						"succMessage"			=>	$msg,
						"Action"				=>	$Action,
						));

}
$tpl->display('default_layout'. $config['tplEx']);
?>