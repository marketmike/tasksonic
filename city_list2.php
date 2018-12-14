<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Country.php');
$city 	= new City();

$cityname = strval($_GET['city']);	
if ($cityname) {
		cookie_city($cityname);
	    header("location: index.php");	
		exit();
}

if (!$citycurrent){
$citycurrent = "Select";
} 
##############################################################################################
/// assign to templates 
##############################################################################################
	$city_list = $city->GetCityList();
	$city	 = fillStateSelect($city_list,'city_name','city_name');
	
	$tpl->assign(array(	
						"Task_City_List"        =>  $city,
						"Current_City"        =>  $citycurrent,						
						));					
?>