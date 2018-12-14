<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

// including related database and language files
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Country.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Member.php');

include_once($physical_path['Site_Lang'].'all_tasker_profiles.php');
// creating objects
$seller 	= new Seller();
$cats 		= new Category();
$category	= new Category();
$country 	= new Country();
$buyer 		= new Buyers();
$member 	= new Member();

##############################################################################################					
/// get list of available categories to build right rail menu 
##############################################################################################

$category->Get_Catagory_List();
$cat_cnt = $db2->num_rows();
$j = 0;

while($db2->next_record())
{
	$arr_cat[$j]['id']					=	$db2->f('cat_id');
	$arr_cat[$j]['desc']				=	$db2->f('cat_desc');
	
##############################################################################################					
/// get count of taskers for each category 
##############################################################################################
	$member->GetSellerCount($db2->f('cat_id'),$citycurrent);
	$arr_cat[$j]['member_count_menu']	=	$db3->num_rows();
	
		

$j++;	
}	

##############################################################################################					
/// get seller listing data from table 
##############################################################################################

	$member->GetSeller($_GET['cat_id'],$citycurrent);
	
	$member_count = $db1->num_rows();

	$cat_name = $cats->getTitle($_GET['cat_id']);	
		
	$i=0;
	while($db1->next_record())
	{
		$arr_seller[$i]['description']		=		$db1->f('seller_description');
		$arr_seller[$i]['login_id']			=		$db1->f('user_login_id');
		$arr_seller[$i]['logo']				=		$db1->f('seller_logo');
		$arr_seller[$i]['mother_lang']		=		$db1->f('mother_lang');
		$arr_seller[$i]['lang_pairs']		=		$db1->f('lang_pairs');
		$arr_seller[$i]['location_1']		=		$db1->f('state_name');
		$arr_seller[$i]['location']			=		$db1->f('mem_city').", ".$db1->f('state_name').", ".$db1->f('country_name');
		if($db1->f('country_name') != '')
		{
			$arr_seller[$i]['location_2']	=		$db1->f('mem_city').", ".$db1->f('country_name');
		}
		if($db1->f('country_name') == '')	
		{
			$arr_seller[$i]['location_2']	=		$db1->f('mem_city');
		}
		$arr_seller[$i]['reviews']			=		$seller->Average_Seller_Rating_Count($db1->f('user_login_id'));
		$arr_seller[$i]['rating']			= 		number_format($seller->Average_Seller_Rating($db1->f('user_login_id')),2);
		$arr_seller[$i]['earning']			= 		Sellect_Earning_Wallet(md5($db1->f('user_login_id')));
		$arr_seller[$i]['fb_verfy']		    = 		if_is_fb_connec(md5($db1->f('user_login_id')));
		$arr_seller[$i]['email_verfy']		= 		if_is_email_verified(md5($db1->f('user_login_id')));								
		$arr_seller[$i]['human_verfy']		= 		if_is_human_verified(md5($db1->f('user_login_id')));
		$arr_seller[$i]['background_verfy'] = 		if_is_background_chk(md5($db1->f('user_login_id')));
		$arr_seller[$i]['address_verfy'] 	= 		if_is_address_verify(md5($db1->f('user_login_id')));

	$fb_connect = Get_FB_ID($arr_seller[$i]['login_id']);
	if ($fb_connect){ 
	$fb_img[$i] = '<img id="image" src="https://graph.facebook.com/' .$fb_connect . '/picture" width="100" style="vertical-align:middle;" />';
	}		
		$arr_seller[$i]['fb_img'] 	= 		$fb_img[$i];
		$i++;
	}
	


// assing to template
	$tpl->assign(array(	"Loop"				=>	$member_count,
						"CatLoop"			=>	$cat_cnt,		
						"img_path"     		=>  $virtual_path['Seller_Logo'],
						"arr_seller"    	=>	$arr_seller,
						"cat_name" 			=>  $cat_name,
						"arr_cat"  	  		=>	$arr_cat,					
						"tab"				=>	2,
						"hidemap"			=>	'true',						
				));

	/// used for pagination				
	if($_SESSION['total_record'] > $_SESSION['user_page_size'] && $member_count > 0)
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}
##############################################################################################					

##############################################################################################


##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
$tpl->assign(array( "T_Body"			=>	'all_tasker_profiles'. $config['tplEx'],
					"JavaScript"		=>	array('home.js'),
					"lang"				=>	$lang,
					"navigation"		=>	'<label class=navigation>'.$lang['Find_Sellers'].'</label>'
			));
##############################################################################################


$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>