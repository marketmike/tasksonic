<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'HomePage.php');
include_once($physical_path['DB_Access']. 'Country.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');
//include_once($physical_path['Site_Lang']. '/home_page.php');
include_once($physical_path['Site_Lang']. '/all_portfolio.php');
include_once($physical_path['Site_Lang'].'/home.php');

// creating objects
$cats 		= new Category();
$home_page 	= new HomePage();
$country 	= new Country();
$portfolio  = new Portfolio();
$buyer 		= new Buyers();
$seller 	= new Seller();


##############################################################################################

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
$tpl->assign(array(	"T_Body"				=>	'seller_portfolio'. $config['tplEx'],
					"JavaScript"		    =>  array("lightbox.js"),
					"lang"					=>  $lang,
					"img_path_port"         =>  $virtual_path['Portfolio'],
					"tab"					=>	4,
					"rating" 				=> 	number_format($seller->Average_Seller_Rating($_GET['user_name']),2),					
			));
##############################################################################################
			
##############################################################################################					
/// get portfolio listing data from table
##############################################################################################
	$seller->GetSellerPortfolioByName($_GET['user_name']);		
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
						"user_name"					=>	$_GET['user_name'],						
						"tab"						=>	3,
				));

	/// used for pagination				

$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>