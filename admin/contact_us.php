<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Contact_Us.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$contact  = new Contact();

if ($_POST['Submit']=='Cancel')
{
	header("location: contact_us.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit']=='Save')
{
    $contact->Insert($_POST);
	header("location: contact_us.php?add=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Edit contact
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $contact->Update($_POST);
	header("location: contact_us.php?edit=true");
	exit();
}
#----------------------------------------------------------------------------------------------------
# Delete selected contact
#----------------------------------------------------------------------------------------------------
elseif($Action=='Delete' && $_POST['contact_id'])
{
	$contact->Delete($_POST['contact_id']);
	header("location: contact_us.php?del=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete all selected Countries
#----------------------------------------------------------------------------------------------------
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
		$contact->Delete($val)?'true':'false';
	}

	header("location: contact_us.php?del=true");
	exit();
}


#----------------------------------------------------------------------------------------------------
# Listing all Countries	
#----------------------------------------------------------------------------------------------------
if($Action == '' || $Actopm == 'ShowAll')
{
	if ($_GET['add']=='true')
		$msg="Contact added successfully";
	elseif ($_GET['del']=='true')
		$msg="Contact deleted successfully";
	elseif ($_GET['edit']=='true')
		$msg="Contact updated successfully";
	
	
	$contact->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_contact[$i]['contact_id']		= $db->f('contact_id');
		$arr_contact[$i]['user_name']		= $db->f('user_name');
		$arr_contact[$i]['contact_subject']	= $db->f('contact_subject');
		$arr_contact[$i]['contact_reason']	= $db->f('contact_reason');
		$i++;
	}
	
	$tpl->assign(array("T_Body"					=>	'contact_showall'. $config['tplEx'],
						"JavaScript"			=>  array("contact.js"),
						"succMessage"			=>	$msg,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),
						"Loop"					=>	$rscnt,						
						"arr_contact"			=>	$arr_contact,
						));	
			
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}

#----------------------------------------------------------------------------------------------------
# Edit contact status
#----------------------------------------------------------------------------------------------------

elseif($Action == 'Edit')
{
   	$ret = $contact->GetContact($_POST['contact_id']);

	$tpl->assign(array( "T_Body"				=>	'contact_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("contact.js"),
						"Action"				=>	$Action,
						"user_name"				=>	$ret->user_name,
						"contact_subject"		=>	$ret->contact_subject,
						"contact_reason"		=>	$ret->contact_reason,						
						"contact_message"		=>	$ret->contact_message,
						"status"				=>	$ret->status,
						"action_taken"			=>	$ret->action_taken,						
						"contact_id"			=>	$_POST['contact_id'],
						));

}

$tpl->display('default_layout'. $config['tplEx']);
?>