<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Payment.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang'].'success.php');

$pays 		= new Payment();
$emails 	= new Email();


// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}

// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

if($config[WC_PAYPAL_SENDBOX] == "0")
	{
		//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
		$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30); 
	}	
	else
	{
		//If testing on Sandbox use:
		//$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
		$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30); 
	}

//$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);             // <- Use this line for real use
//$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);   // <- Use this line when testing in SandBox

// assign posted variables to local variables
$item_name            = $_POST['item_name'];
$item_number          = $_POST['item_number'];
$quantity             = $_POST['quantity'];
$payment_amount       = $_POST['mc_gross'];
$fee                  = $_POST['mc_fee'];
$tax                  = $_POST['tax'];
$payment_currency     = $_POST['mc_currency'];
$exchange_rate        = $_POST['exchange_rate'];
$payment_status       = $_POST['payment_status'];
$payment_type         = $_POST['payment_type'];
$payment_date         = $_POST['payment_date'];
$txn_id               = $_POST['txn_id'];
$txn_type             = $_POST['txn_type']; // 'cart', 'send_money' or 'web_accept' (manual page 46)
$custom               = $_POST['custom'];   // Any custom data
$receiver_email       = $_POST['receiver_email'];
$first_name           = $_POST['first_name'];
$last_name            = $_POST['last_name'];
$payer_business_name  = $_POST['payer_business_name'];
$payer_email          = $_POST['payer_email'];
$address_street       = $_POST['address_street'];
$address_zip          = $_POST['address_zip'];
$address_city         = $_POST['address_city'];
$address_state        = $_POST['address_state'];
$address_country      = $_POST['address_country'];
$address_country_code = $_POST['address_country_code'];
$residence_country    = $_POST['residence_country'];

if (!$fp) {
	// HTTP ERROR
} else {
	fputs ($fp, $header . $req);
	while (!feof($fp)) {
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0) {
		
		echo "The response from IPN was: <b>" .$res ."</b><br><br>";

		//loop through the $_POST $_GET array and  email site admin.
		foreach($_GET as $key => $value){

        echo $key." = ". $value."<br>";
		$all_value .= $key." = ". $value."<br>";		
        }
		 
		foreach($_POST as $key => $value){
        echo $key." = ". $value."<br>";
		$post_value .= $key." = ". $value."<br>";
		}

		$mail_To = "marketmike@gmail.com";
		$mail_Subject = "PayPal Ipn run directly Verified ".$res." -- ".$config[WC_PAYPAL_SENDBOX];
		$mail_Body = $all_value."<br>".$post_value;
		mail($mail_To, $mail_Subject, $mail_Body);

			$payment_verified = true;
			
		} else if (strcmp ($res, "INVALID") == 0) {
			$payment_verified = false;
		}
	}//while loop close
	fclose ($fp);
}//else loop close

	// check the payment_status is Completed
	// check that txn_id has not been previously processed
	// check that receiver_email is your Primary PayPal email
	// check that payment_amount/payment_currency are correct
	// process payment

$check_txn_id = $pays->Check_txn_ID_dupes($txn_id); // check if txn_id has been issued already

