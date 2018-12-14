<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Faq.php');
include EDITOR_ROOT. 'spaw_control.class.php';

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$faq  = new FAQ();

if ($_POST['Submit']=='Cancel')
{
	header("location: faq.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
    $faq->Insert($_POST);
	header("location: faq.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit faq
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $faq->Update($_POST);
	header("location: faq.php?edit=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Delete selected faq
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['faq_id'])
{
	$faq->Delete($_POST['faq_id']);
	header("location: faq.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected FAQs
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
		$faq->Delete($val)?'true':'false';
	}

	header("location: faq.php?del=true");
	exit();
}
elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$faq->DisplayOrder($display_order[$i], $i);
	}
	header("location: faq.php");
	exit;
}

#----------------------------------------------------------------------------------------------------
# Listing all FAQs	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="FAQ added successfully";
	elseif ($_GET['del']=='true')
		$msg="FAQ deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="FAQ updated successfully";
	
	
	$faq->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_faq[$i]['faq_id']			= $db->f('faq_id');
		$arr_faq[$i]['faq_title']		= $db->f('faq_title');
		$arr_faq[$i]['disp_order']		= $db->f('disp_order');
		$arr_faq[$i]['status']			= $db->f('status');
		$i++;
	}
	
	$tpl->assign(array("T_Body"					=>	'faq_showall'. $config['tplEx'],
						"JavaScript"			=>  array("faq.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),
						"Loop"					=>	$rscnt,						
						"arr_faq"				=>	$arr_faq,
						));	
			
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}
elseif($Action == 'Add')
{

	$sw = new SPAW_Wysiwyg('faq_content' /*name*/,		''/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign(array( "T_Body"				=>	'faq_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("faq.js"),
						"Action"				=>	$Action,					
						));
		$tpl->assign("EN_FAQ_Editor", $sw->getHtml());	
}
#----------------------------------------------------------------------------------------------------
# Edit faq status
#----------------------------------------------------------------------------------------------------

elseif($Action == 'Edit')
{
  	$ret = $faq->Getfaq($_POST['faq_id']);
	$sw = new SPAW_Wysiwyg('faq_content' /*name*/,		$ret->faq_content/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign(array( "T_Body"				=>	'faq_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("faq.js"),
						"Action"				=>	$Action,
						"faq_title"				=>	$ret->faq_title,					
						"status"				=>	$ret->status,
						"disp_order"			=>	$ret->disp_order,						
						"faq_id"				=>	$_POST['faq_id'],					
						));
		$tpl->assign("EN_FAQ_Editor", $sw->getHtml());				

}
elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'faq_order'. $config['tplEx'],
						"JavaScript"			=>  array("faq.js"),
						"ACTION"				=>  'Order',
						));
						
	$faq->View_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_faq_id[$i]				= $db->f('faq_id');
		$arr_faq_title[$i]			= $db->f('faq_title');
		$i++;
	}
	$tpl->assign(array(	"faq_id"			=>	$arr_faq_id,
						"faq_title"			=>	$arr_faq_title,
						"Loop"				=>	$rscnt,
				));
					
						
}

$tpl->display('default_layout'. $config['tplEx']);
?>