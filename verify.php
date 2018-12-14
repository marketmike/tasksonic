<?php
define('IN_SITE', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Email.php');
$emails 	= new Email();
if($_POST['Submit']	== 'send_verification' && $_POST['action'] == 'send_verification'){

		if($_POST['verify_email'] == ''){
		$ERROR = "Please enter the email address you used when you registered";
		}
		$verify_email = $_POST['verify_email'];
		$ret = $user->resend_verification_code($verify_email);
		$verify_code = $ret->user_activation_code;
		$user_name = $ret->user_login_id;
		$mem_email = $ret->mem_email;
		$email_verified = $ret->email_verified;
		
		if($email_verified == 1){
		$ERROR = 'The email you enterd has already been verified. Please login or <a href="contact_us.html">click here</a> to contact<br>the site administrator if you are unable to access your account.';
		}
		
		
		if ($ERROR == ''){
		
        if($mem_email){
			global $mail2;
			$mail2 = '';
			$mail2 = new htmlMimeMail();
			
			$tpl2 = new Smarty;
			$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
			$sendinfo = $emails->GetEmailDetails1(EMAIL_SIGNUP);
			$mail2->setFrom($sendinfo->email_adress);
			$mail2->setSubject($sendinfo->email_subject);
			$tpl2->assign(array("user_id"				=>	$user_name,
								"email_id"				=>  $mem_email,
								"verify_url"          	=>	"<a href=".$virtual_path['Site_Root']."verify.php?user_id=".$user_name."&code=".$verify_code.">" . $virtual_path['Site_Root']."verify.php?user_id=".$user_name."&code=".$verify_code . "</a>",
								"verification_code"     =>  $verify_code,
								"flag"    				=>  1,							
								));
								
				$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_SIGNUP);	
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
			$sucmsg = 'The Verification Email Has Been Resent';        
			$result = $mail2->send(array($_POST['verify_email']));
		}else{
		$ERROR = "The Email Address You Entered Could Not Be Found";
		}
		
		}// end error check

}

if ($_GET["user_id"] != '' && $_GET["code"] != '') { // verify the users email

		$user_id = $_GET["user_id"];
		$code = $_GET["code"];
		$user_auth = md5($user_id);
		
		$verified_check = verified_check($user_auth,$code);
		if ($verified_check != 1){
		$verfiy_success = verify_email($user_auth,$code);
		// if user is not as buyer or seller
		if($verfiy_success == 1)
		{	
		Update_Email_Verified($user_auth);
		$sucmsg = 'Your Email Address Has Been Successfully Verified. You may now login to Task Sonic';
		}
		}else{
		$ERROR = 'This email address has already been verified, please login!';
		}
		
}elseif($_GET["verify"] == 'next'){ // confirm registration success

		$sucmsg = 'Account Created - Email Verification Needed';
		$confirm = 'Your Task Sonic account is almost set up. We have sent you an email to confirm your email address is valid. Please open the email and click on the verification link to verify your email. Once verified you will be able to log into Task Sonic.';
		
}else{	// resend verification email

		$show_form =1;

}
	$tpl->assign(array( "T_Body"			=>	'verify'. $config['tplEx'],
						"JavaScript"		=>	array('verify.js',"check.js"),
						"sucmsg"			=>	$sucmsg,
						"ERROR"				=>	$ERROR,
						"confirm"			=>	$confirm,						
						"verfiy_success"	=>	$verfiy_success,
						"verified_check"	=>	$verified_check,						
						"show_form"			=>	$show_form,						
				));
$tpl->display('default_layout'. $config['tplEx']);
?>