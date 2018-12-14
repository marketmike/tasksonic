<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");

#-----------------------------------------------------------------------------------------------------------------------------
#	Update Config information
#-----------------------------------------------------------------------------------------------------------------------------

if($_POST['Submit'] == "Update")

{
	$webConf->Set(WC_PREMIUM_PORTFOLIO,			$_POST[WC_PREMIUM_PORTFOLIO]);
	$webConf->Set(WC_FREE_PORTFOLIO,			$_POST[WC_FREE_PORTFOLIO]);
	header('location: member_settings.php?update=true');
	exit();

}

#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
else if($_POST['Submit'] == "Cancel")
{
	header('location: index.php');
	exit();
}
#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------
if($_GET['update']==true)
{
	$succMessage = "configuration has been updated successfully!!";
}
else
{
	$succMessage = "";
}

$tpl->assign(array("T_Body"			=>	'member_settings'. $config['tplEx'],
					"JavaScript"	=>  array("member_settings.js"),
					"succMessage"	=>	$succMessage,
					));


$tpl->assign(array( WC_PREMIUM_PORTFOLIO 			=>	$config[WC_PREMIUM_PORTFOLIO],
					WC_FREE_PORTFOLIO 				=>	$config[WC_FREE_PORTFOLIO],
	  ));

$tpl->display('default_layout'. $config['tplEx']);

?>