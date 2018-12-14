<?php
#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

if($_GET['Action'] == 'View')
	define('POPUP_WIN', 	true);

include_once("../includes/common.php");
include($physical_path['DB_Access']. 'Page.php');
include_once (EDITOR_ROOT. 'spaw_control.class.php');
#=======================================================================================================================================
# Define the action
#---------------------------------------------------------------------------------------------------------------------------------------
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');

# Initialize object
$page = new Page();

#=======================================================================================================================================
#								RESPONSE PROCESSING CODE
#---------------------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#	Add page
#-----------------------------------------------------------------------------------------------------------------------------
if($Action == 'Update' && $_POST['Submit'] == 'Save')
{
 
	writeFileContent($physical_path['Upload'].'en_reg_condition.txt',$_POST['en_content']);
	header('location: condition.php');
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Add/Edit Page
#-----------------------------------------------------------------------------------------------------------------------------
$en_content = readFileContent($physical_path['Upload'].'en_reg_condition.txt');

	$tpl->assign(array("T_Body"			=>	'conditions'. $config['tplEx'],
						"JavaScript"	=>  array("page.js"),
						"Action"		=>	$Action,
						"en_content"	=>	stripslashes($en_content),	
					));
$tpl->display('default_layout'. $config['tplEx']);
?>