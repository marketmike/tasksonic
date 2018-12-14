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

	            header('location: '. $virtual_path['User_Root']. 'logout.php');

	        else if($path_parts["basename"] != 'login.php' && defined("IN_USER"))

	            header('location: '. $virtual_path['User_Root']. 'logout.php');



	        $this->User_Id       =   '';
	        $this->User_Name     =   '';
	        $this->User_Perm     =   '';
	    }
		
		
	}

/// validation....
	function IsValidLogin($username, $password, $status)
	{
		global $db,$db1,$db2;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_auth_id  = '". md5($username) . "' "
			.	" AND user_status = '". $status ."'";
		$db->query($sql);
	    if($db->num_rows() > 0)
	    {
	        $db->next_record();
	        if($db->f('user_passwd') == md5($password))
            {
	            $_SESSION['User_Id']		=	$db->f('user_auth_id');
	            $_SESSION['User_Name']		=	$db->f('user_login_id');

				$sql_update	=	"UPDATE ". AUTH_USER." SET "
							.	" last_login_date = '".date('Y-m-d')."' "
							.	" WHERE user_auth_id  = '". $_SESSION['User_Id'] . "' ";
				$db1->query($sql_update);
				return true;
            }
	        return false;
	    }
	    return false;
	}

	function Check_User_ID($username)
	{
		global $db;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_login_id  = '". $username. "' ";
	//	print $sql;	
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}

	function Check_Email_ID($emails)
	{
		global $db;
	    $sql =  "SELECT * FROM ". MEMBER_MASTER
            . 	" WHERE mem_email  = '". $emails. "' ";
	//	print $sql;	
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}


	function Signup($post)
	{
		global $db;
		$sql = "INSERT INTO ".AUTH_USER
			." (user_auth_id,user_login_id,user_passwd,user_passwd1,user_type,user_status) "
			." VALUES ("
			." '".md5($post['user_id'])."' ,"
			." '".$post['user_id']."' ,"
			." '".md5($post['password'])."' ,"
			." '".$post['password']."' ,"
			." 'User' ,"
			." '1' )";
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
			." (user_auth_id,user_login_id,mem_fname,mem_lname,mem_city,mem_state,mem_country,mem_email,mem_category,mem_pro_notice,mem_option) "
			." VALUES ("
			." '".md5($post['user_id'])."' ,"
			." '".$post['user_id']."' ,"
			." '".$post['mem_fname']."' ,"
			." '".$post['mem_lname']."' ,"
			." '".$post['mem_city']."' ,"
			." '".$post['mem_state']."' ,"
			." '".$post['mem_country']."' ,"
			." '".$post['mem_email']."'," 
			." '".$selected_catagory. "',"
			." '".$post['project_notices']. "',"
			." '".$post['check']. "')";
		$db->query($sql);
	}
	
	function getUserDetails($userid)
	{

		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER
			  ." WHERE user_auth_id  = '".$userid."'";

		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
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
	    @session_unset();
	    @session_destroy();
//		setcookie('User_Id',"",time() - 1);
//	    setcookie('User_Name',"",time() - 1);
	    return true;
	}
	
	function Get_Password($username)
	{
		global $db;
	    $sql =  "SELECT * FROM ". AUTH_USER
            . 	" WHERE user_login_id  = '". $username. "' ";
		//	print $sql;
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
	################################################################################################################
	# Function		: UpdateMemberDetails($post)
	# Purpose		: This function is used to update details
	# Return		: none
	# Used At 		: account.php
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
			." WHERE user_auth_id  	 = '".$_SESSION['User_Id']. "' ";
	   $db->query($sql);
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
		$sql =  "SELECT user_passwd "
			.   " FROM ". AUTH_USER
			. 	" WHERE user_auth_id  = '". $user_auth_id. "'";
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
	
/*	function GetEmailAddress($mail_id)
	{
	  global $db;
		$sql =  "SELECT * "
			.   " FROM ". MEMBER_MASTER
			. 	" WHERE user_auth_id  = '". $mail_id. "'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
*/	
	function GetUserStatus($user_auth_id)
	{
		  global $db;
		$sql =  "SELECT * "
			.   " FROM ". AUTH_USER
			. 	" WHERE user_auth_id  = '". $user_auth_id. "'";
		$db->query($sql);
		$db->next_record();
		if($db->f('user_status') == 0)
		{
			$this->Destroy();
			header("location: login.php");	
			exit();
		}
		else
		{
		}
	}
}
?>