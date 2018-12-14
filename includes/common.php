<?php

#====================================================================================================
#	Start Session and define site access valid
#----------------------------------------------------------------------------------------------------
if ( !defined('IN_SITE') )
{
	die("Hacking attempt");
}
session_start();
#====================================================================================================
#	addslashes to vars if magic_quotes_gpc is off
#	this is a security precaution to prevent someone
#	trying to break out of a SQL statement.
#----------------------------------------------------------------------------------------------------
error_reporting(E_ERROR | E_WARNING | E_PARSE); // This will NOT report uninitialized variables

#====================================================================================================
#	Define some basic configuration arrays. This also prevents
#	malicious rewriting of language and otherarray values via
#	URI params
#----------------------------------------------------------------------------------------------------
$physical_path	= array();
$virtual_path	= array();
$config 		= array();

#====================================================================================================
#	Define Site state and set site root
#----------------------------------------------------------------------------------------------------

// Set the server name
$config['Server_Name'] = strtoupper($_SERVER['SERVER_NAME']);

// Set the installation directory
define("INSTALL_DIR", "/");
$physical_path['Site_Root']			=	$_SERVER['DOCUMENT_ROOT']. INSTALL_DIR;
$spaw_dir =  "/editor/";
$virtual_path['Site_Root']			=	'http://'. $_SERVER['HTTP_HOST']. INSTALL_DIR;

#====================================================================================================
#	Including required configuration
#----------------------------------------------------------------------------------------------------
$physical_path['Site_Include']		=	$physical_path['Site_Root']. 'includes/';

include($physical_path['Site_Include']. 'config.php');
include($physical_path['Site_Include']. 'constants.php');
include($physical_path['Site_Include']. 'functions.php');
#====================================================================================================
#	Including all required library
#----------------------------------------------------------------------------------------------------
$physical_path['Libs']				=	$physical_path['Site_Root']. 'libs/';
$virtual_path['Libs']				=	$virtual_path['Site_Root']. 'libs/';
$physical_path['fblib']				=	$physical_path['Site_Root']. 'fblib/';

include($physical_path['Libs']. 'mysql.php');
include($physical_path['Libs']. 'htmlMimeMail.php');
include($physical_path['Libs']. 'thumbnail.php');
include($physical_path['Libs']. 'Smarty.class.php');

#====================================================================================================
#	Including required language files and folders
#----------------------------------------------------------------------------------------------------
$physical_path['Site_Lang']		=	$physical_path['Site_Root']. 'lang/default/';

#====================================================================================================
#	Get current users city from cookie for global use
#----------------------------------------------------------------------------------------------------
$citycurrent = cookieget('city');

#====================================================================================================
#	Define Rich HTML editor path
#----------------------------------------------------------------------------------------------------
$physical_path['Editor']			=	$physical_path['Site_Root']. 'editor/';
$virtual_path['Editor']				=	$virtual_path['Site_Root']. 'editor/';
global $spaw_root;
define('EDITOR_ROOT', 	$physical_path['Editor']);
define('EDITOR_URL', 	$virtual_path['Editor']);
$spaw_root = EDITOR_ROOT;
//print_r(EDITOR_URL);die;
#====================================================================================================
#	Define Data Access root
#----------------------------------------------------------------------------------------------------
$physical_path['DB_Access']			=	$physical_path['Site_Root']. 'db_access/';
include($physical_path['DB_Access']. 'WebConfig.php');
include($physical_path['DB_Access']. 'User.php');
include($physical_path['DB_Access']. 'Utility.php');

#====================================================================================================
#	Email Template
#----------------------------------------------------------------------------------------------------
$physical_path['EmailTemplate']			=	$physical_path['Site_Root']. 'email_templates/';
$virtual_path['EmailTemplate']			=	$virtual_path['Site_Root']. 'email_templates/';

$physical_path['EmailTemplate_Images']		=	$physical_path['EmailTemplate']. 'images/';
$virtual_path['EmailTemplate_Images']		=	$virtual_path['EmailTemplate']. 'images/';

#====================================================================================================
#	Upload
#----------------------------------------------------------------------------------------------------
$physical_path['Upload']		=	$physical_path['Site_Root']. 'upload/';
$virtual_path['Upload']			=	$virtual_path['Site_Root']. 'upload/';

$physical_path['Seller_Logo']	=	$physical_path['Upload']. 'Seller_Logo/';
$virtual_path['Seller_Logo']	=	$virtual_path['Upload']. 'Seller_Logo/';

