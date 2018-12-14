<?php
class Rating
{
   function Rating()
   {
   }
   function Insert_Buyer($pro_id,$user,$post,$en_comm)
   {
       global $db;
	   $sql="INSERT INTO ".BUYER_RATING_MASTER
				." (project_id,rating_by_user,rating_to_user,description,rating,date_time) "
				." VALUES ('".$pro_id."' ,"
				." '".$user."' ,"
				." '".$post['to']."' ,"
				." '".mysql_real_escape_string($en_comm)."' ,"
				." '".$post['rating']."' ,"
				." '".date('m/d/y \a\t H:i T')."' "
				." )";
	   return($db->query($sql));	
	}	
	 function Insert_Seller($pro_id,$user,$post,$en_comm)
   {
       global $db;
	   $sql="INSERT INTO ".SELLER_RATING_MASTER
				." (project_id,rating_by_user,rating_to_user,description,rating,date_time) "
				." VALUES ('".$pro_id."' ,"
				." '".$user."' ,"
				." '".$post['to']."' ,"
				." '".mysql_real_escape_string($en_comm)."' ,"
				." '".$post['rating']."' ,"
				." '".date('m/d/y \a\t H:i T')."' "
				." )";
	   return($db->query($sql));	
	}	
	function Check_Rating_Buyer($id,$rating_to,$rating_by)
	{
	  global $db;
	  $sql = "SELECT * FROM ".BUYER_RATING_MASTER
	         ." WHERE project_id='".$id."' AND rating_to_user='".$rating_to."' AND rating_by_user='".$rating_by."' ";  
	  $db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;		 
	}
	function Check_Rating_Seller($id,$rating_to,$rating_by)
	{
	  global $db;
	  $sql = "SELECT * FROM ".SELLER_RATING_MASTER
	         ." WHERE project_id='".$id."' AND rating_to_user='".$rating_to."' AND rating_by_user='".$rating_by."' ";  
	  $db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;		 
	}
	
	function Select_rateing_Buyer($rating_to)
	{
	  global $db;
	  $sql = "SELECT rating_to_user,AVG(rating) as ave_rate FROM ".BUYER_RATING_MASTER
	         ." GROUP BY rating_to_user='".$rating_to."' ";  
	  $db->query($sql);
	  $db->next_record();
	  return ($db->f('ave_rate'));
	}	
	
	function Select_rateing_Seller($rating_to)
	{
	  global $db;
	  $sql = "SELECT rating_to_user,AVG(rating) as ave_rate FROM ".SELLER_RATING_MASTER
	         ." GROUP BY rating_to_user='".$rating_to."' ";  
	  $db->query($sql);
	  $db->next_record();
	  return ($db->f('ave_rate'));
	}	
 }
?>
