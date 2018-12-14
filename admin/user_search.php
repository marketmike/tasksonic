<?php
define('IN_SITE', 	true);
define('IN_ADMIN',	true);

include("../includes/common.php");
include_once($physical_path['DB_Access']. 'Portfolio.php');
include($physical_path['DB_Access']. 'Others.php');
include($physical_path['DB_Access']. 'Country.php');
include($physical_path['DB_Access']. 'Category.php');
include($physical_path['DB_Access']. 'Industry.php');
include($physical_path['DB_Access']. 'Seller.php');
include($physical_path['DB_Access']. 'Payment.php');
include($physical_path['DB_Access']. 'Buyers.php');
include($physical_path['DB_Access']. 'Experience.php');
include_once($physical_path['DB_Access']. 'Email.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

include_once($physical_path['DB_Access']. 'Development.php');
include_once($physical_path['DB_Access']. 'Category.php');


$country1 	= new Country();

		$contry_list = $country1->GetCountryList();
		$Country	 = fillDbCombo($contry_list,'country_id','country_name');

	@session_unregister("user_login_id");
	@session_unregister("mem_fname");
	@session_unregister("mem_lname");
	@session_unregister("country_name");
	@session_unregister("mem_state");
	@session_unregister("mem_city");
	@session_unregister("mem_zip_code");
	@session_unregister("normal_user");
	@session_unregister("vip_user");
	@session_unregister("special_user");
	@session_unregister("feedback");

	$tpl->assign(array(	"T_Body"			  => 'user_search'. $config['tplEx'],
						"Feedback_List"       =>  fillArrayCombo($arr_langs['rating']),
						"Country_List"		  =>  $Country,
					));
	
	
	

$tpl->display('default_layout'. $config['tplEx']);
?>