$physical_path['Portfolio']	=	$physical_path['Upload']. 'Portfolio/';
$virtual_path['Portfolio']	=	$virtual_path['Upload']. 'Portfolio/';

$physical_path['Contact']	=	$physical_path['Upload']. 'Contact/';
$virtual_path['Contact']	=	$virtual_path['Upload']. 'Contact/';

$physical_path['project']	=	$physical_path['Upload']. 'project/';
$virtual_path['project']	=	$virtual_path['Upload']. 'project/';

$physical_path['Private_Message']	=	$physical_path['Upload']. 'Private_Message/';
$virtual_path['Private_Message']	=	$virtual_path['Upload']. 'Private_Message/';

$physical_path['Pdf']	=	$physical_path['Upload']. 'Pdf/';
$virtual_path['Pdf']	=	$virtual_path['Upload']. 'Pdf/';

$physical_path['Affilates']		=	$physical_path['Site_Root']. 'Affilates/';
$virtual_path['Affilates']		=	$virtual_path['Site_Root']. 'Affilates/';

#====================================================================================================
#	Define User the user root file path
#----------------------------------------------------------------------------------------------------
if(defined("IN_USER"))
{
	$physical_path['User_Root']			=	$physical_path['Site_Root'];
	$virtual_path['User_Root']			=	$virtual_path['Site_Root'];
}
elseif(defined("IN_ADMIN"))
{
	$physical_path['User_Root']			=	$physical_path['Site_Root']. 'admin/';
	$virtual_path['User_Root']			=	$virtual_path['Site_Root']. 'admin/';
}


// Define Template root
$physical_path['Templates_Root']		=	$physical_path['User_Root']. 'templates/';
$virtual_path['Templates_Root']			=	$virtual_path['User_Root'].  'templates/';

$virtual_path['Templates_CSS']			=	$virtual_path['Templates_Root']. 'css/';
$virtual_path['Templates_JS']			=	$virtual_path['Templates_Root']. 'js/';
$virtual_path['Templates_Image']		=	$virtual_path['Templates_Root']. 'images/';

$virtual_path['Templates_Help']			=	$virtual_path['Templates_Image']. 'help/';


#====================================================================================================
#	Initial the required object
#----------------------------------------------------------------------------------------------------

# 	Make the mail object
#----------------------------------------------------------------------------------------------------
global $mail,$mail1,$mail2;
$mail = '';
$mail = new htmlMimeMail();

# Make the database connection
#----------------------------------------------------------------------------------------------------
global $db,$db1,$db2,$db3;
$db = '';
$db = new DB_Sql($config['DB_Host'], $config['DB_Name'], $config['DB_User'], $config['DB_Passwd'], false);
$db1 = '';
$db1 = new DB_Sql($config['DB_Host'], $config['DB_Name'], $config['DB_User'], $config['DB_Passwd'], false);
$db2 = '';
$db2 = new DB_Sql($config['DB_Host'], $config['DB_Name'], $config['DB_User'], $config['DB_Passwd'], false);
$db3 = '';
$db3 = new DB_Sql($config['DB_Host'], $config['DB_Name'], $config['DB_User'], $config['DB_Passwd'], false);
if(!$db->link_id())
{
  die("Could not connect to the database");
}
if(!$db1->link_id())
{
  die("Could not connect to the database");
}
if(!$db2->link_id())
{
  die("Could not connect to the database");
}
if(!$db3->link_id())
{
  die("Could not connect to the database");
}

#	Read site configuration
#----------------------------------------------------------------------------------------------------
global $webConf;
$webConf = '';
$webConf = new WebConfig();


#	Utility
#----------------------------------------------------------------------------------------------------
global $utility;
$utility = '';
$utility = new Utility();

#	Thumbnail
#----------------------------------------------------------------------------------------------------
global $thumb;
$thumb = '';
$thumb = new thumbnail();

#	Homepage
#----------------------------------------------------------------------------------------------------
global $homepage;
$homepage = '';
$hpcontent = ViewAllHomePageContent();


#----------------------------------------------------------------------------------------------------

# Set page size under cookie
if($_POST['page_size'])
	setcookie('page_size', $_POST['page_size'], time()+24*3600);
	
if($_POST['user_page_size'])
	setcookie('user_page_size', $_POST['user_page_size'], time()+24*3600);
# Initial the smarty object
#----------------------------------------------------------------------------------------------------
$tpl = new Smarty;
$tpl_1 = new Smarty;

$tpl->compile_check = true;
$tpl_1->compile_check = true;
$tpl->force_compile = false;
$tpl->debugging 	= DEBUG;
$tpl_1->debugging 	= DEBUG;

