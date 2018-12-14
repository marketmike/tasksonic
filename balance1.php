<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/balance.php');


$totalamount = Select_wallet_sum($_SESSION['User_Id']);

$last = Last_Traction($_SESSION['User_Id']);
$date1 = "date";

##############################################################################################
/// assing to templates 
##############################################################################################
	$tpl->assign(array(	
						"Balance"					=>	$lang['Balance'],	
						"Deposit_Money"				=>	$lang['Deposit_Money'],	
						"New_Escrow_Payment1"		=>	$lang['New_Escrow_Payment1'],	
					"New_Escrow_Payment1_question"	=>	$lang['New_Escrow_Payment1_question'],	
						"Withdraw_Money"			=>	$lang['Withdraw_Money'],
						"Last_Transaction"			=>	$lang['Last_Transaction'],
						"Amount"					=>	$lang['Amount'],
						"Description"				=>	$lang['Description'],
						"View_All1"					=>	$lang['View_All1'],
						"Total_Amount"              =>  $totalamount,
						"last_amount"               =>  $last->amount,
						"last_desc"                 =>  $last->description,
						"last_date"                 =>  $last->$date1,
						"last_trans_type"           =>  $last->trans_type,
						));
?>