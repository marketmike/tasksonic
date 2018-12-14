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

$earn_deposite			= array();
$earn_comm 				= array();
$earn_membership		= array();
$earn_urgent			= array();
$earn_withdraw			= array();
$earn_cancel 			= array();
$earn_premium			= array();
$earn_deposite_money	= array();
$earn_withdraw_money	= array();
####################################################################################################
########################################	FORM DEPOSITE MOENY   ##################################
####################################################################################################

	$earn->Listing_Deposite();
	$i=0;
	while($db->next_record())
	{
	   	$earn_deposite[$i]['user_login_id']			= $db->f('user_login_id');
		$earn_deposite[$i]['deposited_money']		= $db->f('deposited_money');
		$earn_deposite[$i]['paid_money']			= $db->f('paid_money');
		$earn_deposite[$i]['earning']				= $db->f('earning');
		$i++;
	}
	
	$sum_deposite = $earn->Sum_Earn_form_Deposite();
	
####################################################################################################
########################################	FORM DEPOSITE MOENY (Moneybooker)  ##################################
####################################################################################################

	$earn->Listing_Deposite_Moneybooker();
	$i=0;
	while($db->next_record())
	{
	   	$earn_deposite_money[$i]['user_login_id']		= $db->f('user_login_id');
		$earn_deposite_money[$i]['deposited_money']		= $db->f('deposited_money');
		$earn_deposite_money[$i]['paid_money']			= $db->f('paid_money');
		$earn_deposite_money[$i]['earning']				= $db->f('earning');
		$i++;
	}
	
	$sum_deposite_money = $earn->Sum_Earn_form_Deposite_Moneybooker();
			
####################################################################################################
###################################	FORM COMMISION OF project   ####################################
####################################################################################################
	
	$earn->Listing_Commision();
	$i=0;
	while($db->next_record())
	{
		$earn_comm[$i]['buyer_comm']		= $db->f('buyer_comm');
		$earn_comm[$i]['seller_comm']		= $db->f('seller_comm');
		$earn_comm[$i]['project_title']		= $db->f('project_title');
		$i++;
	}
	
	$sum_buyer = $earn->Sum_Earn_form_Comm_Buyer();
	
	$sum_seller = $earn->Sum_Earn_form_Comm_Seller();
			
	$total_comm = $sum_buyer + 	$sum_seller;
	
####################################################################################################
####################################      FORM MEMBERSHIP      #####################################
####################################################################################################	
	$earn->Listing_Membership();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_membership[$i]['member_name']			= $db->f('user_login_id');
		$earn_membership[$i]['membership_name']		= $db->f('membership_name');
		$earn_membership[$i]['membership_fees']		= $db->f('membership_fees');
		$i++;
	}
					
	$sum = $earn->Earn_form_Membership();
####################################################################################################
###############################   	FORM WITHDRAW MONEY		########################################
####################################################################################################
	$earn->Listing_WithdrawMoney();
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
	$sum_withdraw= $earn->Sum_Earn_form_WithdrawMoney();
	
####################################################################################################
###############################   	FORM WITHDRAW MONEY		########################################
####################################################################################################
	
    $earn->Listing_WithdrawMoney_Moneybooker();
	$i=0;
	while($db->next_record())
	{
	   	$earn_withdraw_money[$i]['user_name']			= $db->f('user_name');
		$earn_withdraw_money[$i]['requested_amount']	= $db->f('amount');
		$earn_withdraw_money[$i]['paied_amount']		= $db->f('amount_rec');
		$earn_withdraw_money[$i]['amount']				= ($earn_withdraw_money[$i]['requested_amount']) - ($earn_withdraw_money[$i]['paied_amount']);
		$i++;
	}
	
	$sum_withdraw_moneybooker= $earn->Sum_Earn_form_WithdrawMoney_Moneybooker();
			
####################################################################################################
############################   		FORM CANCEL project           ##################################
####################################################################################################	
	$earn->Listing_Cancelproject();
	$rscnt2 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_cancel[$i]['project_title']		= $db->f('project_title');
		$earn_cancel[$i]['project_posted_date']	= $db->f('project_posted_date');
		$earn_cancel[$i]['Fees']				= $db->f('amount');
		$i++;
	}
	$sum_cancel= $earn->Sum_Earn_form_Cancelproject();
####################################################################################################
############################### 	FORM PREMIUM project 	 #######################################
####################################################################################################
	$earn->Listing_Premiumproject();
	$rscnt3 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_premium[$i]['project_title']		= $db->f('project_title');
		$earn_premium[$i]['project_posted_date']	= $db->f('project_posted_date');
		$earn_premium[$i]['Fees']				= $db->f('amount');
		$earn_premium[$i]['project_status']		= $db->f('project_status');
		$i++;
	}
	
	$sum_premium = $earn->Sum_Earn_form_Premiumproject();		
