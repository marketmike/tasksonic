<?php
define('IN_SITE', 	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'HomePage.php');
include_once($physical_path['DB_Access']. 'Country.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['Site_Lang'].'/search_tasker_profiles.php');
include_once($physical_path['Site_Lang'].'/home.php');
// creating objects
$seller 	= new Seller();
$cats 		= new Category();
$home_page 	= new HomePage();
$country 	= new Country();
$buyer 		= new Buyers();

##############################################################################################					
/// get seller listing data from table for search
##############################################################################################
	
	$seller->Search_All_Sellers($_POST['search_this']);
	$cnt = $db1->num_rows();
	$i = 0;
	while($db1->next_record())
	{
		$arr_seller_description[$i]		=		$db1->f('seller_description');
		$arr_user_login_id[$i]			=		$db1->f('user_login_id');
		$arr_seller_logo[$i]			=		$db1->f('seller_logo');
		$arr_seller_description[$i]		=		$db1->f('seller_description');
		
		$arr_location_1[$i]				=		$db1->f('mem_state');
		$arr_location[$i]				=		$db1->f('mem_city').",".$db1->f('mem_state').",".$db1->f('country_name');
		$arr_location_2[$i]				=		$db1->f('mem_city').",".$db1->f('country_name');
		
		$arr_reviews[$i]				=		$seller->Average_Seller_Rating_Count($db1->f('user_login_id'));
		$arr_rating[$i] 				= 		number_format($seller->Average_Seller_Rating($db1->f('user_login_id')),2);
		$arr_earn[$i] 					= 		Sellect_Earning_Wallet(md5($db1->f('user_login_id')));
		
		$i++;
	}
	
	/// assing to template
	$tpl->assign(array(	"Loop"						=>	$cnt,		
						"img_path"           		=>  $virtual_path['Seller_Logo'],
						"seller_description"		=>	$arr_seller_description,		
						"user_login_id"				=>	$arr_user_login_id,	
						"seller_logo"				=>	$arr_seller_logo,	
						"seller_description"		=>	$arr_seller_description,	
						"location"					=>	$arr_location,	
						"location_1"				=>	$arr_location_1,
						"location_2"				=>	$arr_location_2,	
						"rating"					=>	$arr_rating,	
						"reviews"					=>	$arr_reviews,
						"earning"					=>	$arr_earn,
						"seller_keyword"			=>	$_SESSION['seller_keyword'],	
						"project_Array"	 			=>	fillArrayCombo($arr_langs["Search_Seller"],$_SESSION['seller_opt']),
				));

	/// used for pagination				
	if($_SESSION['total_record'] > $_SESSION['user_page_size'] && $cnt > 0)
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}
##############################################################################################					


##############################################################################################					
/// get homepage data from table and set them according to id
##############################################################################################
$home_page->ShowHomePage();
$i = 1;
while($db->next_record() )
{
	$tpl->assign(array(	"content_".$i.""		=>	$db->f('home_content'),
				));
	$i++;
}
##############################################################################################

##############################################################################################
///get country list in array and set it to combo box
##############################################################################################
$contry_list = $country->GetCountryList();
$Country	 = fillDbCombo($contry_list,'country_id','country_name');
##############################################################################################

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
$tpl->assign(array(	"T_Body"					=>	'search_tasker_profiles'. $config['tplEx'],
					"lang"						=>  $lang,
					"JavaScript"				=>	array('home.js'),
					"tab"						=>  2,	
					"navigation"				=>	'<label class=navigation>'.$lang['tasker_profileS'].'</label>'
			));
##############################################################################################


$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>