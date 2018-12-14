<?php
class Industry
{
	function Industry()
	{}

   function ViewAllIndustry()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".INDUSTRY_MASTER
				. " ORDER BY display_order ASC ";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".INDUSTRY_MASTER
			. " ORDER BY display_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}

	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".INDUSTRY_MASTER
			." (industry_name) "
			." VALUES ('".$post['en_industry_name']."' "
			."  )";
		$db->query($sql);
	}

	function GetIndustry($industry_id)
	{
		global $db;
		$sql="SELECT * FROM ".INDUSTRY_MASTER
			." WHERE industry_id=".$industry_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

	function Update($post)
	{
		global $db;
		$sql="UPDATE ".INDUSTRY_MASTER
			." SET industry_name	='".$post['industry_name']."'"
			." WHERE industry_id	=".$post['industry_id'];
		return($db->query($sql));
	}

	function Delete($industry_id)
	{
		global $db;
		$sql="DELETE FROM ".INDUSTRY_MASTER
			." WHERE industry_id=".$industry_id;
		return($db->query($sql));
	}

	function DisplayOrder_Industry($industry_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". INDUSTRY_MASTER
			.  " SET display_order 	= '". $display_order. "' "
			.  " WHERE industry_id	= '". $industry_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	################################################################################################################
	# Function		: View_Cat_Industry_Order()
	# Purpose		: This function is used to get list of industry 
	# Return		: none
	# Used At 		: edittaskerprofile.php
	################################################################################################################
	function View_Cat_Industry_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".INDUSTRY_MASTER
	 		  ." ORDER BY display_order ASC  ";
		$db->query($sql);
	}	
	
	################################################################################################################
	# Function		: Get_Industry_Name($industry_id)
	# Purpose		: This function is used to get name of industry 
	# Return		: industry name according to current language
	# Used At 		: viewtaskerprofile.php
	# Parameters	
	# 1. $industry_id =>   id
	################################################################################################################

	function Get_Industry_Name($industry_id)
	{
		global $db1;
		$sql="SELECT * FROM ".INDUSTRY_MASTER
			." WHERE industry_id=".$industry_id;
		$db1->query($sql);
		$db1->next_record();
		return($db1->f('industry_name'));
	}
		
}
?>