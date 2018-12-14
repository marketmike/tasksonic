<?php
class Localsiteearn
{
	function Localsiteearn()
	{}
	##############################################################################################################################
	###################                        Earning form Membership                              ##############################
	##############################################################################################################################
	/*function Listing_Membership_Date($post,$start,$end)
	{
	    global $db;
		
		$sql="SELECT * FROM ".MEMBER_MEMBERSHIP_HISTORY." AS MMH "
			." LEFT JOIN ".AUTH_USER." AS AU ON MMH.user_auth_id = AU.user_auth_id "
		    ." WHERE (AU.come_form = '".$post['country']."') AND (MMH.buy_date BETWEEN '".$start."' AND '".$end."' )";
		echo $sql;
		die;
		return($db->query($sql));
	}*/
	
	function Listing_Membership_Date($post,$start,$end)
	{
	    global $db;
		
		$sql="SELECT * FROM ".MEMBER_MEMBERSHIP_HISTORY." AS MMH "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON MMH.user_auth_id = MM.user_auth_id "
		    ." WHERE (MM.mem_country = ".$post.") AND (MMH.buy_date BETWEEN '".$start."' AND '".$end."' )";

		return($db->query($sql));
	}
	
	
	/*function Earn_form_Membership_Date($post,$start,$end)
	{
	    global $db;
		
		$sql="SELECT SUM(membership_fees) as SUM FROM ".MEMBER_MEMBERSHIP_HISTORY." AS MMH "
			." LEFT JOIN ".AUTH_USER." AS AU ON MMH.user_auth_id = AU.user_auth_id "
		    ." WHERE (AU.come_form = '".$post['country']."') AND (MMH.buy_date BETWEEN '".$start."' AND '".$end."' )";
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}*/
	
	function Earn_form_Membership_Date($post,$start,$end)
	{
	    global $db;
		
		$sql="SELECT SUM(membership_fees) as SUM FROM ".MEMBER_MEMBERSHIP_HISTORY." AS MMH "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON MMH.user_auth_id = MM.user_auth_id "
		    ." WHERE (MM.mem_country = ".$post.") AND (MMH.buy_date BETWEEN '".$start."' AND '".$end."' )";

		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	
	##############################################################################################################################
	###################                        Earning form Withdraw (Paypal)               		##############################
	##############################################################################################################################
	function Listing_WithdrawMoney_Date($post,$start,$end)
	{
	    global $db;
				
/*		$sql="SELECT * FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".AUTH_USER." AS AU ON WM.user_auth_id = AU.user_auth_id "
			."WHERE (AU.come_form = '".$post['country']."') AND (status = 1) AND (withdraw_type='Paypal') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
*/		

		$sql="SELECT * FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON WM.user_auth_id = MM.user_auth_id "
			."WHERE (MM.mem_country = ".$post.") AND (status = 1) AND (withdraw_type='Paypal') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";

		return($db->query($sql));
	}
	
	function Sum_Earn_form_WithdrawMoney_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".AUTH_USER." AS AU ON WM.user_auth_id = AU.user_auth_id "
			."WHERE (AU.come_form = '".$post['country']."') AND (status = 1) AND (withdraw_type='Paypal') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
*/			

		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON WM.user_auth_id = MM.user_auth_id "
			."WHERE (MM.mem_country = ".$post.") AND (status = 1) AND (withdraw_type='Paypal') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	
	##############################################################################################################################
	###################                        Earning form Withdraw (Moneybooker)               		##############################
	##############################################################################################################################
	function Listing_WithdrawMoney_Date_Moneybooker($post,$start,$end)
	{
	    global $db;
				
/*		$sql="SELECT * FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".AUTH_USER." AS AU ON WM.user_auth_id = AU.user_auth_id "
			." WHERE (AU.come_form = '".$post['country']."') AND (status = 1) AND (withdraw_type='Moneybooker') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
*/			

		$sql="SELECT * FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON WM.user_auth_id = MM.user_auth_id "
			." WHERE (MM.mem_country = ".$post." ) AND (status = 1) AND (withdraw_type='Moneybooker') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";

			
		return($db->query($sql));
	}
	
	function Sum_Earn_form_WithdrawMoney_Date_Moneybooker($post,$start,$end)
	{
	    global $db;
		
/*		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".AUTH_USER." AS AU ON WM.user_auth_id = AU.user_auth_id "
			." WHERE (AU.come_form = '".$post['country']."') AND (status = 1) AND (withdraw_type='Moneybooker') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";
*/		
		
		$sql="SELECT SUM(amount - amount_rec) as SUM FROM ".WITHDRAW_MASTER." AS WM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON WM.user_auth_id = MM.user_auth_id "
			." WHERE (MM.mem_country = ".$post.") AND (status = 1) AND (withdraw_type='Moneybooker') AND (payment_released_date BETWEEN '".$start."' AND '".$end."') ";

		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################                        Earning form Cancel project                          ##############################
	##############################################################################################################################
	function Listing_Cancelproject_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id"
				." WHERE (AU.come_form = '".$post['country']."') AND (PM.project_status = 4) AND (PM.project_free = 0) AND (MM.special_user = 0) AND (project_posted_date BETWEEN '".$start."' AND '".$end."') ";
*/	

		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (MM.mem_country = ".$post.") AND (PM.project_status = 4) AND (PM.project_free = 0) AND (MM.special_user = 0) AND (project_posted_date BETWEEN '".$start."' AND '".$end."') ";


		return($db->query($sql));
	}
   
   function Sum_Earn_form_Cancelproject_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id"
				." WHERE (AU.come_form = '".$post['country']."') AND (PM.project_status = 4) AND (PM.project_free = 0) AND (MM.special_user = 0) AND (project_posted_date BETWEEN '".$start."' AND '".$end."') ";
*/


		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.paypal_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (MM.mem_country = ".$post.") AND (PM.project_status = 4) AND (PM.project_free = 0) AND (MM.special_user = 0) AND (project_posted_date BETWEEN '".$start."' AND '".$end."') ";


		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}

