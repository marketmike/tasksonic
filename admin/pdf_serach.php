<?php

#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
define('FPDF_FONTPATH','../libs/font/');

include_once("../includes/common.php");
include_once ("../libs/fpdf.php");
include_once($physical_path['DB_Access']. 'Pdf.php');
include_once($physical_path['DB_Access']. 'Siteearn.php');


$earn = new Siteearn();


####################################################################################################
########################################	FORM DEPOSITE MOENY   ##################################
####################################################################################################

    $earn_deposite		= array();
	$earn_comm 			= array();
	$earn_membership	= array();
	$earn_urgent		= array();
	$earn_withdraw		= array();
	$earn_cancel 		= array();
	$earn_premium		= array();
	$earn_deposite_money	= array();
	$earn_withdraw_money	= array();

####################################################################################################
###################################	FORM DEPOSITE MONEY(Paypal)  ###################################
####################################################################################################
	$earn->Listing_Deposite_Date($_GET['start_date'],$_GET['end_date']);
	$i=0;
	while($db->next_record())
	{
	   	$earn_deposite[$i]['user_login_id']			= $db->f('user_login_id');
		$earn_deposite[$i]['deposited_money']		= $db->f('deposited_money');
		$earn_deposite[$i]['paid_money']			= $db->f('paid_money');
		$earn_deposite[$i]['earning']				= $db->f('earning');
		$i++;
	}
	
	$sum_deposite = $earn->Sum_Earn_form_Deposite_Date($_GET['start_date'],$_GET['end_date']);
	
####################################################################################################
###################################	FORM DEPOSITE MONEY(MOney Booker) ##############################
####################################################################################################
	
	$earn->Listing_Deposite_Moneybooker_Date($_GET['start_date'],$_GET['end_date']);
	$i=0;
	while($db->next_record())
	{
	   	$earn_deposite_money[$i]['user_login_id']		= $db->f('user_login_id');
		$earn_deposite_money[$i]['deposited_money']		= $db->f('deposited_money');
		$earn_deposite_money[$i]['paid_money']			= $db->f('paid_money');
		$earn_deposite_money[$i]['earning']				= $db->f('earning');
		$i++;
	}

	$sum_deposite_money = $earn->Sum_Earn_form_Deposite_Moneybooker_Date($_GET['start_date'],$_GET['end_date']);
			
####################################################################################################
###################################	FORM COMMISION OF project   ####################################
####################################################################################################
	
	$earn->Listing_Commision_Date($_GET['start_date'],$_GET['end_date']);
	$i=0;
	while($db->next_record())
	{
		$earn_comm[$i]['buyer_comm']		= $db->f('buyer_comm');
		$earn_comm[$i]['seller_comm']		= $db->f('seller_comm');
		$earn_comm[$i]['project_title']		= stripslashes($db->f('project_title'));
		$i++;
	}
	
	$sum_buyer = $earn->Sum_Earn_form_Comm_Buyer_Date($_GET['start_date'],$_GET['end_date']);
	
	$sum_seller = $earn->Sum_Earn_form_Comm_Seller_Date($_GET['start_date'],$_GET['end_date']);
			
	$total_comm = $sum_buyer + 	$sum_seller;
	
####################################################################################################
####################################      FORM MEMBERSHIP      #####################################
####################################################################################################	
    $earn->Listing_Membership_Date($_GET['start_date'],$_GET['end_date']);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_membership[$i]['member_name']			= $db->f('user_login_id');
		$earn_membership[$i]['membership_name']		= $db->f('membership_name');
		$earn_membership[$i]['membership_fees']		= $db->f('membership_fees');
		$i++;
	}
					
	$sum = $earn->Earn_form_Membership_Date($_GET['start_date'],$_GET['end_date']);
	
####################################################################################################
###############################   	FORM WITHDRAW MONEY	(PAYPAL)	################################
####################################################################################################
    $earn->Listing_WithdrawMoney_Date($_GET['start_date'],$_GET['end_date']);
	$rscnt1 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_withdraw[$i]['user_name']			= $db->f('user_name');
		$earn_withdraw[$i]['requested_amount']	= $db->f('amount');
		$earn_withdraw[$i]['paied_amount']		= $db->f('amount_rec');
		$earn_withdraw[$i]['amount']			= ($db->f('amount')-$db->f('amount_rec'));
		$i++;
	}
	$sum_withdraw= $earn->Sum_Earn_form_WithdrawMoney_Date($_GET['start_date'],$_GET['end_date']);
