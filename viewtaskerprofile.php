<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/viewtaskerprofile.php');
include_once($physical_path['Site_Lang']. '/all_portfolio.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include($physical_path['DB_Access']. 'Industry.php');
include($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
// creating objects
$buyer 		= new Buyers();
$seller 	= new Seller();
$industry	= new Industry();
$cate		= new Category();
$portfolio  = new Portfolio();


    $user_name =  $user->Check_User_ID($_GET['user']);	// to check profile exist or not
	
			$fb_connect = Get_FB_ID($_GET['user']);
			if ($fb_connect){ 
			$fb_img = '<img id="image" src="https://graph.facebook.com/' .$fb_connect . '/picture" width="125" style="vertical-align:middle;" />';
			}			
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			  => 'viewtaskerprofile'. $config['tplEx'],
						"JavaScript"		  =>  array("lightbox.js"),
						"lang"				  =>  $lang,
						"avg_rating"          => $seller->Get_Avg_Skill_User(md5($_GET['user'])),	// get skill of user
						"skill_count"		  => $seller->Skill_Count_User(md5($_GET['user'])),		// get skill count of user
						"Listing"			  => $seller->Skills_Listing(md5($_GET['user'])),		// get listing of skills
						"img_path"            => $virtual_path['Seller_Logo'],
						"earn_by_site"        => Sellect_Earning_Wallet(md5($_GET['user'])),
						'fb_verfy'		 	  => if_is_fb_connec(md5($_GET['user'])),
						'email_verfy'		  => if_is_email_verified(md5($_GET['user'])),								
						'human_verfy'		  => if_is_human_verified(md5($_GET['user'])),
						'background_verfy' 	  => if_is_background_chk(md5($_GET['user'])),
						'address_verfy' 	  => if_is_address_verify(md5($_GET['user'])),						
						"fb_img"        	  => $fb_img,
						"user_name1" 		  => $_GET['user'],																	
						
					));
##############################################################################################

##############################################################################################
/// get industry listing with name
##############################################################################################
	$buyer->GetUserDetails($_GET['user']);
	$db->next_record();
	$str = $_SERVER['HTTP_REFERER'];
	
	$str1 = substr(strrchr($str,'/'),1);
	
	if($str1 == 'my-account.html')
	{
		$navigation = '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>';
		$navigation1= '<label class=navigation>'.$db->f('seller_slogan').'</label>';
	}
	else if($str1 == 'all_portfolio.php')
	{
		
		$navigation		= '<a href=tasker_category_list.php class=footerlink>'.$lang['Find_Portfolio'].'</label>';
		$navigation1	= '<label class=navigation>'.$db->f('seller_slogan').'</label>';
	}
	else
	{
		$navigation		 	  = '<a href=tasker_category_list.php class=footerlink>'.$lang['Find_Seller'].'</a>';
		$navigation1	  	  = '<label class=navigation>'.$db->f('seller_slogan').'</label>';
	}
	$industries = "";
	if($db->f('seller_industry') != "")
	{
		$arr_industry	=	explode(",",$db->f('seller_industry'));	
		
		foreach($arr_industry as $key => $val)
		{
			$names 	=	$industry->Get_Industry_Name($val);		// to get name of industry from id
			$industries =	$industries.$names."<BR>";
		}
    }
##############################################################################################
/// get Location(If State is there taken city,state,country else city,country)
##############################################################################################
	
	if($db->f('mem_state') != '')
	{
	   $location = $db->f('mem_city').",".$db->f('state_name').",".$db->f('country_name');
	}
	else
	{
	   $location = $db->f('mem_city').",".$db->f('country_name');
	}
