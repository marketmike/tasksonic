<?php

define('IN_SITE', 	true);
define('HOME_PAGE', true);
include_once("includes/common.php");


if($_SESSION['User_Name']){ // Check if user is logged in. If so display logged in user view
include_once($physical_path['Site_Lang'].'/logged_in_home.php');
include_once($physical_path['DB_Access']. 'HomePage.php');
$home_page_content 	= new HomePage();
$home_content = $home_page_content->ShowHomePage(3);

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"				=>	'logged_in_home'. $config['tplEx'],
						"JavaScript"		=>	array('home.js'),
						"site_intro"			=>	$home_content->home_content,
						"nav_select"			=>	'home',
						
						));

}else{ // otherwise user not logged in so display the default homepage

// including related database and language files
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/home.php');
include_once($physical_path['DB_Access']. 'HomePage.php');
$home_page_content 	= new HomePage();

$home_content = $home_page_content->ShowHomePage(2);
$home_intro = $home_page_content->ShowHomePage(1);
// creating objects
$cats 		= new Category();
$proj	 	= new project();


$cats->Home_Page_1();
$cnt = $db->num_rows();
$i = 0;
while($db->next_record())
{
	$arr_cat1_id[$i]			=	$db->f('cat_id');
	$arr_cat1_name[$i]			=	$db->f('cat_name');
	
	$proj->GetprojectAtHomePage_New($db->f('cat_id'));
	$project_count[$i] = $db1->num_rows();	
	$j=0;
	while($db1->next_record())
	{
		$view_pro[$i][$j]['id']					= $db1->f('project_id');
		$view_pro[$i][$j]['clear_title']		= clean_url($db1->f('project_title'));
		$view_pro[$i][$j]['status'] 			= $db1->f('project_status');
		$view_pro[$i][$j]['membership_id'] 	 	= $db1->f('membership_id');
		$view_pro[$i][$j]['project_date'] 		= $db1->f('project_posted_date');
		$view_pro[$i][$j]['premium_project'] 	= $db1->f('premium_project');
		$view_pro[$i][$j]['project_allow_bid'] 	= $db1->f('project_allow_bid');
		$view_pro[$i][$j]['title']		        = $db1->f('project_title');
		$view_pro[$i][$j]['urgent_project']		= $db1->f('urgent_project');
		list($view_pro[$i][$j]['bid'],$view_pro[$i][$j]['Ave_Bid'],$view_pro[$i][$j]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db1->f('project_id')));
		
		if($view_pro[$i][$j]['bid'] != 0)
		{
		  $view_pro[$i][$j]['Ave_Bid1'] = number_format((($view_pro[$i][$j]['Ave_Bid'])/($view_pro[$i][$j]['bid'])),2);
		}
	
		$j++;
	}
	$i++;
}
#print_r($url);die;
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################

$tpl->assign(array(	"T_Body"			=>	'logged_out_home2'. $config['tplEx'],
					"JavaScript"		=>	array('home.js'),
					"lang"				=>  $lang,
					"cat_id"  	  		=>	$arr_cat1_id,
					"cat_name"			=>	$arr_cat1_name,
					"Loop1"				=>	$cnt,
					"total_cat"			=>	$cnt-1,
					"project_count"		=>	$project_count,
					"view_project"    	=>	$view_pro,
					"url"    	        =>	$url,
					"tab"				=>	0,
					"user_name"         =>  $_SESSION['User_Name'],
					"marketing_content"	=>	$home_content->home_content,
					"site_intro"		=>	$home_intro->home_content,
					"nav_select"			=>	'home', 					
			));
##############################################################################################
}

$tpl->display('default_layout_orig'. $config['tplEx']);    // assign to layout template
?>