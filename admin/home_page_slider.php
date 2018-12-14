<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include($physical_path['DB_Access']. 'Home_page_slide.php');

include EDITOR_ROOT. 'spaw_control.class.php';
#=======================================================================================================================================
# Define the action
#---------------------------------------------------------------------------------------------------------------------------------------
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');

# Initialize object
$page = new HomePage();


#-----------------------------------------------------------------------------------------------------------------------------
#	Add page
#-----------------------------------------------------------------------------------------------------------------------------
if($Action == 'Add' && $_POST['Submit'] == 'Save')
{
	$ret = $page->Insert($_POST);

	header('location: home_page_slider.php?add=true');
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Update Page Content
#-----------------------------------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit'] == 'Save')
{
	$ret = $page->Update($_POST);
//	header('location: home_page.php?Action=Edit&slide_id='.$_POST['slide_id']);
	header('location: home_page_slider.php?edit=true');
	exit();
}

#-----------------------------------------------------------------------------------------------------------------------------
#	Delete selected Content
#-----------------------------------------------------------------------------------------------------------------------------
elseif($Action == 'Delete')
{
	$ret = $page->Delete($_POST['pid']);

	header('location: home_page_slider.php?delete=true');
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
elseif($_POST['Submit'] == "Cancel")
{
	header('location: home_page_slider.php');
	exit();
}

#-----------------------------------------------------------------------------------------------------------------------------
#	List all Pages
#-----------------------------------------------------------------------------------------------------------------------------
if(!in_array($Action, array('Add', 'Edit', 'Sort', 'View')))
{
	if($_GET['add']==true)
		$succMessage = "Page content has been added successfully!!";
	elseif($_GET['save']==true)
		$succMessage = "Page content has been updated successfully!!";
	elseif($_GET['delete']==true)
		$succMessage = "Page has been deleted successfully!!";
	
	$tpl->assign(array("T_Body"			=>	'home_page_slider_manage'. $config['tplEx'],
						"JavaScript"	=>  array("home.js"),
						"succMessage"	=>	$succMessage,
						"Action"		=>	$Action,
						"Options"		=>	$page->ViewAll(),
						));
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Add/Edit Page
#-----------------------------------------------------------------------------------------------------------------------------
elseif($Action == 'Add')
{
	$tpl->assign(array("T_Body"			=>	'home_page_slider_addedit'. $config['tplEx'],
						"JavaScript"	=>  array("home.js"),
						"Action"		=>	$Action,
						));

}	
elseif($Action == 'Edit')
{
	$tpl->assign(array("T_Body"			=>	'home_page_slider_addedit'. $config['tplEx'],
						"JavaScript"	=>  array("home.js"),
						"Action"		=>	$Action,
						));
		
		$pid = ($_POST['slide_id'] == true)?$_POST['slide_id']:$_GET['slide_id'];
		$rsPage = $page->getPage($pid);

		$tpl->assign(array(	"slide_id"					=>	$rsPage->slide_id,
							"slide_url"				=>	$rsPage->slide_url,
							"en_home_content"			=>	$rsPage->slide_order,
							));
}

$tpl->display('default_layout'. $config['tplEx']);
?>