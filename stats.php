<?php
define('IN_SITE', 	true);
include_once("includes/common.php");

##############################################################################################
///get total tasks, earned dollars for display on top of page
##############################################################################################
$cate=0;
$cate2=0;
$cate3=0;

// Get All Submitted Tasks
$dbx =mysql_connect($config['DB_Host'], $config['DB_User'],$config['DB_Passwd']);
mysql_select_db($config['DB_Name'],$dbx);
$result2 = mysql_query("SELECT * from project_master",$dbx);
$submitted=mysql_num_rows($result2);


// Get All Awarded Tasks
$dbx =mysql_connect($config['DB_Host'], $config['DB_User'],$config['DB_Passwd']);
mysql_select_db($config['DB_Name'],$dbx);
$result2 = mysql_query("SELECT * from project_master WHERE project_status=3",$dbx);
$awarded=mysql_num_rows($result2);


// Get All Active Tasks
$dbx =mysql_connect($config['DB_Host'], $config['DB_User'],$config['DB_Passwd']);
mysql_select_db($config['DB_Name'],$dbx);
$result2 = mysql_query("SELECT * from project_master WHERE project_status=1",$dbx);
$active=mysql_num_rows($result2);

	
$dbx =mysql_connect($config['DB_Host'], $config['DB_User'],$config['DB_Passwd']);
mysql_select_db($config['DB_Name'],$dbx);
$result2 = mysql_query("SELECT * from project_master WHERE project_post_to NOT LIKE ''",$dbx);
$cate2=mysql_num_rows($result2);
while ($myrow = mysql_fetch_row($result2)) {
	$idul=$myrow[0];
	$cine=$myrow[4];
$dbx2 = mysql_connect($config['DB_Host'], $config['DB_User'],$config['DB_Passwd']);
mysql_select_db($config['DB_Name'],$dbx2);
$result3 = mysql_query("SELECT bid_amount from bid_master WHERE project_id=$idul AND bid_by_user='$cine'",$dbx2);
while ($myrow2 = mysql_fetch_row($result3)) {
	$total=$total + $myrow2[0];
}
}
if($cate2){
$cate2=$total;
}else{
$cate2=0;
}

$dbx = mysql_connect($config['DB_Host'], $config['DB_User'],$config['DB_Passwd']);
mysql_select_db($config['DB_Name'],$dbx);
$result2 = mysql_query("SELECT * from member_master",$dbx);
$cate3=mysql_num_rows($result2);
// End total tasks, total dollars earned

##############################################################################################
/// assing to templates 
##############################################################################################
	$tpl->assign(array(	
					"submitted"						=>	$submitted,
					"awarded"						=>	$awarded,
					"active"						=>	$active,
					"cate2"							=>	$cate2,
					"cate3"							=>	$cate3,
						));
?>