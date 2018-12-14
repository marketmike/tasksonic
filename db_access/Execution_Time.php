<?php
class Execution_Time
{
	function Execution_Time()
	{}
	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".EXECUTION_TIME
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
	
		$sql= " SELECT * FROM ".EXECUTION_TIME
			. " ORDER BY display_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}

	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".EXECUTION_TIME
			." (exe_name) "
			." VALUES ('".$post['en_exe_name']."' "
			//." '".$post['it_exe_name']."' "
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

	function Delete($exe_id)
	{
		global $db;
		$sql="DELETE FROM ".EXECUTION_TIME
			." WHERE exe_id=".$exe_id;
		return($db->query($sql));
	}

	function DisplayOrder_ExeTime($exe_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". EXECUTION_TIME
			.  " SET display_order 	= '". $display_order. "' "
			.  " WHERE exe_id	= '". $exe_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	function View_ExecutionTime_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".EXECUTION_TIME
	 		  ." ORDER BY display_order ASC  ";
		$db->query($sql);
	}	
	
}
?>