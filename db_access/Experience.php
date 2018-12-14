<?php
class Experience
{
	function Experience()
	{}
	
	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".YEAR_EXPERIENCE
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
	
		$sql= " SELECT * FROM ".YEAR_EXPERIENCE
			. " ORDER BY display_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}

	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".YEAR_EXPERIENCE
			." (expe_title) "
			." VALUES ('".$post['en_expe_title']."' "
			."  )";
		$db->query($sql);
	}

	function GetExperience($year_expe_id)
	{
		global $db;
		$sql="SELECT * FROM ".YEAR_EXPERIENCE
			." WHERE year_expe_id=".$year_expe_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

	function Update($post)
	{
		global $db;
		$sql="UPDATE ".YEAR_EXPERIENCE
			." SET expe_title ='".$post['expe_title']."'"
			." WHERE year_expe_id	=	".$post['year_expe_id'];
		return($db->query($sql));
	}

	function Delete($year_expe_id)
	{
		global $db;
		$sql="DELETE FROM ".YEAR_EXPERIENCE
			." WHERE year_expe_id=".$year_expe_id;
		return($db->query($sql));
	}

	function DisplayOrder_experience($year_expe_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". YEAR_EXPERIENCE
			.  " SET display_order 	= '". $display_order. "' "
			.  " WHERE year_expe_id	= '". $year_expe_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	################################################################################################################
	# Function		: View_experience_Order()
	# Purpose		: This function is used to get list of data from table
	# Return		: none
	# Used At 		: edittaskerprofile.php
	# Parameters	
	# 1. $userid =>  user id
	################################################################################################################
	function View_experience_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".YEAR_EXPERIENCE
	 		  ." ORDER BY display_order ASC  ";
		$db->query($sql);
	}	
}
?>