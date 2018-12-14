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
	$webConf->Set(WC_GOOGLE_ADSENSE,		$_POST[WC_GOOGLE_ADSENSE]);
	$webConf->Set(WC_GOOGLE_ADSENSE_125,	$_POST[WC_GOOGLE_ADSENSE_125]);
	$webConf->Set(WC_GOOGLE_ANALYTICS_CODE,	$_POST[google_analytics_code]);	
	header('location: google_code.php?update=true');
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
	$succMessage = "Google Code has been updated successfully!!";
}
else
{
	$succMessage = "";
}

$tpl->assign(array("T_Body"			=>	'google_code'. $config['tplEx'],
//					"JavaScript"	=>  array("siteconfig.js"),
					"A_Action"		=>	"google_code.php",
					"succMessage"	=>	$succMessage,
					));


$tpl->assign(array(WC_GOOGLE_ADSENSE			=>	$config[WC_GOOGLE_ADSENSE],
					WC_GOOGLE_ADSENSE_125	 	=>	$config[WC_GOOGLE_ADSENSE_125],
					WC_GOOGLE_ANALYTICS_CODE	=>	$config[WC_GOOGLE_ANALYTICS_CODE],
	  ));

$tpl->display('default_layout'. $config['tplEx']);

?>