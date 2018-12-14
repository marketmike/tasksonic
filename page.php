<?php
define('IN_SITE', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access'].'Page.php');
$page = new Page();

$rsPage = $page->getPage(isset($_GET['pid']) ? $_GET['pid'] : (isset($_POST['pid']) ? $_POST['pid'] : 1));
if($rsPage->page_id == 3)
{
	$is_first_logon = $user->is_first_logon($_SESSION['User_Name']);
		
		if($is_first_logon == 1){
		include_once($physical_path['DB_Access']. 'Seller.php');
		$seller 	= new Seller();

		$ret = $user->GetChangeUserInfo1($_SESSION['User_Id']);
			if ($ret->mem_as_buyer == 1){
				$ERROR .= 'Please Complete Your Task Owner Profile <a href="edit-task-owner-profile.html">UPDATE</a><br />';
			}
			if ($ret->mem_as_seller == 1){
				$ERROR .= 'Please Complete Your Tasker Profile <a href="edit-tasker-profile.html">UPDATE</a>';
			}
		}
}
else if($rsPage->page_id == 2)
{
	$link = '<label class=navigation>'.$lang['Footer_Terms_Use'].'</label>';
	
}


if($_GET['pop_up'] == true)
{
$tpl->assign(array(	"T_Body"			=>	'page_pop'. $config['tplEx'],
					"page_content"		=>	$rsPage->page_content,
					"page_name"			=>	$rsPage->page_title,
					"Site_Title"		=>	$config[WC_SITE_TITLE]." - ".$rsPage->page_title,					
					"page_id"			=>	$rsPage->page_id,
					"tab"				=>	4,
					"navigation"		=>	$link,
					"navigation1"		=>  $navigation1,
					"flag_flag"			=>	'1',
					"commission_tasker" => $config[WC_COMM_FROM_SELLER],
					"min_commission_tasker" => $config[WC_MINIMUM_COMM_SELLER],
					"commission_task_owner" => $config[WC_COMM_FROM_BUYER],
					"min_commission_task_owner" => $config[WC_MINIMUM_COMM_BUYER],
                    "Site_Title_Absolute"	=>	$config[WC_SITE_TITLE],
                    "ERROR"					=>	$ERROR,
                    "is_first_logon"		=>	$is_first_logon,						
				));
		
	$tpl->display('popupwin_layout_blank'. $config['tplEx']);
}
else
{
$tpl->assign(array(	"T_Body"			=>	'page'. $config['tplEx'],
					"page_content"		=>	$rsPage->page_content,
					"page_name"			=>	$rsPage->page_title,
					"Site_Title"		=>	$config[WC_SITE_TITLE]." - ".$rsPage->page_title,					
					"page_id"			=>	$rsPage->page_id,
					"tab"				=>	4,
					"navigation"		=>	$link,
					"navigation1"		=>  $navigation1,
					"commission_tasker" => $config[WC_COMM_FROM_SELLER],
					"min_commission_tasker" => $config[WC_MINIMUM_COMM_SELLER],
					"commission_task_owner" => $config[WC_COMM_FROM_BUYER],
					"min_commission_task_owner" => $config[WC_MINIMUM_COMM_BUYER],
                    "Site_Title_Absolute"	=>	$config[WC_SITE_TITLE],
                    "ERROR"					=>	$ERROR,
                    "is_first_logon"					=>	$is_first_logon,					
				));
					
	$tpl->display('default_layout'. $config['tplEx']);
}
?>