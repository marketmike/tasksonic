<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/viewtask_ownerprofile.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['DB_Access']. 'Page.php');
include_once($physical_path['DB_Access']. 'task.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
// creating objects

$buyer = new Buyers();
$seller = new Seller();
$proj	= new project();

	$user_name =  $user->Check_User_ID($_GET['user']);	// to check profile exist or not
	
	$result1 = $buyer->GetUserDetails($_GET['user']);	// to get data of profile
	$db->next_record();
	$str = $_SERVER['HTTP_REFERER'];
	
	 $str1 = substr(strrchr($str,'/'),1);
	
	if($db->f('mem_state') == '')
	{ 
	  $location1 = $db->f('mem_city').",".$db->f('country_name');
	}
	else
	{
	  $location1 = $db->f('mem_city').",".$db->f('state_name').",".$db->f('country_name');
	}
	
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$fb_connect = Get_FB_ID($_GET['user']);
	if ($fb_connect){ 
	$fb_img = '<img id="image" src="https://graph.facebook.com/' .$fb_connect . '/picture" width="125" style="vertical-align:middle;" />';
	}	
	if($db->f('buyers_slogan') == '')
	{
		$slogan = $_GET['user'].$lang['task_owner_profile'];
	}
	else
	{
		$slogan = stripslashes($db->f('buyers_slogan'));
	}
	
	$tpl->assign(array(	"T_Body"			  => 'viewtask_ownerprofile'. $config['tplEx'],
						"Location1"           => $location1,
						"Slogan"              => stripslashes($slogan),
						"Desc"                => $db->f('buyers_description'),
						"emply"				  => $db->f('mem_employes'),	
						"city"				  => $db->f('mem_city'),
						"organization"		  => $db->f('mem_organization'),
						"website"			  => $db->f('mem_website'),
						"buyer_logo"		  => $db->f('seller_logo'),				
						"user"				  => $_GET['user'],
						"user_name"           => $user_name,
						'fb_verfy'		 	  => if_is_fb_connec(md5($db->f('user_login_id'))),
						'email_verfy'		  => if_is_email_verified(md5($db->f('user_login_id'))),								
						'human_verfy'		  => if_is_human_verified(md5($db->f('user_login_id'))),
						'background_verfy' 	  => if_is_background_chk(md5($db->f('user_login_id'))),
						'address_verfy' 	  => if_is_address_verify(md5($db->f('user_login_id'))),
						"fb_img"        	  => $fb_img,						
						
						
						"navigation"		  =>	$navigation,
						"navigation1"		  =>	$navigation1,
						"navigation2"		  =>	$navigation2,
					));
##############################################################################################
					
   	$buyer->ViewAll_Buyer_Rating1($_GET['user']);				
	$rscnt = $db1->num_rows();
	$v=0; 			
	
	while($db1->next_record())
	{
		$arr_rating[$v]['project_title']	 = $db1->f('project_title');
		$arr_rating[$v]['dec']				 = wordwrap( $db1->f('description'), 15, "\n", 1);
		$arr_rating[$v]['project_id']		 = $db1->f('project_id');
		$arr_rating[$v]['date_time']		 = $db1->f('date_time');
		$arr_rating[$v]['rating_by_user']	 = $db1->f('rating_by_user');
		$arr_rating[$v]['rating']	   		 = $db1->f('rating');
		$arr_rating[$v]['averating']         = $buyer->Total_Ratings_By_Tasker($db1->f('rating_by_user'));
		$v++;
	}	
 
	$tpl->assign(array(	"arating"				=>	$arr_rating,
						"Loop"				    =>	$rscnt,	
						"lang"					=>  $lang,
					));							
##############################################################################################					
/// get all projects data which are open posted by user
##############################################################################################
if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];

$proj->ViewAll_project_User_Open($db->f('user_auth_id'),$citycurrent);
$taskcnt = $db3->num_rows();

$i=0;
	while($db3->next_record())
	{
			$arr_post_project[$i]['id']					  	= $db3->f('project_id');
			$arr_post_project[$i]['status']	      			= $db3->f('project_status');			
			$arr_post_project[$i]['clear_title']		  	= clean_url($db3->f('project_title'));
			$arr_post_project[$i]['project_Title']		  	= $db3->f('project_title');
			$arr_post_project[$i]['premium_project'] 		= $db3->f('premium_project');
			$arr_post_project[$i]['membership_id'] 			= $db3->f('membership_id');
			$arr_post_project[$i]['project_date'] 			= $db3->f('project_posted_date');
			$arr_post_project[$i]['title']		        	= $db3->f('project_title');			
			$arr_post_project[$i]['dec']  					= $db3->f('project_description');
			$arr_post_project[$i]['urgent_project']			= $db3->f('urgent_project');
			$arr_post_project[$i]['project_posted_by']		= $db3->f('project_posted_by');
			$fb_profile_img = Get_FB_ID($_GET['user']);
			$arr_post_project[$i]['fb_profile_img']			= '<img id="image" src="https://graph.facebook.com/' .$fb_profile_img . '/picture" width="70" style="vertical-align:middle;" />';				
			$arr_post_project[$i]['project_days_open'] 		= date('l F d, Y', strtotime(date("Y-m-d", strtotime($db3->f('project_posted_date'))) . " +" . $db3->f('project_days_open') . " day"));
			$arr_post_project[$i]['bidding_time']	 		= date("g:i a", strtotime($db3->f('bidding_time')));	
			$arr_post_project[$i]['completed_by']	 		= date('l F d, Y', strtotime(date("Y-m-d", strtotime($db3->f('project_posted_date'))) . " +" . $db3->f('completed_by') . " day"));
			$arr_post_project[$i]['completed_time']	 		= date("g:i a", strtotime($db3->f('completed_time')));			
			$arr_post_project[$i]['category']		   	    =  Get_Cat_Names_project($db3->f('project_category'));		// get category name
			$arr_post_project[$i]['buyer_logo_task'] 		=  Get_Profile_Img($db3->f('auth_id_of_post_by'));	// get profile picture			

		list($arr_post_project[$i]['bid'],$arr_post_project[$i]['Ave_Bid'],$arr_post_project[$i]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db3->f('project_id')));
		if($arr_post_project[$i]['bid'] != 0)
		{
		  $arr_post_project[$i]['Ave_Bid1'] = number_format((($arr_post_project[$i]['Ave_Bid'])/($arr_post_project[$i]['bid'])),2);
		}
		$i++;
	}
	$tpl->assign(array(	"TaskLoop"			=>	$taskcnt,
						"view_project"      =>  $arr_post_project,
						"path"              =>  $virtual_path['Seller_Logo'],
						"City"				=>	$citycurrent,				
					));
						/// used for pagination				
	if($_SESSION['total_record'] > $_SESSION['user_page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}
##############################################################################################
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>