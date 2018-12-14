<?php
class Badword
{
   function Badword()
   {
   }
	################################################################################################################
	# Function: ViewAll()
	# Purpose: list all data from table
	# Return: nothing
	# Parameters: 
	################################################################################################################
   function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".BADWORD_MASTER ;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".BADWORD_MASTER." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
 	################################################################################################################
	# Function: Insert($post)
	# Purpose: insert data in table
	# Return: nothing
	# Parameters: 
	# 1. $post = array of post
	################################################################################################################
	function Insert($post)
	{
	   global $db;
	   $sql="INSERT INTO ".BADWORD_MASTER
				." (badword_value) "
				." VALUES ('".$post['bad_name']."' "
				." )";
	   return($db->query($sql));	
	}	
 	################################################################################################################
	# Function: Getbadwd($badid)
	# Purpose: get data from id
	# Return: nothing
	# Parameters: 
	# 1. $badid = id
	################################################################################################################
	function Getbadwd($badid)
	{
	   global $db;
	   $sql= " SELECT * FROM ".BADWORD_MASTER." WHERE badword_id = '".$badid." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	
 	################################################################################################################
	# Function: Update($post)
	# Purpose: update data in table
	# Return: nothing
	# Parameters: 
	# 1. $post = array of post
	################################################################################################################
	function Update($post)
	{
		global $db;

		$sql = " UPDATE ". BADWORD_MASTER
			.  " SET badword_value 	= '". $post['bad_name']. "' "
			.  " WHERE badword_id	= '".$post['badword_id']. "' ";
		$db->query($sql);
		return ($db->query($sql));
	}
 	################################################################################################################
	# Function: Delete($badid)
	# Purpose: delete data from id
	# Return: nothing
	# Parameters: 
	# 1. $badid = id
	################################################################################################################
	function Delete($badid)
	{
		global $db;
		
		$sql="DELETE FROM ".BADWORD_MASTER
			." WHERE badword_id=".$badid;
		return($db->query($sql));
	}
 }  
?>