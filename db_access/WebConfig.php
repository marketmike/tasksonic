<?php
define('WC_SITE_TITLE',				'site_title');
define('WC_SITE_URL',				'site_url');
define('WC_SITE_EMAIL',				'site_email');
define('WC_MAP_KEY',				'map_key');
define('WC_SITE_KEYWORD',			'site_keyword');
define('WC_SITE_DESCRIPTION',		'site_description');

// Social Media
define('WC_FB_FAN',					'fb_fan');
define('WC_FB_PAGE_TOKEN',			'fb_page_token');
define('WC_TWITTER_PAGE',			'twitter_page');
define('WC_FB_APP_ID',				'fb_app_id');
define('WC_FB_API_KEY',				'fb_api_key');
define('WC_FB_APP_SECRET',			'fb_app_secret');
define('WC_GOOGLE_ADSENSE',			'google_adsense');   // for google adsense code
define('WC_GOOGLE_ADSENSE_125',		'google_adsense_125');   // for google adsense code
define('WC_GOOGLE_ANALYTICS_CODE',	'google_analytics_code');   // for google analytics code

define('WC_EURO_DOLLAR',			'euro_dollar');
define('WC_DOLLAR_EURO',			'dollar_euro');

define('WC_POST_DEPOSIT',			'project_post_deposite'); // for checking that user has minimum amount at the post project time...
define('WC_BID_DEPOSIT',			'minimum_bid_place');  // minimum amount for bidind on project
define('WC_DEPOSIT_AMOUNT',			'minimum_deposite_amount'); // minimum amount for bidind on project
define('WC_WITHDRAW_AMOUNT',		'minimum_withdaw_amount'); // minimum amount for bidind on project

define('WC_FEES_OF_POST_project',	'fees_Taken_for_post_project');// fees taken when any one post task on site

define('WC_CONTACT_US',				'Contact Us');

define('WC_PAGESIZE',				'page_size');
define('WC_USER_PAGESIZE',			'user_page_size');

define('WC_URGENT_project',			'urgent_project_fee');

define('WC_THEME',					'my_theme');

define('WC_BID_APPROVE',			'bid_approve');

///////////////////
define('WC_FREE_PORTFOLIO',			'free_portfolio');
define('WC_PREMIUM_PORTFOLIO',		'premium_portfolio');

define('WC_EDIT_BID',		  	    'edit_bid'); //for how many times project details are editing..?

define('WC_COMM_FROM_SELLER',  	    'comm_from_seller');//minimun commision taken form seller
define('WC_COMM_FROM_BUYER',	    'comm_from_buyer');//minimun commision taken form buyer
define('WC_MINIMUM_COMM_SELLER', 	'minimum_comm_seller');//commision taken form seller
define('WC_MINIMUM_COMM_BUYER', 	'minimum_comm_buyer');//commision taken form buyer
define('WC_PREMIUM_project',	 	'premium_project_fees');//fees for premium project


define('WC_COMM_FOR_REFERRAL',	'comm_for_referral');//fees for premium project


//////////////////////////////
////   Paypal Contants   /////
//////////////////////////////
define('WC_PAYPAL_ACTIVE',			'paypal_active');
define('WC_PAYPAL_MAIL',			'paypal_mail');
define('WC_PAYPAL_SENDBOX',			'paypal_sendbox');
define('WC_PAYPAL_FIX_AMOUNT',		'paypal_fix_amount');//for payapl deposit fix amount
define('WC_PAYPAL_PERCENTAGE',		'paypal_percentage');//for payapl deposit percentage
//////////////////////////////
////   Paypal Contants   /////
//////////////////////////////

define('WC_PAYPAL_DEPOSIT',			        'paypal_deposit');//for payapl withdarw amount
define('WC_PAYPAL_FIX_AMOUNT_DEPOSIT',		'paypal_fix_amount_deposit');//for payapl withdarw fix amount
define('WC_PAYPAL_PERCENTAGE_DEPOSIT',		'paypal_percentage_deposit');//for payapl withdarw percentage
//////////////////////////////
////   Escrow Contants   /////
//////////////////////////////

