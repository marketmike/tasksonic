<?php
define('IN_SITE', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/task_owner_rating.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$project =  new project();

$project->rating_to_buyer($_SESSION['User_Name']);
$rscnt_buyer = $db->num_rows();
$i=0;
	while($db->next_record())
	{
		$arr_rating_buyer[$i]['id']					  = $db->f('project_id');
		$arr_rating_buyer[$i]['project_post_to']	  = $db->f('project_post_to');
		$arr_rating_buyer[$i]['project_posted_by']	  = $db->f('project_posted_by');
		$arr_rating_buyer[$i]['project_Title']		  = $db->f('project_title');
		$arr_rating_buyer[$i]['clear_title']		  = clean_url($db->f('project_title'));
		$arr_rating_buyer[$i]['project_Description']  = $db->f('project_description');
		$arr_rating_buyer[$i]['project_status']	      = $db->f('project_status');
		$i++;
	}
	
	$tpl->assign(array(
						"T_Body"			=>	'task_owner_rating'. $config['tplEx'],
                    	"user"              =>   $_SESSION['User_Name'], 
						"lang"				=>   $lang,
						"Loop_Buyer"   		=>   $rscnt_buyer,
						"arating_buyer"   	=>   $arr_rating_buyer,
						"tab"			 	=>  4,
						"navigation"		=> '<a href=account.php class=footerlink>'.$lang['tasker_activity'].'</a>',
						"navigation1"		=> '<label class=navigation>'.$_SESSION['User_Name'].$lang['My_Buyer_Rating'].'</label>',
					));
					
$tpl->display('default_layout'. $config['tplEx']);
?>