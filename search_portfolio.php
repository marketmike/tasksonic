<?php
define('IN_SITE', 	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'HomePage.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['Site_Lang']. '/all_portfolio.php');
include_once($physical_path['Site_Lang'].'/home.php');

// creating objects
$cats 		= new Category();
$home_page 	= new HomePage();
$portfolio  = new Portfolio();
$buyer 		= new Buyers();
$seller 	= new Seller();


##############################################################################################

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
$tpl->assign(array(	"T_Body"				=>	'search_portfolio'. $config['tplEx'],
					"JavaScript"		 	=>  array("seller.js"),
					"img_path"              =>  $virtual_path['Portfolio'],
					"tab"					=>  3,
					"navigation"			=>	'<label class=navigation>'.$lang['Search_Portfolio'].'</label>'
			));
##############################################################################################
			
##############################################################################################					
/// get portfolio listing data from table for search
##############################################################################################
	

	$portfolio->Search_Portfolio($_POST['search_this']);
	$cnt = $db1->num_rows();
	$i = 0;
	while($db1->next_record())
	{
		$arr_user_login_id[$i]			=		$db1->f('user_login_id');
		
		$arr_location_1[$i]				=		$db1->f('mem_state');
		$arr_location[$i]				=		$db1->f('mem_city').",".$db1->f('mem_state').",".$db1->f('country_name');
		$arr_location_2[$i]				=		$db1->f('mem_city').",".$db1->f('country_name');
		
		$arr_user_portfolio_count[$i]	=		$portfolio->Get_User_Portfolio_count($db1->f('user_auth_id'));	// get total count of portfolio
		$arr_files[$i]				    =		$portfolio->Get_Sample_File($db1->f('user_auth_id'));			// for display first 3 portfolio
		
		$arr_reviews[$i]				=		$seller->Average_Seller_Rating_Count($db1->f('user_login_id'));
		$arr_rating[$i] 				= 		number_format($seller->Average_Seller_Rating($db1->f('user_login_id')),2);	
		$arr_earn[$i] 					= 		Sellect_Earning_Wallet(md5($db1->f('user_login_id')));
		$i++;
	}
	
	/// assing to template
	$tpl->assign(array(	"Loop"						=>	$cnt,		
						"lang"						=>  $lang,
						"location"					=>	$arr_location,	
						"location_1"				=>	$arr_location_1,
						"location_2"				=>	$arr_location_2,	
						"user_login_id"				=>	$arr_user_login_id,	
						"user_portfolio_count"		=>	$arr_user_portfolio_count,	
						"files"						=>	$arr_files,	
						
						"rating"					=>	$arr_rating,	
						"reviews"					=>	$arr_reviews,	
						"earning"					=>	$arr_earn,
						
						"search_keyword"			=>	$_SESSION['search_keyword'],	
						"project_Array"	 			=>	fillArrayCombo($arr_langs["Search_Portfolio"],$_SESSION['search_opt']),
				));

	/// used for pagination				
	if($_SESSION['total_record'] > $_SESSION['user_page_size'] && $cnt > 0)
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}

$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>