define('WC_ESCROW_PAYMENT',		     		'escrow_payment');

//////////////////////////////
////   Moneybooker Contants   
//////////////////////////////

define('WC_MONEYBOOKER_ACTIVE',			'moneybooker_active');
define('WC_MONEYBOOKER_SENDBOX',			'moneybooker_sendbox');
define('WC_MONEYBOOKER_MAIL',				'moneybooker_mail');
define('WC_MONEYBOOKER_FIX_AMOUNT_DEPOSIT',	'moneybooker_fix_amount_deposite');//for Moneybooker deposite fix amount
define('WC_MONEYBOOKER_PERCENTAGE_DEPOSIT',	'moneybooker_percentage_deposite');//for Moneybooker deposite percentage
define('WC_MONEYBOOKER_FIX_AMOUNT_WITHDRAW','moneybooker_fix_amount_withdraw');//for Moneybooker withdarw fix amount
define('WC_MONEYBOOKER_PERCENTAGE_WITHDRAW','moneybooker_percentage_withdraw');//for Moneybooker withdarw percentage

//////////////////////////////
////  Misc
//////////////////////////////

define('WC_PHONE_VERIFIED_FEE',			'phone_verified_fee');
define('WC_BACKGROUND_CHECK_FEE',			'background_check_fee');
define('WC_PHONE_VERIFY_API',			'phone_verify_api');
define('WC_BACKGROUND_CHECK_API',			'background_check_api');

//////////////////////////////
////   Theme of site
//////////////////////////////

class WebConfig
{
   	#====================================================================================================
	#	Function Name	:   WebConfig
	#----------------------------------------------------------------------------------------------------
    function WebConfig()
    {
		global $db;
		global $config;
		$sql  = "SELECT * "
				. " FROM " . WEBSITE_CONFIG;
		$db->query($sql);
	    while($db->next_record())
	    {
	        $config[$db->f('config_name')] = stripslashes($db->f('config_value'));
	    }
		$sql  = "SELECT * "
				. " FROM " . EMAIL_CONFIG;
		$db->query($sql);
	    while($db->next_record())
	    {
			$config[$db->f('email_title')] = stripslashes($db->f('email_adress'));
	    }
	}
	#====================================================================================================
	#	Function Name		:	Get
	#----------------------------------------------------------------------------------------------------
	function Get($config_name)
	{
		global $config;
		return $config[$config_name];
	}
	#====================================================================================================
	#	Function Name		:	Set
	#----------------------------------------------------------------------------------------------------
	function Set($config_name, $config_value)
	{
		global $config;
		$config[$config_name] = $config_value;
        return $this->_Update($config_name, $config_value);
	}
	#====================================================================================================
	#	Function Name	:   Update
	#----------------------------------------------------------------------------------------------------
	function _Update($config_name, $config_value)
	{
		global $db;
		$sql = " UPDATE ".WEBSITE_CONFIG
			 . " SET  config_value	= '". addslashes($config_value). "' "
			 . " WHERE config_name 	= '". $config_name. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}

	function Update_Email_Config($email_id,$email_adress)
	{
		global $db;
		$sql = " UPDATE ".EMAIL_CONFIG
			.	" SET "
			 . " email_adress		= '". $email_adress. "'  "
			 . " WHERE email_id 	= '". $email_id . "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}

    function ViewAll()
	{
		global $db;
		$sql	=	"SELECT * "
				.	" FROM " . EMAIL_CONFIG
				.	" WHERE 1 "
				.	(empty($this->email_id)	? "" : " AND email_id IN (". $this->email_id. ")")
				.	(empty($this->page_size) ? "" : " LIMIT " . $this->start_record . ", ". $this->page_size);
		$rs = $db->query($sql);
		return ($db->fetch_object());
	}
}
?>