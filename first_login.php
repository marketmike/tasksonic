<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access'].'Page.php');
$page = new Page();

$is_first_logon = $user->is_first_logon($_SESSION['User_Name']);
		
if($is_first_logon == 1){

		$ret = $user->GetChangeUserInfo1($_SESSION['User_Id']);
			if ($ret->mem_as_buyer == 1){
				$taskowner_profile .= '<strong><a href="edit-task-owner-profile.html">Task Owner Profile</a></strong>';
			}
			if ($ret->mem_as_seller == 1){
				$tasker_profile .= '<strong><a href="edit-tasker-profile.html">Tasker Profile</a></strong>';
			}

				$rsPage = $page->getPage(3);		

$tpl->assign(array(	"T_Body"					=>	'first_login'. $config['tplEx'],
					"page_name" 				=> 'Welcome to Task Sonic',
					"page_content"				=>	$rsPage->page_content,
					"page_title"				=>	$rsPage->page_title,					
					"commission_tasker" 		=> $config[WC_COMM_FROM_SELLER],
					"min_commission_tasker" 	=> $config[WC_MINIMUM_COMM_SELLER],
					"commission_task_owner" 	=> $config[WC_COMM_FROM_BUYER],
					"min_commission_task_owner" => $config[WC_MINIMUM_COMM_BUYER],
                    "Site_Title_Absolute"		=>	$config[WC_SITE_TITLE],
                    "posting_fee"				=>	$config[WC_FEES_OF_POST_project],					
                    "ERROR"						=>	$ERROR,
                    "is_first_logon"			=>	$is_first_logon,
					"username"					=>	$_SESSION['User_Name'],
					"taskowner_profile"			=>	$taskowner_profile,	
					"tasker_profile"			=>	$tasker_profile,						
				));
					

$tpl->display('default_layout'. $config['tplEx']);
}else{
header("location: faq.html");
}

?>