# Define page layout
$tpl->template_dir 	= $physical_path['Templates_Root'];
$tpl->compile_dir 	= $physical_path['User_Root']. 'templates_c/';
# Define page layout
$tpl_1->template_dir 	= $physical_path['Templates_Root'];
$tpl_1->compile_dir 	= $physical_path['User_Root']. 'templates_c/';


if(defined("POPUP_WINDOW"))
{
	$tpl->assign(array(	"T_Body"	=>	'popupwin_layout'. $config['tplEx'],
						));
}

elseif(defined("IN_ADMIN"))
{
	include_once($physical_path['DB_Access']. 'Admins.php');
	global $admin;
	
	$admins = new Admins();

	$tpl->assign(array(	"T_Header"		=>	'default_header'. $config['tplEx'],
						"T_Menu"		=>	'default_menu'. $config['tplEx'],						
						"T_Footer"		=>	'default_footer'. $config['tplEx'],
						));					
}
else
{

	global $user;
	$user = new User();	
	$virtual_path['Templates_CSS']		=	$virtual_path['Templates_Root'].'css/';
	$virtual_path['Templates_Image']	=	$virtual_path['Templates_Root'].'images/';
	
	if(defined("HOME_PAGE"))
	{
 		//if some special homepage is there
		$tpl->assign(array(	"T_Header"				=>	'default_header'. $config['tplEx'],
							"T_Footer"				=>	'default_footer'. $config['tplEx'],
							"T_City"				=>	'city_list'. $config['tplEx'],
							"T_City2"				=>	'city_list2'. $config['tplEx'],								
							"T_Balance"				=>	'block_side_balance'. $config['tplEx'],
							"T_Location"			=>	'block_side_location'. $config['tplEx'],
							"T_Post"				=>	'block_side_post'. $config['tplEx'],
							"T_Map"					=>	'block_side_map'. $config['tplEx'],
							"T_Stats"				=>	'block_top_stats'. $config['tplEx'],
							"T_Mytasks"				=>	'block_side_my_tasks'. $config['tplEx'],
							"T_PostLoggedOut"		=>	'block_side_post_logged_out'. $config['tplEx'],
							"T_MapLoggedOut"		=>	'block_side_map_logged_out'. $config['tplEx'],
							"T_Marketing"			=>	'block_side_marketing'. $config['tplEx'],	
							"T_Balance_Right"		=>	'block_side_balance_right'. $config['tplEx'],								
							));
							
		include('set_invitation_cookie.php');
		include('city_list.php');
		include('city_list2.php');
		include('balance.php');
		include('stats.php');
		include('my_tasks.php');
		include('block_side_marketing.php');
		include('current_rates.php');			
	}
	elseif(defined("IN_USER") && $_SESSION['User_Id'])
	{
		// login of user
		$tpl->assign(array(	"T_Header"		=>	'default_header'. $config['tplEx'],
							"T_Footer"		=>	'default_footer'. $config['tplEx'],
							"T_City"		=>	'city_list'. $config['tplEx'],
							"T_City2"		=>	'city_list2'. $config['tplEx'],								
							"T_Balance"		=>	'block_side_balance'. $config['tplEx'],
							"T_Location"	=>	'block_side_location'. $config['tplEx'],
							"T_Post"		=>	'block_side_post'. $config['tplEx'],
							"T_Map"			=>	'block_side_map'. $config['tplEx'],
							"T_Stats"		=>	'block_top_stats'. $config['tplEx'],
							"T_Mytasks"		=>	'block_side_my_tasks'. $config['tplEx'],
							"T_Balance_Right"		=>	'block_side_balance_right'. $config['tplEx'],						
							));
		include('set_invitation_cookie.php');
		include('city_list.php');
		include('city_list2.php');
		include('balance.php');
		include('stats.php');
		include('my_tasks.php');
		include('current_rates.php');			
	}
	elseif(defined("IN_CRON"))
	{
		// login of user
		$tpl->assign(array(	"T_Header"		=>	'default_header'. $config['tplEx'],
							"T_Footer"		=>	'default_footer'. $config['tplEx'],								
							));	
	}	
	else
	{
		// without logins
		$tpl->assign(array(	"T_Header"				=>	'default_header'. $config['tplEx'],
							"T_Footer"				=>	'default_footer'. $config['tplEx'],
							"T_Menu"				=>	'default_menu'. $config['tplEx'],
							"T_City"				=>	'city_list'. $config['tplEx'],
							"T_City2"				=>	'city_list2'. $config['tplEx'],								
							"T_Balance"				=>	'block_side_balance'. $config['tplEx'],
							"T_Location"			=>	'block_side_location'. $config['tplEx'],
							"T_Post"				=>	'block_side_post'. $config['tplEx'],
							"T_Map"					=>	'block_side_map'. $config['tplEx'],
							"T_Stats"				=>	'block_top_stats'. $config['tplEx'],
							"T_Mytasks"				=>	'block_side_my_tasks'. $config['tplEx'],
							"T_PostLoggedOut"		=>	'block_side_post_logged_out'. $config['tplEx'],
							"T_MapLoggedOut"		=>	'block_side_map_logged_out'. $config['tplEx'],
							"T_Marketing"			=>	'block_side_marketing'. $config['tplEx'],
							"T_Balance_Right"		=>	'block_side_balance_right'. $config['tplEx'],							
							
							));
		include('set_invitation_cookie.php');		
		include('city_list.php');
		include('city_list2.php');
		include('balance.php');
		include('stats.php');
		include('my_tasks.php');
		include('block_side_marketing.php');
		include('current_rates.php');		
	}


}
# Assign default values
#Used for facebook connect added by Mike G on March 28, 2011
$fb_app_id = $config[WC_FB_APP_ID];
$fb_api_key = $config[WC_FB_API_KEY];
$fb_app_secret = $config[WC_FB_APP_SECRET];
$fb_fan = $config[WC_FB_FAN];
$fb_page_token = $config[WC_FB_PAGE_TOKEN];
$site_email = 'info@tasksonic.com';
$site_title_absolute	=	$config[WC_SITE_TITLE];
$site_url = $config[WC_SITE_URL];
#End used for facebook connect
$tpl->assign(array("Templates_CSS"			=> 	$virtual_path['Templates_CSS'],
					"Templates_JS"			=> 	$virtual_path['Templates_JS'],
					"Templates_Image"		=> 	$virtual_path['Templates_Image'],
					"Affilates_Image"		=> 	$virtual_path['Affilates'],
					"Templates_Help"		=> 	$virtual_path['Templates_Help'],
					// Social Media
                    "fb_fan"				=>	$config[WC_FB_FAN],
                    "fb_page_token"			=>	$config[WC_FB_PAGE_TOKEN],					
                    "twitter_page"			=>	$config[WC_TWITTER_PAGE],
                    "fb_app_id"				=>	$config[WC_FB_APP_ID],
                    "fb_api_key"			=>	$config[WC_FB_API_KEY],
                    "fb_app_secret"			=>	$config[WC_FB_APP_SECRET],
					
					"Site_Root"				=> 	$virtual_path['Site_Root'],
                    "Site_URL"				=>	$config[WC_SITE_URL],
					"Site_Email"			=>	$config[WC_SITE_EMAIL],
                    "Map_Key"				=>	$config[WC_MAP_KEY],					
                    "Company_Title"			=>	$config[WC_COMPANY_TITLE],
					"Site_Title"			=>	$config[WC_SITE_TITLE],
                    "Site_Title_Absolute"	=>	$config[WC_SITE_TITLE],
					"Meta_Title"			=>	$config[WC_SITE_TITLE],
					"Meta_Keyword"			=>	$config[WC_SITE_KEYWORD],
					"Meta_Description"		=>	$config[site_description],
					"google_adsense_code"	=>	$config[WC_GOOGLE_ADSENSE],
					"google_adsense_code_125"	=>	$config[WC_GOOGLE_ADSENSE_125],
					"google_analytics_code"	=>	$config[WC_GOOGLE_ANALYTICS_CODE],
					"phone_verified_fee"	=>	$config[WC_PHONE_VERIFIED_FEE],	
					"background_check_fee"	=>	$config[WC_BACKGROUND_CHECK_FEE],
					"phone_verify_api"		=>	$config[WC_PHONE_VERIFY_API],	
					"background_check_api"	=>	$config[WC_BACKGROUND_CHECK_API],
					"paypal_active"			=>	$config[WC_PAYPAL_ACTIVE],
					"moneybooker_active"	=>	$config[WC_MONEYBOOKER_ACTIVE],					
					"tab"					=>	1,
					"home_content"			=> $hpcontent,
					"citycurrent"			=>	$citycurrent,
					));

//for local
include($physical_path['Site_Lang'].'/common.php');

// Other globals
$Site_Title = $config[WC_SITE_TITLE];
$Site_URL = $config[WC_SITE_URL];

# Assign default languages
$tpl->assign(array( "lang_common"				=> 	$lang,
					));

?>
