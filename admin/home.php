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

include EDITOR_ROOT. 'spaw_control.class.php';
#=======================================================================================================================================
# Define the action
#---------------------------------------------------------------------------------------------------------------------------------------
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

# Initialize object
$page = new Page();
#=======================================================================================================================================
#								RESPONSE PROCESSING CODE
#---------------------------------------------------------------------------------------------------------------------------------------
if($_POST['Submit'] == 'Save')
{
	$ret = $page->UpdateHomePage($_POST);

	header('location: home.php?edit=true');
	exit();
}
#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------


	$tpl->assign(array("T_Body"			=>	'home'. $config['tplEx'],
						"JavaScript"	=>  array("page.js"),
						"succMessage"	=>	$succMessage,
						));

		$rsPage = $page->getHomePage(1);

		$tpl->assign(array(	"home_id"					=>	$rsPage->home_id,
							));
	
	$sw = new SPAW_Wysiwyg('en_page_content' /*name*/,		$rsPage->en_page_content/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("En_Page_Editor", $sw->getHtml());

	$sw = new SPAW_Wysiwyg('gu_page_content' /*name*/,		$rsPage->gu_page_content/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("Gu_Page_Editor", $sw->getHtml());

$tpl->display('default_layout'. $config['tplEx']);
?>