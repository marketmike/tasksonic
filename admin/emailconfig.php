<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Email.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$email = new Email();
#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
if ($_POST['Submit'] == 'Cancel')
{
	header("location: emailconfig.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit'] == 'Save')
{
	$email->Insert($_POST);
	header("location: emailconfig.php?add=true");
	exit();
}
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $email->Update($_POST);
	header("location: emailconfig.php?edit=true");
	exit();
}
elseif($Action=='Delete')
{
	$email->Delete($_POST['email_id']);
	header("location: emailconfig.php?del=true");
	exit();
}
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $email->Delete($val)?'true':'false';			
	}

	header("location: emailconfig.php?delall=true");
	exit();
}
/*if($_POST['Submit'] == "Update")
{
		$cnt = 0;
		 while($cnt <= count($_POST['email_id']))
		{	
				$retVal1 = $email->Update_Email_Config($_POST['email_id'][$cnt],$_POST['email_adress'][$cnt]);		 
				$cnt++;
		}
		header('location: emailconfig.php?update=true');
		exit();
}
*/

#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	if($_GET['edit']==true)
		$succMessage = "Email configuration has been updated successfully!!";
	elseif($_GET['add']==true)
		$succMessage = "Email configuration has been added successfully!!";
	elseif($_GET['del']==true)
		$succMessage = "Email configuration has been deleted successfully!!";	
    elseif($_GET['delall']==true)
		$succMessage = "All Email configuration has been deleted successfully!!";			
	
	
	$tpl->assign(array( "T_Body"			=>	'emailconfig_showall'. $config['tplEx'],
						"JavaScript"	    =>  array("emailconfig.js"),
						"A_Action"		    =>	"emailconfig.php",
						"succMessage"	    =>	$succMessage,
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
								
    $email->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_email[$i]['id']				= $db->f('email_id');
		$arr_email[$i]['title']				= $db->f('email_title');
		$arr_email[$i]['emailaddress']		= $db->f('email_adress');
		$i++;
	}
	$tpl->assign(array(	"aemail"	    	=>	$arr_email,
						"Loop"				=>	$rscnt,
				));
					
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
					
}	

elseif($Action == 'Add')
{
	$tpl->assign(array("T_Body"					=>	'emailconfig_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("emailconfig.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $email->GetEmail($_POST['email_id']);
	$tpl->assign(array("T_Body"					=>	'emailconfig_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("emailconfig.js"),
						"Action"				=>	$Action,
						"email_address"			=>	$ret->email_adress,
						"email_id"				=>	$ret->email_id,
						"email_title"			=>	$ret->email_title,
						));

}					
$tpl->display('default_layout'. $config['tplEx']);
?>