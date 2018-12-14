<?php

define('IN_SITE', 	true);
define('IN_USER',	true);

include_once("includes/common.php");
// including related database and language files
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Country.php');
include_once($physical_path['DB_Access']. 'task.php');

include_once($physical_path['Site_Lang'].'/logged_in_home.php');
include_once($physical_path['Site_Lang'].'/home.php');
include_once($physical_path['DB_Access']. 'HomePage.php');
$home_page_content 	= new HomePage();
$home_content = $home_page_content->ShowHomePage(4);

// creating objects
$cats 		= new Category();
$country 	= new Country();
$proj	 	= new project();


##############################################################################################
///get country list in array and set it to combo box
##############################################################################################
$contry_list = $country->GetCountryList();
$Country	 = fillDbCombo($contry_list,'country_id','country_name');
##############################################################################################

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################

$tpl->assign(array(	"T_Body"						=>	'latest_open_tasks'. $config['tplEx'],
					"JavaScript"					=>	array('home.js'),
					"lang"              			=>  $lang,
					"page_content"					=>	$rsPage->page_content,	
					"Cat_Options_1"					=>	$cats->Home_Page_1(),		// get first 9 category 
					"Cat_Options_2"					=>	$cats->Home_Page_2(),		// get next 9 category after first period
					"Country_List"					=>	$Country,					// assing combo of country
					"project_Array"	 				=>	fillArrayCombo($arr_langs["Search_project"]),    // display array in combo box
					"navigation"					=>	'<label class=navigation>'.$lang['Find_project'].'</label>',
					"path"              			=>  $virtual_path['Seller_Logo'],					
					"user_name"        				=>  $_SESSION['User_Name'],
					"marketing_content"				=>	$home_content->home_content,					


					
					));
##############################################################################################



##############################################################################################

##############################################################################################					
/// get project listing data from table 
##############################################################################################
if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];

$proj->ViewAll_projects_by_city($citycurrent);
$rscntpro = $db->num_rows();	// get num of rows
$i=0;
while($db->next_record())		// loop till last record
{ 
	$view_pro[$i]['id']					= $db->f('project_id');
	$view_pro[$i]['status'] 			= $db->f('project_status');
	$view_pro[$i]['clear_title']		= clean_url($db->f('project_title'));
	$view_pro[$i]['premium_project'] 	= $db->f('premium_project');
	$view_pro[$i]['membership_id'] 		= $db->f('membership_id');
	$view_pro[$i]['project_date'] 		= $db->f('project_posted_date');
	$view_pro[$i]['title1']		        = $db->f('project_title');
	$view_pro[$i]['dec']		        = $db->f('project_description');
	$view_pro[$i]['urgent_project']		= $db->f('urgent_project');
	$view_pro[$i]['project_posted_by']	= $db->f('project_posted_by');
	$view_pro[$i]['title']				= urlencode($db->f('project_title'));
	$view_pro[$i]['url']				= urlencode($config[WC_SITE_URL] . '/task_' . $db->f('project_id') . '_' . clean_url($db->f('project_title')) . '.html');
	$view_pro[$i]['summary']			= urlencode('Check Out This Cool Task On Task Sonic');
	$view_pro[$i]['image']				= urlencode($config[WC_SITE_URL] . '/images/logo.png');
	
	$fb_profile_img = Get_FB_ID($db->f('project_posted_by'));
	if($fb_profile_img != NULL || $fb_profile_img != '')
	{
	$view_pro[$i]['fb_profile_img']		= '<img id="image" src="https://graph.facebook.com/' . $fb_profile_img . '/picture" width="70" style="vertical-align:middle;" />';		
	}
	$view_pro[$i]['project_days_open'] 	= date('l F d, Y', strtotime(date("Y-m-d", strtotime($db->f('project_posted_date'))) . " +" . $db->f('project_days_open') . " day"));
	$view_pro[$i]['bidding_time']	 	= date("g:i a", strtotime($db->f('bidding_time')));	
	$view_pro[$i]['completed_by']	 	= date('l F d, Y', strtotime(date("Y-m-d", strtotime($db->f('project_posted_date'))) . " +" . $db->f('completed_by') . " day"));
	$view_pro[$i]['completed_time']	 	= date("g:i a", strtotime($db->f('completed_time')));	
		
	list($view_pro[$i]['bid'],$view_pro[$i]['Ave_Bid'],$view_pro[$i]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db->f('project_id')));
	
	$view_pro[$i]['category']		    =  Get_Cat_Names_project($db->f('project_category'));		// get category name

	$view_pro[$i]['buyer_logo'] 		=  Get_Profile_Img($db->f('auth_id_of_post_by'));	// get profile picture
	
	if($view_pro[$i]['bid'] != 0)
	{
	  $view_pro[$i]['Ave_Bid1'] = number_format((($view_pro[$i]['Ave_Bid'])/($view_pro[$i]['bid'])),2);
	}

$project_days_open = $db->f('project_days_open');
$completed_by  = $db->f('completed_by');
$project_posted_date = $db->f('project_posted_date'); 
$bidding_time = $db->f('bidding_time');

	#====================================================================================================
	#	Description 1	:  Used to calulcate when bidding time has expired using date and time settings
	#   Description 2   : function call to establish time remaining on bidding
	#   Used In   : task.php home.php	
	#----------------------------------------------------------------------------------------------------

		$bidding_end_date 	=  date('Y-m-d', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$bid_end = new Datetime($bidding_end_date. ' ' . $bidding_time);
		$now = new Datetime();
		$seconds_remaining = $bid_end->format('U') - $now->format('U');
		
		$view_pro[$i]['time_remaining']	 = sec2hms ($seconds_remaining);	// function call to establish time remaining on bidding
		
		if ($bid_end->format('U') > $now->format('U')) {
			$view_pro[$i]['bid_status'] = 1;
		}else{
			$view_pro[$i]['bid_status'] = 0;
		}
	#====================================================================================================
	#	End
	#----------------------------------------------------------------------------------------------------	

	$i++;
}
global $cnt;
	/// assign to template
	$tpl->assign(array(	"view_project"    	=>	$view_pro,
						"Loop"				=>	$rscntpro,
						"nav_select"		=>	'latest',						
				));
				
	/// used for pagination				
	if($_SESSION['total_record'] > $_SESSION['user_page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>