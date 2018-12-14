<?php
define('IN_SITE', 	true);
define('IN_USER',	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/extend_task.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$pro = new project();

if($Action == 'cancel')
{
	$details = $pro->GetprojectDetails($_GET['id']);
	$url_title = clean_url(stripslashes($details->project_title));
	$id = $_GET['id'];
	echo $assemble_url = 'task_' . $id . '_' . $url_title . '.html';
	header("location: $assemble_url");
	exit();
}
if($Action == 'Extend' && $_POST['Submit'] = $lang['Button_Submit'])
{	
	$posted_date = $_POST['project_posted_date'];
	
	$total_bidding_days = $_POST['bidding_days'] + $_POST['project_days_open'];
	$total_complete_days = $_POST['complete_date'] + $_POST['completed_by'];
	$bidding_date = date('l F d, Y', strtotime(date("Y-m-d", strtotime($posted_date)) . " +$total_bidding_days day"));
	$complete_date = date('l F d, Y', strtotime(date("Y-m-d", strtotime($posted_date)) . " +$total_complete_days day"));	
 	$strng_bidding_end_date = strtotime($bidding_date);
	$strng_task_end_date = strtotime($complete_date);
	
	if($strng_task_end_date < $strng_bidding_end_date)
	{	
	$ERROR .=  "Your bidding end date ($bidding_date) can not be later then the task completion date ($complete_date).<br /> Please extend days so that your task completion date is after your bidding end date!" ;
	$Action = 'ViewAll';
	}else{
	$details = $pro->GetprojectDetails($_GET['id']);
	$return_url = 'task_' . $details->project_id . '_' . clean_url($details->project_title) . '.html';
	$pro->Update_task_bidding_days($_POST,$total_bidding_days );
	$pro->Update_task_complete_days($_POST,$total_complete_days );	
	$tpl->assign(array(	
				"succ_msg"					=>	$lang['succ_msg'],
				"bidding_days_extend_by" 	=>	$_POST['bidding_days'],
				"completed_days_extend_by"	=>	$_POST['complete_date'],
				"return" 					=>	$return_url,				
				));
	}	
}
	$str = $_SERVER['HTTP_REFERER'];
	$str1 = substr(strrchr($str,'/'),1);
	
	if($str1 == "my-posted-tasks.html")
	{
		$navigation  = '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>';
		$navigation1 = '<a href=my-posted-tasks.html class=footerlink>'.$lang['View_My_All_project'].'</a>';
		$navigation2  	= '<label class=navigation>'.$lang['Ext_Proj'].'</label>';
	}
	else
	{
		$navigation 	= '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>';
		$navigation1  	= '<label class=navigation>'.$lang['Ext_Proj'].'</label>';
	}	
if($Action == 'ViewAll' || $Action == '' || $Action == 'Extend' )
{
	
	$details = $pro->GetprojectDetails($_GET['id']);
	// used to verify if task is still eligable to be extended, must be status 1 and no bids
	$project_status = $details->project_status;
	$bid_count = $pro->Get_Bid_Count_By_Id($_GET['id']);
	// end
	$var_completed_by = $details->completed_by;
	$var_project_days_open	 	=  $details->project_days_open;
	$tpl->assign(array(	"T_Body"			=>	'extend_task'. $config['tplEx'],
					"JavaScript"			=>	array('extend_task.js'),
					"lang"					=>  $lang,
                    "user_name"         	=>  $_SESSION['User_Name'], 
					"TOP_TITLE"         	=>  strtoupper($lang['Extend']),    
					"Site_Title"			=>	$config[WC_SITE_TITLE]." - ".$lang['Extend'],
					"pro_title"      		=>  stripslashes($details->project_title),
					"id"                	=>  $_GET['id'],
					"ERROR"				 	=>  $ERROR,
					"extend_bidding_days"	=>  fillArrayCombo($lang['project_Extend'],$_POST['bidding_days']),
					"extend_complete_date" 	=>  fillArrayCombo($lang['project_Extend'],$_POST['complete_date']),					
					"project_days_open"   	=>  date('l F d, Y', strtotime(date("Y-m-d", strtotime($details->project_posted_date)) . " +$var_project_days_open day")),
					"completed_by"        	=>  date('l F d, Y', strtotime(date("Y-m-d", strtotime($details->project_posted_date)) . " +$var_completed_by day")),
					"hidden_project_days_open"   	=>  $details->project_days_open,
					"hidden_completed_by"        	=>  $details->completed_by,					
					"project_posted_date" 	=>  $details->project_posted_date,					
					"Link"          		=>  3,	// Used for Buyer Submenu
					"Current_Page"			=>	'buyer', // Used for selection of menu
					"url_title"			 	=> clean_url(stripslashes($details->project_title)),
					"project_status"   		=>  $project_status,
					"bid_count"   			=>  $bid_count,
					));

}
$tpl->display('default_layout'. $config['tplEx']);
?>