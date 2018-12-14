<?php
class Escrow
{
	function Escrow()
	{}
	function ViewAll($user_id)
	{
	  global $db;
      $sql = " SELECT * FROM ".ESCROW_PAYMENT_MASTER
	          ." WHERE from_user_login_id = '".$user_id."' OR to_user_login_id = '".$user_id."'";
	  $db->query($sql);
	}
	function Insert($from_user_auth_id,$from_user_login_id,$to_user_auth_id,$to_user_login_id,$amount,$project_id,$milestone,$pay_type)
	{
	   	global $db;
		$sql="INSERT INTO ".ESCROW_PAYMENT_MASTER
			." (project_id,from_user_auth_id,from_user_login_id,to_user_auth_id,to_user_login_id,amount,status,milestone,payment_type,date) "
			." VALUES ("
			." '".$project_id."' ,"
			." '".$from_user_auth_id."' ,"
			." '".$from_user_login_id."' ,"
			." '".$to_user_auth_id."' ,"
			." '".$to_user_login_id."' ,"
			." '".$amount."', "
			." '1', "
			." '".$milestone."', "			
			." '".$pay_type."', "
			." '".date('m/d/y \a\t H:i T')."' "
			." )";
		return($db->query($sql));	
	}
    function Insert_Record_Of_Escrow($user_id1,$login_id1,$amount1,$project_title,$desc,$transaction_id)
	{
	    $trans_type = "-"; 
		global $db;
		$sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,transaction_id,trans_type,date ) "
					." VALUES ('".$user_id1."' ,"
					." '".$login_id1."' ,"
					." '".$amount1."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$transaction_id."' ,"						
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
       	$db->query($sql);
   }
    function Insert_Record_Of_Escrow_Refund($user_id1,$login_id1,$amount1,$project_title,$desc,$transaction_id,$trans_group,$task_id)
	{
	    $trans_type = "+"; 
		global $db;
		$sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,transaction_id,trans_type,trans_group,task_id,date ) "
					." VALUES ('".$user_id1."' ,"
					." '".$login_id1."' ,"
					." '".$amount1."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$transaction_id."' ,"						
					." '".$trans_type."' ,"
					." '".$trans_group."' ,"
					." '".$task_id."' ,"			
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
       	$db->query($sql);
   }	
	function Escrow_Out($user_id)
	{
		global $db;
		$sql="SELECT * FROM ".ESCROW_PAYMENT_MASTER
			." WHERE from_user_login_id = '".$user_id."' AND status = 1";
		$db->query($sql);
	}

	function Escrow_In($user_id)
	{
		global $db;
		$sql="SELECT * FROM ".ESCROW_PAYMENT_MASTER
			." WHERE to_user_login_id = '".$user_id."' AND status = 1";
		$db->query($sql);
		return($db->fetch_object());
	}
	function Get_Task_Title($project_id)
	{
		global $db3;
		$sql="SELECT * FROM ".project_MASTER
			." WHERE project_id = '".$project_id."'";
         $db3->query($sql);
		 $db3->next_record();
		 return($db3->f('project_title'));
	}
		
	function Select_User()
	{
		global $db;
		$sql="SELECT * FROM ".project_MASTER
			." WHERE project_status = '3' ";
		$db->query($sql);
	}
	function project_Listing($post_by_id)
	{
	  	 global $db;
		 $sql = "SELECT * FROM ".project_MASTER
		        ." WHERE auth_id_of_post_by = '".$post_by_id."' AND project_status = 3"
				." ORDER BY project_posted_date DESC ";
			$db->query($sql);
	}
	
	function project_Listing_for_full($post_by_id)
	{
		global $db;
		$j = '';
	
		$sql=" SELECT * FROM ".ESCROW_PAYMENT_MASTER
			 ." WHERE from_user_auth_id = '".$post_by_id."'";			 
		$db->query($sql);
		while($db->next_record())
		{
			$j = $j.$db->f('project_id').",";
		}
		
		$new_string = substr($j,0,-1);
		
		$sql = "SELECT * FROM ".project_MASTER
		        ." WHERE auth_id_of_post_by = '".$post_by_id."' AND project_status = 3"
				."".($new_string != '' ? " AND project_id NOT IN (".$new_string.")":"")
				." ORDER BY project_posted_date DESC ";
		$db->query($sql);
	}
	
	function project_Listing_for_Partial($post_by_id)
	{
		global $db;
		$j = '';
		$sql=" SELECT * FROM ".ESCROW_PAYMENT_MASTER
			 ." WHERE from_user_auth_id = '".$post_by_id."' AND payment_type != 2 ";
		$db->query($sql);
		
		while($db->next_record())
		{
			$j = $j.$db->f('project_id').",";
		}
		
		$new_string = substr($j,0,-1);
		
		$sql = "SELECT * FROM ".project_MASTER
		        ." WHERE auth_id_of_post_by = '".$post_by_id."' AND project_status = 5"
				."".($new_string != '' ? " AND project_id NOT IN (".$new_string.")":"")
				." ORDER BY project_posted_date DESC ";
		$db->query($sql);
	}

	function SellerName($project_id)
	{
	  	 global $db;
		 $sql = "SELECT * FROM ".PROJECT_MASTER
		        ." WHERE project_id = '".$project_id."' ";
         $db->query($sql);
		 $db->next_record();
		 return($db->f('project_post_to'));
	}
	function Amount($project_id)
	{
	  	 global $db;
		 $sql = "SELECT * FROM ".PROJECT_MASTER." AS PM "
		        ." LEFT JOIN ".BID_MASTER." AS BM ON PM.project_id = BM.project_id" 
		        ." WHERE PM.project_id = '".$project_id."' AND (PM.project_post_to = BM.bid_by_user) ";
		 $db->query($sql);
		 $db->next_record();
		 return($db->f('bid_amount'));
	}
	function ExtraExpenses($project_id)
	{
	  	 global $db;
		 $sql = "SELECT * FROM ".PROJECT_MASTER
		        ." WHERE project_id = '".$project_id."' ";
         $db->query($sql);
		 $db->next_record();
		 return($db->f('tasker_reimburse'));
	}	
	function Insert_Escrow_Payment_To_Tasker($user_id,$login_id,$amount,$seller,$project_title)
	   {
		   $trans_type = "-";
		   $desc = "Escrow Payment to ".$seller." For <strong>".$project_title."</strong> task";
	       global $db;
		   $sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		}	
	function Insert_Escrow_Payment_From_Task_Owner($user_id,$login_id,$amount,$buyer,$project_title)
	   {
		   $trans_type = "+";
		   $desc = "Escrow Payment from ".$buyer." For <strong>".$project_title."</strong> task";
	       global $db;
		   $sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		}	
	function Get_Details($id)
	{
		global $db;
		$sql = "SELECT * FROM ".ESCROW_PAYMENT_MASTER." AS EPM "
			   ." LEFT JOIN ".project_MASTER." AS PM on EPM.project_id = PM.project_id"
			   ." WHERE EPM.ep_id='".$id."' ";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function Verify_Proper_Release_Order($project_id)
	{
		global $db;
		$sql = "SELECT * FROM ".ESCROW_PAYMENT_MASTER." AS EPM "
			   ." WHERE EPM.project_id='".$project_id."' AND EPM.status=1 AND EPM.payment_type=2  ";
		$db->query($sql);
	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}	
	function Get_Amount_Details($id)
	{
		global $db;
	    $sql =  "SELECT * FROM ". ESCROW_PAYMENT_MASTER
            . 	" WHERE project_id='". $id. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	function Get_ESC_Amount_Details($id)
	{
		global $db;
	    $sql =  "SELECT SUM(amount) AS escrow_amount FROM ". ESCROW_PAYMENT_MASTER
            . 	" WHERE project_id  = '". $id. "' ";
		$db->query($sql);
		$db->next_record();
		return($db->f('escrow_amount'));
	}
	function Delete($id)
	{
		global $db;
		$sql=" DELETE FROM ".ESCROW_PAYMENT_MASTER
			." WHERE ep_id  = '".$id."' ";
		$db->query($sql);
	}
	function Delete_by_amount($project_id,$amount)
	{
		global $db;
		$sql=" DELETE FROM ".ESCROW_PAYMENT_MASTER
			." WHERE project_id='".$project_id."' AND amount='".$amount."'  ";			
		$db->query($sql);
	}	
	function Update($id)
	{
	    global $db;
		$sql= " UPDATE ".ESCROW_PAYMENT_MASTER
				." SET "
				." status   =   ' 0 ' "
				." WHERE ep_id = '".$id." '";
		$db->query($sql);
	}	
	function Complete_project($project_id)
	{
	    global $db;
		$sql= " UPDATE ".project_MASTER
				." SET "
				." project_status   =   ' 6 ' "
				." WHERE project_id  = '".$project_id." '";
		$db->query($sql);
	}	
	function Reamining_Amount($project_id)
	{
		global $db;
	    $sql =  "SELECT * FROM ". ESCROW_PAYMENT_MASTER." AS EPM "
			.	" LEFT JOIN ".project_MASTER." AS PM on EPM.project_id = PM.project_id"
			.	" LEFT JOIN ".BID_MASTER." AS BM on PM.project_id = BM.project_id"
            . 	" WHERE EPM.project_id  = '". $project_id. "' ";
		$db->query($sql);
		$db->next_record();
		return($db->f('escrow_amount'));
		
	}
	/*function Listing_Payment()
	{
		global $db;
	   $sql = " SELECT count(*) as cnt FROM ".ESCROW_PAYMENT_MASTER." AS EPM "
	          ." LEFT JOIN ".project_MASTER." AS PM ON EPM.project_id = PM.project_id WHERE EPM.status = 0";

		$db->query($sql);
		$db->next_record();
	
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
		
		$sql =  "SELECT * FROM ". ESCROW_PAYMENT_MASTER." AS EPM "
			.	" LEFT JOIN ".project_MASTER." AS PM on EPM.project_id = PM.project_id "
			.   " WHERE EPM.status = 0 ORDER BY EPM.ep_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		
		$db->query($sql);
	}*/
	
	function Listing_Payment()
	{
		global $db;
	   $sql = " SELECT count(*) as cnt FROM ".ESCROW_PAYMENT_MASTER." AS EPM, "
	          .project_MASTER." AS PM where EPM.project_id = PM.project_id and EPM.status = 0";

		$db->query($sql);
		$db->next_record();
	
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
		
		$sql =  "SELECT * FROM ". ESCROW_PAYMENT_MASTER." AS EPM ,"
			.	project_MASTER." AS PM  "
			.   " WHERE EPM.project_id = PM.project_id  and EPM.status = 0 ORDER BY EPM.ep_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		
		$db->query($sql);
	}
	
	/*function Listing_Payment_Amount()
	{
	   global $db;
	   $sql = " SELECT sum(EPM.amount) as total FROM ".ESCROW_PAYMENT_MASTER." AS EPM "
	          ." LEFT JOIN ".project_MASTER." AS PM ON EPM.project_id = PM.project_id WHERE EPM.status = 0";
	   $db->query($sql);
	   $db->next_record();		
	   return $db->f('total');  
	}*/
	
	function Listing_Payment_Amount()
	{
	   global $db;
	   $sql = " SELECT sum(EPM.amount) as total FROM ".ESCROW_PAYMENT_MASTER." AS EPM ,"
	          .project_MASTER." AS PM where EPM.project_id = PM.project_id and EPM.status = 0";
	   $db->query($sql);
	   $db->next_record();		
	   return $db->f('total');  
	}
	
	function Listing_Pending_Escrow_Payment()
	{
		global $db;
	   $sql = " SELECT count(*) as cnt FROM ".ESCROW_PAYMENT_MASTER." AS EPM "
	          ." LEFT JOIN ".project_MASTER." AS PM ON EPM.project_id = PM.project_id WHERE EPM.status = 1";

		$db->query($sql);
		$db->next_record();
	
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
		
		$sql =  "SELECT * FROM ". ESCROW_PAYMENT_MASTER." AS EPM "
			.	" LEFT JOIN ".project_MASTER." AS PM on EPM.project_id = PM.project_id "
			.   " WHERE EPM.status = 1 LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		
		$db->query($sql);
	}
	function Listing_Pending_Escrow_Amount()
	{
	   global $db;
	   $sql = " SELECT sum(EPM.amount) as total FROM ".ESCROW_PAYMENT_MASTER." AS EPM "
	          ." LEFT JOIN ".project_MASTER." AS PM ON EPM.project_id = PM.project_id WHERE EPM.status = 1";
	   $db->query($sql);
	   $db->next_record();		
	   return $db->f('total');  
	}
}
?>