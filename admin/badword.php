<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Badword.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$badwd = new Badword();
#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
if ($_POST['Submit'] == 'Cancel')
{
	header("location: badword.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Add' && $_POST['Submit'] == 'Save')
{
	$badwd->Insert($_POST);
	header("location: badword.php?add=true");
	exit();
}
elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $badwd->Update($_POST);
	header("location: badword.php?edit=true");
	exit();
}
elseif($Action=='Delete')
{
	$badwd->Delete($_POST['badword_id']);
	header("location: badword.php?del=true");
	exit();
}
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $badwd->Delete($val)?'true':'false';			
	}

	header("location: badword.php?delall=true");
	exit();
}
#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	if($_GET['edit']==true)
		$succMessage = "Badword has been updated successfully!!";
	elseif($_GET['add']==true)
		$succMessage = "Badword has been added successfully!!";
	elseif($_GET['del']==true)
		$succMessage = "Badword  has been deleted successfully!!";	
    elseif($_GET['delall']==true)
		$succMessage = "All Badword has been deleted successfully!!";			
	
	
	$tpl->assign(array( "T_Body"			=>	'badword_showall'. $config['tplEx'],
						"JavaScript"	    =>  array("badword.js"),
						"A_Action"		    =>	"badword.php",
						"succMessage"	    =>	$succMessage,
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
    if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record']),
						));
	}	
								
    $badwd->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_badwd[$i]['bd_id']				= $db->f('badword_id');
		$arr_badwd[$i]['bd_value']			= $db->f('badword_value');
		$i++;
	}
	$tpl->assign(array(	"abadwd"	    	=>	$arr_badwd,
						"Loop"				=>	$rscnt,
				));
					
					
}	

elseif($Action == 'Add')
{
	$tpl->assign(array("T_Body"					=>	'badwd_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("badword.js"),
						"Action"				=>	$Action,
						));

}
elseif($Action == 'Edit')
{
	$ret = $badwd->Getbadwd($_POST['badword_id']);
	$tpl->assign(array("T_Body"					=>	'badwd_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("badword.js"),
						"Action"				=>	$Action,
						"bad_name"				=>	$ret->badword_value,
						"badword_id"			=>	$ret->badword_id,
						));

}					
$tpl->display('default_layout'. $config['tplEx']);
?>