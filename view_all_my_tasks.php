<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/view_all_my_tasks.php');

$buyer = new Buyers();
$pro = new project();
if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];
$result = $buyer->ViewAll_project_User($_SESSION['User_Id'],$citycurrent);

$rscnt = $db->num_rows();
$i=0;
	while($db->next_record())
	{
	
	#====================================================================================================
	#	Description 1	:  Used to calculate and display time remaining
	#----------------------------------------------------------------------------------------------------
		$project_days_open = $db->f('project_days_open');
		$project_posted_date = $db->f('project_posted_date'); 
		$bidding_time = $db->f('bidding_time');
		$completed_by  = $db->f('completed_by');
		
		#   Used for php counter	
		$bidding_end_date 	=  date('Y-m-d', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$bid_end = new Datetime($bidding_end_date. ' ' . $bidding_time);
		$now = new Datetime();
		$seconds_remaining = $bid_end->format('U') - $now->format('U');
		
		$time_remaining = sec2hms ($seconds_remaining);	// function call to establish time remaining on bidding
		
		$arr_post_project[$i]['time_remaining']		  = $time_remaining;		
		$arr_post_project[$i]['id']					  = $db->f('project_id');
		$arr_post_project[$i]['project_post_to']	  = $db->f('project_post_to');
		$arr_post_project[$i]['award_task_date']	  = $db->f('award_project_date');
		$arr_post_project[$i]['project_Title']		  = $db->f('project_title');
		$arr_post_project[$i]['clear_title']		  = clean_url($db->f('project_title'));
		$arr_post_project[$i]['project_Description']  = $db->f('project_description');
		$arr_post_project[$i]['project_status']	      = $db->f('project_status');
		$arr_post_project[$i]['completed_by']	 	  = date('l F d, Y', strtotime(date("Y-m-d", strtotime($db->f('project_posted_date'))) . " +$completed_by day"));
		$arr_post_project[$i]['completed_time']	 	  = date("g:i a", strtotime($db->f('completed_time')));		

		list($arr_post_project[$i]['bid'],$arr_post_project[$i]['Ave_Bid'],$arr_post_project[$i]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db->f('project_id')));
		if($arr_post_project[$i]['bid'] != 0)
		{
		  $arr_post_project[$i]['Ave_Bid1'] = number_format((($arr_post_project[$i]['Ave_Bid'])/($arr_post_project[$i]['bid'])),2);
		}

		$i++;
	}
$tpl->assign(array(	"T_Body"			=>	'view_all_my_tasks'. $config['tplEx'],
                    "user_name"         =>   $_SESSION['User_Name'], 
					"TOP_TITLE"         =>  strtoupper($lang['Buyer']),    
					"Site_Title"		=>	$config[WC_SITE_TITLE]." - ".$lang['Buyer'],
					"Loop1"				=>	$rscnt,
					"post_project"      =>  $arr_post_project,
					"Count"				=>	$count,
					"tab"				=>  4,
					"lang"				=>  $lang,
					"navigation"		=> '<a href="my-account.html" class=footerlink>'.$lang['Buyer'].'</a>',
					"navigation1"		=> '<label class=navigation>'.$lang['My_All_projects'].'</label>',
					));
	/// used for pagination				
	if($_SESSION['total_record'] > $_SESSION['user_page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}
	
// Get staged task if there are any
$staged_results = $pro->ViewAll_Staged_Task_User_Open($_SESSION['User_Id'],$citycurrent);
$stagedcnt = $db3->num_rows();
$i=0;
	while($db3->next_record())
	{	
		$arr_staged_task[$i]['id']					  = $db3->f('project_id');
		$arr_staged_task[$i]['project_Title']		  = $db3->f('project_title');
		$arr_staged_task[$i]['project_posted_date']	  = $db3->f('project_posted_date');
		$arr_staged_task[$i]['clear_title']		      = clean_url($db3->f('project_title'));


		$i++;
	}

$tpl->assign(array(	"StagedLoop"				=>	$stagedcnt,
					"staged_task"       =>  $arr_staged_task,
					));	
	
	
$tpl->display('default_layout'. $config['tplEx']);
?>