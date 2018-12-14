<?php
class FAQ
{
	function Faq()
	{}
	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".FAQ_MASTER;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".FAQ_MASTER ." ORDER BY disp_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	function ViewAllFAQ()
	{
		global $db;
		$sql= " SELECT * FROM ".FAQ_MASTER ." ORDER BY disp_order ASC ";
		$db->query($sql);
	}	
   	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".FAQ_MASTER
			." (faq_title,faq_content,status,disp_order) "
			." VALUES ('".mysql_real_escape_string($post['faq_title'])."' ,"
			." '".mysql_real_escape_string($post['faq_content'])."' ,"			
			." '".(int)$post['status']."' ,"
			." '".(int)$post['disp_order']."' "			
			."  )";
		$db->query($sql);
	}
   #===============================================================================================
   # This function is used for getting country details 
   # User Side & Admin Side
   #===============================================================================================   

	function GetFaq($faq_id)
	{
		global $db;
		$sql="SELECT * FROM ".FAQ_MASTER
			." WHERE faq_id=".$faq_id;
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
		$sql="UPDATE ".FAQ_MASTER
			." SET status	='".(int)$post['status']."' ,"
			." faq_title	='".mysql_real_escape_string($post['faq_title'])."' ,"
			." faq_content	='".mysql_real_escape_string($post['faq_content'])."' "			
			." WHERE faq_id 	=".$post['faq_id'];
		return($db->query($sql));
	}	
   #===============================================================================================
   # This function is used for deleting country details for particular Country Id
   # Admin Side
   #===============================================================================================   
	function Delete($faq_id)
	{
		global $db;
		$sql="DELETE FROM ".FAQ_MASTER
			." WHERE faq_id=".$faq_id;
		return($db->query($sql));
	}
	function DisplayOrder($faq_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". FAQ_MASTER
			.  " SET disp_order 	= '". $display_order. "' "
			.  " WHERE faq_id	= '". $faq_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	function View_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".FAQ_MASTER
	 		  ." ORDER BY disp_order ASC  ";
		$db->query($sql);
	}	
	
}
?>