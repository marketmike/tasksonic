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
	header("location: pending_deposite_paypal.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------

elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
    $pays->UpdatePending($_POST);
	if($_POST['with_status'] == 1)
	{
		$pays->InsertPending_requestInPaypal($_POST,$lang["Pending"]);
		$wallet = Select_wallet_sum($_POST['user_auth_id']);
		$new_wallet = $wallet + $_POST['amount'];
		Update_wallet_sum($_POST['user_auth_id'],$new_wallet); 
	}	
	header("location: pending_deposite_paypal.php?edit=true");
	exit();
}
/*elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
			$val = $pays->Delete($val)?'true':'false';			
	}

	header("location: withdraw_paypal.php?delall=true");
	exit();
}*/
#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	if($_GET['edit']==true)
		$succMessage = "Pending Deposite On Paypal has been updated successfully!!";
    elseif($_GET['delall']==true)
 		$succMessage = "All Pending Deposite On Paypal has been deleted successfully!!";			
	
	$pays->ViewPendingRequests();
	$rscnt = $db->num_rows();

	$i=0;
	while($db->next_record())
	{
	   	$arr_pending[$i]['id']				= $db->f('pk_id');
		$arr_pending[$i]['user_auth_id']	= $db->f('user_auth_id');
		$arr_pending[$i]['user_login_id']	= $db->f('user_login_id');
		$arr_pending[$i]['amount']			= $db->f('amount');
		$arr_pending[$i]['status']		    = $db->f('status');
		$arr_pending[$i]['description']		= $db->f('description');
		$arr_pending[$i]['pending_date']	= $db->f('pending_date');
		$i++;
	}
	

	$tpl->assign(array( "T_Body"			=>	'pending_payapl_request_showall'. $config['tplEx'],
						"JavaScript"		=>  array("pending_deposite.js"),
						"A_Action"		    =>	"pending_deposite_paypal.php",
						"succMessage"	    =>	$succMessage,
						"pending"	    	=>	$arr_pending,
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
   	$ret = $pays->GetPending($_POST['pk_id']);
	
	$tpl->assign(array("T_Body"					=>	'pending_payapl_request_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("pending_deposite.js"),
						"Action"				=>	$Action,
						"user_name"				=>	$ret->user_login_id,
						"pending_date"			=>	$ret->pending_date,
						"amount"				=>	$ret->amount,
						"with_status"			=>	($ret->status == 1)?'checked':'',
						"status_chk"            =>  $ret->status,  
						"user_auth_id"			=>	$ret->user_auth_id, 
					    "pk_id"					=>	$_POST['pk_id'],
				));

}				
$tpl->display('default_layout'. $config['tplEx']);
?>