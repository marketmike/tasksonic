<?php
class Payment
{
	function Payment()
	{}
	function ViewAll($user_id)
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".PAYPAL_MASTER." WHERE user_auth_id = '".$user_id."' " ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".PAYPAL_MASTER."  WHERE user_auth_id = '".$user_id."' ORDER BY pp_id DESC LIMIT ". $_SESSION['start_record']. ", ". 20;
		$db->query($sql);
	}
	function ViewAllWithdrawDetails()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".WITHDRAW_MASTER." WHERE withdraw_type='Paypal' " ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".WITHDRAW_MASTER." WHERE withdraw_type='Paypal' ORDER BY ww_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	function WithdrawDetails_of_Moneybooker()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".WITHDRAW_MASTER." WHERE withdraw_type='Moneybooker' " ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".WITHDRAW_MASTER." WHERE withdraw_type='Moneybooker' ORDER BY ww_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	function ViewAllwithdarw($user_id)
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".WITHDRAW_MASTER." WHERE user_auth_id = '".$user_id."' " ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".WITHDRAW_MASTER."  WHERE user_auth_id = '".$user_id."' ORDER BY ww_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		$db->query($sql);
	}
	// Check for duplicate transactions PayPal txn_id
	function Check_txn_ID_dupes($txn_id)
	{
		global $db;
	    $sql =  "SELECT * FROM ". PAYPAL_MASTER
            . 	" WHERE transaction_id  = '". $txn_id. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}	
	function Insert($user_id,$login_id,$amount,$desc,$trans_type,$transaction_id)
	   {
	       global $db;
		   $sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,transaction_id,date ) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".$transaction_id."' ,"					
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		  return($db->query($sql));	
		}	
	function Pending_Insert($user_id,$login_id,$amount,$desc)
	   {
	       global $db;
		   $sql="INSERT INTO ".PAYPAL_PENDING_DEPOSITE
					." (user_auth_id,user_login_id,amount,status,description,pending_date) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." 0 ,"
					." '".$desc."' ,"
					." '".date('Y-m-d')."' "
					." )";
		   return($db->query($sql));	
		}		
	function Viewtrans($user_id)
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".PAYPAL_MASTER." WHERE user_auth_id = '".$user_id."' " ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
         
		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".PAYPAL_MASTER."  WHERE user_auth_id = '".$user_id."' ORDER BY pp_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		$db->query($sql);
	}
	function InsertWithdraw($user_id,$user_name1,$req_date,$amount,$method,$details,$etimate_date,$rec_amount,$paypal_email)
	   {
		   $trans_type1 = "-";
		   global $db;
		   $sql="INSERT INTO ".WITHDRAW_MASTER
					." (user_auth_id,user_name,requested_date,estimate_date,amount,details,status,withdraw_type,trans_type,amount_rec,paypal_email) "
					." VALUES ('".$user_id."' ,"
					." '".$user_name1."' ,"
					." '".$req_date."' ,"
					." '".$etimate_date."' ,"
					." '".$amount."' ,"
					." '".$details."' ,"
					." 0 ,"
					." '".$method."' ,"
					." '".$trans_type1."' ,"
					." '".$rec_amount."' ,"
					." '".$paypal_email."' "
					." )";
		    return($db->query($sql));	
		}		
	function Delete($withdraw_id)
	{
		global $db;
		
		$sql="DELETE FROM ".WITHDRAW_MASTER
			." WHERE ww_id=".$withdraw_id;
		return($db->query($sql));
	}
	function GetWithdraw($withdraw_id)
   {
       global $db;
	   $sql= " SELECT * FROM ".WITHDRAW_MASTER." WHERE ww_id = '".$withdraw_id." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	function UpdateWithdraw($post)
	{
		global $db;
		$sql="UPDATE ".WITHDRAW_MASTER
			." SET "
			." status				 ='".$post['with_status']."' ,"
			." payment_released_date ='".date('Y-m-d')."' "
			." WHERE ww_id	=".$post['ww_id'];
		return($db->query($sql));
	}
	function InsertWIthdrawInPaypal($post)
	   {
		   global $db;
		   $sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$post['user_auth_id']."' ,"
					." '".$post['user_name']."' ,"
					." '".$post['amount']."' ,"
					." 1 ,"
					." '".$post['details']."' ,"
					." '".$post['trans_type']."' ,"
					." '".$post['requested_date']."' "
					." )";
	      return($db->query($sql));	
		}
	function Insert_Earning_depost($user_auth_id,$user_login_id,$deposited_money,$paid_money,$earning,$payment_gateway)
	   {
		   global $db;
		   $sql="INSERT INTO ".SITE_EARNING_DEPOSITE
					." (user_auth_id,user_login_id,deposited_money,paid_money,earning,payment_gateway,deposited_date) "
					." VALUES ('".$user_auth_id."' ,"
					." '".$user_login_id."' ,"
					." '".$deposited_money."' ,"
					." '".$paid_money."' ,"
					." '".$earning."' ,"
					." '".$payment_gateway."' ,"
					." '".date('Y-m-d')."' "
					." )";
	      return($db->query($sql));	
		}	
	function Pending_Moneybooker($user_id,$login_id,$amount,$desc)
	   {
	       global $db;
		   $sql="INSERT INTO ".MONEYBOOKER_PENDING_DEPOSITE
					." (user_auth_id,user_login_id,amount,status,description,pending_date) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." 0 ,"
					." '".$desc."' ,"
					." '".date('Y-m-d')."' "
					." )";
		   return($db->query($sql));	
		}
	function ViewPendingRequests()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".PAYPAL_PENDING_DEPOSITE ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".PAYPAL_PENDING_DEPOSITE." ORDER BY status ASC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}	
	function GetPending($withdraw_id)
	   {
		   global $db;
		   $sql= " SELECT * FROM ".PAYPAL_PENDING_DEPOSITE." WHERE pk_id = '".$withdraw_id." '";
		   $db->query($sql);
		   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
		}
	function UpdatePending($post)
	{
		global $db;
		$sql="UPDATE ".PAYPAL_PENDING_DEPOSITE
			." SET "
			." status				 ='".$post['with_status']."' "
			." WHERE pk_id		     =".$post['pk_id'];
		return($db->query($sql));
	}
	function InsertPending_requestInPaypal($post,$desc)
	   {
		   global $db;
		   $trans_type = "+";
		   $sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$post['user_auth_id']."' ,"
					." '".$post['user_name']."' ,"
					." '".$post['amount']."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
	      return($db->query($sql));	
		}		
}	
?>