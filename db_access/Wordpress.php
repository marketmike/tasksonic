<?php
class Wordpress
{
	function Wordpress()
	{}
	
	function All_User_Deatils()
    {
       global $db;
	   $sql = " SELECT * FROM ".AUTH_USER." AS AU "
	          ." LEFT JOIN ".MEMBER_MASTER." AS MM ON AU.user_auth_id = MM.user_auth_id "
			  ." WHERE MM.user_auth_id != '' ";
	   $db->query($sql);
	}	
	
	function Insert($user_login,$user_pass,$user_email,$url)
	{
		 global $db2;
	 
		 if($url == '')
		 {
			$user_url = "http://";
		 }
		 else
		 {
			$user_url = $url;
		 }
	 
	 
		 $sql = "INSERT INTO ".WP_USERS
				."(user_login,user_pass,user_nicename,user_email,user_url,user_registered,user_activation_key,user_status,display_name)"
				." VALUES ("
				." '".$user_login."' ,"
				." '".$user_pass."' ,"
				." '".$user_login."' ,"
				." '".$user_email."' ,"
				." '".$user_url."' ,"
				." now() ,"
				." '' ,"
				." '0' ,"
				." '".$user_login."' "
				." )";
		$db2->query($sql);
		return $db2->sql_inserted_id();
	}
	
	function Insert_MetaUser($id,$meta_key,$meta_value)
	{
    	global $db1;
 
		$sql="INSERT INTO ".WP_USERMETA."(user_id,meta_key,meta_value)"
			." VALUES("
			." '".$id."', "
			." '".$meta_key."', "
			." '".$meta_value."' "
			.")" ;
		$db1->query($sql);
		$db1->free();
	}
	
	function GetBolgs()
	{
	   global $db;
	   $sql = " SELECT * FROM ".WP_POSTS." AS WPP"
	          ." LEFT JOIN ".WP_USERS." AS WPU ON WPP.post_author = WPU.ID " 
			  ." WHERE WPP.post_parent = '0' ORDER BY WPP.post_modified DESC LIMIT 0,9";
	   $db->query($sql);
	}
}
?>	