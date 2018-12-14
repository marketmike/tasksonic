<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once("includes/WebPhoneCheck.php");

### Info sent back from provider ###
$message = WebPhoneCheck::get_message();

//spoofing check
if ($message !== NULL && $message->verified) {
	$user_id = $message->user_id;
	$verified = if_is_human_verified($user_id);
	if($verified == 0){
		$user->Set_Phone_Verification($user_id);
		$balance = Select_wallet_sum($user_id);
		$fee = $config[WC_PHONE_VERIFIED_FEE];
		$tempuse = $user->Get_Phone_By_ID($userID); // alternately using function to pull back username	
					$new_wallet = $balance - $fee;
					Update_wallet_sum($user_id,$new_wallet);
					//	Generate unique transaction id to tie the records together
					srand((double)microtime()*1000000);
					$transaction_id2 = md5(uniqid(rand())) . '-' . time();			
					$desc = 'Payment for phone verification'; 
					Insert_Phone_Verified_Payment($user_id,$tempuse->user_login_id,$fee,'Phone Verify FEE',$desc,$transaction_id);		
	  }
  }
?>


