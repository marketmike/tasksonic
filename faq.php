<?php
define('IN_SITE', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access'].'Page.php');
include_once($physical_path['DB_Access']. 'Faq.php');
$page = new Page();
$faq  = new FAQ();
$Action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');
if($Action == '' || $Action == 'ViewAll')
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


	$faq->ViewAllFAQ();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_faq[$i]['faq_id']			= $db->f('faq_id');
		$arr_faq[$i]['faq_title']		= $db->f('faq_title');
		$arr_faq[$i]['disp_order']		= $db->f('disp_order');
		$arr_faq[$i]['status']			= $db->f('status');
		$i++;
	}
	
	$tpl->assign(array("T_Body"					=>	'faq'. $config['tplEx'],
						"JavaScript"			=>  array("faq.js"),
						"Loop"					=>	$rscnt,						
						"arr_faq"				=>	$arr_faq,
						"commission_tasker" => $config[WC_COMM_FROM_SELLER],
						"min_commission_tasker" => $config[WC_MINIMUM_COMM_SELLER],
						"commission_task_owner" => $config[WC_COMM_FROM_BUYER],
						"min_commission_task_owner" => $config[WC_MINIMUM_COMM_BUYER],
						"Site_Title_Absolute"	=>	$config[WC_SITE_TITLE],
						"ERROR"					=>	$ERROR,
						"is_first_logon"					=>	$is_first_logon,						
						));	
}
elseif ($Action == 'details')
{
	$ret = $faq->Getfaq($_GET['faq_id']);
	$tpl->assign(array("T_Body"					=>	'faq'. $config['tplEx'],
						"JavaScript"			=>  array("faq.js"),
						"Action"				=>	1,						
						"faq_title"				=>	$ret->faq_title,
						"faq_content"			=>	$ret->faq_content,
						"back"					=>	'<a href="faq.html">Back To FAQ</a>',							
						));	

}
$tpl->display('default_layout'. $config['tplEx']);
?>