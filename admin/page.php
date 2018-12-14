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
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');

# Initialize object
$page = new Page();

#-----------------------------------------------------------------------------------------------------------------------------
#	Add page
#-----------------------------------------------------------------------------------------------------------------------------
if($Action == 'Add' && $_POST['Submit'] == 'Save')
{
	$ret = $page->Insert($_POST);

	header('location: page.php?add=true');
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Update Page Content
#-----------------------------------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit'] == 'Save')
{
    $ret = $page->Update($_POST);
	header('location: page.php?Action=Edit&pid='.$_POST['page_id']);
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Delete selected Content
#-----------------------------------------------------------------------------------------------------------------------------
elseif($Action == 'Delete')
{
	$ret = $page->Delete($_POST['pid']);

	header('location: page.php?delete=true');
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
elseif($_POST['Submit'] == "Cancel")
{
	header('location: page.php');
	exit();
}

#-----------------------------------------------------------------------------------------------------------------------------
#	Show page list
#-----------------------------------------------------------------------------------------------------------------------------
if(!in_array($Action, array('Add', 'Edit', 'Sort', 'View')))
{
	if($_GET['add']==true)
		$succMessage = "Page content has been added successfully!!";
	elseif($_GET['save']==true)
		$succMessage = "Page content has been updated successfully!!";
	elseif($_GET['delete']==true)
		$succMessage = "Page has been deleted successfully!!";
	
	$tpl->assign(array("T_Body"			=>	'page_manage'. $config['tplEx'],
						"JavaScript"	=>  array("page.js"),
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
	$tpl->assign(array("T_Body"			=>	'page_addedit'. $config['tplEx'],
						"JavaScript"	=>  array("page.js"),
						"Action"		=>	$Action,
						));
	$sw = new SPAW_Wysiwyg('en_page_content' /*name*/,		''/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("EN_Page_Editor", $sw->getHtml());
}
elseif($Action == 'Edit')
{
	$tpl->assign(array("T_Body"			=>	'page_addedit'. $config['tplEx'],
						"JavaScript"	=>  array("page.js"),
						"Action"		=>	$Action,
						));
		
		$pid = ($_POST['pid'] == true)?$_POST['pid']:$_GET['pid'];
		
		$rsPage = $page->getPage($pid);
       
	   	$tpl->assign(array(	"page_id"					=>	$rsPage->page_id,
							"page_title"				=>	$rsPage->page_title,
							));
	
	$sw = new SPAW_Wysiwyg('en_page_content' /*name*/,		$rsPage->page_content/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("EN_Page_Editor", $sw->getHtml());

}

$tpl->display('default_layout'. $config['tplEx']);
?>