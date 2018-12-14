<?php
define('IN_SITE', 	true);
define('IN_USER',	true);

include_once("includes/common.php");
include ("generate_map_recent_all.php");
include_once($physical_path['Site_Lang'].'/post_task_sucessfully.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'task.php');

// creating objects

$buyer   = new Buyers();
$pro	 = new project();

##############################################################################################					
/// get all projects data which are open posted by user
##############################################################################################
$result = $pro->ViewAll_project_User_Open($_SESSION['User_Id'],$citycurrent);
$rscnt = $db3->num_rows();

$i=0;
	while($db3->next_record())
	{
		$arr_post_project[$i]['id']					  = $db3->f('project_id');
		$arr_post_project[$i]['project_Title']		  = $db3->f('project_title');
		$arr_post_project[$i]['clear_title']		  = clean_url($db3->f('project_title'));
		$arr_post_project[$i]['project_Description']  = $db3->f('project_description');
		$arr_post_project[$i]['project_status']	      = $db3->f('project_status');

		list($arr_post_project[$i]['bid'],$arr_post_project[$i]['Ave_Bid'],$arr_post_project[$i]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db3->f('project_id')));
		if($arr_post_project[$i]['bid'] != 0)
		{
		  $arr_post_project[$i]['Ave_Bid1'] = number_format((($arr_post_project[$i]['Ave_Bid'])/($arr_post_project[$i]['bid'])),2);
		}
		$i++;
	}
##############################################################################################

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"		        	=>	'post_task_sucessfully'. $config['tplEx'],
						"task_post"					=>	$lang['Msg'],
						"header"					=>  $lang['Task_Header'],
						"task_recent"				=>  $lang['Task_Recent'],
						"lang"						=>  $lang,
						"user_name"         		=>  $_SESSION['User_Name'], 
						"TOP_TITLE"        			=>  strtoupper($lang['Buyer']),    
						"Site_Title"				=>	$config[WC_SITE_TITLE]." - ".$lang['Buyer'],
						"Loop1"						=>	$rscnt,
						"post_project"      		=>  $arr_post_project,
						"succMsg"           		=>  $SuccMsg,
						"tab"          				=>  4,						
						));

$tpl->display('default_layout'. $config['tplEx']);
?>