if ($payment_verified && $config[WC_PAYPAL_MAIL] == $receiver_email && $check_txn_id == 1) {
	
	if($payment_status == "Pending")
	{
	        $desc = $lang['Deposite_Pending'];
			$pays->Pending_Insert($_GET['check_value'],$_GET['username'],$_GET['amt'],$desc);
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
		
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
			$sendinfo = $emails->GetEmailDetails1(PENDING_REQUEST);
			 
		
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
		  
			
			$tpl2->assign(array(    "amount"				=>	$_GET['amt'],
									"customer_name"			=>	$_GET['username'],
								));

			
			$mail_content_reg = $tpl2->fetch("email_template:".PENDING_REQUEST);	
			$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
			$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);			
			$mail_html = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td>'.stripslashes($mail_content_header).'</td>
							</tr>
							<tr>
								<td><table align="center" width="600" cellpadding="15" cellspacing="2" bgcolor="#dfe0e0"><tr><td>'.stripslashes($mail_content_reg).'</td></tr></table></td>
							</tr>
							<tr>
								<td>'.stripslashes($mail_content_footer).'</td>
							</tr>
						</table>';
			$mail2->setHtml($mail_html);
			
			$recevier = GetEmailAddress($_GET['check_value']);
			
			$result = $mail2->send(array($recevier));
			
			$_GET['amt'] = 0.0;
			$_GET["pay_method"] = "";
			
	}
	if($payment_status == "Completed")
	{
			$payment_gateway = "Paypal";
			//	Generate unique transaction id to tie the records together
				srand((double)microtime()*1000000);
				$transaction_id = md5(uniqid(rand())) . '-' . time();			
			// Changes by MiKe G to get deposit math correct
			$requested_amount = $_GET['requested_amount']; // Amount requested for deposit
			$final_total = $_GET['final_total']; // Amount billed to paypal, includes fees
			$fees = $final_total - $requested_amount; // Total Fees
			
	        $total_desc = 'Processed through ' . $payment_gateway;
			$fees_description = 'Processing Fee';
			$deposit_description = 'Deposited Into Your Account';
			
			// Now insert records for three transaction, total invoiced to gateway, fees, and actual deposit - using paypal txn_id for transaction id
			$pays->Insert($_GET['check_value'],$_GET['username'],$final_total,$total_desc,'+',$txn_id);
			$pays->Insert($_GET['check_value'],$_GET['username'],$fees,$fees_description,'-',$txn_id);
			$pays->Insert($_GET['check_value'],$_GET['username'],$requested_amount,$deposit_description,'+',$txn_id);			
			
			// Now insert records for three transaction, total invoiced to gateway, fees, and actual deposit
			//$pays->Insert($_GET['check_value'],$_GET['username'],$final_total,$total_desc,'+',$transaction_id);
			//$pays->Insert($_GET['check_value'],$_GET['username'],$fees,$fees_description,'-',$transaction_id);
			//$pays->Insert($_GET['check_value'],$_GET['username'],$requested_amount,$deposit_description,'+',$transaction_id);			
	
			$percentage_fee	=	($requested_amount * $config[WC_PAYPAL_PERCENTAGE]) / 100 ; // % Fee Breakdown
			$fixed_fee	=	$config[WC_PAYPAL_FIX_AMOUNT]; // Fixed Fee Breakdown
			// End changes by MiKe G to get deposit math correct
			
			$wallet = Select_wallet_sum($_GET['check_value']);
			// $new_wallet = $wallet + $_GET['amt']; edited by Mike G to fix fee issue with fee being added to deposit
			$new_wallet = $wallet + $requested_amount;
			Update_wallet_sum($_GET['check_value'],$new_wallet,2); 
			

			$pays->Insert_Earning_depost($_GET['check_value'],$_GET['username'],$requested_amount,$final_total,$fees,$payment_gateway);		
	
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
		
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
			$sendinfo = $emails->GetEmailDetails1(DEPOSIT_MONEY);
			 
		
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
		  
			// Changes by MiKe G to get deposit math correct
			$tpl2->assign(array("amount"				=>	$requested_amount,
								"fees"					=>	$fees,
								"payment_gateway"		=>	$payment_gateway,
								"total_charged"			=>	$final_total,
								"percentage_fee"		=>	$percentage_fee,
								"fixed_fee"				=>	$fixed_fee,								
								));
			// End Changes by MiKe G to get deposit math correct								
			
			$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
			$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
			
			$mail_content_reg = $tpl2->fetch("email_template:".DEPOSIT_MONEY);	
			$mail_html = "<table border=0 cellpadding=0 cellspacing=0 width=75%>
							<tr>
								<td>".$mail_content_header."</td>
							</tr>
							<tr>
								<td>".$mail_content_reg."</td>
							</tr>
							<tr>
								<td>".$mail_content_footer."</td>
							</tr>
						</table>";
			$mail2->setHtml($mail_html);
			
			$recevier = GetEmailAddress($_GET['check_value']);
			
			$result = $mail2->send(array($recevier));	

			$_GET['amt'] = 0.0;
			$_GET["pay_method"] = "";							
   }
}

else if (!$payment_verified) { // log for manual investigation

			$recevier = GetEmailAddress($_GET['check_value']);
			

			$mail_To = $recevier;
			$mail_from = 'info@Task Sonic.com';
			$mail_Subject = "PayPal Ipn run directly Invalid";
			$mail_Body = "There may be some problem , so please contatct paypal administrator ";
			mail($mail_To, $mail_Subject, $mail_Body,$mail_from);
	
}

?>