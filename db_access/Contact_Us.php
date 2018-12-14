<?php
class Contact
{
	function Contact()
	{}
	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".CONTACT_MASTER;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".CONTACT_MASTER ." ORDER BY date ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	
   	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".CONTACT_MASTER
			." (sender_id,user_name,user_email,contact_subject,contact_reason,contact_message,date) "
			." VALUES ('".$post['User_Id']."' ,"
			." '".$post['user_name']."' ,"
			." '".$post['user_email']."' ,"			
			." '".$post['contact_subject']."' ,"			
			." '".$post['contact_reason']."' ,"
			." '".$post['contact_message']."' ,"
			." '".date('m/d/y \a\t H:i T')."' "
			."  )";
		$db->query($sql);
	}
   #===============================================================================================
   # This function is used for getting country details 
   # User Side & Admin Side
   #===============================================================================================   

	function GetContact($contact_id)
	{
		global $db;
		$sql="SELECT * FROM ".CONTACT_MASTER
			." WHERE contact_id=".$contact_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
   #===============================================================================================
   # This function is used for updateing country details for particular Country Id
   # Admin Side
   #===============================================================================================   

	function Update($post)
	{
		global $db;
		$sql="UPDATE ".CONTACT_MASTER
			." SET status	='".(int)$post['status']."' ,"
			." action_taken	='".$post['action_taken']."' "
			." WHERE contact_id 	=".$post['contact_id'];
		return($db->query($sql));
	}	
   #===============================================================================================
   # This function is used for deleting country details for particular Country Id
   # Admin Side
   #===============================================================================================   
	function Delete($contact_id)
	{
		global $db;
		$sql="DELETE FROM ".CONTACT_MASTER
			." WHERE contact_id=".$contact_id;
		return($db->query($sql));
	}
	
}
?>