####################################################################################################
###############################   	FORM WITHDRAW MONEY	(MONEYBOOKER)	############################
####################################################################################################
	
	$earn->Listing_WithdrawMoney_Date_Moneybooker($_GET['start_date'],$_GET['end_date']);
	$i=0;
	while($db->next_record())
	{
	   	$earn_withdraw_money[$i]['user_name']			= $db->f('user_name');
		$earn_withdraw_money[$i]['requested_amount']	= $db->f('amount');
		$earn_withdraw_money[$i]['paied_amount']		= $db->f('amount_rec');
		$earn_withdraw_money[$i]['amount']				= ($earn_withdraw_money[$i]['requested_amount']) - ($earn_withdraw_money[$i]['paied_amount']);
		$i++;
	}
	
	$sum_withdraw_moneybooker= $earn->Sum_Earn_form_WithdrawMoney_Date_Moneybooker($_GET['start_date'],$_GET['end_date']);
			
####################################################################################################
############################   		FORM CANCEL project           ##################################
####################################################################################################	
	$earn->Listing_Cancelproject_Date($_GET['start_date'],$_GET['end_date']);
	$rscnt2 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_cancel[$i]['project_title']		= stripslashes($db->f('project_title'));
		$earn_cancel[$i]['project_closed_date']	= $db->f('project_closed_date');
		$earn_cancel[$i]['Fees']				= $db->f('amount');
		$i++;
	}
	$sum_cancel= $earn->Sum_Earn_form_Cancelproject_Date($_GET['start_date'],$_GET['end_date']);
####################################################################################################
############################### 	FORM PREMIUM project 	 #######################################
####################################################################################################
	$earn->Listing_Premiumproject_Date($_GET['start_date'],$_GET['end_date']);
	$rscnt3 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_premium[$i]['project_title']		= stripslashes($db->f('project_title'));
		$earn_premium[$i]['project_posted_date']	= $db->f('project_posted_date');
		$earn_premium[$i]['Fees']				= $db->f('amount');
		$earn_premium[$i]['project_status']		= $db->f('project_status');
		$i++;
	}
	
	$sum_premium = $earn->Sum_Earn_form_Premiumproject_Date($_GET['start_date'],$_GET['end_date']);
####################################################################################################
################################      FORM URGENT project      #####################################
####################################################################################################
	$earn->Listing_Urgentproject_Date($_GET['start_date'],$_GET['end_date']);
	$rscnt4 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_urgent[$i]['project_title']			= stripslashes($db->f('project_title'));
		$earn_urgent[$i]['project_posted_date']		= $db->f('project_posted_date');
		$earn_urgent[$i]['Fees']					= $db->f('amount');
		$earn_urgent[$i]['project_status']			= $db->f('project_status');
		$i++;
	}
	$sum_urgent = $earn->Sum_Earn_form_Urgentproject_Date($_GET['start_date'],$_GET['end_date']);
####################################################################################################	
	$total = $sum + $sum_deposite + $total_comm + $sum_withdraw + $sum_cancel + $sum_premium + $sum_urgent + $sum_withdraw_moneybooker + $sum_deposite_money;		

