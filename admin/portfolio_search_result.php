<?php

#------------------------------------------------------------------------------------------------------------------------------
#	Include required files
#------------------------------------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Portfolio.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$portfolio  = new Portfolio();
$buyer 		= new Buyers();
$seller 	= new Seller();


#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

//if($Action == 'ViewAll' || $Action == '')
//{

    $_SESSION['user_name']					=	(!isset($_POST['user_name']) ? $_SESSION['user_name'] : $_POST['user_name']);
	$_SESSION['portfolio_title']			=	(!isset($_POST['portfolio_title']) ? $_SESSION['portfolio_title'] : $_POST['portfolio_title']);
	$_SESSION['portfolio_description']		=	(!isset($_POST['portfolio_description']) ? $_SESSION['portfolio_description'] : $_POST['portfolio_description']);
	$_SESSION['any_where']					=	(!isset($_POST['any_where']) ? $_SESSION['any_where'] : $_POST['any_where']);
		
			
	$portfolio->Search_Protfolio_Admin_side($_SESSION);
	
	$cnt = $db1->num_rows();
	$i = 0;
	while($db1->next_record())
	{
		$arr_user_login_id[$i]			=		$db1->f('user_login_id');
		$arr_user_auth_id[$i]			=		$db1->f('user_auth_id');
		$arr_location[$i]				=		$db1->f('mem_city').",".$db->f('mem_state').",".$db1->f('country_name');

		$arr_user_portfolio_count[$i]	=		$portfolio->Get_User_Portfolio_count($db1->f('user_auth_id'));	// get total count of portfolio
		$arr_files[$i]				    =		$portfolio->Get_Sample_File($db1->f('user_auth_id'));			// for display first 3 portfolio
		
		$arr_reviews[$i]				=		$seller->Average_Seller_Rating_Count($db1->f('user_login_id'));
		$arr_rating[$i] 				= 		number_format($seller->Average_Seller_Rating($db1->f('user_login_id')),2);	
		$arr_earn[$i] 					= 		Sellect_Earning_Wallet(md5($db1->f('user_login_id')));
		$i++;
	}


	$tpl->assign(array( "T_Body"				=>	'portfolio_search_showall'. $config['tplEx'],
						"A_Action"			    =>	"portfolio_search_result.php",
						"img_path"  	        =>  $virtual_path['Portfolio'],
						"Loop"					=>	$cnt,		
						"user_auth_id"			=>  $arr_user_auth_id,
						"location"				=>	$arr_location,	
						"user_login_id"			=>	$arr_user_login_id,	
						"user_portfolio_count"	=>	$arr_user_portfolio_count,	
						"files"					=>	$arr_files,	
						"rating"				=>	$arr_rating,	
						"reviews"				=>	$arr_reviews,	
						"earning"				=>	$arr_earn,
						
						//"project_Array"			=>	fillArrayCombo($arr_langs["".$_SESSION['Language_Types']."_Search_Portfolio"],$_SESSION['search_opt']),
						"PageSize_List"			=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}					
								
		

$tpl->display('default_layout'. $config['tplEx']);
?>