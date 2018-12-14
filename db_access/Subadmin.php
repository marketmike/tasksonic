<?php
class Subadmin
{
	function Subadmin()
	{}
	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".AUTH_USER
				. " WHERE user_type = 'Subadmin' ";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
	
		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
	
		$sql= " SELECT * FROM ".AUTH_USER
			. " WHERE user_type = 'Subadmin' "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}

	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".AUTH_USER
			." (user_auth_id,user_login_id,user_passwd,user_passwd1,user_type,user_activation_code,user_status,last_login_date) "
			." VALUES ('".md5($post['user_login_id'])."' ,"
			." '".$post['user_login_id']."' ,"
			." '".md5($post['user_passwd'])."' ,"
			." '".$post['user_passwd']."' ,"
			." 'Subadmin' ,"
			." '' ,"
			." '1' ,"
			." '' "
			."  )";
		$db->query($sql);
	}

	function GetExecutionTime($exe_id)
	{
		global $db;
		$sql="SELECT * FROM ".EXECUTION_TIME
			." WHERE exe_id = ".$exe_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

	function Update($post)
	{
		global $db;
		$sql="UPDATE ".EXECUTION_TIME
			." SET exe_name	='".$post['exe_name']."'"
			." WHERE exe_id	=	".$post['exe_id'];
		return($db->query($sql));
	}

	function Delete($user_auth_id)
	{
		global $db;
		$sql="DELETE FROM ".AUTH_USER
			." WHERE user_auth_id= '".$user_auth_id."' ";
		return($db->query($sql));
	}

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
	
}
?>