<?php
define('IN_SITE', 	true);
define('IN_ADMIN',	true);

include("../includes/common.php");
include_once($physical_path['DB_Access']. 'Violation.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);



$violation 	= new Violation();
#----------------------------------------------------------------------------------------------------
# View Data
#----------------------------------------------------------------------------------------------------
if($_POST['Submit'] == 'Back')
{
	header("location: violation.php");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Delete selected Violation
#----------------------------------------------------------------------------------------------------
if($Action=='Delete' && $_POST['violation_id'])
{
	$val = $violation->Delete($_POST['violation_id']);
	header("location: violation.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Violations
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $violation->Delete($val)?'true':'false';
	}

	header("location: violation.php?del=true");
	exit();
}


	if ($_GET['del']=='true')
		$succMessage = "Report Violation(s) deleted successfully";

    $violation->View_All();
	
    $rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_violate[$i]['id']					= $db->f('violation_id');
		$arr_violate[$i]['other_person_name']	= $db->f('other_person_name');
		$arr_violate[$i]['violation_reason']	= $db->f('violation');
		$arr_violate[$i]['url']					= $db->f('url');
		$arr_violate[$i]['dec']					= $db->f('violation_details');
		$i++;
	}
	
	$tpl->assign(array(	"T_Body"			=> 'violation'. $config['tplEx'],
						"JavaScript"		=>  array("violation.js"),
						"arr_violate"		=>	$arr_violate,
						"Loop"				=>	$rscnt,
						"succMessage"       =>  $succMessage,
						"PageSize_List"	 	=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),
					));
	
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
	
	
if($Action == 'View')
{
    
	$ret = $violation->GetViolationDetails($_GET['violation_id']);
	
    
	$tpl->assign(array(
						"T_Body"					=>	'violation_view'. $config['tplEx'],
						"Action"					=>	$Action,
						"your_name"                 =>  $ret->your_name,
						"your_email"                =>  $ret->your_email,
						"your_username"             =>  $ret->your_username,
						"violation"                 =>  $ret->violation,
						"other_person_name"         =>  $ret->other_person_name,
						"url"                 		=>  $ret->url,
						"violation_details"     	=>  $ret->violation_details,
					
						));
}					
				
$tpl->display('default_layout'. $config['tplEx']);
?>