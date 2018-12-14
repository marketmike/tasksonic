<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/less_balance_buyer.php');
include_once($physical_path['DB_Access']. 'task.php');

$proj			= new project();

   $ret  = $proj->Getproject($_GET['project_id']);
  
   $bid_details = $proj->Bid_details_Of_User($_GET['project_id'],md5($_GET['awarded_user'])); 
				
   $buyer_comm = number_format(($config[WC_COMM_FROM_BUYER] * $bid_details)/100,2);
	
   $buyer_wallet = Select_wallet_sum($ret->auth_id_of_post_by);
	
   $test = substr($buyer_wallet,1);
   $test2	=	str_replace(",","",$test);

 ##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'Msg2'. $config['tplEx'],
						"msg1"			    =>	$lang['Message'].number_format($buyer_comm,2).$lang['Message1'].$test2.$lang['Message2'],	
						"msg2"			    =>	$lang['Message'].number_format($config[WC_MINIMUM_COMM_BUYER],2).$lang['Message1'].$test2.$lang['Message2'],	
						"error"             =>  $_GET['error'],  
						));

$tpl->display('default_layout'. $config['tplEx']);
?>