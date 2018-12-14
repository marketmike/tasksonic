<?php
class Email
{
   function Email()
   {
   }
   function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".EMAIL_CONFIG ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".EMAIL_CONFIG." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
   function Insert($post)
   {
       global $db;
	   $sql="INSERT INTO ".EMAIL_CONFIG
				." (email_title,email_adress ) "
				." VALUES ('".$post['title_name']."' ,"
				." '".$post['email_address']."' "
				." )";
	   return($db->query($sql));	
	}	
	function GetEmail($eid)
   {
       global $db;
	   $sql= " SELECT * FROM ".EMAIL_CONFIG." WHERE email_id = '".$eid." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	
	function Update($post)
	{
		global $db;

		$sql = " UPDATE ". EMAIL_CONFIG
			.  " SET email_adress 	= '". $post['mail_address']. "' ,"
			.  " email_title  		= '". $post['title']. "' "
			.  " WHERE email_id		= '". $post['email_id']. "' ";
		$db->query($sql);
		return ($db->query($sql));
	}
	function Delete($eid)
	{
		global $db;
		
		$sql="DELETE FROM ".EMAIL_CONFIG
			." WHERE email_id=".$eid;
		return($db->query($sql));
	}
	
	
	#==================================================
	#Email amnagment Function
	#==================================================
	function ViewAllEmail()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".EMAIL_TEMPLATE." AS ET " 
			." LEFT JOIN ".EMAIL_CONFIG." AS EC ON ET.email_id_sending = EC.email_id";

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT ET.email_id,ET.email_subject,ET.email_content,EC.email_title FROM ".EMAIL_TEMPLATE." AS ET "." LEFT JOIN ".EMAIL_CONFIG." AS EC ON ET.email_id_sending = EC.email_id LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	function GetEmailDetails($eid)
   {
       global $db;
	   $sql= " SELECT * FROM ".EMAIL_TEMPLATE." WHERE email_id = '".$eid." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	
	function GetEmailDetails1($eid)
   {
       global $db;
	   $sql= " SELECT * FROM ".EMAIL_TEMPLATE." AS ET "
	          ." LEFT JOIN ".EMAIL_CONFIG." AS EC ON ET.email_id_sending = EC.email_id "
	         ." WHERE ET.email_id = '".$eid." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	function Email_List()
	{
		global $db;
		$sql = " SELECT * FROM ".EMAIL_CONFIG
			 . " ORDER BY email_id";
		return ($db->query($sql));
	}
	function UpdateEmailTemplate($post)
	{
		global $db;

		$sql = " UPDATE ". EMAIL_TEMPLATE
			.  " SET email_subject 	='". $post['en_email_subject']. "' ,"
			//.  " it_email_subject		='".$post['it_email_subject']."' ,"
			.  " email_content			='".mysql_real_escape_string($post['content'])."' ,"
			.  " email_id_sending		='".$post['email_send']."' "
			.  " WHERE email_id	= '".$post['email_id']. "' ";
			
		$db->query($sql);
		return ($db->query($sql));
	}
 }  
?>