<?php
class Admins
{

	var $Admin_Id	=	'';
    var $Admin_Name	=	'';
    var $Admin_Perm	=	'';
	
 	################################################################################################################
	# Function: Admins()
	# Purpose: Constructor // it allows admin user to enter in admin section else it will send user on logout page
	# Return: notihng
	# Parameters: 
	################################################################################################################
   function Admins()
    {
		if(isset($_SESSION['Admin_Id']))
	    {
			$this->Admin_Id       =   $_SESSION['Admin_Id'];
	        $this->Admin_Name     =   $_SESSION['Admin_Name'];
	        $this->Admin_Perm     =   $_SESSION['Admin_Perm'];
			$this->Admin_Email    =   $_SESSION['Admin_Email'];

	        switch($this->Admin_Perm)
	        {
	            case ADMIN:
	            case SUBADMIN:
					# Check for proper authorization
					if(!defined("IN_ADMIN"))
	                {
						$path_parts = pathinfo($_SERVER['PHP_SELF']);
				        if($path_parts["basename"] != 'logout.php')
						{
							header('location: '. $virtual_path['User_Root']. 'logout.php');
							exit;
						}
				    }
		            break;
	        }
	    }
	    else
	    {
			$path_parts = pathinfo($_SERVER['PHP_SELF']);
	        if($path_parts["basename"] != 'login.php' && defined("IN_ADMIN"))
	            header('location: '. $virtual_path['Admin_Root']. 'logout.php');
	        else if($path_parts["basename"] != 'login.php' && defined("IN_USER"))
	            header('location: '. $virtual_path['Admin_Root']. 'logout.php');
	        $this->Admin_Id       =   '';
	        $this->Admin_Name     =   '';
	        $this->Admin_Perm     =   '';
	        $this->Admin_Id       =   '';
	    }
	}

	################################################################################################################
	# Function: IsValidAdminLogin($username, $password, $status)
	# Purpose: check wheather login details are correct
	# Return: if correct details than generate session and return true  else return false
	# Parameters: 
	# 1. $username -> User name 
	# 2. $password -> User password 
	# 3. $status   -> User status 
	################################################################################################################
	function IsValidAdminLogin($username, $password, $status)
	{
		global $db;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_auth_id  = '". md5($username) . "'"
			.	" AND user_status = '". $status ."' AND (user_type = 'Admin' OR user_type = 'Subadmin')";
		$db->query($sql);
	    if($db->num_rows() > 0)
	    {
	        $db->next_record();
	        if($db->f('user_passwd') == md5($password))
            {
	            $_SESSION['Admin_Id']	=	$db->f('user_auth_id');
	            $_SESSION['Admin_Name']	=	$db->f('user_login_id');
	            $_SESSION['Admin_Perm']	=	$db->f('user_type');
				return true;
            }
	        return false;
	    }
	    return false;
	}

	################################################################################################################
	# Function: UpdatePassAdmin($user_auth_id,$old_password,$user_password)
	# Purpose: Update password of admin
	# Return: if correct details than return true  else return false
	# Parameters: 
	# 1. $user_auth_id -> User id 
	# 2. $old_password -> User old / current password 
	# 3. $user_password   -> User new status 
	################################################################################################################
	function UpdatePassAdmin($user_auth_id,$old_password,$user_password)
	{
		global $db;

		$sql =  "SELECT user_passwd,user_login_id "
			.   " FROM ". AUTH_USER
			. 	" WHERE user_auth_id  = '". $user_auth_id. "'";	
		$db->query($sql);
		
		$db->next_record();
		if($db->f('user_passwd') == md5($old_password))
		{
			$sql = 	"UPDATE ". AUTH_USER
				.	" SET "
				.	" user_passwd	          = '". md5($user_password). "',"
				.	" user_passwd1	          = '". $user_password. "'"
				.	" WHERE user_auth_id = '". $user_auth_id. "' ";

			$db->query($sql);
			
			$sql = 	"UPDATE ". WP_USERS
				.	" SET "
				.	" user_pass	   	  = '". md5($user_password). "'"
				.	" WHERE user_login = '".$db->f('user_login_id'). "'";
			$db->query($sql);
			
			return true;
		}
		return false;
	}