	##############################################################################################################################
	###################                        Earning form Premium project                            ##############################
	##############################################################################################################################
	function Listing_Premiumproject_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id"
				." WHERE (AU.come_form = '".$post['country']."') AND (PM.premium_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
*/				
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE ( MM.mem_country = ".$post.") AND (PM.premium_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
				
				
				
		return($db->query($sql));
	}
  	function Sum_Earn_form_Premiumproject_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id"
				." WHERE (AU.come_form = '".$post['country']."') AND (PM.premium_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
*/	
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.perimum_transaction_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (MM.mem_country = ".$post.") AND (PM.premium_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";

	
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################                        Earning form Urgent project                            ##############################
	##############################################################################################################################
	function Listing_Urgentproject_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id"
				." WHERE (AU.come_form = '".$post['country']."') AND (PM.urgent_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
*/				

		$sql = " SELECT * FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (MM.mem_country = ".$post.") AND (PM.urgent_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
				
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Urgentproject_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id"
				." WHERE (AU.come_form = '".$post['country']."') AND (PM.urgent_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";
*/
		$sql = " SELECT SUM(amount) as SUM FROM ".project_MASTER." AS PM "
				." LEFT JOIN ".PAYPAL_MASTER." AS PAYM ON PM.urgent_trascation_id = PAYM.pp_id"
				." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				." WHERE (MM.mem_country = ".$post.") AND (PM.urgent_project = 1) AND (MM.special_user = 0) AND (PM.project_posted_date BETWEEN '".$start."' AND '".$end."')";


		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################################                  Earning form Deposite              ######################################
	##############################################################################################################################
	function Listing_Deposite_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT * FROM ".SITE_EARNING_DEPOSITE." AS SED "
			   ." LEFT JOIN ".AUTH_USER." AS AU ON SED.user_auth_id = AU.user_auth_id"
			   ." WHERE (AU.come_form = '".$post['country']."') AND (payment_gateway = 'Paypal') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
*/			   
		$sql = " SELECT * FROM ".SITE_EARNING_DEPOSITE." AS SED "
			   ." LEFT JOIN ".MEMBER_MASTER." AS MM ON SED.user_auth_id = MM.user_auth_id"
			   ." WHERE (MM.mem_country = ".$post.") AND (payment_gateway = 'Paypal') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";


			   
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Deposite_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." AS SED "
			   ." LEFT JOIN ".AUTH_USER." AS AU ON SED.user_auth_id = AU.user_auth_id"
			   ." WHERE (AU.come_form = '".$post['country']."') AND (payment_gateway = 'Paypal') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
*/		
		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." AS SED "
			   ." LEFT JOIN ".MEMBER_MASTER." AS MM ON SED.user_auth_id = MM.user_auth_id"
			   ." WHERE (MM.mem_country = ".$post.") AND (payment_gateway = 'Paypal') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";

		
		
		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	
	##############################################################################################################################
	###################################     	Earning form Deposite ( Money booker)         ####################################
	##############################################################################################################################
	function Listing_Deposite_Moneybooker_Date($post,$start,$end)
	{
	    global $db;
		
		$sql = " SELECT * FROM ".SITE_EARNING_DEPOSITE." AS SED "
			   ." LEFT JOIN ".MEMBER_MASTER." AS MM ON SED.user_auth_id = MM.user_auth_id"
			   ." WHERE (MM.mem_country = ".$post.") AND (payment_gateway = 'Money Booker') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
		return($db->query($sql));
	}
   
    function Sum_Earn_form_Deposite_Moneybooker_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." AS SED "
			   ." LEFT JOIN ".AUTH_USER." AS AU ON SED.user_auth_id = AU.user_auth_id"
			   ." WHERE (MM.mem_country = ".$post.") AND (payment_gateway = 'Money Booker') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
*/			   
		$sql = " SELECT SUM(earning) as SUM FROM ".SITE_EARNING_DEPOSITE." AS SED "
			   ." LEFT JOIN ".MEMBER_MASTER." AS MM ON SED.user_auth_id = MM.user_auth_id"
			   ." WHERE (MM.mem_country = ".$post.") AND (payment_gateway = 'Money Booker') AND (deposited_date BETWEEN '".$start."' AND '".$end."') ";
   
	
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM'));
	}
	##############################################################################################################################
	###################################                  Earning form Commision             ######################################
	##############################################################################################################################
	function Listing_Commision_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT * FROM ".SITE_EARNING_project." AS SEP "
			  ." LEFT JOIN ".project_MASTER." AS PM ON SEP.project_id = PM.project_id "
			  ." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id "
			  ." WHERE (AU.come_form = '".$post['country']."') AND (SEP.submitted_date BETWEEN '".$start."' AND '".$end."')" ;
*/
		$sql = " SELECT * FROM ".SITE_EARNING_project." AS SEP "
			  ." LEFT JOIN ".project_MASTER." AS PM ON SEP.project_id = PM.project_id "
			  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.auth_id_of_post_by = MM.user_auth_id "
			  ." WHERE (MM.mem_country = ".$post.") AND (SEP.submitted_date BETWEEN '".$start."' AND '".$end."')" ;


