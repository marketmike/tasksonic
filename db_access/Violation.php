<?php
class Violation
{
	function Violation()
	{}
	function View_All()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".REPORT_VIOLATIONS_MASTER;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".REPORT_VIOLATIONS_MASTER ." ORDER BY submitted_date DESC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".REPORT_VIOLATIONS_MASTER
			." (your_name,your_email,your_username,violation,other_person_name,url,violation_details,submitted_date) "
			." VALUES ('".$post['your_name']."' ,"
			." '".$post['your_email']."' ,"
			." '".$post['your_username']."' ,"
			." '".$post['violation_list']."' ,"
			." '".$post['other_person_name']."' ,"
			." '".$post['url']."' ,"
			." '".$post['en_violation_details']."' ,"
			." '".date('m/d/y \a\t H:i T')."' "
			." )";
		$db->query($sql);
	}
	################################################################################################################
	# Function: DelCategory1($cat_id)
	# Purpose: delete data from id
	# Return: nothing
	# Parameters: 
	# 1. $cat_id = id
	################################################################################################################
	function Delete($violate_id)
	{
		global $db;
		
		$sql="DELETE FROM ".REPORT_VIOLATIONS_MASTER
			." WHERE violation_id=".$violate_id;
		return($db->query($sql));
	}
	
	################################################################################################################
	# Function: GetViolationDetails($violate_id)
	# Purpose: Get data from id
	# Return: nothing
	# Parameters: 
	# 1. $violate_id = id
	################################################################################################################
	function GetViolationDetails($violate_id)
	{
		global $db;
		
		$sql="SELECT * FROM ".REPORT_VIOLATIONS_MASTER
			." WHERE violation_id=".$violate_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
}	
?>