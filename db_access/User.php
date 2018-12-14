<?php
class User
{

	var $User_Id	=	'';
    var $User_Name	=	'';
    var $User_Perm	=	'';
   	#====================================================================================================
	#	Function Name	:   User
	#	Purpose			:	Constructor
	#	Return			:	None
	#	Creation Date	:	18-August-2005
	#----------------------------------------------------------------------------------------------------
    function User()
    {
		if(isset($_SESSION['User_Id']))
	    {
		#print user;
			$this->User_Id       =   $_SESSION['User_Id'];
	        $this->User_Name     =   $_SESSION['User_Name'];
	        $this->User_Perm     =   $_SESSION['User_Perm'];
			$this->User_Email    =   $_SESSION['User_Email'];
			if(DEBUG)
            {
            	print '<br>User Id :  '. 	$this->User_Id;
	        	print '<br>User Name: '.	$this->User_Name;
	        	print '<br>User Perm: '. 	$this->User_Perm;
            }

	        switch($this->User_Perm)
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

	            case USER:
				#	print defined("IN_SITE")."=".defined("HOME_PAGE")."=".defined("NOLOGIN")."=".defined("POPUP_WINDOW");
					if(!defined("IN_USER")&&!defined("POPUP_WINDOW")&&!defined("HOME_PAGE")&&!defined("NOLOGIN"))
	                {

						$path_parts = pathinfo($_SERVER['PHP_SELF']);
						$_SESSION['prev_file_path'] = $_SERVER["PHP_SELF"];
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
	            header('location: '. $virtual_path['User_Root']. 'logout.php?ref=http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
	        elseif($path_parts["basename"] != 'login.php' && defined("IN_USER"))
			{
				header('location: '. $virtual_path['Site_Root']. 'logout.php?ref=http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
			}

	        $this->User_Id       =   '';
	        $this->User_Name     =   '';
	        $this->User_Perm     =   '';
	    }
		
	}
   	#====================================================================================================
	#	Function Names	:   Check_FB_ID, IsValidFBLogin
	#	Purpose			:	Facebook Connect Integration
	#	Created by		:	Michael Gurczynski
	#	Creation Date	:	28-March-2011
	#----------------------------------------------------------------------------------------------------
	#This function added to detect if facebook user id is already associated with a registered account (Added by Mike G on March 28th 2011
	function Check_FB_ID($fbid)
	{
		global $db;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE fbid  = '". $fbid. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	#END above function added to detect if facebook user id is already associated with a registered account	
	# This function added to retrieve a matching facebook email from the member_masters table
	function Check_fbEmail($fbemail)
	{
		global $db;
	    $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE mem_email  = '". $fbemail. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	# End function added to retrieve a matching facebook email from the member_masters table
	
	// login facebook user if their facebook id is already associated with a local account 
		function IsValidFBLogin($fbid){
			global $db,$db1,$db2;
			$status = '1';
			$sql =  "SELECT * FROM ". AUTH_USER
				. 	" WHERE fbid  = '". $fbid . "' "
				.	" AND user_status = '". $status ."' AND user_type = 'User'";
			$db->query($sql);
			if($db->num_rows() > 0)
			{
			$db->next_record();
			$times_logged_in	=	$db->f('times_logged_in') + 1;
			$_SESSION['User_Id']	=	$db->f('user_auth_id');
			$_SESSION['User_Name']	=	$db->f('user_login_id');
		
			$sql_update	=	"UPDATE ". AUTH_USER." SET "
							.	" last_login_date = '".date('Y-m-d')."' ,"
							.	" times_logged_in = '".$times_logged_in."' "	
						.	" WHERE user_auth_id  = '". $_SESSION['User_Id'] . "' ";
			$db1->query($sql_update);
				///////////////////////////////////////////////////////////////////////
				$sql_member =  "SELECT * FROM ". MEMBER_MASTER ." AS MM "
				    .   " LEFT JOIN ".MEMBERSHIP_PLAN_MASTER." AS MPM ON MM.membership_id = MPM.membership_id"
					. 	" WHERE MM.user_auth_id  = '". $_SESSION['User_Id'] . "' ";
				$db2->query($sql_member);
				$db2->next_record();	
				$_SESSION['First_Name']			=	$db2->f('mem_fname');				
				$_SESSION['Membership_Name']	=	$db2->f('membership_name');
				$_SESSION['Buy_Date']			=	$db2->f('membership_buy_date');
				$_SESSION['Finished_Date']		=	$db2->f('membership_finish_date');
				
				///////////////////////////////////////////////////////////////////////	
				return true;			
			}else{
			$_SESSION['login_error'] = 5;
			}
		}
	// End login facebook user if their facebook id is already associated with a local account
	// Insert facebook id into auth_users table if an matching email is found in member master then login the user
		function AssociateFBLogin($fbemail, $fbid){
			global $db,$db1,$db2,$db3,$user;
			$status = '1';
			$sql =  "SELECT * FROM ". MEMBER_MASTER
				. 	" WHERE mem_email  = '". $fbemail . "' ";
			$db->query($sql);
			if($db->num_rows() > 0)
			{
			$db->next_record();
				$auth_user_id	=	$db->f('user_auth_id');
				$check_status = $user->check_status($auth_user_id);
				if(check_status == 1){
				$_SESSION['login_error'] = 5;
				}else{
				$_SESSION['User_Id']	=	$db->f('user_auth_id');
				$_SESSION['User_Name']	=	$db->f('user_login_id');
			
				$fbid_update	=	"UPDATE ". AUTH_USER." SET "
							.	" fbid = '".$fbid."' "
							.	" WHERE user_auth_id  = '". $_SESSION['User_Id'] . "' ";
				$db1->query($fbid_update);
				
				$sql_update	=	"UPDATE ". AUTH_USER." SET "
							.	" last_login_date = '".date('Y-m-d')."' "
							.	" WHERE user_auth_id  = '". $_SESSION['User_Id'] . "' ";
				$db2->query($sql_update);
								
				}
			}
		}
	// Insert facebook id into auth_users table if an matching email is found in member master then login the user

			# Check to make sure status is active 1
			function check_status($auth_user_id){
			global $db;
			$status = '1';
			$sql_check =  "SELECT * FROM ". AUTH_USER
				. 	" WHERE user_auth_id  = '". $auth_user_id . "' "
				.	" AND user_status = '". $status ."' AND user_type = 'User'";
				$db->query($sql_check);;
				if($db->num_rows() > 0)
				{
					return 0;
				}
				return 1;
			}				
	
   	#====================================================================================================
	#End Facebook Connect Functions
   	#====================================================================================================
	
/// validation....
	function IsValidLogin($username, $password, $status)
	{
		global $db,$db1,$db2;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_auth_id  = '". md5($username) . "' "
			.	" AND user_status = '". $status ."' AND user_type = 'User'";
		$db->query($sql);
	    if($db->num_rows() > 0)
	    {
	        $db->next_record();
	        if($db->f('user_passwd') == md5($password))
            {
				$times_logged_in	=	$db->f('times_logged_in') + 1;
				$_SESSION['User_Id']	=	$db->f('user_auth_id');
	            $_SESSION['User_Name']	=	$db->f('user_login_id');				
			
				$sql_update	=	"UPDATE ". AUTH_USER." SET "
							.	" last_login_date = '".date('Y-m-d')."' ,"
							.	" times_logged_in = '".$times_logged_in."' "							
							.	" WHERE user_auth_id  = '". $_SESSION['User_Id'] . "' ";
				$db1->query($sql_update);
				
				///////////////////////////////////////////////////////////////////////
				$sql_member =  "SELECT * FROM ". MEMBER_MASTER ." AS MM "
				    .   " LEFT JOIN ".MEMBERSHIP_PLAN_MASTER." AS MPM ON MM.membership_id = MPM.membership_id"
					. 	" WHERE MM.user_auth_id  = '". md5($username) . "' ";
				$db2->query($sql_member);
				$db2->next_record();	
				$_SESSION['First_Name']			=	$db2->f('mem_fname');				
				$_SESSION['Membership_Name']	=	$db2->f('membership_name');
				$_SESSION['Buy_Date']			=	$db2->f('membership_buy_date');
				$_SESSION['Finished_Date']		=	$db2->f('membership_finish_date');
				
				///////////////////////////////////////////////////////////////////////
				return true;
				
	         }
	        return false;
	      }
	    return false;
	}
	
	################################################################################################################
	# Function		: is_verfied($username)
	# Purpose		: This function is used to check if user has verified their email yet
	################################################################################################################
	
		function is_verfied($username){
			global $db,$db1,$db2;
			$sql =  "SELECT * FROM ". AUTH_USER
				. 	" WHERE user_auth_id  = '". md5($username) . "' AND email_verified  = 1";		
			$db->query($sql);
			if($db->num_rows() > 0)
			{
				return 1;
			}
			return 0;
		}			
	################################################################################################################
	# Function		: is_first_logon($username)
	# Purpose		: This function is used to check if user has verified their email yet
	################################################################################################################
	
		function is_first_logon($username){
			global $db,$db1,$db2;
			$sql =  "SELECT * FROM ". AUTH_USER
				. 	" WHERE user_auth_id  = '". md5($username) . "' AND times_logged_in  = 1";			
			$db->query($sql);
			if($db->num_rows() > 0)
			{
				return 1;
			}
			return 0;
		}	

	function resend_verification_code($verify_email)
	{
	  global $db;
		$sql =  "SELECT * FROM ". MEMBER_MASTER." AS MM"
	        .	" LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
			. 	" WHERE MM.mem_email  = '". $verify_email. "'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

		
	################################################################################################################
	# Function		: Check_User_ID($username)
	# Purpose		: This function is used to check user id exist or not in database
	# Return		: 0 or 1 depending on condition
	# Used At 		: viewtask_ownerprofile.php,escrow.php,forgotpasswd.php,signup.php
	# Parameters	
	# 1. $username =>  user id
	################################################################################################################

	function Check_User_ID($username)
	{
		global $db;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_login_id  = '". $username. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
		
	function Check_User_Exist($username)
	{
		global $db;
		$sql = "SELECT * FROM ".AUTH_USER
			  ." WHERE user_login_id = '".$username."' ";
		$db->query($sql);
		$cnt = $db->num_rows();
		//print $cnt;die;
		if($cnt > 0 )
			return false;
		else
			return true;
	}
	
	function Check_Email_ID($emails)
	{
		global $db;
	    $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE mem_email  = '". $emails. "' ";
		
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return false;
	    }
	    return true;
	}


	function Signup($post,$verify_code,$user_name)
	{
		global $db,$db1;
		$sql = "INSERT INTO ".AUTH_USER
			." (fbid,user_auth_id,user_login_id,user_passwd,user_passwd1,user_type,user_activation_code,user_status,fb_publish,invitation_id,signup_date
				) "
			." VALUES ("
			." '".$post['fbid']."' ,"			
			." '".md5($user_name)."' ,"
			." '".$user_name."' ,"
			." '".md5($post['password'])."' ,"
			." '".$post['password']."' ,"
			." 'User' ,"
			." '".$verify_code."' ,"
			." '1' ,"			
			." '".(int)$post['fb_publish']."' ,"
			." '".$post['invitation_id']."' ,"			
			." '".date('Y-m-d')."' )";			
		$db->query($sql);
		$db->free();

		if($post['cat_prod'] == '')
		{
			$selected_catagory = $post['cat_prod'];
		}    
		else
		{
			$selected_catagory = implode(",",$post['cat_prod']);
		}

		$sql = "INSERT INTO ".MEMBER_MASTER
			." (user_auth_id,user_login_id,mem_fname,mem_lname,mem_company,mem_city,mem_state,mem_country,
				mem_phone,mem_mobile,mem_email,mem_address,mem_zip_code,mem_category,mem_pro_notice,mem_option,mem_as_buyer,
				mem_as_seller,newsletter,special_user,special_user_start_date) "
			." VALUES ("
			." '".md5($user_name)."' ,"
			." '".$user_name."' ,"
			." '".$post['mem_fname']."' ,"
			." '".$post['mem_lname']."' ,"
			." '".$post['mem_company']."' ,"
			." '".$post['mem_city']."' ,"
			." '".$post['mem_state']."' ,"
			." '".$post['mem_country']."' ,"
			." '".$post['mem_phone']."' ,"
			." '".$post['mem_mobile']."' ,"
			." '".$post['mem_email']."'," 
			." '".$post['mem_address']."'," 
			." '".$post['mem_zipcode']."'," 
			." '".$selected_catagory. "',"
			." '".$post['project_notices']. "',"
			." '".$post['check']. "',"
			." '".(int)$post['check_buyer']. "',"
			." '".(int)$post['check_seller']. "',"
			." '".(int)$post['newsletter']."' ,"			
			." '1',"
			." '".date('Y-m-d'). "')";
		$db->query($sql);
		$db->free();
		}
	
	function Insert_Affilation($aff_user,$user_name)
	{
		global $db1;
		$sql = "INSERT INTO ".AFFILATION_MASTER
			." (ref_by_auth_id,ref_by_login_id,affilated_auth_id,affilated_login_id,signup_date,signup_datetime)"
			." VALUES ("
			." '".md5($aff_user)."' ,"
			." '".$aff_user."' ,"
			." '".md5($user_name)."' ,"
			." '".$user_name."' ,"
			." '".date('Y-m-d'). "' ,"
			." '".date('m/d/y \a\t H:i T')."')";
		$db1->query($sql);
		$db1->free();
	}	
	function getUserDetails($userid)
	{

		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER
			  ." WHERE user_auth_id  = '".$userid."'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function getauthUserDetails($userid)
	{

		global $db;
		$sql = " SELECT * FROM ".AUTH_USER
			  ." WHERE user_auth_id  = '".$userid."'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function check_invite_code($userid)
	{
		global $db;
		$sql = " SELECT * FROM ".AUTH_USER
			  ." WHERE invitation_rewarded = 0 AND user_auth_id  = '".$userid."'";
		   $db->query($sql);	
		   $db->next_record();
		   return($db->f('invitation_id'));
	}
	function invite_reward_paid($user_auth_id)
	{
		global $db;
		$sql = " UPDATE ".AUTH_USER
			 . " SET invitation_rewarded  = '1' "
			 . " WHERE user_auth_id ='". $user_auth_id. "'";
		
		return ($db->query($sql));
	}	
	function ForgotFromEmail($mem_email,$user_id)
	{
		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER
			  ." WHERE mem_email  = '".$mem_email."' AND user_auth_id='".md5($user_id)."'";

		$db->query($sql);
		$cnt = $db->num_rows();
		if($cnt == 0)
			return 0;
		else
			return 1;
	}
	
	
	function ForgetUpdatePass($user_login_id,$user_password)
	{
		global $db;
		$sql = 	"UPDATE ". AUTH_USER
			.	" SET "
			.	" user_passwd	          = '".md5($user_password). "'"
			.	" WHERE user_auth_id 	  = '". $user_login_id. "'";
			
		$db->query($sql);
		return ($db->query($sql));
	}

	function CheckOldPassword($userid,$old_password)
	{
		global $db;
		$sql = " SELECT * FROM ".AUTH_USER
			  ." WHERE user_auth_id  = '".$userid."'";
		$db->query($sql);
		$db->next_record();
		if($db->f('user_passwd') == md5($old_password))
			return 1;
		else
			return 0;
	}
	

	function Destroy()
	{
		session_unregister($_SESSION['User_Id']);
	    session_unregister($_SESSION['User_Name']);
	    session_unregister($_SESSION['User_Email']);
	    session_unregister($_SESSION['User_Perm']);
		session_unregister($_SESSION['Membership_Name']);
		session_unregister($_SESSION['Buy_Date']);
		session_unregister($_SESSION['Finished_Date']);
		session_unregister($_SESSION['Member_As_Buyer']);
		session_unregister($_SESSION['Member_As_Seller']);

	    @session_unset();
	    @session_destroy();
		
		$_SESSION['prev_file_path'] = $_SERVER['SCRIPT_NAME'];
        return true;
	}
	
	function Get_Password($username)
	{
		global $db;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_login_id  = '". $username. "' ";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function Get_Phone($username)
	{
		global $db;
	    $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE user_login_id  = '". $username. "' ";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function Get_Phone_By_ID($userID)
	{
		global $db;
	    $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE user_auth_id  = '". $userID. "' ";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	################################################################################################################
	# Function		: UserInfo($user_id)
	# Purpose		: This function is used to get details from particular ID
	# Return		: object
	# Used At 		: changepasswd.php
	# Parameters	
	# 1. $auth_id =>  member id
	################################################################################################################
	function UserInfo($user_id)
	{
	   global $db; 
	   $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_auth_id  = '". $user_id. "' ";
	   $db->query($sql);
	   
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
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
	
	function GetUserComplete($auth_id)
	{

		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER." AS MM"
		      ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
		      ." LEFT JOIN ".STATE_MASTER." AS SM ON MM.mem_state = SM.state_id"			  
			  ." LEFT JOIN ".PROFILE_MASTER." AS PM ON MM.user_auth_id = PM.user_auth_id"
			  ." LEFT JOIN ".YEAR_EXPERIENCE." AS YE ON PM.seller_exp = YE.year_expe_id"
			  ." WHERE MM.user_auth_id  = '".$auth_id."'";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	
	################################################################################################################
	# Function		: UpdateMemberDetails($post)
	# Purpose		: This function is used to update details
	# Return		: none
	# Used At 		: edit_userinfo.php
	# Parameters	
	# 1. $post =>  array of post
	################################################################################################################
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
			." mem_company   		 = '".$post['mem_company']. "',"
			." mem_employes    		 = '".$post['mem_emp']. "',"
			." mem_phone     		 = '".$post['mem_phone']. "',"
			." mem_mobile    		 = '".$post['mem_mobile']. "',"
			." mem_address    		 = '".$post['mem_address']. "',"
			." mem_zip_code          = '".$post['mem_zip']. "',"
			." mem_fax_no         	 = '".$post['mem_fax_no']. "',"
			." mem_website    		 = '".$post['mem_website']. "',"
			." mem_as_buyer    		 = '".(int)$post['check_buyer']. "',"
			." mem_as_seller    	 = '".(int)$post['check_seller']. "',"	
			." newsletter    	 	 = '".(int)$post['newsletter']. "',"				
			." mem_category    		 = '".$selected_catagory. "',"
			." mem_pro_notice    	 = '".$post['project_notices']. "',"
			." mem_option    		 = '".$post['check']. "'"
			." WHERE user_auth_id  	 = '".$_SESSION['User_Id']. "' ";
	   
		$db->query($sql);
		$db->free();
	   
	   $sql =  "UPDATE ". AUTH_USER
	        ." SET "
			." fb_publish   		= '".(int)$post['fb_publish']. "'"
			." WHERE user_auth_id  	 = '".$_SESSION['User_Id']. "' ";
	   
		$db->query($sql);
		$db->free();	   
	}

	################################################################################################################
	# Function		: UpdatePassUser($user_auth_id,$old_password,$user_password)
	# Purpose		: This function is used to update password
	# Return		: value according to condition
	# Used At 		: changepasswd.php
	# Parameters	
	# 1. $user_auth_id =>  user auth id
	# 2. $old_password =>  old password
	# 3. $user_password =>  new password
	################################################################################################################
	function UpdatePassUser($user_auth_id,$old_password,$user_password)
	{
		global $db;
		$sql =  "SELECT user_passwd,user_login_id "
			.   " FROM ". AUTH_USER
			. 	" WHERE user_auth_id  = '". $user_auth_id. "'";

		if(DEBUG)

			$this->__debugMessage($sql);

		$db->query($sql);
		$db->next_record();

		if($db->f('user_passwd') == md5($old_password))
		{
			$sql = 	"UPDATE ". AUTH_USER
				.	" SET "
				.	" user_passwd	          = '". md5($user_password). "',"
				.	" user_passwd1 	          = '". $user_password. "'"
				.	" WHERE user_auth_id = '". $user_auth_id. "'";

			$db->query($sql);
			
		return true;
		}
		return false;
	}
	function Set_User_Email_Verification($user_auth_id)
	{
		  global $db;
		  $sql = 	"UPDATE ". AUTH_USER
					.	" SET "
					.	" user_status 	          = '1' "
					.	" WHERE user_auth_id = '". $user_auth_id. "'";
	
		$db->query($sql);
   }
 	function Set_Phone_Verification($user_auth_id)
	{
		  global $db;
		  $sql = 	"UPDATE ". AUTH_USER
					.	" SET "
					.	" human_verified 	          = '1' "
					.	" WHERE user_auth_id = '". $user_auth_id. "'";
	
		$db->query($sql);
   }
 	function Remove_Phone_Verification($user_auth_id)
	{
		  global $db;
		  $sql = 	"UPDATE ". AUTH_USER
					.	" SET "
					.	" human_verified 	          = '0' "
					.	" WHERE user_auth_id = '". $user_auth_id. "'";
	
		$db->query($sql);
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
	function GetCondition($page_id)
	{
	  global $db;
		$sql =  "SELECT * "
			.   " FROM ". PAGE_MASTER
			. 	" WHERE page_id  = '". $page_id. "'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	################################################################################################################
	# Function: checkFileType($file)
	# Purpose: It checks File Type for its validity (Only MP3 file allowed)
	# Return: It returns TRUE if File Type is valid otherwise it returns false
	# Parameters: 
	# 1. $file => File Type that we need to check
	################################################################################################################
	function checkFileType($file)
	{
		if(preg_match("/(.jpg|.jpeg|.gif|.JPG|.GIF|.JPEG)$/",$file))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function checkUserName_No($username)
		{
			if(preg_match("/^[0-9]+$/",$username))
			{
				return true;
				
			}
			else
			{
				return false;
			}
		}
	function checkUserName($username)
		{
			if(preg_match("/^[a-zA-Z][a-zA-Z0-9_]+$/",$username))
			{
				return true;
				
			}
			else
			{
				return false;
			}
		}	
	################################################################################################################
	# Function: checkUserEmail($useremail)
	# Purpose: It checks user email address for its validity
	# Return: It returns TRUE if user email address is valid otherwise it returns false
	# Parameters: 
	# 1. $useremail => User email address that we need to check
	################################################################################################################
	function checkUserEmail($useremail)
	{
		if(preg_match("/^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/",$useremail))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	function Get_Password_New($email)
	{
		global $db;
		$sql =  "SELECT * FROM ". MEMBER_MASTER." AS MM"
	        .	" LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
			. 	" WHERE MM.mem_email  = '".$email. "'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function Get_Username_New($email)
	{
		global $db;
		$sql =  "SELECT * FROM ". MEMBER_MASTER." AS MM"
	        .	" LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
			. 	" WHERE MM.mem_email  = '".$email. "'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	
	function Check_Email_ID_New($emails)
	{
		global $db;
	    $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE mem_email  = '". $emails. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	
	function Profile()
	{
	  global $db;
	  $sql = "select * from profile1_master";
	  $db->query($sql);
	  return ($db->fetch_array());
	}
	
	function LastRecord_of_member()
	{
	  global $db;
	  $sql = "SELECT mem_id FROM member_master ORDER BY mem_id DESC LIMIT 1 ";
	  $db->query($sql);
	  $mem_id = $db->fetch_array();
	  return($mem_id);
	}
	
	function getUserWalletSum($userid)
	{
		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER
			  ." WHERE user_login_id  = '".$userid."'";
			  
			  
		$db->query($sql);
		
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
}
?>