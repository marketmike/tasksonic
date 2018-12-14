<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['Site_Lang']. '/common.php');
include_once($physical_path['DB_Access']. 'Escrow.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$escrow = new Escrow();

#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	$tpl->assign(array( "T_Body"			=>	'escrow_pending'. $config['tplEx'],
						
					));
					
    // form membership//								
    $escrow->Listing_Pending_Escrow_Payment();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$escrow_payment[$i]['project_title']		= $db->f('project_title');
		$escrow_payment[$i]['from_user_login_id']	= $db->f('from_user_login_id');
		$escrow_payment[$i]['to_user_login_id']		= $db->f('to_user_login_id');
		$escrow_payment[$i]['amount']				= $db->f('amount');
		$escrow_payment[$i]['payment_type']			= $db->f('payment_type');
		$escrow_payment[$i]['date']					= $db->f('date');
		$i++;
	}
	
	// Sum OF Total Released Amount 
	$released_amount = $escrow->Listing_Pending_Escrow_Amount();
	
	$tpl->assign(array(	"escrow_payment"	   	=>	$escrow_payment,
						"Loop"					=>	$rscnt,
						"PageSize_List"			=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),	
						"released_amount"		=>  $released_amount,
					));
				
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}	

$tpl->display('default_layout'. $config['tplEx']);
?>