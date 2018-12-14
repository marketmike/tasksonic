<?php
class Siteearn
{
	function Siteearn()
	{}
	##############################################################################################################################
	###################                        Earning form Membership                              ##############################
	##############################################################################################################################
	function Listing_Membership()
	{
	    global $db;
		
		$sql="SELECT * FROM ".MEMBER_MEMBERSHIP_HISTORY;
		return($db->query($sql));
	}
	
	
	
	function Earn_form_Membership()
	{
	    global $db;
		
		$sql="SELECT SUM(membership_fees) as SUM FROM ".MEMBER_MEMBERSHIP_HISTORY;
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	function Listing_Membership_Date($start,$end)
	{
	    global $db;
		
		$sql="SELECT * FROM ".MEMBER_MEMBERSHIP_HISTORY." WHERE buy_date BETWEEN '".$start."' AND '".$end."' ";
		return($db->query($sql));
	}
	
	function Earn_form_Membership_Date($start,$end)
	{
	    global $db;
		
		$sql="SELECT SUM(membership_fees) as SUM FROM ".MEMBER_MEMBERSHIP_HISTORY." WHERE buy_date BETWEEN '".$start."' AND '".$end."' ";
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	##############################################################################################################################
	###################                        Earning form Withdraw (Paypal)               		##############################
	##############################################################################################################################
	function Listing_WithdrawMoney()
	{
	    global $db;
		$sql = " SELECT * FROM ".WITHDRAW_MASTER." WHERE status = 1 AND withdraw_type='Paypal' ";
		return($db->query($sql));
	}
	
	function Sum_Earn_form_WithdrawMoney()
	{
	    global $db;
		
		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." WHERE status = 1 AND withdraw_type='Paypal'";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	function Listing_WithdrawMoney_Date($start,$end)
	{
	    global $db;
				
		$sql="SELECT * FROM ".WITHDRAW_MASTER." WHERE (status = 1) AND (withdraw_type='Paypal') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
		return($db->query($sql));
	}
	
	function Sum_Earn_form_WithdrawMoney_Date($start,$end)
	{
	    global $db;
		
		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." WHERE (status = 1) AND (withdraw_type='Paypal') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	
	##############################################################################################################################
	###################                        Earning form Withdraw (Moneybooker)               		##############################
	##############################################################################################################################
	function Listing_WithdrawMoney_Moneybooker()
	{
	    global $db;
		$sql = " SELECT * FROM ".WITHDRAW_MASTER." WHERE status = 1 AND withdraw_type='Moneybooker' ";
		return($db->query($sql));
	}
	
	function Sum_Earn_form_WithdrawMoney_Moneybooker()
	{
	    global $db;
		
		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." WHERE status = 1 AND withdraw_type='Moneybooker'";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	function Listing_WithdrawMoney_Date_Moneybooker($start,$end)
	{
	    global $db;
				
		$sql="SELECT * FROM ".WITHDRAW_MASTER." WHERE (status = 1) AND (withdraw_type='Moneybooker') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
		return($db->query($sql));
	}
	
	function Sum_Earn_form_WithdrawMoney_Date_Moneybooker($start,$end)
	{
	    global $db;
		
		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." WHERE (status = 1) AND (withdraw_type='Moneybooker') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################                        Earning form Cancel project                          ##############################
	##############################################################################################################################
	function Listing_Cancelproject()
	{
	    global $db;
		
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE PM.project_status = 4 AND PM.project_free = 0 AND MM.special_user = 0";
		return($db->query($sql));
	}
   
   function Sum_Earn_form_Cancelproject()
	{
	    global $db;
		
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"				
				." WHERE PM.project_status = 4 AND PM.project_free = 0 AND MM.special_user = 0";
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	function Listing_Cancelproject_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (PM.project_status = 4) AND (PM.project_free = 0) AND (MM.special_user = 0) AND (project_posted_date BETWEEN '".$start."' AND '".$end."') ";
		return($db->query($sql));
	}
   
   function Sum_Earn_form_Cancelproject_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (PM.project_status = 4) AND (PM.project_free = 0) AND (MM.special_user = 0) AND (project_posted_date BETWEEN '".$start."' AND '".$end."') ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}

	##############################################################################################################################
	###################                        Earning form Premium project                            ##############################
	##############################################################################################################################
	function Listing_Premiumproject()
	{
	    global $db;
		
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE PM.premium_project = 1 AND MM.special_user = 0";
		return($db->query($sql));
	}
   
   function Sum_Earn_form_Premiumproject()
	{
	    global $db;
		
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE PM.premium_project = 1 AND MM.special_user = 0 ";
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	function Listing_Premiumproject_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (PM.premium_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
		return($db->query($sql));
	}
  	function Sum_Earn_form_Premiumproject_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (PM.premium_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################                        Earning form Urgent project                            ##############################
	##############################################################################################################################
	function Listing_Urgentproject()
	{
	    global $db;
		
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE PM.urgent_project = 1 AND MM.special_user = 0";
		return($db->query($sql));
	}
   
   function Sum_Earn_form_Urgentproject()
	{
	    global $db;
		
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE PM.urgent_project = 1 AND MM.special_user = 0";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	function Listing_Urgentproject_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (PM.urgent_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Urgentproject_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (PM.urgent_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################################                  Earning form Deposite              ######################################
	##############################################################################################################################
	function Listing_Deposite()
	{
	    global $db;
		
		$sql = " SELECT * FROM ".SITE_EARNING_DEPOSITE." WHERE payment_gateway = 'Paypal' ";
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Deposite()
	{
	    global $db;
		
		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." WHERE payment_gateway = 'Paypal' ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	function Listing_Deposite_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".SITE_EARNING_DEPOSITE." WHERE (payment_gateway = 'Paypal') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Deposite_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." WHERE (payment_gateway = 'Paypal') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	##############################################################################################################################
	###################################     	Earning form Deposite ( Money booker)         ####################################
	##############################################################################################################################
	function Listing_Deposite_Moneybooker()
	{
	    global $db;
		
		$sql = " SELECT * FROM ".SITE_EARNING_DEPOSITE." WHERE payment_gateway = 'Money Booker' ";
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Deposite_Moneybooker()
	{
	    global $db;
		
		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." WHERE payment_gateway = 'Money Booker' ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	function Listing_Deposite_Moneybooker_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".SITE_EARNING_DEPOSITE." WHERE (payment_gateway = 'Money Booker') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Deposite_Moneybooker_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." WHERE (payment_gateway = 'Money Booker') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################################                  Earning form Commision             ######################################
	##############################################################################################################################

	/*function Listing_Commision()
	{
	    global $db;
		$sql = " SELECT * FROM ".SITE_EARNING_project." AS SEP "
			  ." LEFT JOIN ".project_MASTER." AS PM ON SEP.project_id = PM.project_id";
		return($db->query($sql));
	}*/
   
    function Listing_Commision()
	{
	    global $db;
		$sql = " SELECT * FROM site_earning_project as sep , project_master as pm where sep.project_id = pm.project_id " ;
			  
		return($db->query($sql));
	}
	
   /*function Sum_Earn_form_Comm_Buyer()
	{
	    global $db;
		
		$sql = " SELECT SUM(buyer_comm) as SUM_BUYER FROM ".SITE_EARNING_project;
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_BUYER'));
	}*/
	
	function Sum_Earn_form_Comm_Buyer()
	{
	    global $db;
		
		$sql = " SELECT SUM(buyer_comm) as SUM_BUYER FROM ".SITE_EARNING_project ." as sep, project_master as pm where sep.project_id = pm.project_id";
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_BUYER'));
	}
	
	/*function Sum_Earn_form_Comm_Seller()
	{
	    global $db;
		
		$sql = " SELECT SUM(seller_comm) as SUM_SELLER FROM ".SITE_EARNING_project;
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_SELLER'));
	}*/
	
	function Sum_Earn_form_Comm_Seller()
	{
	    global $db;
		
		$sql = " SELECT SUM(seller_comm) as SUM_SELLER FROM ".SITE_EARNING_project." as sep, project_master as pm where sep.project_id = pm.project_id";
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_SELLER'));
	}
	
	/*function Listing_Commision_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".SITE_EARNING_project." AS SEP "
			  ." LEFT JOIN ".project_MASTER." AS PM ON SEP.project_id = PM.project_id "
			  ." WHERE SEP.submitted_date BETWEEN '".$start."' AND '".$end."'" ;
		return($db->query($sql));
	}*/
	
	function Listing_Commision_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".SITE_EARNING_project." AS SEP, "
			  .project_MASTER." AS PM   "
			  ." WHERE SEP.project_id = PM.project_id and SEP.submitted_date BETWEEN '".$start."' AND '".$end."'" ;
		return($db->query($sql));
	}
   
   /*function Sum_Earn_form_Comm_Buyer_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(buyer_comm) as SUM_BUYER FROM ".SITE_EARNING_project
		       ." WHERE submitted_date BETWEEN '".$start."' AND '".$end."'" ;
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_BUYER'));
	}*/
	
	 function Sum_Earn_form_Comm_Buyer_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(buyer_comm) as SUM_BUYER FROM ".SITE_EARNING_project
		       ." as SEP , project_master as PM WHERE SEP.project_id = PM.project_id and submitted_date BETWEEN '".$start."' AND '".$end."'" ;
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_BUYER'));
	}
	
	/*function Sum_Earn_form_Comm_Seller_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(seller_comm) as SUM_SELLER FROM ".SITE_EARNING_project
	          ." WHERE submitted_date BETWEEN '".$start."' AND '".$end."'" ;
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_SELLER'));
	}*/
	
	function Sum_Earn_form_Comm_Seller_Date($start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(seller_comm) as SUM_SELLER FROM ".SITE_EARNING_project
	          ." as SEP , project_master as PM WHERE SEP.project_id = PM.project_id and submitted_date BETWEEN '".$start."' AND '".$end."'" ;
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_SELLER'));
	}
}
?>