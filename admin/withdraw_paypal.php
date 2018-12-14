<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Payment.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$pays 	= new Payment();
$emails = new Email();
#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
if ($_POST['Submit'] == 'Cancel')
{
	header("location: withdraw_paypal.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------

elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $pays->UpdateWithdraw($_POST);
	if($_POST['with_status'] == 1)
	{
	   // print_r($_POST);die;
	   	global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(ADMIN_WITHDRAW_MONEY);
		
		$mail2->setFrom($sendinfo->email_adress);
		$mail2->setSubject($sendinfo->email_subject);
		$fees = $_POST['amount'] - $_POST['amount_rec'];
		$tpl2->assign(array(
							"user_name" 				=>	$_POST['user_name'],
							"amount"					=>  $_POST['amount'],
							"amount_rec"				=>  $_POST['amount_rec'],
							"requested_date"			=>  $_POST['requested_date'],
							"email_sent_to"				=>  $_POST['paypal_email'],							
							"trans_type"				=>  'PayPal',
							"fees"						=>  $fees,	
							
						));
		
			$mail_content_reg = $tpl2->fetch("email_template:".ADMIN_WITHDRAW_MONEY);	
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
		
		$send_to = GetEmailAddress(md5($_POST['user_name']));
		
		$result = $mail2->send(array($send_to));

		$pays->InsertWIthdrawInPaypal($_POST);
	}	
	header("location: withdraw_paypal.php?edit=true");
	exit();
}
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $pays->Delete($val)?'true':'false';			
	}

	header("location: withdraw_paypal.php?delall=true");
	exit();
}
#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	if($_GET['edit']==true)
		$succMessage = "Withdraw money has been updated successfully!!";
    elseif($_GET['delall']==true)
 		$succMessage = "All Withdraw money has been deleted successfully!!";			
	
	$pays->ViewAllWithdrawDetails();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_with_details[$i]['id']				= $db->f('ww_id');
		$arr_with_details[$i]['user_auth_id']	= $db->f('user_auth_id');
		$arr_with_details[$i]['user_name']		= $db->f('user_name');
		$arr_with_details[$i]['requested_date']	= $db->f('requested_date');
		$arr_with_details[$i]['estimate_date']	= $db->f('estimate_date');
		$arr_with_details[$i]['amount']			= $db->f('amount');
		$arr_with_details[$i]['status']		    = $db->f('status');
		$arr_with_details[$i]['withdraw_type']	= $db->f('withdraw_type');
		$arr_with_details[$i]['amount_rec']		= $db->f('amount_rec');
		$arr_with_details[$i]['paypal_email']	= $db->f('paypal_email');
		$i++;
	}

	$tpl->assign(array( "T_Body"			=>	'withdarw_showall'. $config['tplEx'],
						"JavaScript"	    =>  array("withdraw_money.js"),
						"A_Action"		    =>	"withdraw_paypal.php",
						"succMessage"	    =>	$succMessage,
						"withmoney"	    	=>	$arr_with_details,
						"Loop"				=>	$rscnt,
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
								
   	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
					
}	
elseif($Action == 'Edit')
{
   	$ret = $pays->GetWithdraw($_POST['ww_id']);
	
	$tpl->assign(array("T_Body"					=>	'withdarw_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("withdraw_money.js"),
						"Action"				=>	$Action,
						"user_name"				=>	$ret->user_name,
						"requested_date"		=>	$ret->requested_date,
						"estimate_date"			=>	$ret->estimate_date,
						"amount"				=>	$ret->amount,
						"with_status"			=>	($ret->status == 1)?'checked':'',
						"status_chk"            =>  $ret->status,  
						"user_auth_id"			=>	$ret->user_auth_id, 
						"trans_type"			=>	$ret->trans_type,
						"details"				=>	$ret->details,
						"amount_rec"			=>	$ret->amount_rec,
						"paypal_email"			=>	$ret->paypal_email,
					    "ww_id"					=>	$ret->ww_id,
				));

}				
$tpl->display('default_layout'. $config['tplEx']);
?>