<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include($physical_path['DB_Access']. 'HomePage.php');

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

	header('location: home_page.php?add=true');
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Update Page Content
#-----------------------------------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit'] == 'Save')
{
	$ret = $page->Update($_POST);
//	header('location: home_page.php?Action=Edit&home_id='.$_POST['home_id']);
	header('location: home_page.php?edit=true');
	exit();
}

#-----------------------------------------------------------------------------------------------------------------------------
#	Delete selected Content
#-----------------------------------------------------------------------------------------------------------------------------
elseif($Action == 'Delete')
{
	$ret = $page->Delete($_POST['pid']);

	header('location: home_page.php?delete=true');
	exit();
}
#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
elseif($_POST['Submit'] == "Cancel")
{
	header('location: home_page.php');
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
	
	$tpl->assign(array("T_Body"			=>	'home_page_manage'. $config['tplEx'],
						"JavaScript"	=>  array("slider.js"),
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
	$tpl->assign(array("T_Body"			=>	'home_page_addedit'. $config['tplEx'],
						"JavaScript"	=>  array("slider.js"),
						"Action"		=>	$Action,
						));
	$sw = new SPAW_Wysiwyg('en_home_content' /*name*/,		''/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("EN_Page_Editor", $sw->getHtml());

}	
elseif($Action == 'Edit')
{
	$tpl->assign(array("T_Body"			=>	'home_page_addedit'. $config['tplEx'],
						"JavaScript"	=>  array("slider.js"),
						"Action"		=>	$Action,
						));
		
		$pid = ($_POST['home_id'] == true)?$_POST['home_id']:$_GET['home_id'];
		$rsPage = $page->getPage($pid);

		$tpl->assign(array(	"home_id"					=>	$rsPage->home_id,
							"home_title"				=>	$rsPage->home_title,
							));
	
	$sw = new SPAW_Wysiwyg('en_home_content' /*name*/,		$rsPage->home_content/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("EN_Page_Editor", $sw->getHtml());

	/*$sw = new SPAW_Wysiwyg('it_home_content' name,		$rsPage->it_home_contentvalue,
				   en' language, 'full' toolbar mode, 'default' theme,
				   700px' width, '475px' height);					   
				   
	$tpl->assign("IT_Page_Editor", $sw->getHtml());*/
}

$tpl->display('default_layout'. $config['tplEx']);
?>