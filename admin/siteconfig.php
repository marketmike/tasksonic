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

	$webConf->Set(WC_EURO_DOLLAR,			$_POST[WC_EURO_DOLLAR]);
	$webConf->Set(WC_DOLLAR_EURO,			$_POST[WC_DOLLAR_EURO]);
	
	$webConf->Set(WC_USER_PAGESIZE,			$_POST[WC_USER_PAGESIZE]);
	$webConf->Set(WC_SITE_TITLE, 			$_POST[WC_SITE_TITLE]);
	$webConf->Set(WC_SITE_URL, 				$_POST[WC_SITE_URL]);
	$webConf->Set(WC_SITE_EMAIL, 			$_POST[WC_SITE_EMAIL]);	

	$webConf->Set(WC_MAP_KEY, 				$_POST[WC_MAP_KEY]);
	$webConf->Set(WC_SITE_KEYWORD, 			$_POST[WC_SITE_KEYWORD]);
	$webConf->Set(WC_SITE_DESCRIPTION, 		$_POST[WC_SITE_DESCRIPTION]);
// Social Media
	$webConf->Set(WC_FB_FAN, 				$_POST[WC_FB_FAN]);
	$webConf->Set(WC_FB_PAGE_TOKEN, 		$_POST[WC_FB_PAGE_TOKEN]);	
	$webConf->Set(WC_TWITTER_PAGE, 			$_POST[WC_TWITTER_PAGE]);
	$webConf->Set(WC_FB_APP_ID, 			$_POST[WC_FB_APP_ID]);
	$webConf->Set(WC_FB_API_KEY, 			$_POST[WC_FB_API_KEY]);
	$webConf->Set(WC_FB_APP_SECRET, 		$_POST[WC_FB_APP_SECRET]);
	
	$webConf->Set(WC_POST_DEPOSIT,			$_POST[WC_POST_DEPOSIT]);
	$webConf->Set(WC_BID_DEPOSIT,			$_POST[WC_BID_DEPOSIT]);
	$webConf->Set(WC_DEPOSIT_AMOUNT,		$_POST[WC_DEPOSIT_AMOUNT]);
	$webConf->Set(WC_WITHDRAW_AMOUNT,		$_POST[WC_WITHDRAW_AMOUNT]);
	$webConf->Set(WC_FEES_OF_POST_project,	$_POST[WC_FEES_OF_POST_project]);
	$webConf->Set(WC_ESCROW_PAYMENT,		$_POST[WC_ESCROW_PAYMENT]);
	$webConf->Set(WC_EDIT_BID,				$_POST[WC_EDIT_BID]);
	$webConf->Set(WC_COMM_FROM_SELLER,		$_POST[WC_COMM_FROM_SELLER]);
	$webConf->Set(WC_COMM_FROM_BUYER,		$_POST[WC_COMM_FROM_BUYER]);
	$webConf->Set(WC_MINIMUM_COMM_SELLER,	$_POST[WC_MINIMUM_COMM_SELLER]);
	$webConf->Set(WC_MINIMUM_COMM_BUYER,	$_POST[WC_MINIMUM_COMM_BUYER]);
	$webConf->Set(WC_PREMIUM_project,		$_POST[WC_PREMIUM_project]);
	$webConf->Set(WC_URGENT_project,		$_POST[WC_URGENT_project]);
	$webConf->Set(WC_COMM_FOR_REFERRAL,	$_POST[WC_COMM_FOR_REFERRAL]);
	$webConf->Set(WC_PHONE_VERIFIED_FEE,	$_POST[WC_PHONE_VERIFIED_FEE]);
	$webConf->Set(WC_BACKGROUND_CHECK_FEE,	$_POST[WC_BACKGROUND_CHECK_FEE]);
	$webConf->Set(WC_PHONE_VERIFY_API,	$_POST[WC_PHONE_VERIFY_API]);	
	$webConf->Set(WC_BACKGROUND_CHECK_API,	$_POST[WC_BACKGROUND_CHECK_API]);	
	header('location: siteconfig.php?update=true');
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

$tpl->assign(array("T_Body"			=>	'siteconfig'. $config['tplEx'],
					"JavaScript"	=>  array("siteconfig.js"),
					"A_Action"		=>	"siteconfig.php",
					"succMessage"	=>	$succMessage,
					));


$tpl->assign(array( WC_SITE_TITLE 			=>	$config[WC_SITE_TITLE],
					WC_SITE_EMAIL 			=>	$config[WC_SITE_EMAIL],
					WC_SITE_URL 			=>	$config[WC_SITE_URL],
					WC_MAP_KEY 				=>	$config[WC_MAP_KEY],
					WC_SITE_KEYWORD 		=>	$config[WC_SITE_KEYWORD],
					WC_SITE_DESCRIPTION 	=>	$config[WC_SITE_DESCRIPTION],
//					WC_GOOGLE_ADSENSE		=>	$config[WC_GOOGLE_ADSENSE],
// Social Media
					WC_FB_FAN 				=>	$config[WC_FB_FAN],
					WC_TWITTER_PAGE 		=>	$config[WC_TWITTER_PAGE],
					WC_FB_APP_ID 			=>	$config[WC_FB_APP_ID],
					WC_FB_API_KEY 			=>	$config[WC_FB_API_KEY],
					WC_FB_APP_SECRET 		=>	$config[WC_FB_APP_SECRET],					

					WC_EURO_DOLLAR			=>	$config[WC_EURO_DOLLAR],
					WC_DOLLAR_EURO			=>	$config[WC_DOLLAR_EURO],
					
					WC_POST_DEPOSIT			=>	$config[WC_POST_DEPOSIT],
					WC_BID_DEPOSIT			=>	$config[WC_BID_DEPOSIT],
					WC_DEPOSIT_AMOUNT		=>	$config[WC_DEPOSIT_AMOUNT],
					WC_WITHDRAW_AMOUNT		=>	$config[WC_WITHDRAW_AMOUNT],
					
					WC_FEES_OF_POST_project	=>	$config[WC_FEES_OF_POST_project],
					
					WC_ESCROW_PAYMENT		=>	$config[WC_ESCROW_PAYMENT],
					
					WC_EDIT_BID				=>	$config[WC_EDIT_BID],
					
					WC_USER_PAGESIZE		=>	$config[WC_USER_PAGESIZE],
					
					WC_COMM_FROM_SELLER		=>	$config[WC_COMM_FROM_SELLER],
					WC_COMM_FROM_BUYER		=>	$config[WC_COMM_FROM_BUYER],
					
					WC_MINIMUM_COMM_SELLER 	=>	$config[WC_MINIMUM_COMM_SELLER],
					WC_MINIMUM_COMM_BUYER 	=>	$config[WC_MINIMUM_COMM_BUYER],
					WC_PREMIUM_project	 	=>	$config[WC_PREMIUM_project],
					WC_URGENT_project	 	=>	$config[WC_URGENT_project],
					
					WC_COMM_FOR_REFERRAL	=>	$config[WC_COMM_FOR_REFERRAL],
					WC_PHONE_VERIFIED_FEE	=>	$config[WC_PHONE_VERIFIED_FEE],
					WC_BACKGROUND_CHECK_FEE	=>	$config[WC_BACKGROUND_CHECK_FEE],					
	  ));

$tpl->display('default_layout'. $config['tplEx']);

?>