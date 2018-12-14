<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Member.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$member = new Member();
#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
if ($_POST['Submit2'] == 'Cancel')
{
	header("location: membership.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit'] == 'Save')
{
	$member->Insert($_POST);
	header("location: membership.php?add=true");
	exit();
}
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $member->Update($_POST);
	header("location: membership.php?edit=true");
	exit();
}
elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);

   // Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$member->DisplayOrder_membership_Type($display_order[$i], $i);
	}
	header('location: membership.php');
	exit();
}

elseif($Action=='Delete')
{
	$member->Delete($_POST['membership_id']);
	header("location: membership.php?del=true");
	exit();
}
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $member->Delete($val)?'true':'false';			
	}

	header("location: membership.php?delall=true");
	exit();
}
elseif($Action == 'ChangeStatus')
{
	$val=$member->ToggleStatusMember($_POST['membership_id'],$_POST['status']);
	header("location: membership.php?edit=true");
	exit();
}

#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	if($_GET['edit']==true)
		$succMessage = "Membership has been updated successfully!!";
	elseif($_GET['add']==true)
		$succMessage = "Membership has been added successfully!!";
	elseif($_GET['del']==true)
		$succMessage = "Membership has been deleted successfully!!";	
    elseif($_GET['delall']==true)
		$succMessage = "All Memberships has been deleted successfully!!";			
	
	
	$tpl->assign(array( "T_Body"			=>	'membership_showall'. $config['tplEx'],
						"JavaScript"	    =>  array("membership.js"),
						"A_Action"		    =>	"membership.php",
						"succMessage"	    =>	$succMessage,
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
								
    $member->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_member[$i]['id']				= $db->f('membership_id');
		$arr_member[$i]['membername']		= $db->f('membership_name');
		$arr_member[$i]['membertime']		= $db->f('membership_time');
		$arr_member[$i]['memberfee']		= number_format($db->f('membership_fees'),2);
		$arr_member[$i]['status']			= $db->f('membership_status');
		$i++;
	}
	$tpl->assign(array(	"member"	    	=>	$arr_member,
						"Loop"				=>	$rscnt,
						"mem_id"            =>  $db->f('membership_id'),
				));
	$reu = $member->Selectmember();			
	$tpl->assign(array(
						"mem_id"            =>  $reu->membership_id,
				));
					
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
		
				
}	

elseif($Action == 'Add')
{
	$tpl->assign(array("T_Body"					=>	'membership_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("membership.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
    $ret = $member->GetMember($_POST['membership_id']);
	$tpl->assign(array("T_Body"					=>	'membership_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("membership.js"),
						"Action"				=>	$Action,
						"membership_name"		=>	$ret->membership_name,
						"membership_time"		=>	$ret->membership_time,
						"membership_fee"		=>	$ret->membership_fees,											
						"membership_id"			=>	$ret->membership_id,
						"membership_status"     =>  ($ret->membership_status == 1)?'checked':'',
						));

}	
elseif($Action == 'Order')
{
	$tpl->assign(array("T_Body"					=>	'membership_order'. $config['tplEx'],
						"JavaScript"			=>  array("membership.js"),
						"ACTION"				=>  'Order',
					));
				
		$member->View_membership_All_Order();
		$rscnt = $db->num_rows();

		$arr_membership_id   = array();
		$arr_membership_name = array();
	
		$total = 0;
		$i=0;
		$tpl->assign(array("Loop"			=>	$rscnt,
							"ErrorMsg"		=>	$ErrorMsg,
						));	
        while($db->next_record())
		{
			$arr_membership_id[$i]		= $db->f('membership_id');
			$arr_membership_name[$i]	= $db->f('membership_name');
			$i++;
		}
		
		$tpl->assign(array(	"membership_id"				=>	$arr_membership_id,
							"membership_name"			=>	$arr_membership_name,
					));										
}
				
$tpl->display('default_layout'. $config['tplEx']);
?>