	################################################################################################################
	# Function: AdminDetail($userid)
	# Purpose: get details of admin from user id
	# Return: if correct details than return true  else return false
	# Parameters: 
	# 1. $userid -> User id 
	################################################################################################################
	function AdminDetail($userid)
	{
		global $db	;
		$sql = " SELECT * FROM ".AUTH_USER." WHERE user_auth_id  = '".$userid."'";
		$rs = $db->query($sql);
		return ($db->next_record());

	}
	
	################################################################################################################
	# Function: DestroyAdmin()
	# Purpose: destroy all session
	# Return: nothing
	# Parameters: 
	################################################################################################################
	function DestroyAdmin()
	{
		session_unregister($_SESSION['Admin_Id']);
	    session_unregister($_SESSION['Admin_Name']);
	    session_unregister($_SESSION['Admin_Perm']);
	    @session_unset();
	    @session_destroy();
        return true;
	}
	
	function UpdateMemberDetails($post)
	{
	   if($post['cat_prod'] == '')
	   {
	     $selected_catagory = $post['cat_prod'];
	   }    
	   else
	   {
	    $selected_catagory = implode(",",$post['cat_prod']);
	   }
	   global $db; 
	   $sql =  "UPDATE ". MEMBER_MASTER
	        ." SET "
			." mem_fname   			 = '".$post['mem_fname']. "',"
			." mem_lname   			 = '".$post['mem_lname']. "',"
			." mem_city    			 = '".$post['mem_city']. "',"
			." mem_state   			 = '".$post['mem_state']. "',"
			." mem_country   		 = '".$post['mem_country']. "',"
			." mem_mname    		 = '".$post['mem_mname']. "',"
			." mem_organization   	 = '".$post['mem_oragnaz']. "',"
			." mem_employes    		 = '".$post['mem_emp']. "',"
			." mem_daytime_phone     = '".$post['mem_daytime_phone']. "',"
			." mem_eve_phone   		 = '".$post['mem_eve_phone']. "',"
			." mem_fax_no    		 = '".$post['mem_fax']. "',"
			." mem_address    		 = '".$post['mem_address']. "',"
			." mem_address1    		 = '".$post['mem_address1']. "',"
			." mem_zip_code          = '".$post['mem_zip']. "',"
			." mem_website    		 = '".$post['mem_website']. "',"
			." mem_category    		 = '".$selected_catagory. "',"
			." mem_pro_notice    	 = '".$post['project_notices']. "',"
			." mem_option    		 = '".$post['check']. "'"
			." WHERE user_auth_id  	 = '".$post['user_auth_id']. "' ";
	   $db->query($sql);
	}

	################################################################################################################
	# Function: Check_User_Name()
	# Purpose: check user name is exites or not?
	# Return: nothing
	# Parameters: 
	################################################################################################################

