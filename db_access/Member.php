<?php
class Member
{
   function Member()
   {
   }
   function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBERSHIP_PLAN_MASTER." ORDER BY display_order ASC ";

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".MEMBERSHIP_PLAN_MASTER." ORDER BY display_order ASC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
   function Insert($post)
   {
       global $db;
	   $sql="INSERT INTO ".MEMBERSHIP_PLAN_MASTER
				." (membership_name,membership_time,membership_fees,membership_status ) "
				." VALUES ('".$post['membership_name']."' ,"
				." '".$post['membership_time']."' ,"
				." '".$post['membership_fee']."' ,"
				." '".$post['membership_status']."' "
				." )";
	   return($db->query($sql));	
	}	
	function GetMember($memberid)
   {
       global $db;
	   $sql= " SELECT * FROM ".MEMBERSHIP_PLAN_MASTER." WHERE membership_id = '".$memberid." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	
	function Selectmember()
   {
       global $db;
	   $sql= " SELECT * FROM ".MEMBERSHIP_PLAN_MASTER;
	   $db->query($sql);
	   return ($db->fetch_object());
	}	
	
	function Update($post)
	{
		global $db;

		$sql = " UPDATE ". MEMBERSHIP_PLAN_MASTER
			.  " SET membership_name 	= '". $post['membership_name']. "',"
			.  " membership_time        = '". $post['membership_time']."' ,"
			.  " membership_fees        = '". $post['membership_fee']."' ,"
			.  " membership_status      = '". $post['membership_status']."' "
			.  " WHERE membership_id	= '".$post['membership_id']. "' ";
		$db->query($sql);
		return ($db->query($sql));
	}
	function Delete($membership_id)
	{
		global $db;
		
		$sql="DELETE FROM ".MEMBERSHIP_PLAN_MASTER
			." WHERE membership_id=".$membership_id;
		return($db->query($sql));
	}	
	 function View_membership_All_Order()
	{

		global $db;
		$sql= "SELECT * FROM ".MEMBERSHIP_PLAN_MASTER
	 		  ." ORDER BY display_order ASC  ";
		$db->query($sql);
	}
	function DisplayOrder_membership_Type($portfolio_id11, $display_order)
	{
		global $db;

		$sql = " UPDATE ". MEMBERSHIP_PLAN_MASTER
			.  " SET display_order 	= '". $display_order. "' "
			.  " WHERE membership_id	= '". $portfolio_id11. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
	function ToggleStatusMember($member_id, $mem_visible)
	{
		global $db;
		$sql = " UPDATE ".MEMBERSHIP_PLAN_MASTER
			 . " SET membership_status ='". $mem_visible."'"
			 . " WHERE membership_id ='". $member_id. "'";
		return ($db->query($sql));
	}
	
	//At user Side
	function ViewAll_MemberShip()
	{
		global $db;
		$sql= " SELECT * FROM ".MEMBERSHIP_PLAN_MASTER." WHERE membership_status = 1 ORDER BY display_order ASC ";
		$db->query($sql);
	}
	//At user Side
	function View_Starting_At_MemberShip()
	{
		global $db;
		$sql= " SELECT * FROM ".MEMBERSHIP_PLAN_MASTER." WHERE membership_status = 1 ORDER BY membership_fees ASC LIMIT 1 ";
		   $db->query($sql);
		   $db->next_record();
		   return $db->f('membership_fees');
	}	
	
	function Insert_Member_Paypal($user_id,$login_id,$amount)
	{
	    $trans_type = "-";
		$desc = "Fees Taken Form Site For buying membership by you";   
		global $db;
		$sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
       	$db->query($sql);
		$insertid=$db->sql_inserted_id();
		return($insertid);
   }
   
   function Update_Member_details($member_id, $transcation_id,$user_auth_id,$finished_date)
	{
		global $db;
		$sql = " UPDATE ".MEMBER_MASTER
			 . " SET membership_id 			='". $member_id."',"
			 . " membership_buy_date	 	='". date('Y-m-d')."',"
			 . " membership_finish_date		='". $finished_date."',"
			 . " transcation_id 			='". $transcation_id."'"
			 . " WHERE user_auth_id ='".$user_auth_id."'";
		return ($db->query($sql));
	}
	
	function Insert_History($user_id,$login_id,$membership_id,$membership_name,$membership_time,$membership_fees,$finished_date)
	{
		global $db;
		$sql="INSERT INTO ".MEMBER_MEMBERSHIP_HISTORY
					." (user_auth_id,user_login_id,membership_id,membership_name,membership_time,membership_fees,buy_date,finish_date ) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$membership_id."' ,"
					." '".$membership_name."' ,"
					." '".$membership_time."' ,"
					." '".$membership_fees."' ,"
					." '".date('Y-m-d')."' ,"
					." '".$finished_date."' "
					." )";
		$db->query($sql);
	}
	function GetMemberDetails($userid)
   	{
       global $db;
	   $sql = " SELECT * FROM ".MEMBER_MASTER." AS MM "
	          ." LEFT JOIN ".MEMBERSHIP_PLAN_MASTER." AS MPM ON MM.membership_id = MPM.membership_id "
			  ." WHERE MM.user_auth_id  = '".$userid."'";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	
	function ViewAllcsv()
   	{
       global $db;
	   $sql = " SELECT user_login_id,mem_email FROM ".MEMBER_MASTER
	   		  ." ORDER BY user_login_id ASC";
	   			
	   $db->query($sql);
	}
	
	function ViewAccount()
   	{
       global $db;
	   
	   $sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER
			." WHERE wallet_sum > 0 OR earn_by_site > 0 "; 	
		$db->query($sql);
		$db->next_record();
		
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
	   
	   $sql = " SELECT * FROM ".MEMBER_MASTER
 	   		 ." WHERE wallet_sum > 0 OR earn_by_site > 0 LIMIT " 
			 . $_SESSION['start_record']. ", ". $_SESSION['page_size'];
	   $db->query($sql);
	}
	function ViewPaypal($userid)
   	{
       global $db;
	   $sql = " SELECT * FROM ".PAYPAL_MASTER
 	   		 ." WHERE user_auth_id = '".$userid."'";
	   	
	   $db->query($sql);
	}	
	function ViewMoneybooker($userid)
   	{
       global $db;
	   $sql = " SELECT * FROM ".MONEYBOOKER_PENDING_DEPOSITE
 	   		 ." WHERE user_auth_id = '".$userid."'";
	   
	   $db->query($sql);
	}	
	function ViewEscrow($userid)
   	{
       global $db;
	   
	   $sql = " SELECT * FROM ".ESCROW_PAYMENT_MASTER
 	   		 ." WHERE from_user_auth_id = '".$userid."'";
	   		
	   $db->query($sql);
	}	
	function Sum_OF_Wallet()
   	{
       global $db;
	   
	   $sql="SELECT SUM(wallet_sum) as Wallet FROM ".MEMBER_MASTER
			." WHERE wallet_sum > 0 " ; 	
	   $db->query($sql);
	   $db->next_record();
	   return $db->f('Wallet');
	}
	function Sum_OF_Earn()
   	{
       global $db;
	   
	   $sql="SELECT SUM(earn_by_site) as Earn FROM ".MEMBER_MASTER
			." WHERE earn_by_site > 0 " ; 	
	   $db->query($sql);
	   $db->next_record();
	   return $db->f('Earn');
	}
	function Sum_OF_Membership_Earn()
   	{
       global $db;
	   
	   $sql="SELECT SUM(membership_fees) as MEMBERSHIPS FROM ".MEMBER_MEMBERSHIP_HISTORY
			." WHERE membership_fees > 0 " ; 	
	   $db->query($sql);
	   $db->next_record();
	   return $db->f('MEMBERSHIPS');
	}
	function Membership_Earn_By_User($userid)
   	{
       global $db2;
	   
	   $sql="SELECT SUM(membership_fees) as MEMBERSHIPS FROM ".MEMBER_MEMBERSHIP_HISTORY
			." WHERE user_auth_id = '".$userid."'"; 	
	   $db2->query($sql);
	   $db2->next_record();
	   return $db2->f('MEMBERSHIPS');
	}	
	function Sum_OF_Referrals_Paid()
   	{
       global $db;
	   
	   $sql="SELECT SUM(amount_paid) as REFERRAL FROM ".REFERRALS_PAID
			." WHERE amount_paid > 0 " ; 	
	   $db->query($sql);
	   $db->next_record();
	   return $db->f('REFERRAL');
	}	
	function ViewPostProjcsv()
   	{
       global $db;
	   $sql = " SELECT DISTINCT MM.user_login_id,MM.mem_email FROM ".project_MASTER." AS PM"
	   		 ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.auth_id_of_post_by = MM.user_auth_id"
			 ." ORDER BY MM.user_login_id ASC";
	   $db->query($sql);
	}
	
	function ViewProjInfoAllcsv()
   	{
       global $db;
	   $sql = " SELECT DISTINCT MM.user_login_id,MM.mem_email FROM ".project_MASTER." AS PM"
	   		 ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.auth_id_of_post_by = MM.user_auth_id"
			 ." ORDER BY MM.user_login_id ASC";
	   $db->query($sql);
	}
	
	function ViewPostBidcsv()
   	{
       global $db;
	   $sql = " SELECT DISTINCT MM.user_login_id,MM.mem_email FROM ".BID_MASTER." AS BM"
	   		 ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id"
			 ." ORDER BY MM.user_login_id ASC";
	   $db->query($sql);
	}	
	
	###################################################################################################
	##################            NEW CODE
	###################################################################################################
	function GetSeller($cdrinfoid,$citycurrent) 
	{
		global $db1;

		$sql= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".PROFILE_MASTER." AS PM ON MM.user_auth_id = PM.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LEFT JOIN ".STATE_MASTER." AS SM ON MM.mem_state = SM.state_id"			
			." WHERE FIND_IN_SET('$cdrinfoid',MM.mem_category) AND MM.mem_city = '$citycurrent'  LIMIT 0,9";
		$db1->query($sql);			 

	}
	###################################################################################################
	##################            NEW CODE
	###################################################################################################
	function GetSellerCount($cdrinfoid,$citycurrent) 
	{
		global $db3;

		$sql= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".PROFILE_MASTER." AS PM ON MM.user_auth_id = PM.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LEFT JOIN ".STATE_MASTER." AS SM ON MM.mem_state = SM.state_id"			
			." WHERE FIND_IN_SET('$cdrinfoid',MM.mem_category) AND MM.mem_as_seller = 1 AND MM.mem_city = '$citycurrent'";
		$db3->query($sql);			 

	}	
				
 }  
?>
