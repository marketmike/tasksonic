<?php
define('IN_SITE', 	true);
define('IN_ADMIN',	true);

include("../includes/common.php");

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);


include_once($physical_path['DB_Access']. 'Development.php');
include_once($physical_path['DB_Access']. 'Category.php');

$development 	= new Development();
$cats 			= new Category();


	@session_unregister("pre_project");
	@session_unregister("vip_project");
	@session_unregister("project_posted_by");
	@session_unregister("project_title");
	@session_unregister("project_description");
	@session_unregister("cat_prod");
	@session_unregister("budget");
	@session_unregister("bidding_days");
	@session_unregister("status_of_project");


    $result2 = $development->View_Development_Order();
	$Development_List	=	fillDbCombo($result2,'development_id','development_title');
	
	$tpl->assign(array(	"T_Body"			  => 'project_search'. $config['tplEx'],
						"JavaScript"		  =>  array("project_search.js"),
						"Development_List"	  =>  $Development_List,
						"Bidding_List"        =>  fillArrayCombo($lang['days_for_bidding'],$ret->project_days_open),
						"project_status_List" =>  fillArrayCombo($lang['project_status_list']),
					));
	$results = $cats->Get_Category_Listing();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f('cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$arr_sub_cat[$i]			= $cats->GetCategorybyParent($db->f('cat_id'));
		$i++;
	}	

	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
 					   "sub_cat"   			=>	$arr_sub_cat,
					   "Loop"				=>	$rscnt,
					));	
					
$tpl->display('default_layout'. $config['tplEx']);
?>