<?php

#====================================================================================================
#	File Name		:	siteconfig.php
#----------------------------------------------------------------------------------------------------
#	Include required files
#----------------------------------------------------------------------------------------------------

define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
#-----------------------------------------------------------------------------------------------------------------------------
#	Update Config information
#-----------------------------------------------------------------------------------------------------------------------------

if($_POST['Submit'] == "Update")

{

	if($_SESSION['Admin_Perm'] == 'Admin')
	{
	     
		$webConf->Set(WC_MONEYBOOKER_MAIL,				$_POST[WC_MONEYBOOKER_MAIL]);
		$webConf->Set(WC_MONEYBOOKER_SENDBOX,			$_POST[WC_MONEYBOOKER_SENDBOX]);
	}
	
	$webConf->Set(WC_MONEYBOOKER_FIX_AMOUNT_DEPOSIT, 	$_POST[WC_MONEYBOOKER_FIX_AMOUNT_DEPOSIT]);
	$webConf->Set(WC_MONEYBOOKER_PERCENTAGE_DEPOSIT, 	$_POST[WC_MONEYBOOKER_PERCENTAGE_DEPOSIT]);
	$webConf->Set(WC_MONEYBOOKER_FIX_AMOUNT_WITHDRAW,	$_POST[WC_MONEYBOOKER_FIX_AMOUNT_WITHDRAW]);
	$webConf->Set(WC_MONEYBOOKER_PERCENTAGE_WITHDRAW,	$_POST[WC_MONEYBOOKER_PERCENTAGE_WITHDRAW]);
	$webConf->Set(WC_MONEYBOOKER_ACTIVE,				$_POST[WC_MONEYBOOKER_ACTIVE]);		
	header('location: moneybooker.php?update=true');
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
	$succMessage = "Site configuration has been updated successfully!!";
}
else
{
	$succMessage = "";
}

$tpl->assign(array("T_Body"			=>	'moneybooker'. $config['tplEx'],
					"succMessage"	=>	$succMessage,
					));


$tpl->assign(array( WC_MONEYBOOKER_MAIL 					=>	$config[WC_MONEYBOOKER_MAIL],
					WC_MONEYBOOKER_SENDBOX 					=>	$config[WC_MONEYBOOKER_SENDBOX],
					WC_MONEYBOOKER_FIX_AMOUNT_DEPOSIT 		=>	$config[WC_MONEYBOOKER_FIX_AMOUNT_DEPOSIT],
					WC_MONEYBOOKER_PERCENTAGE_DEPOSIT		=>	$config[WC_MONEYBOOKER_PERCENTAGE_DEPOSIT],
					WC_MONEYBOOKER_FIX_AMOUNT_WITHDRAW		=>	$config[WC_MONEYBOOKER_FIX_AMOUNT_WITHDRAW],
					WC_MONEYBOOKER_PERCENTAGE_WITHDRAW		=>	$config[WC_MONEYBOOKER_PERCENTAGE_WITHDRAW],
					WC_MONEYBOOKER_ACTIVE					=> ($config[WC_MONEYBOOKER_ACTIVE] == 1) ? 'checked' : '',									
				  ));

$tpl->display('default_layout'. $config['tplEx']);

?>