<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/tasker_activity.php');
include_once($physical_path['DB_Access']. 'Seller.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

$seller = new Seller();

$seller->Seller_Win_projects($_SESSION['User_Name'],$citycurrent);
$cnt = $db->num_rows();
$i = 0;
	while($db->next_record())
	{
	    $seller_task_win[$i]['id']						=		$db->f('project_id');
		$seller_task_win[$i]['project_Title']			=		$db->f('project_title');
		$seller_task_win[$i]['tasker_completed']		=		$db->f('tasker_completed');		
		$seller_task_win[$i]['clear_title']				=		clean_url($db->f('project_title'));
		$seller_task_win[$i]['project_status']			=		$db->f('project_status');
																$completed_by  = $db->f('completed_by');
		$seller_task_win[$i]['completed_by']	 		=  		date('l F d, Y', strtotime(date("Y-m-d", strtotime($db->f('project_posted_date'))) . " +$completed_by day"));
		$seller_task_win[$i]['completed_time']	 		=  		date("g:i a", strtotime($db->f('completed_time')));
		$i++;
	}
	/// assing to template
	$tpl->assign(array(	
							"T_Body"					=>	'tasker_activity'. $config['tplEx'],
							"Loop1"						=>	$cnt,		
							"aseller_win"				=>	$seller_task_win,	
							"JavaScript"	    		=>  array("seller.js"),
							"navigation"		 	  	=> '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>',
							"navigation1"		  	  	=> '<label class=navigation>'.$_SESSION['User_Name'].$lang['Seller_Activites'].'</label>',
					));

	$seller->Seller_Place_projects($_SESSION['User_Name']);
	
	$cnt_bid = $db->num_rows();
	$i = 0;
		while($db->next_record())
		{
		    $seller_task_bid[$i]['bid_id']					=		$db->f('bid_id');
			$seller_task_bid[$i]['id']						=		$db->f('project_id');
			$seller_task_bid[$i]['clear_title']				=		clean_url($db->f('project_title'));
			$seller_task_bid[$i]['project_post_to']			=		$db->f('project_post_to');
			$seller_task_bid[$i]['project_Title']			=		$db->f('project_title');
			$seller_task_bid[$i]['project_status']			=		$db->f('project_status');
			$seller_task_bid[$i]['bid_status']				=		$db->f('bid_status');
			$seller_task_bid[$i]['clear_title']				=		clean_url($db->f('project_title'));
			$i++;
		}
		
		/// assing to template
		$tpl->assign(array(	
								"Loop_bid"					=>	$cnt_bid,		
								"aseller_bid"				=>	$seller_task_bid,	
								"user"                      =>  $_SESSION['User_Name'],
						));
if($Action=='Delete' && $_POST['bid_id'])
{

	$val = $seller->Delete($_POST['bid_id']);
	header("location: my-assigned-tasks.html");
	exit();
}					
	
	/* assign language */
	$tpl->assign(array(	
						"lang"						=>  $lang,			
						"tab"						=>  4,
						));						
					
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>