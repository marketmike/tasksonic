<?php
class Development
{
	function Development()
	{}
	
	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".DEVELOPMENT_COST
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
	
		$sql= " SELECT * FROM ".DEVELOPMENT_COST
			. " ORDER BY display_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}

	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".DEVELOPMENT_COST
			." (development_title,dev_max_amount) "
			." VALUES ('".$post['en_development_title']."' ,"
			." '".$post['dev_max_amount']."' "
			."  )";
		$db->query($sql);
	}

	function GetDevelopment($development_id)
	{
		global $db;
		$sql="SELECT * FROM ".DEVELOPMENT_COST
			." WHERE development_id=".$development_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

	function Update($post)
	{
		global $db;
		$sql="UPDATE ".DEVELOPMENT_COST
			." SET development_title	='".$post['development_title']."',"
			." dev_max_amount			='".$post['dev_max_amount']."'"
			." WHERE development_id		=	".$post['development_id'];
		return($db->query($sql));
	}

	function Delete($development_id)
	{
		global $db;
		$sql="DELETE FROM ".DEVELOPMENT_COST
			." WHERE development_id=".$development_id;
		return($db->query($sql));
	}

	function DisplayOrder_Development($development_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". DEVELOPMENT_COST
			.  " SET display_order 	= '". $display_order. "' "
			.  " WHERE development_id	= '". $development_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	function View_Development_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".DEVELOPMENT_COST
	 		  ." ORDER BY display_order ASC  ";
		$db->query($sql);
	}	
}
?>