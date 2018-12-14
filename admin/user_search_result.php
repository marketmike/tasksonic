<?php

#------------------------------------------------------------------------------------------------------------------------------
#	Include required files
#------------------------------------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Development.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Others.php');
include_once($physical_path['DB_Access']. 'Industry.php');
include($physical_path['DB_Access']. 'Country.php');
include($physical_path['DB_Access']. 'Seller.php');
include($physical_path['DB_Access']. 'Payment.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$development 	= new Development();
$emails 		= new Email();
$others			= new Others();
$seller		=	 new Seller();
$pays 		=    new Payment();
$cate			= new Category();
$country	=	 new Country();
$industry	= new Industry();
if($_POST['user_login_id'] == '' && $_POST['mem_fname'] == '' && $_POST['mem_lname'] == '' && $_POST['country_name'] == '0' && $_POST['mem_state'] == '' && $_POST['mem_city'] == '' && $_POST['mem_zip_code'] == '' && $_POST['feedback'] == '11' && $_POST['normal_user'] == '' && $_POST['vip_user'] == '' && $_POST['special_user'] == '')
{
//	print "ggigii";
	header("location: user_search_result.php?error=true");
	exit(0);
}
if($Action == 'ViewAll' || $Action == '')
{
	
	if($_GET['error'] == true)
		$errorMessage = "No record(s) found.";
	
	$_SESSION['user_login_id']			=	(!isset($_POST['user_login_id']) ? $_SESSION['user_login_id'] : $_POST['user_login_id']);
	$_SESSION['mem_fname']				=	(!isset($_POST['mem_fname']) ? $_SESSION['mem_fname'] : $_POST['mem_fname']);
	$_SESSION['mem_lname']				=	(!isset($_POST['mem_lname']) ? $_SESSION['mem_lname'] : $_POST['mem_lname']);
	$_SESSION['country_name']			=	(!isset($_POST['country_name']) ? $_SESSION['country_name'] : $_POST['country_name']);
	$_SESSION['mem_state']				=	(!isset($_POST['mem_state']) ? $_SESSION['mem_state'] : $_POST['mem_state']);
	$_SESSION['mem_city']				=	(!isset($_POST['mem_city']) ? $_SESSION['mem_city'] : $_POST['mem_city']);
	$_SESSION['mem_zip_code']			=	(!isset($_POST['mem_zip_code']) ? $_SESSION['mem_zip_code'] : $_POST['mem_zip_code']);
	$_SESSION['normal_user']			=	(!isset($_POST['normal_user']) ? $_SESSION['normal_user'] : $_POST['normal_user']);
	$_SESSION['vip_user']				=	(!isset($_POST['vip_user']) ? $_SESSION['vip_user'] : $_POST['vip_user']);
	$_SESSION['special_user']			=	(!isset($_POST['special_user']) ? $_SESSION['special_user'] : $_POST['special_user']);
	$_SESSION['feedback']				=	(!isset($_POST['feedback']) ? $_SESSION['feedback'] : $_POST['feedback']);
	
	$tpl->assign(array( "T_Body"			=>	'user_search_showall'. $config['tplEx'],
						"A_Action"		    =>	"user_search_result.php",
						"errorMessage"	    =>	$errorMessage,
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
	
						));
	$others->Search_Users($_SESSION);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_user_details[$i]['mem_email']			= $db->f('mem_email');
		$arr_user_details[$i]['user_login_id']		= $db->f('user_login_id');
		$arr_user_details[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_user_details[$i]['mem_fname']			= $db->f('mem_fname');
		$arr_user_details[$i]['mem_lname']			= $db->f('mem_lname');
		$arr_user_details[$i]['country_name']		= $db->f('country_name');
		$arr_user_details[$i]['mem_pro_notice']		= $db->f('mem_pro_notice');
		$arr_user_details[$i]['membership_id']		= $db->f('membership_id');
		$arr_user_details[$i]['special_user']		= $db->f('special_user');
		$arr_user_details[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_user_details[$i]['user_status']		= $db->f('user_status');
		$arr_user_details[$i]['special_start_date'] = $db->f('special_user_start_date');
		$date_check = explode("-",$db->f('special_user_start_date') );
		$arr_user_details[$i]['special_end_date'] 	= date('Y-m-d', mktime(0,0,0,$date_check[1]+1,($date_check[2]),$date_check[0]) );
		$i++;
	}
	
	
	$tpl->assign(array( 
						"errorMessage"			=>	$errorMessage,
						"user_details"			=>	$arr_user_details,
						"JavaScript"			=>  array("users_search.js"),
						"Loop"					=>	$rscnt,
						"PageSize_List"			=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
	
	
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}				
}
else if($Action == 'View' && $_POST['Submit'] == 'Back') 
{

	$tpl->assign(array( "T_Body"			=>	'user_search_showall'. $config['tplEx'],
						"A_Action"		    =>	"user_search_result.php",
					));
	$others->Search_Users($_SESSION);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_user_details[$i]['mem_email']			= $db->f('mem_email');
		$arr_user_details[$i]['user_login_id']		= $db->f('user_login_id');
		$arr_user_details[$i]['mem_fname']			= $db->f('mem_fname');
		$arr_user_details[$i]['mem_lname']			= $db->f('mem_lname');
		$arr_user_details[$i]['country_name']		= $db->f('country_name');
		$arr_user_details[$i]['mem_pro_notice']		= $db->f('mem_pro_notice');
		$arr_user_details[$i]['membership_id']		= $db->f('membership_id');
		$arr_user_details[$i]['special_user']		= $db->f('special_user');
		$arr_user_details[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_user_details[$i]['user_status']		= $db->f('user_status');
		$arr_user_details[$i]['special_start_date'] = $db->f('special_user_start_date');
		$date_check = explode("-",$db->f('special_user_start_date') );
		$arr_user_details[$i]['special_end_date'] 	= date('Y-m-d', mktime(0,0,0,$date_check[1]+1,($date_check[2]),$date_check[0]) );
		$i++;
	}
	
	#print_r($arr_user_details);die;
	$tpl->assign(array( 
						"succMessage"			=>	$succMessage,
						"user_details"			=>	$arr_user_details,
						"JavaScript"			=>  array("users_search.js"),
						"Loop"					=>	$rscnt,
						"PageSize_List"			=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
	
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}	
}	
else if($Action == 'View')
{
    $ret	=	$others->getUserDetails($_POST['user_auth_id']);
	
	if(($ret->mem_option) == 1)
	{
		$mem_option = "Yes";
	}
	else
	{
		$mem_option = "No";
	}
	
	if(($ret->mem_pro_notice) == 1)
	{
		$mem_pro_notice = "Notify me of all new projects posted on Getanhacker ";
	}
	elseif(($ret->mem_pro_notice) == 2)
	{
		$mem_pro_notice = "Notify me when new projects related to my area of interest/expertise are posted";
	}
	elseif(($ret->mem_pro_notice) == 3)
	{
		$mem_pro_notice = "Do not notify me about new projects";
	}
	
	$cat1 = explode(",",$ret->mem_category);
	$count = count($cat1);
	$i = 0;
	foreach ($cat1 as $key=>$val)
	{
		$result[$i] = $cate->GetCatName($val);
        $i++;
	}
	$tpl->assign(array("catname"			=>	$result,
 					   "Loop"				=>	$count,
					  ));
	$totalamount = Select_wallet_sum($_POST['user_auth_id']);
	
	$tpl->assign(array("T_Body"				=>	'users_view'. $config['tplEx'],
						"JavaScript"		=>  array("users_search.js"),
						"Action"			=>	$Action,
						"user_login_id"		=>	$ret->user_login_id,
						"membership_id"		=>	$ret->membership_id,
						"mem_email"			=>	$ret->mem_email,
						"mem_fname"			=>	$ret->mem_fname,
						"mem_lname"			=>	$ret->mem_lname,
						"mem_city"			=>	$ret->mem_city,
						"mem_state"			=>	$ret->mem_state,
						"mem_country"		=>	$country->GetCountryName($ret->mem_country),
						"mem_organization"	=>	$ret->mem_organization,
						"mem_employes"		=>	$ret->mem_employes,
						"mem_daytime_phone"	=>	$ret->mem_daytime_phone,
						"mem_eve_phone"		=>	$ret->mem_eve_phone,
						"mem_fax_no"		=>	$ret->mem_fax_no,
						"mem_address"		=>	$ret->mem_address,
						"mem_address1"		=>	$ret->mem_address1,
						"mem_zip_code"		=>	$ret->mem_zip_code,
						"mem_website"		=>	$ret->mem_website,
						"mem_option"		=>	$mem_option,
						"mem_pro_notice"	=>	$mem_pro_notice,
						"totalamount"		=>	$totalamount,
						));

//////////////view buyer profile of user
    $prof	=	$others->getUserBuyersDetails($_POST['user_auth_id']);
	

	$tpl->assign(array(	"buyers_slogan"			=>	$prof->buyers_slogan,
						"buyers_description"	=>	wordwrap($prof->buyers_description , 120, "\n", 1),
						
						));
//////////////view seller profile of user
	$industries = "";
	if($prof->seller_industry !="")
	{
		$arr_industry	=	explode(",",$prof->seller_industry);					
		
		foreach($arr_industry as $key => $val)
		{
			$names 	=	$industry->Get_Industry_Name($val);
			$industries =	$industries.$names."<BR>";
		}
	}
	
	
	$tpl->assign(array(	"seller_slogan"			=>	$prof->seller_slogan,
						"seller_description"	=>	$prof->seller_description,
						"seller_rate_per_hour"	=>	$prof->seller_rate_per_hour,
						"seller_exp"			=>	$prof->seller_exp,
						"seller_logo"			=>	$prof->seller_logo,
						"industries"			=>	$industries,
						"Listing"				=>	$seller->Skills_Listing($_POST['user_auth_id']),
						"average_skill"			=>	$seller->Get_Avg_Skill_User($_POST['user_auth_id']),
						));
   //////////////view seller protfolio of user
    $resultset = $seller->GetSellerPortfolio($_POST['user_auth_id']);	
	
	$cnt = $db->num_rows();
	$i=0;
	
	while($db->next_record())
	{
	    $seller_portfolio[$i]['id']	   				=	$db->f('portfolio_id');
		$seller_portfolio[$i]['user_auth_id']	  	=	$db->f('user_auth_id');
		$seller_portfolio[$i]['user_name']	   		=	$db->f('user_name');
		$seller_portfolio[$i]['title']				= 	$db->f('title');
		$seller_portfolio[$i]['desc']				= 	$db->f('desc');
		$seller_portfolio[$i]['sample_file']	  	=	$db->f('sample_file');
		$seller_portfolio[$i]['industry']			=	$db->f('industry_name');
		$seller_portfolio[$i]['budget']	   		    =	$db->f('development_title');
		$seller_portfolio[$i]['time_spent']	   		=	$db->f('exe_name');
		$seller_portfolio[$i]['categories']	   		=	$db->f('categories');
		$seller_portfolio1     					    =   explode(",",$seller_portfolio[$i]['categories']);
		   
		$categories = "";
		foreach($seller_portfolio1 as $key=>$val)
	    {
			$cats = $cate->GetCatName($val);
			$categories = $categories.$cats."  ,";
		}
		$new_categories	=	substr($categories,0,-1);
		$seller_portfolio[$i]['cats']	=	$new_categories;
		$i++;
	}

	$tpl->assign(array( "Loop"					=>  $cnt,
						"sportfolio"		   	=> 	$seller_portfolio,
						"portfolio_imgpath"     =>  $virtual_path['Portfolio'],
						
					));	

	$tpl->assign(array("seller_catname"			=>	$seller_result,
					   "sellerLoop"				    =>	$seller_count,
					  ));
	  //////////////view Transcation Details
	  $result_tras = $pays->ViewAll($_POST['user_auth_id']);
	  $rscnt_tras = $db->num_rows();
	  $i=0;
		while($db->next_record())
		{
			$arr_traction[$i]['id']				= $db->f('pp_id');
			$arr_traction[$i]['user_auth_id']	= $db->f('user_auth_id');
			$arr_traction[$i]['amount']			= $db->f('amount');
			$arr_traction[$i]['description']	= $db->f('description');
			$arr_traction[$i]['trans_type']		= $db->f('trans_type');
			$arr_traction[$i]['date']			= $db->f('date');
			$i++;
		}
		$tpl->assign(array(	"trasLoop"				=>	$rscnt_tras,
							"atraction"       		=>  $arr_traction,
							));
	///////////////////withdraw
	$result_withdraw = $pays->ViewAllwithdarw($_POST['user_auth_id']);
	$rscnt_withdraw = $db->num_rows();
	$i=0;
		while($db->next_record())
		{
			$arr_withdraw[$i]['id']				= $db->f('ww_id');
			$arr_withdraw[$i]['user_auth_id']	= $db->f('user_auth_id');
			$arr_withdraw[$i]['requested_date']	= $db->f('requested_date');
			$arr_withdraw[$i]['description']	= $db->f('details');
			$arr_withdraw[$i]['withdraw_type']	= $db->f('withdraw_type');
			$arr_withdraw[$i]['amount']			= $db->f('amount');
			$arr_withdraw[$i]['trans_type']		= $db->f('trans_type');
			$arr_withdraw[$i]['status']			= $db->f('status');
			$i++;
		}
		
		$tpl->assign(array(	
							"withdrawLoop"				=>	$rscnt_withdraw,
							"awithdarw"       			=>  $arr_withdraw,
							));		
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}								
}				
$tpl->display('default_layout'. $config['tplEx']);
?>