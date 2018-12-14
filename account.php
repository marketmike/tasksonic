<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/account.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Member.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
// creating objects
$project = new project();
$buyer	 = new Buyers();
$member =  new Member();

#### Get Membership Fees ####
$as_low_as = $member->View_Starting_At_MemberShip();



##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
if($_GET['profile'] == 'change')
	$SuccMsg	=	$lang['task_owner_Profile_Change'];
	
	$tpl->assign(array(	"T_Body"			=>	'account'. $config['tplEx'],
						"lang"				=>  $lang,
						"Action"			=>	'Save',
						"JavaScript"	    =>  array("account.js"),
						"user"              =>  $_SESSION['User_Name'], 
						"Membership_Name"   =>  $_SESSION['Membership_Name'],
						"Buy_Date"   		=>  $_SESSION['Buy_Date'],
						"Finished_Date"   	=>  $_SESSION['Finished_Date'],
						"tab"				=>	4,
						"navigation"		=>	'<label class=navigation>'.$lang['My_Account'].'</label>',
						"as_low_as"			=>	$as_low_as,
						"hidemap"			=>	'true',
						
					));
##############################################################################################
     
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>