####################################################################################################
#####################################    PDF GENERATION CODE  	####################################
####################################################################################################
	$pdf = new PDF();
	//$pdf->h_image='logo_takeacoder.jpg';
	$pdf->h_image='logo_Task Sonic1.jpg';
	$pdf->Curreny=$lang['Curreny'];
	//$pdf->f_image='inner_img.jpg';
	//$f_img_info = getimagesize($physical_path['Upload'].$pdf->f_image);
	//print_r($physical_path['Upload'].$pdf->h_image);die;
	$h_img_info = getimagesize($physical_path['Upload'].$pdf->h_image);
	//width = $f_img_info[0]
	//height = $f_img_info[1]
	
	//$pdf->f_image_wdh = ($f_img_info[0] * 25.4) / 72;
	//$pdf->f_image_hgt = ($f_img_info[1] * 25.4) / 72;
	
	$pdf->h_image_wdh = ($h_img_info[0] * 20.4) / 72;
	$pdf->h_image_hgt = ($h_img_info[1] * 20.4) / 72;
	
	$start_hgt = $pdf->h_image_hgt + 5;
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',14);
	$pdf->Text(75,$start_hgt + 5 ,"Site Earn Management");
	$pdf->SetFont('helvetica','B',12);
	$pdf->Text(160,$start_hgt + 15 ,"Total : ".$lang['Curreny']." ".number_format($total,2));

	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 30 ,"From Deposite Money");
	$pdf->Text(100,$start_hgt + 40," Total Earning From Deposite Money : ".$lang['Curreny']."".number_format($sum_deposite,2));
	$header1 = array('Member Name','Deposited Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
	
	////////From Deposite Money///////////////////////
	$mm1 = count($earn_deposite);
	
	$pdf->SetXY(5,$start_hgt + 50);
	$pdf->Ln();
	$pdf->FancyTable_deposite($header1,$earn_deposite);  
		
	
	////////From Deposite Money (Moneybooker)    ///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From Deposite Money (Moneybooker)");
	$pdf->Text(80,$start_hgt + 15," Total Earning From Deposite Money (Moneybooker) : ".$lang['Curreny']." ".number_format($sum_deposite_money,2));
	$header_money = array('Member Name','Deposited Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
  	$mm1 = count($earn_deposite_money);
	
	$pdf->SetXY(5,$start_hgt + 50);
	$pdf->Ln();
	$pdf->FancyTable_deposite($header1,$earn_deposite_money);  
		 

    ////////From projects Commision    ///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From projects Commision");
	$pdf->Text(100,$start_hgt + 15," Total Earning From projects Commision : ".$lang['Curreny']."".number_format($total_comm,2));
	$pdf->Text(100,$start_hgt + 25," Total Earning From Buyer Commision : ".$lang['Curreny']." ".number_format($sum_buyer,2));
	$pdf->Text(100,$start_hgt + 35," Total Earning From Seller Commision : ".$lang['Curreny']." ".number_format($sum_seller,2));
	$header2 = array('project Name','Buyer Commision','Seller Commision');
	$pdf->SetFont('Arial','',10); 
    $mm1 = count($earn_comm);
	
	$pdf->SetXY(5,$start_hgt + 50);
	$pdf->Ln(5);
	$pdf->FancyTable_Comm($header2,$earn_comm);  
		 
    ////////From MemberShip///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From Membership");
	$pdf->Text(100,$start_hgt + 15," Total Earning From Membership : ".$lang['Curreny']." ".number_format($sum,2));
	$header=array('Member Name','MemberShip Name','MemberShip Fees');
	$pdf->SetFont('Arial','',10);
	$mm = count($earn_membership);
	
  	$pdf->SetXY(5,$start_hgt + 20);
 	$pdf->Ln(5);
  	$pdf->data = $earn_membership;
  	$pdf->FancyTable($header,$pdf->data);  
		 
	////////From Withdraw Money///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);

	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From Withdraw Money");
	$pdf->Text(100,$start_hgt + 15," Total Earning From Withdraw Money : ".$lang['Curreny']." ".number_format($sum_withdraw,2));
	$header3=array('Member Name','Requested Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
	$mm3 = count($earn_withdraw);
	
  	$pdf->SetXY(5,$start_hgt + 20);
  	$pdf->Ln();
  	$pdf->FancyTable_Withdraw($header3,$earn_withdraw);  

	
	////////From Withdraw Money (Money Booker)///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);

	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From Withdraw Money (Money Booker)");
	$pdf->Text(80,$start_hgt + 15," Total Earning From Withdraw Money (Money Booker): ".$lang['Curreny']." ".number_format($sum_withdraw_moneybooker,2));
	$header3=array('Member Name','Requested Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
	$mm1 = count($earn_withdraw_money);
	
	 $pdf->SetXY(5,$start_hgt + 20);
	 $pdf->Ln();
	 $pdf->FancyTable_Withdraw($header3,$earn_withdraw_money);  
		 

	
	////////From Cancel project///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From Cancel project");
	$pdf->Text(100,$start_hgt + 15," Total Earning From Cancel project : ".$lang['Curreny']." ".number_format($sum_cancel,2));
	$header4=array('project Name','project Posted Date','project Fees');
	$pdf->SetFont('Arial','',10);
	$mm4 = count($earn_cancel);
	
 	$pdf->SetXY(5,$start_hgt + 20);
  	$pdf->Ln(5);
  	$pdf->FancyTable_Cancel($header4,$earn_cancel);  
		 
	////////From Premium project///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From Premium project");
	$pdf->Text(100,$start_hgt + 15," Total Earning From Premium project : ".$lang['Curreny']." ".number_format($sum_premium,2));
	$header5=array('project Name','project Posted Date','project Fees');
	$pdf->SetFont('Arial','',10);
	$mm3 = count($earn_premium);
	
  	$pdf->SetXY(5,$start_hgt + 20);
  	$pdf->Ln(5);
  	$pdf->FancyTable_Premium($header5,$earn_premium);  
		 
	////////From Urgent project///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"From Urgent project");
	$pdf->Text(100,$start_hgt + 15," Total Earning From Urgent project : ".$lang['Curreny']." ".number_format($sum_urgent,2));
	$header5=array('project Name','project Posted Date','project Fees');
	$pdf->SetFont('Arial','',10);
	$mm3 = count($earn_urgent);
	
  	$pdf->SetXY(5,$start_hgt + 20);
  	$pdf->Ln(5);
  	$pdf->FancyTable_Urgent($header5,$earn_urgent);  
		
####################################################################################################    
	$pdf->Output();

####################################################################################################
$tpl->display('default_layout'. $config['tplEx']);
?>