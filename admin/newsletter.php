<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Newletter.php');
include EDITOR_ROOT. 'spaw_control.class.php';

$newsletter = new Newletter();

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

if ($_POST['Submit']=='Cancel')
{
	header("location: newsletter.php");
	exit();
}

#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
if ($_POST['Submit2'] == 'Cancel')
{
	header("location: newsletter.php");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Add Newsletter
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit'] == 'Save')
{
    $newsletter->Insert($_POST);
	header("location: newsletter.php?add=true");
	exit();
}
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $newsletter->Update($_POST);
	header("location: newsletter.php?edit=true");
	exit();
}
elseif($Action=='Delete')
{
	$newsletter->Delete($_POST['news_id']);
	header("location: newsletter.php?del=true");
	exit();
}
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $newsletter->Delete($val)?'true':'false';			
	}

	header("location: newsletter.php?delall=true");
	exit();
}elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$newsletter->DisplayOrder($display_order[$i], $i);
	}
	header("location: newsletter.php");
	exit;
}

#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	if($_GET['edit']==true)
		$succMessage = "Newsletter has been updated successfully!!";
	elseif($_GET['add']==true)
		$succMessage = "Newsletter has been added successfully!!";
	elseif($_GET['del']==true)
		$succMessage = "Newsletter has been deleted successfully!!";	
    elseif($_GET['delall']==true)
		$succMessage = "All newsletters has been deleted successfully!!";		
	
	
	$tpl->assign(array( "T_Body"			=>	'newsletter_showall'. $config['tplEx'],
						"JavaScript"	    =>  array("newsletter.js"),
						"A_Action"		    =>	"newsletter.php",
						"succMessage"	    =>	$succMessage,
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
								
    $newsletter->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_newsletter[$i]['id']		= $db->f('news_id');
		$arr_newsletter[$i]['title']	= $db->f('news_title');
		$arr_newsletter[$i]['desc']		= $db->f('news_description');
		$arr_newsletter[$i]['status']	= $db->f('status');			
		$arr_newsletter[$i]['date']		= $db->f('Submitted_date');
		$i++;
	}
	$tpl->assign(array(	"newsletter"	   	=>	$arr_newsletter,
						"Loop"				=>	$rscnt,
						"news_id"           =>  $db->f('news_id'),
				));
	
					
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
		
				
}	

elseif($Action == 'Add')
{
	$sw = new SPAW_Wysiwyg('news_description' /*name*/,		''/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);	
	$tpl->assign(array("T_Body"					=>	'newsletter_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("newsletter.js"),
						"Action"				=>	$Action,
						"status"					=>	$ret->status,							
						));
	$tpl->assign("EN_NL_Editor", $sw->getHtml());
}
elseif($Action == 'Edit')
{
    $ret = $newsletter->Getnewsletter($_POST['news_id']);
	$sw = new SPAW_Wysiwyg('news_description' /*name*/,		$ret->news_description/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);		
	
	$tpl->assign(array("T_Body"						=>	'newsletter_addedit'. $config['tplEx'],
						"JavaScript"				=>  array("newsletter.js"),
						"Action"					=>	$Action,
						"status"					=>	$ret->status,						
						"title"						=>	$ret->news_title,
						"news_id"					=>	$ret->news_id,
					));
	$tpl->assign("EN_NL_Editor", $sw->getHtml());
}
elseif($Action=='Order')
{
	$tpl->assign(array("T_Body"						=>	'newsletter_order'. $config['tplEx'],
						"JavaScript"				=>  array("newsletter.js"),
						"ACTION"				=>  'Order',
						));
						
	$newsletter->View_Order();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   
		$arr_faq_id[$i]				= $db->f('news_id');
		$arr_faq_title[$i]			= $db->f('news_title');
		$i++;
	}
	$tpl->assign(array(	"faq_id"			=>	$arr_faq_id,
						"faq_title"			=>	$arr_faq_title,
						"Loop"				=>	$rscnt,
				));
					
						
}	
$tpl->display('default_layout'. $config['tplEx']);
?>