		return($db->query($sql));
	}
   
   function Sum_Earn_form_Comm_Buyer_Date($post,$start,$end)
	{
	    global $db;
		
/*		$sql = " SELECT SUM(buyer_comm) as SUM_BUYER FROM ".SITE_EARNING_project." AS SEP "
			  ." LEFT JOIN ".project_MASTER." AS PM ON SEP.project_id = PM.project_id "
			  ." LEFT JOIN ".AUTH_USER." AS AU ON PM.auth_id_of_post_by = AU.user_auth_id "
			  ." WHERE (AU.come_form = '".$post['country']."') AND (SEP.submitted_date BETWEEN '".$start."' AND '".$end."')" ;
*/		

		$sql = " SELECT SUM(buyer_comm) as SUM_BUYER FROM ".SITE_EARNING_project." AS SEP "
			  ." LEFT JOIN ".project_MASTER." AS PM ON SEP.project_id = PM.project_id "
			  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.auth_id_of_post_by = MM.user_auth_id "
			  ." WHERE (MM.mem_country = ".$post.") AND (SEP.submitted_date BETWEEN '".$start."' AND '".$end."')" ;

		
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_BUYER'));
	}
	function Sum_Earn_form_Comm_Seller_Date($post,$start,$end)
	{
	    global $db;
		
		$sql = " SELECT SUM(seller_comm) as SUM_SELLER FROM ".SITE_EARNING_project." AS SEP "
			  ." LEFT JOIN ".project_MASTER." AS PM ON SEP.project_id = PM.project_id "
			  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.auth_id_of_post_by = MM.user_auth_id "
			  ." WHERE (MM.mem_country = ".$post.") AND (SEP.submitted_date BETWEEN '".$start."' AND '".$end."')" ;
		$db->query($sql);	
		$db->next_record();
		return($db->f('SUM_SELLER'));
	}
}
?>