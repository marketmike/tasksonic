<?php
define('IN_SITE', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/tasker_rating.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$project =  new project();

$project->rating_to_seller($_SESSION['User_Name']);
$rscnt_seller = $db->num_rows();
$i=0;
	while($db->next_record())
	{
		$arr_rating_seller[$i]['id']					  = $db->f('project_id');
		$arr_rating_seller[$i]['project_post_to']	  	  = $db->f('project_post_to');
		$arr_rating_seller[$i]['project_posted_by']	  	  = $db->f('project_posted_by');
		$arr_rating_seller[$i]['project_Title']			  = $db->f('project_title');
		$arr_rating_seller[$i]['clear_title']		  	  = clean_url($db->f('project_title'));
		$arr_rating_seller[$i]['project_Description'] 	  = $db->f('project_description');
		$arr_rating_seller[$i]['project_status']	      = $db->f('project_status');
		$i++;
	}

$tpl->assign(array(	"T_Body"			=>	'tasker_rating'. $config['tplEx'],
                    "user"              =>   $_SESSION['User_Name'], 
					"Loop_Seller"       =>   $rscnt_seller,
					"arating_seller"    =>   $arr_rating_seller,
					"lang"				=>   $lang,
					"navigation"		=> '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>',
					"navigation1"		=> '<label class=navigation>'.$_SESSION['User_Name'].$lang['Seller_Rating'].'</label>',
					"tab"			 	=>  4,
					));
					
				
$tpl->display('default_layout'. $config['tplEx']);
?>