####################################################################################################
################################      FORM URGENT project      #####################################
####################################################################################################
	$earn->Listing_Urgentproject();
	$rscnt4 = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$earn_urgent[$i]['project_title']			= $db->f('project_title');
		$earn_urgent[$i]['project_posted_date']		= $db->f('project_posted_date');
		$earn_urgent[$i]['Fees']					= $db->f('amount');
		$earn_urgent[$i]['project_status']			= $db->f('project_status');
		$i++;
	}
	$sum_urgent = $earn->Sum_Earn_form_Urgentproject();	
####################################################################################################	
	$total = $sum + $sum_deposite + $total_comm + $sum_withdraw + $sum_cancel + $sum_premium + $sum_urgent + $sum_deposite_money + $sum_withdraw_moneybooker ;		

####################################################################################################
#####################################    PDF GENERATION CODE  	####################################
####################################################################################################
	$pdf = new PDF();
	$pdf->h_image='logo.jpg';
	$pdf->Curreny=$lang['Curreny'];
	//$pdf->f_image='inner_img.jpg';
	//$f_img_info = getimagesize($physical_path['Upload'].$pdf->f_image);
	$h_img_info = getimagesize($physical_path['Upload'].$pdf->h_image);
	//width = $f_img_info[0]
	//height = $f_img_info[1]
	
	//$pdf->f_image_wdh = ($f_img_info[0] * 25.4) / 72;
	//$pdf->f_image_hgt = ($f_img_info[1] * 25.4) / 72;
	
	$pdf->h_image_wdh = ($h_img_info[0] * 25.4) / 72;
	$pdf->h_image_hgt = ($h_img_info[1] * 25.4) / 72;
	
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
	$pdf->Text(11,$start_hgt + 30 ,"Form Deposite Money (Paypal)");
	$pdf->Text(100,$start_hgt + 40," Total Earning Form Deposite Money (Paypal) : ".$lang['Curreny']."".number_format($sum_deposite,2));
	$header1 = array('Member Name','Deposited Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
	
	////////Form Deposite Money///////////////////////
	$mm1 = count($earn_deposite);
	$z1 = 0;
	foreach($earn_deposite as $key=>$val)
	{
	   if($z1 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 50);
			  $pdf->Ln();
			  $pdf->FancyTable_deposite($header1,$earn_deposite);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 50);
			  $pdf->Ln();
			  $pdf->FancyTable_deposite($header1,$earn_deposite);  
		 }
		$z1++; 	 
	} 
	////////Form Deposite Money (Moneybooker)    ///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form Deposite Money (Moneybooker)");
	$pdf->Text(80,$start_hgt + 15," Total Earning Form Deposite Money (Moneybooker) : ".$lang['Curreny']." ".number_format($sum_deposite_money,2));
	$header_money = array('Member Name','Deposited Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
  	$mm1 = count($earn_deposite_money);
	$z1 = 0;
	foreach($earn_deposite_money as $key=>$val)
	{
	  if($z1 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 50);
			  $pdf->Ln();
			  $pdf->FancyTable_deposite($header1,$earn_deposite_money);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 50);
			  $pdf->Ln();
			  $pdf->FancyTable_deposite($header1,$earn_deposite_money);  
		 }
		$z1++; 
	} 

    ////////Form projects Commision    ///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form projects Commision");
	$pdf->Text(100,$start_hgt + 15," Total Earning Form projects Commision : ".$lang['Curreny']."".number_format($total_comm,2));
	$pdf->Text(100,$start_hgt + 25," Total Earning Form Buyer Commision : ".$lang['Curreny']." ".number_format($sum_buyer,2));
	$pdf->Text(100,$start_hgt + 35," Total Earning Form Seller Commision : ".$lang['Curreny']." ".number_format($sum_seller,2));
	$header2 = array('project Name','Buyer Commision','Seller Commision');
	$pdf->SetFont('Arial','',10); 
    $mm1 = count($earn_comm);
	$z1 = 0;
	foreach($earn_comm as $key=>$val)
	{
	   if($z1 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 50);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Comm($header2,$earn_comm);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 50);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Comm($header2,$earn_comm);  
		 }
		$z1++; 	 
	} 
    ////////Form MemberShip///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form Membership");
	$pdf->Text(100,$start_hgt + 15," Total Earning Form Membership : ".$lang['Curreny']." ".number_format($sum,2));
	$header=array('Member Name','MemberShip Name','MemberShip Fees');
	$pdf->SetFont('Arial','',10);
	$mm = count($earn_membership);
	$z = 0;
	foreach($earn_membership as $key=>$val)
	{
	   if($z == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->data = $earn_membership;
			  $pdf->FancyTable($header,$pdf->data);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->data = $earn_membership;
			  $pdf->FancyTable($header,$pdf->data);  
		 }
		$z++; 	 
	}
	////////Form Withdraw Money (Paypal)///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);

	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form Withdraw Money (Paypal)");
	$pdf->Text(100,$start_hgt + 15," Total Earning Form Withdraw Money (Paypal): ".$lang['Curreny']." ".number_format($sum_withdraw,2));
	$header3=array('Member Name','Requested Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
	$mm1 = count($earn_withdraw);
	$z1 = 0;
	foreach($earn_withdraw as $key=>$val)
	{
	   if($z1 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 20);
			  $pdf->Ln();
			  $pdf->FancyTable_Withdraw($header3,$earn_withdraw);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 20);
			  $pdf->Ln();
			  $pdf->FancyTable_Withdraw($header3,$earn_withdraw);  
		 }
		$z1++; 	 
	}
	
	////////Form Withdraw Money (Money Booker)///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);

	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form Withdraw Money (Money Booker)");
	$pdf->Text(80,$start_hgt + 15," Total Earning Form Withdraw Money (Money Booker): ".$lang['Curreny']." ".number_format($sum_withdraw_moneybooker,2));
	$header3=array('Member Name','Requested Amount','Paid Amount','Site Earning');
	$pdf->SetFont('Arial','',10);
	$mm1 = count($earn_withdraw_money);
	$z1 = 0;
	foreach($earn_withdraw_money as $key=>$val)
	{
	   if($z1 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 20);
			  $pdf->Ln();
			  $pdf->FancyTable_Withdraw($header3,$earn_withdraw_money);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 20);
			  $pdf->Ln();
			  $pdf->FancyTable_Withdraw($header3,$earn_withdraw_money);  
		 }
		$z1++; 	 
	}

	////////Form Cancel project///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form Cancel project");
	$pdf->Text(100,$start_hgt + 15," Total Earning Form Cancel project : ".$lang['Curreny']." ".number_format($sum_cancel,2));
	$header4=array('project Name','Porject Posted Date','project Fees');
	$pdf->SetFont('Arial','',10);
	$mm4 = count($earn_cancel);
	$z4 = 0;
	foreach($earn_cancel as $key=>$val)
	{
	   if($z4 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Cancel($header4,$earn_cancel);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Cancel($header4,$earn_cancel);  
		 }
		$z4++; 	 
	}
	////////Form Premium project///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form Premium project");
	$pdf->Text(100,$start_hgt + 15," Total Earning Form Premium project : ".$lang['Curreny']." ".number_format($sum_premium,2));
	$header5=array('project Name','Porject Posted Date','project Fees');
	$pdf->SetFont('Arial','',10);
	$mm3 = count($earn_premium);
	$z3 = 0;
	foreach($earn_premium as $key=>$val)
	{
	   if($z3 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Premium($header5,$earn_premium);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Premium($header5,$earn_premium);  
		 }
		$z3++; 	 
	}
	////////Form Urgent project///////////////////////
	$pdf->AddPage();
	$pdf->SetTopMargin($start_hgt);
	$pdf->SetAutoPageBreak(true, $pdf->f_image_hgt + 5);
	$pdf->SetFont('helvetica','',12);
	$pdf->Text(11,$start_hgt + 5 ,"Form Urgent project");
	$pdf->Text(100,$start_hgt + 15," Total Earning Form Urgent project : ".$lang['Curreny']." ".number_format($sum_urgent,2));
	$header5=array('project Name','Porject Posted Date','project Fees');
	$pdf->SetFont('Arial','',10);
	$mm3 = count($earn_urgent);
	$z3 = 0;
	foreach($earn_urgent as $key=>$val)
	{
	   if($z3 == 0)
		 {
			  $pdf->SetXY(5,$start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Urgent($header5,$earn_urgent);  
		 }
	   else
		 {
			  $pdf->SetXY(5, $start_hgt + 20);
			  $pdf->Ln(5);
			  $pdf->FancyTable_Urgent($header5,$earn_urgent);  
		 }
		$z3++; 	 
	}
####################################################################################################    
	$pdf->Output();

####################################################################################################
$tpl->display('default_layout'. $config['tplEx']);
?>