	function Check_User_Name($name)
	{
		global $db;
	    $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE user_login_id  = '". $name. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	################################################################################################################
	# Function		: GetChangeUserInfo1($auth_id)
	# Purpose		: This function is used to get details from particular ID
	# Return		: object
	# Used At 		: edit_userinfo.php
	# Parameters	
	# 1. $auth_id =>  member id
	################################################################################################################
	function GetChangeUserInfo1($auth_id)
	{
	   global $db; 
	   $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE user_auth_id  = '". $auth_id. "' ";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

	################################################################################################################
	# Function: Updates()
	# Purpose: Update auth_id & login_id in tables.
	# Return: nothing
	# Parameters: 
	################################################################################################################
	function Updates($name,$old_name)
	{
		global $db,$db1,$db2;
		
		
		#######################################################################################
		################# 		UPDATE MEMBER MEMBERSHIP HISTORY				###############
		#######################################################################################
		
		$sql_2 =  "SELECT * FROM ". MEMBER_MEMBERSHIP_HISTORY
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db2->query($sql_2);
		$db2->next_record();
		if($db2->f('user_login_id') == $old_name)
		{
			$sql = 	"UPDATE ". MEMBER_MEMBERSHIP_HISTORY
				.	" SET "
				.	" user_login_id	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db2->f('user_auth_id'). "' ";
			$db2->query($sql);
		}
		$db2->free();
	  
	 	#######################################################################################
		################# 				UPDATE PAYPAL MASTER					###############
		#######################################################################################
		
		$sql_3 =  "SELECT * FROM ". PAYPAL_MASTER
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db->query($sql_3);
		$db->next_record();
		if($db->f('user_login_id') == $old_name)
		{
			$sql = 	"UPDATE ". PAYPAL_MASTER
				.	" SET "
				.	" user_login_id	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db->f('user_auth_id'). "' ";
			
			$db->query($sql);
		}
		$db->free();
	
		#######################################################################################
		################# 	     UPDATE SITE EARNING DEPOSITE MASTER			###############
		#######################################################################################
		
		$sql_4 =  "SELECT * FROM ". SITE_EARNING_DEPOSITE
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db1->query($sql_4);
		$db1->next_record();
		if($db1->f('user_login_id') == $old_name)
		{
			$sql = 	"UPDATE ". SITE_EARNING_DEPOSITE
				.	" SET "
				.	" user_login_id	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db1->f('user_auth_id'). "' ";
			
			$db1->query($sql);
		}
		$db1->free();
		
		#######################################################################################
		################# 	     UPDATE MONEYBOOKER PENDING DEPOSITE			###############
		#######################################################################################
		
		$sql_5 =  "SELECT * FROM ". MONEYBOOKER_PENDING_DEPOSITE
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db2->query($sql_5);
		$db2->next_record();
		if($db2->f('user_login_id') == $old_name)
		{
			$sql = 	"UPDATE ". MONEYBOOKER_PENDING_DEPOSITE
				.	" SET "
				.	" user_login_id	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db2->f('user_auth_id'). "' ";
			
			$db2->query($sql);
		}
		$db2->free();
		
		#######################################################################################
		################# 				UPDATE BID_MASTER					###############
		#######################################################################################
		
		$sql_6 =  "SELECT * FROM ". BID_MASTER
			. 	" WHERE bid_by_user  = '".$old_name. "'";
		$db->query($sql_6);
		$db->next_record();
		if($db->f('bid_by_user') == $old_name)
		{
			$sql = 	"UPDATE ". BID_MASTER
				.	" SET "
				.	" bid_by_user	          = '". $name. "'"
				.	" WHERE bid_by_user = '". $db->f('bid_by_user'). "' ";
			$db->query($sql);
		}
		$db->free();
		
		#######################################################################################
		################# 				UPDATE BUYER RATING MASTER				###############
		#######################################################################################
		
		$sql_7 =  "SELECT * FROM ". BUYER_RATING_MASTER
			. 	" WHERE rating_by_user  = '".$old_name. "' OR rating_to_user = '".$old_name. "'";
		$db1->query($sql_7);

		while($db1->next_record())
		{
			if($db1->f('rating_by_user') == $old_name)
			{
				$sql_7_1 = 	"UPDATE ". BUYER_RATING_MASTER
					.	" SET "
					.	" rating_by_user  = '". $name. "'"
					.	" WHERE rating_id = '". $db1->f('rating_id'). "' ";
				$db->query($sql_7_1);
			}
			if($db1->f('rating_to_user') == $old_name)
			{
				$sql_7_2 = 	"UPDATE ". BUYER_RATING_MASTER
					.	" SET "
					.	" rating_to_user  = '". $name. "'"
					.	" WHERE rating_id = '". $db1->f('rating_id'). "' ";
				$db2->query($sql_7_2);
			}
		}	
		$db->free();
		$db1->free();
		$db2->free();

		#######################################################################################
		################# 				UPDATE SELLER RATING MASTER				###############
		#######################################################################################
		
		$sql_8 =  "SELECT * FROM ". SELLER_RATING_MASTER
			. 	" WHERE rating_by_user  = '".$old_name. "' OR rating_to_user = '".$old_name. "'";
		$db1->query($sql_8);

		while($db1->next_record())
		{
			if($db1->f('rating_by_user') == $old_name)
			{
				$sql_8_1 = 	"UPDATE ". SELLER_RATING_MASTER
					.	" SET "
					.	" rating_by_user  = '". $name. "'"
					.	" WHERE rating_id = '". $db1->f('rating_id'). "' ";
				$db->query($sql_8_1);
			}
			if($db1->f('rating_to_user') == $old_name)
			{
				$sql_8_2 = 	"UPDATE ". SELLER_RATING_MASTER
					.	" SET "
					.	" rating_to_user  = '". $name. "'"
					.	" WHERE rating_id = '". $db1->f('rating_id'). "' ";
				$db2->query($sql_8_2);
			}
		}	
		$db->free();
		$db1->free();
		$db2->free();

		#######################################################################################
		################# 	    		 UPDATE WITHDRAW MASTER					###############
		#######################################################################################
		
		$sql_9 =  "SELECT * FROM ". WITHDRAW_MASTER
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db1->query($sql_9);
		$db1->next_record();
		if($db1->f('user_name') == $old_name)
		{
			$sql = 	"UPDATE ". WITHDRAW_MASTER
				.	" SET "
				.	" user_name	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db1->f('user_auth_id'). "' ";
			
			$db1->query($sql);
		}
		$db1->free();
		
		
		#######################################################################################
		################# 	    	 UPDATE SELLER PORTFOLIO MASTER				###############
		#######################################################################################
		
		$sql_10 =  "SELECT * FROM ". SELLER_PORTFOLIO_MASTER
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db1->query($sql_10);
		$db1->next_record();
		if($db1->f('user_name') == $old_name)
		{
			$sql = 	"UPDATE ". SELLER_PORTFOLIO_MASTER
				.	" SET "
				.	" user_name	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db1->f('user_auth_id'). "' ";
			
			$db1->query($sql);
		}
		$db1->free();
		
		#######################################################################################
		################# 	    	  UPDATE SELLER SKILL MASTER				###############
		#######################################################################################
		
		$sql_11 =  "SELECT * FROM ". SELLER_SKILL_MASTER
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db1->query($sql_11);
		$db1->next_record();
		if($db1->f('user_auth_id') == md5($old_name))
		{
			$sql = 	"UPDATE ". SELLER_SKILL_MASTER
				.	" SET "
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db1->f('user_auth_id'). "' ";
			$db1->query($sql);
		}
		$db1->free();
		
		#######################################################################################
		################# 	    		 UPDATE PROFILE MASTER					###############
		#######################################################################################
		
		$sql_18 =  "SELECT * FROM ". PROFILE_MASTER
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db1->query($sql_18);
		$db1->next_record();
		if($db1->f('user_auth_id') == md5($old_name))
		{
			$sql = 	"UPDATE ". PROFILE_MASTER
				.	" SET "
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db1->f('user_auth_id'). "' ";
			
			$db1->query($sql);
		}
		$db1->free();
		
		#######################################################################################
		################# 					UPDATE CONTACT MASTER				###############
		#######################################################################################
		
		$sql_12 =  "SELECT * FROM ". CONTACT_MASTER
			. 	" WHERE sender_id  = '".md5($old_name). "' OR recevier_name = '".$old_name. "'";
		$db1->query($sql_12);

		while($db1->next_record())
		{
			if($db1->f('sender_id') == md5($old_name))
			{
				$sql_12_1 = "UPDATE ". CONTACT_MASTER
						.	" SET "
						.	" sender_id  = '".md5($name). "'"
						.	" WHERE contact_id = '". $db1->f('contact_id'). "' ";
				$db->query($sql_12_1);
			}
			if($db1->f('recevier_name') == $old_name)
			{
				$sql_12_2 = "UPDATE ". CONTACT_MASTER
						.	" SET "
						.	" recevier_name  = '". $name. "'"
						.	" WHERE contact_id = '". $db1->f('contact_id'). "' ";
				$db2->query($sql_12_2);
			}
		}	
		$db->free();
		$db1->free();
		$db2->free();
		
		#######################################################################################
		################# 			UPDATE ESCROW PAYMENT MASTER				###############
		#######################################################################################
		
		$sql_13 =  "SELECT * FROM ". ESCROW_PAYMENT_MASTER
			. 	" WHERE from_user_auth_id  = '".md5($old_name). "' OR to_user_auth_id = '".md5($old_name). "'";
		$db1->query($sql_13);

		while($db1->next_record())
		{
			if($db1->f('from_user_auth_id') == md5($old_name))
			{
				$sql_13_1 = "UPDATE ". ESCROW_PAYMENT_MASTER
						.	" SET "
						.	" from_user_login_id   = '". $name. "',"
						.	" from_user_auth_id	   = '". md5($name). "'"
						.	" WHERE ep_id = '". $db1->f('ep_id'). "' ";
				$db->query($sql_13_1);
			}
			if($db1->f('to_user_auth_id') == md5($old_name))
			{
				$sql_13_2 = "UPDATE ". ESCROW_PAYMENT_MASTER
						.	" SET "
						.	" to_user_login_id     = '". $name. "',"
						.	" to_user_auth_id	   = '". md5($name). "'"
						.	" WHERE ep_id = '". $db1->f('ep_id'). "' ";
				$db2->query($sql_13_2);
			}
		}	
		$db->free();
		$db1->free();
		$db2->free();
		
		#######################################################################################
		################# 			 UPDATE MESSAGE BOARD MASTER				###############
		#######################################################################################
		
		$sql_14 =  "SELECT * FROM ". MESSAGE_BOARD_MASTER
			. 	" WHERE sender_auth_id  = '".md5($old_name). "' OR receiver_auth_id = '".md5($old_name). "'";
		$db1->query($sql_14);

		while($db1->next_record())
		{
			if($db1->f('sender_auth_id') == md5($old_name))
			{
				$sql_14_1 = "UPDATE ". MESSAGE_BOARD_MASTER
						.	" SET "
						.	" sender_login_id      = '". $name. "',"
						.	" sender_auth_id	   = '". md5($name). "'"
						.	" WHERE message_id	   = '". $db1->f('message_id'). "' ";
				$db->query($sql_14_1);
			}
			if($db1->f('to_user_auth_id') == md5($old_name))
			{
				$sql_14_2 = "UPDATE ". MESSAGE_BOARD_MASTER
						.	" SET "
						.	" receiver_login_id    = '". $name. "',"
						.	" receiver_auth_id	   = '". md5($name). "'"
						.	" WHERE message_id	   = '". $db1->f('message_id'). "' ";
				$db2->query($sql_14_2);
			}
		}	
		$db->free();
		$db1->free();
		$db2->free();
		
		#######################################################################################
		################# 			 UPDATE PRIVATE MESSAGE MASTER				###############
		#######################################################################################
		
		$sql_16 =  "SELECT * FROM ". PRIVATE_MESSAGE_MASTER
			. 	" WHERE sender_auth_id  = '".md5($old_name). "' OR recevier_auth_id = '".md5($old_name). "'";
		
		$db1->query($sql_16);

		while($db1->next_record())
		{
			if($db1->f('sender_auth_id') == md5($old_name))
			{
				$sql_16_1 = "UPDATE ". PRIVATE_MESSAGE_MASTER
						.	" SET "
						.	" sender_login_id      = '". $name. "',"
						.	" sender_auth_id	   = '". md5($name). "'"
						.	" WHERE pm_id	 	   = '". $db1->f('pm_id'). "' ";
				$db->query($sql_16_1);
			}
			
			if($db1->f('recevier_auth_id') == md5($old_name))
			{
				$sql_16_2 = "UPDATE ". PRIVATE_MESSAGE_MASTER
						.	" SET "
						.	" recevier_login_id    = '". $name. "',"
						.	" recevier_auth_id	   = '". md5($name). "'"
						.	" WHERE pm_id		   = '". $db1->f('pm_id'). "' ";
				$db2->query($sql_16_2);
			}
		}	
		$db->free();
		$db1->free();
		$db2->free();
		
		#######################################################################################
		################# 			 UPDATE PRIVATE MESSAGE MASTER				###############
		#######################################################################################
		
		$sql_17 =  "SELECT * FROM ". project_MASTER
			. 	" WHERE auth_id_of_post_by  = '".md5($old_name). "' OR auth_id_of_post_to = '".md5($old_name). "'";
		$db1->query($sql_17);

		while($db1->next_record())
		{
			if($db1->f('auth_id_of_post_by') == md5($old_name))
			{
				$sql_17_1 = "UPDATE ". project_MASTER
						.	" SET "
						.	" project_posted_by       = '". $name. "',"
						.	" auth_id_of_post_by	  = '". md5($name). "'"
						.	" WHERE project_id	 	  = '". $db1->f('project_id'). "' ";
				$db->query($sql_17_1);
			}
			if($db1->f('auth_id_of_post_to') == md5($old_name))
			{
				$sql_17_2 = "UPDATE ". project_MASTER
						.	" SET "
						.	" project_post_to        = '". $name. "',"
						.	" auth_id_of_post_to     = '". md5($name). "'"
						.	" WHERE project_id		 = '". $db1->f('project_id'). "' ";
				$db2->query($sql_17_2);
			}
		}	
		$db->free();
		$db1->free();
		$db2->free();
		#######################################################################################
		################# 			    	UPDATE AUTH MASTER					###############
		#######################################################################################
		$sql =  "SELECT * FROM ". AUTH_USER
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db->query($sql);
		$db->next_record();
		if($db->f('user_login_id') == $old_name)
		{
			$sql = 	"UPDATE ". AUTH_USER
				.	" SET "
				.	" user_login_id	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db->f('user_auth_id'). "' ";
			
			$db->query($sql);
		}
		$db->free();
		#######################################################################################
		################# 				UPDATE MEMBER MASTER					###############
		#######################################################################################
		$sql_1 =  "SELECT * FROM ". MEMBER_MASTER
			. 	" WHERE user_auth_id  = '". md5($old_name). "'";
		$db1->query($sql_1);
		$db1->next_record();
		if($db1->f('user_login_id') == $old_name)
		{
			$sql = 	"UPDATE ". MEMBER_MASTER
				.	" SET "
				.	" user_login_id	          = '". $name. "',"
				.	" user_auth_id	          = '". md5($name). "'"
				.	" WHERE user_auth_id = '". $db1->f('user_auth_id'). "' ";
			
			$db1->query($sql);

			$sql_1_1 =  "SELECT * FROM ". AUTH_USER
			. 	" WHERE user_auth_id  = '". md5($name). "'";
			
			$db2->query($sql_1_1);
			$db2->next_record();
			
			if($db2->f('user_login_id') == $name)
			{
				global $mail2,$emails;
				$mail2 = '';
				$mail2 = new htmlMimeMail();
		
				$tpl2 = new Smarty;
				$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
				$sendinfo = $emails->GetEmailDetails1(TAC_UPDATES);
				
				$mail2->setFrom($sendinfo->email_adress);
				
				$mail2->setSubject($sendinfo->email_subject);
		
				$tpl2->assign(array(
										"fname"			=>	$db1->f('mem_fname'),
										"lname"			=>	$db1->f('mem_lname'),
										"new_user_id"	=>	$name,
										"password"		=>	$db2->f('user_passwd1'),
								));
		
			$mail_content_reg = $tpl2->fetch("email_template:".TAC_UPDATES);	
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
				
				//$send_to = $db2->f('user_login_id');
				
				$send_to = "niyatipatel2005@gmail.com";
				$result = $mail2->send(array($send_to));
			}	
			$db1->free();
			$db2->free();
		}
	}
	
	function GetMemberDetails($mail_id)
	{
	  global $db;
		$sql =  "SELECT * FROM ". MEMBER_MASTER." AS MM"
	        .	" LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
			. 	" WHERE MM.user_auth_id  = '". $mail_id. "'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

}
?>