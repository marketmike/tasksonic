<?php
#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");

include($physical_path['DB_Access']. 'Seller.php');
include($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Industry.php');
include_once($physical_path['DB_Access']. 'Experience.php');
include EDITOR_ROOT. 'spaw_control.class.php';

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');

# Initialize object
$seller	= new Seller();
$exp 	= new Experience();
$buyer	=new Buyers();

if($_POST['Submit']=='Cancel')
{
	header("location: users.php");
	exit();
}
if($Action=='Edit' && $_POST['Submit']=='Save')
{
	$edit_seller = $seller->Update_tasker_profile($_POST);
	$edit_buyer	 = $buyer->Update_task_owner_profile($_POST);
	header("location: users.php?edit=true");
	exit();
}
else if($Action == 'Delete')
{
	$n1 = @unlink($physical_path['Seller_Logo'].$_POST['seller_logo']);
	$n1 = @unlink($physical_path['Seller_Logo']."thumb_".$_POST['seller_logo']);
	$seller->UpdateImage_At_Admin($_POST);
	header("location: edit_seller_buyer.php?user_id=".$_POST['user_auth_id']);
	exit();
}
if(!in_array($Action, array('Add', 'Edit', 'Sort', 'View' , 'Send_Mail')))
{
	$msg="No Buyer/Seller Profile Created !!!";
	
	$ret=$seller->GetSellerDetails1($_GET['user_id']);
	
	$result2 = $exp->View_experience_Order();
	$Experience_List	=	fillDbCombo($result2,'year_expe_id','expe_title',$result->seller_exp);
	
	
	$tpl->assign(array("T_Body"			=>	'edit_seller_buyer'. $config['tplEx'],
						"JavaScript"	=>  array("editSellerBuyer.js"),
						"user_id"		=>	$_GET['user_id'],
				));
	
	$tpl->assign(array(	"profile_id"				=> $ret->profile_id,
						"user_auth_id"				=> $ret->user_auth_id,
						"buyers_slogan"				=> $ret->buyers_slogan,
						"buyers_description"		=> $ret->buyers_description,
						"buyers_profile_status"		=> $ret->buyers_profile_status,
						"seller_slogan"				=> $ret->seller_slogan,
						"seller_description"		=> $ret->seller_description,
						"seller_rate_per_hour"		=> $ret->seller_rate_per_hour,
						"seller_logo"				=> $ret->seller_logo,
						"seller_exp"				=> $ret->seller_exp,
						"seller_industry"			=> $ret->seller_industry,
						"Experience_List"			=> $Experience_List,
						"Action"					=> 'Edit',
						"Error_Message"				=> $msg,
						"img_path"           		=> $virtual_path['Seller_Logo'],
				));	
	
				
	
	$sw = new SPAW_Wysiwyg('buyers_description' /*name*/,		$ret->buyers_description/*value*/,
				   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
				   '750px' /*width*/, '100px' /*height*/);					   
				   
		$tpl->assign("EN_Buyer_Editor", $sw->getHtml());
	
	$sw1 = new SPAW_Wysiwyg('seller_description' /*name*/,		$ret->seller_description/*value*/,
				   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
				   '750px' /*width*/, '100px' /*height*/);					   
				   
		$tpl->assign("EN_Seller_Editor", $sw1->getHtml());

						
}

$tpl->display('default_layout'. $config['tplEx']);
?>