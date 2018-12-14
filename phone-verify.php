<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
include_once("includes/common.php");
include_once("includes/WebPhoneCheck.php");


$verify = $user->Get_Phone($_SESSION['User_Name']);
$phone_number = preg_replace('(\D+)', '', $verify->mem_phone);
$new_phone = '+1'.$phone_number;
$userid = $verify->user_auth_id;
$balance = Select_wallet_sum($verify->user_auth_id);
$fee = $config[WC_PHONE_VERIFIED_FEE];
if(!$_POST['verification_code']){
$verification_code = mt_rand(1000,9999);
}else{
$verification_code = $_POST['verification_code'];
}
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

if($_POST['Submit'] == 'verify' && $Action == 'Verify')
{
	if($balance > 3){
		if($phone_number){
		$api_key = $config[WC_PHONE_VERIFY_API];
		$extension = "";
		$mode = "ask"; // 'say' will read out; 'ask' asks user to type in code
		$callback_url = $virtual_path['Site_Root'].'phone-verified.php'; // to handle the response
		
		//Execute the API call
		$calling = WebPhoneCheck::make_call($api_key, $new_phone, $verification_code, $userid, $extension, $mode, false, $callback_url); //
		sleep(10); // Give API a chance to catch up
		### Now check to see if they have been verified
		$verified = if_is_human_verified($userid);
			if($verified == 0){
				$ERROR = 'Unable to process this request, please try again later or contact the site administrator';				
			}else{
				$message = 'Phone Verified Successfully';
				$transaction_completed = 'Your request has been processed successfully! A fee of $'.$fee.' has been deducted from your Task Sonic Wallet, and the Phone Verification badge has now been enabled for your account. The Phone Verified badge will remain enabled as long as you do not change the phone number in your profile. If you do, you will have to subscribe to the phone verification process for the new number in order to enable the badge again.';													
			}
		$Action = A_VIEW;	
		}else{
		$ERROR = 'There appears to be a problem with the phone number entered in your profile, please update';
		$Action = A_VIEW;
		}
	}else{
	$ERROR = 'You need to deposit funds in your Task Sonic Wallet In Order To Cover The Cost Of Phone Verification';
	$Action = A_VIEW;
	}
}
if($Action == ''|| $Action == A_VIEW)
{
			$is_verified = if_is_human_verified($userid);
			if($is_verified == 1)
			{
				$warning = 'Your phone number has already been verified and the phone verfication badge is enabled!';
				$flag = 1;
			}else{
				$warning = 'Make Sure You Are By Your Phone Before Submitting! Do not resubmit or refresh this page at anytime during the verification process.';
				$flag = 0;
			}
	$info = 'Phone verification is accomplished by an automated system and cost Task Owners and Taskers $'.$fee.' to complete. To earn the phone verified badge, users of Task Sonic simply click on the "CALL ME NOW" button and shortly after will receive an automated call where they are prompted to use their phones keypad to enter a verification code.<br/><br/>Your unique verification code is below and displayed throughout the process, however you may wish to temporarily write it down in case an unforeseen technical issue arrises.';
	$tpl->assign(array("T_Body"						=>	'phone_verify'. $config['tplEx'],
						"JavaScript"				=>  array("phone_verify.js"),
						"info"						=>	$info,
						"message"					=>	$message,						
						"user"						=>	$_SESSION['User_Name'],						
						"fee"						=>	$fee,						
						"ERROR"						=>	$ERROR,						
						"formatted_phone_number"	=>	$verify->mem_phone,					
						"code"						=>	$verification_code,
						"transaction_completed"		=>	$transaction_completed,												
						"Action"					=>	$Action,
						"flag"						=>	$flag,
						"warning"					=>	$warning,							
						));
}
$tpl->display('default_layout'. $config['tplEx']);	
?>