##############################################################################################
// assign to template
	if($db->f('seller_slogan') == '')
	{
		$slogan	= $_GET['user'].$lang['tasker_profile'];
	}
	else
	{
		$slogan = $db->f('seller_slogan');
	}
	$tpl->assign(array(	"seller_slogan"           => $slogan,
						"seller_description"      => $db->f('seller_description'),
						"seller_rate_per_hour"    => $db->f('seller_rate_per_hour'),
						"seller_exp"			  => $db->f('expe_title'),
						"location"				  => $location,
						"mem_employes"			  => $db->f('mem_employes'),
						"membership_id"			  => $db->f('membership_id'),
						"seller_logo"			  => $db->f('seller_logo'),
						"industries"			  => $industries,
						"mother_lang"             => $db->f('mother_lang'),
						"lang_pairs"           	  => $db->f('lang_pairs'),
						"user_name"           	  => $user_name,
						"user"           	 	  => $_GET['user'],
						"TOP_TITLE"      		  => strtoupper($_GET['user']."<BR>".$db->f('seller_slogan')),
						"Site_Title"	 	      => $_GET['user']." - ".$location,
						"Meta_Description"		  => $db->f('seller_description'),
						"navigation"		=>	$navigation,
						"navigation1"		=>	$navigation1,
						"navigation2"		=>	$navigation2,
					 ));
	
    $ave_rating = number_format($seller->Average_Seller_Rating($_GET['user']),2);	
	
	$tpl->assign(array(	"rating"           => $ave_rating,
	                    ));
						
						
 	$ave_count = $seller->Average_Seller_Rating_Count($_GET['user']);
	$tpl->assign(array(	"ave_count"           => $ave_count,
	                    ));
##############################################################################################
/// get portfolio listing for partucular user
##############################################################################################
	$seller->GetSellerPortfolioByName($_GET['user']);		
	$cnt = $db->num_rows();
	$i=0;
	while($db->next_record())
	{
		$arr_portfolio[$i]['title']					= 	$db->f('title');
		$arr_portfolio[$i]['desc']					= 	$db->f('description');
		$arr_portfolio[$i]['sample_file']	 	  	=	$db->f('sample_file');
		$i++;
	}
	
	/// assing to template
	$tpl->assign(array(	"Loop"						=>	$cnt,
						"iportfolio"		   		=> 	$arr_portfolio,	
						"user_name"					=>	$_GET['user'],
						"hidemap"					=>	'hide',
						"img_path_port"             => $virtual_path['Portfolio'],						
						"tab"						=>	3,
				));	

	$seller->ViewAll_Seller_Rating1($_GET['user']);				
	$rscnt1 = $db1->num_rows();
	$i=0; 			
	
	while($db1->next_record())
	{
		$arr_rating[$i]['project_title']	 = $db1->f('project_title');
		$arr_rating[$i]['dec']				 = wordwrap( $db1->f('description'), 15, "\n", 1);
		$arr_rating[$i]['project_id']		 = $db1->f('project_id');
		$arr_rating[$i]['date_time']		 = $db1->f('date_time');
		$arr_rating[$i]['rating_by_user']	 = $db1->f('rating_by_user');
		$arr_rating[$i]['rating']	   		 = $db1->f('rating');
		$arr_rating[$i]['averating']         = $seller->Total_Ratings_By_task_owner($db1->f('rating_by_user'));
		$i++;
	}	
   
	$tpl->assign(array(	"arating"				=>	$arr_rating,
						"Loop1"				    =>	$rscnt1,
						"lang"					=>  $lang,	
						"tab"					=>  2,
						
					));
					

$seller->Seller_Win_projects($_GET['user'],$citycurrent);
$cnt = $db->num_rows();
$i = 0;
	while($db->next_record())
	{
	    $seller_project_win[$i]['id']						=		$db->f('project_id');
		$seller_project_win[$i]['project_Title']			=		$db->f('project_title');
		$seller_project_win[$i]['clear_title']				=		clean_url($db->f('project_title'));
		$seller_project_win[$i]['project_status']			=		$db->f('project_status');
		$i++;
	}
	/// assing to template
	$tpl->assign(array(	
							
							"LoopWon"					=>	$cnt,		
							"aseller_win"				=>	$seller_project_win,	
							"navigation"		 	  	=> '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>',
							"navigation1"		  	  	=> '<label class=navigation>'.$_SESSION['User_Name'].$lang['Seller_Activites'].'</label>',
					));	
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>