<?php
class project
{
	function project()
	{}
	function ViewAll()
	{
		global $db;
		
		$sql = " SELECT count(*) as cnt FROM ".project_MASTER." AS PM "
	          ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id ";

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
        
		$sql = " SELECT * FROM ".project_MASTER." AS PM "
	          ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id ORDER BY PM.premium_project DESC,PM.project_posted_date DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}

   function GetprojectByCategory($cdrinfoid) 
   {
      
      global $db;
	  $sql = "SELECT count(*) cnt FROM ".project_MASTER." AS PM "
			 ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
	         ." WHERE FIND_IN_SET('$cdrinfoid',PM.project_category) AND (PM.project_status !=4 AND PM.project_status !=6)";
	  $db->query($sql);
	  $db->next_record();
	  $_SESSION['total_record'] = $db->f("cnt") ;
	  $db->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$db->query($sql);
		$sql= " SELECT * FROM ".project_MASTER." AS PM "
			  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
		      ." WHERE FIND_IN_SET('$cdrinfoid',PM.project_category) AND (PM.project_status !=4 AND PM.project_status !=6) "
			  ." ORDER BY PM.premium_project DESC,PM.project_post_time DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		$db->query($sql);			 
	  return($db->query($sql));      
   }
	function Insert($post,$project_post_by,$project_file_1,$project_file_2,$project_file_3,$paypal_id,$en_project_title,$en_project_description,$premium_transaction_id,$urgent_transaction_id,$project_free)
	{
	  if($post['cat_prod'] == '')
		   {
			 $cates = $post['cat_prod'];
		   }    
	   else
		   {
			$cates = implode(",",$post['cat_prod']);
		   }
		   
	  if($post['user_name'] == '')	   
	  {
	        $post_to = '';
			$auth_post_to = '';
	  }
	  else
	  {
	        $post_to = $post['user_name'];
			$auth_post_to = md5($post['user_name']);
	  }
	  global $db;
	  $sql="INSERT INTO ".project_MASTER
			." (project_posted_by,auth_id_of_post_by,paypal_transaction_id,project_post_to,auth_id_of_post_to,project_title,"
			." project_category,project_description,project_file_1,project_file_2,project_file_3,project_level,"
			." project_budget,project_days_open,project_hide,project_allow_bid,premium_project,urgent_project,perimum_transaction_id,urgent_trascation_id,project_status,project_posted_date,project_free,project_post_time) "
			." VALUES ('".$project_post_by."' ,"
			." '".md5($project_post_by)."' ,"
			." '".$paypal_id."' ,"
			." '' ,"
			." '' ,"
			." '".$en_project_title."' ,"
			." '".$cates."' ,"
			." '".$en_project_description."' ,"
			." '".$project_file_1."' ,"
			." '".$project_file_2."' ,"
			." '".$project_file_3."' ,"
			." '1' ,"
			." '".$post['dev']."' ,"
			." '".$post['bidding']."' ,"
			." '".$post['project_options1']."' ,"
			." '".$post['project_options2']."' ,"
			." '".$post['premium_project']."' ,"
			." '".$post['urgent_project']."' ,"
			." '".$premium_transaction_id."' ,"
			." '".$urgent_transaction_id."' ,"
			." '1' ,"
			." '".date('Y-m-d')."' ,"
			." '".$project_free."' ,"
			." now() "
			."  )";
		$db->query($sql);
		$insertid=$db->sql_inserted_id();
        return($insertid);
	}
	function Insert_Post_project_Fees($user_id,$login_id,$amount,$en_project_title)
	   {
		   $trans_type = "-";
		   $desc = "Fees Taken For Posted project <strong>".$en_project_title."</strong>";
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
		   $insertid=$db->sql_inserted_id();
		   return($insertid);
		}	
	function Insert_Urgent_project_Fees($user_id,$login_id,$amount,$en_project_title)
	   {
		   $trans_type = "-";
		   $desc = "Fees Taken For Urgent project <strong>".$en_project_title."</strong>";
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
		   $insertid=$db->sql_inserted_id();
		   return($insertid);
		}	
	function Insert_Post_project_Fees_Premium($user_id,$login_id,$amount,$en_project_title)
	   {
		   $trans_type = "-";
		   $desc = "Fees Taken For Premium project <strong>".$en_project_title."</strong>";
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
		   $insertid=$db->sql_inserted_id();
		   return($insertid);
		}		
	function Getproject($pro_id)
  	 {
       global $db;
	   $sql= " SELECT * FROM ".project_MASTER." WHERE project_id = '".$pro_id." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	 }	
	 
	function Getprojectdelete($pro_id)
  	 {
       global $db;
	   $sql= " SELECT * FROM ".project_MASTER." AS PM "
	          ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
			  ." WHERE project_id = '".$pro_id." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	 }	
 
	function GetprojectDetails($pro_id)
	   {
		   global $db;
		   $sql= " SELECT * FROM ".project_MASTER." AS PM "
				  ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id"
				  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id"
				  ." WHERE PM.project_id = '".$pro_id." '";
		   $db->query($sql);
		   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
		}	
	function Edit_projectDetails($pro_id)
   {
       global $db;
	   $sql= " SELECT * FROM ".project_MASTER." AS PM "
	          ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id"
        	  ." WHERE project_id = '".$pro_id." '";
	   $db->query($sql);
	   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function Delete($pro_id1)
	{
		global $db,$physical_path;
	    $sql = "SELECT * FROM ".project_MASTER." WHERE project_id=".$pro_id1;
		$db->query($sql);
		
		 while($db->next_record())
		 {
			$n1 = @unlink($physical_path['project'].$db->f('project_file_1'));
			$n1 = @unlink($physical_path['project'].$db->f('project_file_2'));
			$n1 = @unlink($physical_path['project'].$db->f('project_file_3'));
		 }
		 
		$sql="DELETE FROM ".project_MASTER
			." WHERE project_id=".$pro_id1;
		return($db->query($sql));
	}
	function Update($post,$project_file_1,$project_file_2,$project_file_3)
   {
       if($post['cat_prod'] == '')
		   {
			 $cates = $post['cat_prod'];
		   }    
	   else
		   {
			$cates = implode(",",$post['cat_prod']);
		   }
       global $db;
	   $sql= " UPDATE ".project_MASTER
			." SET project_title										=	'".$post['title']."' ,"
            ." project_description										=	'".$post['desc']."' ," 
			." project_category        									=	'".$cates."' ,"
			." project_file_1                                           =   '".$project_file_1."' ,"
			." project_file_2                                           =   '".$project_file_2."' ,"
			." project_file_3                                           =   '".$project_file_3."' ,"
			." project_budget                                           =   '".$post['dev']."' ,"
			." project_days_open                                        =   '".$post['bidding']."' ,"
			." project_hide                                             =   '".$post['project_options1']."' ,"
			." project_allow_bid                                        =   '".$post['project_options2']."' ,"
			." premium_project                                       	=   '".$post['premium_project']."' ,"
			." project_posted_date                                      =   '".date('Y-m-d')."' "
			." WHERE project_id = '".$post['project_id']." '";
	   $db->query($sql);
	}	
	function Insert_Edit_project($post,$file,$en_edit_proj)
	   {
		   global $db;
		   $sql="INSERT INTO ".project_EDIT_MASTER
					." (project_id,description,filename,edit_date) "
					." VALUES ('".$post['project_id']."' ,"
					." '".$en_edit_proj."' ,"
					." '".$file."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		   $insertid=$db->sql_inserted_id();
		   return($insertid);
		}	
	function project1($prot_id)
	   {
		   global $db;
		   $sql="SELECT count(*) as cnt FROM ".project_EDIT_MASTER." WHERE project_id = '".$prot_id."' ";
		   $db->query($sql);	
		   $db->next_record();
		   return($db->f('cnt'));
		}		
	function Update_task_bidding_days($post, $total_days)
	{
		global $db;

		$sql = " UPDATE ". project_MASTER
			.  " SET project_days_open  	= '". $total_days. "' "
			.  " WHERE project_id 	= '".$post['project_id']. "' ";
		$db->query($sql);
		return ($db->affected_rows());

	}	
	function Insert_Extend_project($post)
	{
	   global $db;
		$sql="INSERT INTO ".project_EXTEND_MASTER
			." (project_id,extend_days,extend_date) "
			." VALUES ('".$post['project_id']."' ,"
			." '".$post['days']."' ,"
			." '".date('Y-m-d')."' "
			." )";
		return($db->query($sql));	
	}
	/////////////////////////////////////////
	/////// Bid Functions
	/////////////////////////////////////////
	function InsertBid_WithApprove($post,$user_name,$en_bid_desc)
	   {
		   global $db;
		   $sql="INSERT INTO ".BID_MASTER
					." (project_id,bid_by_user,bid_amount,delivery_within,bid_desc,notification_alert,shortlist,decline,bid_status,date,date_2) "
					." VALUES ('".$post['project_id']."' ,"
					." '".$user_name."' ,"
					." '".$post['bid_amount']."' ,"
					." '".$post['delivery_within']."' ,"
					." '".$en_bid_desc."' ,"
					." '".$post['notification_status']."' ,"
					." 1 ,"
					." 1 ,"
					." 0 ,"
					." '".date('Y-m-d')."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		}	
		
		function InsertBid_WithoutApprove($post,$user_name,$en_bid_desc)
	   {
		   global $db;
		   $sql="INSERT INTO ".BID_MASTER
					." (project_id,bid_by_user,bid_amount,delivery_within,bid_desc,notification_alert,shortlist,decline,bid_status,date,date_2) "
					." VALUES ('".$post['project_id']."' ,"
					." '".$user_name."' ,"
					." '".$post['bid_amount']."' ,"
					." '".$post['delivery_within']."' ,"
					." '".$en_bid_desc."' ,"
					." '".$post['notification_status']."' ,"
					." 1 ,"
					." 1 ,"
					." 1 ,"
					." '".date('Y-m-d')."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		}	
		function find_less_than_bid($pro_id,$amount)
		{
			global $db;
			$sql= " SELECT * FROM ".BID_MASTER." AS BM "
				 ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id "
				 ." WHERE BM.project_id = '".$pro_id."' AND BM.bid_amount > '".$amount."' AND BM.notification_alert = 1 AND BM.bid_status = 1";
		   	$db->query($sql);
		}	
		function Get_Bids_By_Id($pro_id)
		{
			global $db1;
			$sql= " SELECT * FROM ".BID_MASTER ." AS BM "
				  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id "
				  ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id "
				  ." WHERE BM.project_id = '".$pro_id." ' AND BM.bid_status = 1 AND BM.decline = 1 ORDER BY MM.membership_id DESC ";
		   	$db1->query($sql);
	    }	
        function Get_Bids_By_Id1($pro_id)
		{
			global $db;
			$sql= " SELECT count(*) AS Cnt ,SUM(bid_amount) AS Average_Bid ,SUM(delivery_within) AS Bid_Average_Time  FROM ".BID_MASTER 
				  ." WHERE project_id = '".$pro_id."' AND bid_status = 1 AND decline = 1 ";
			$db->query($sql);
			$db->next_record();
			
			$cnt = $db->f('Cnt');
			$db->free();
			return ($db->f('Cnt').",".$db->f('Average_Bid').",".$db->f('Bid_Average_Time'));
		}	
		
		function GetBidDetails($bid_by_user,$project_id)
		{  
			global $db;
			$sql =  "SELECT * FROM ". BID_MASTER
				. 	" WHERE project_id 	= '".$project_id. "' AND bid_by_user  = '". $bid_by_user. "' ";
			$db->query($sql);
	
			if($db->num_rows() > 0)
			{
				return 0;
			}
			return 1;
		}
		
		function UpdateBid_WithApprove($post,$user_name,$en_bid_desc)
		{
			global $db;
	
			$sql = " UPDATE ". BID_MASTER
	    		  ." SET bid_amount  	 ='".$post['bid_amount']."' ,"
				  ." delivery_within 	 ='".$post['delivery_within']."' ,"
				  ." bid_desc	 	 	 ='".$en_bid_desc."',"
				  ." notification_alert  ='".$post['notification_status']."' ,"
				  ." bid_status          ='0',"
  				  ." date	 			 ='".date('Y-m-d')."' ,"
				  ." date_2	  		     ='".date('m/d/y \a\t H:i T')."'"
				  ." WHERE project_id 	 ='".$post['project_id']. "' AND bid_by_user = '".$user_name."' ";
					$db->query($sql);
			return ($db->affected_rows());
	 	}	
		function UpdateBid_WithoutApprove($post,$user_name,$en_bid_desc)
		{
			global $db;
	
			$sql = " UPDATE ". BID_MASTER
	    		  ." SET bid_amount  	 ='".$post['bid_amount']."' ,"
				  ." delivery_within 	 ='".$post['delivery_within']."' ,"
				  ." bid_desc	 	 	 ='".$en_bid_desc."',"
				  ." notification_alert  ='".$post['notification_status']."' ,"
				  ." bid_status          ='1',"
  				  ." date	 			 ='".date('Y-m-d')."' ,"
				  ." date_2	  		     ='".date('m/d/y \a\t H:i T')."'"
				  ." WHERE project_id 	 ='".$post['project_id']. "' AND bid_by_user = '".$user_name."' ";
					$db->query($sql);
			return ($db->affected_rows());
	 	}	

		function GetBid($pro_id,$username)
		 {
		   global $db;
		   $sql= " SELECT * FROM ".BID_MASTER." WHERE project_id = '".$pro_id."' AND bid_by_user = '".$username."'";
		   $db->query($sql);
		   return ($db->fetch_object(MYSQL_FETCH_SINGLE));
		 }	
		function Get_Additional_Info($pro_id)
		 {
		   global $db;
		   $sql= " SELECT * FROM ".project_EDIT_MASTER." WHERE project_id = '".$pro_id."'";
		   $db->query($sql);
		 }	
		 
		function Get_Bids_Mail($pro_id)
		{
			global $db;
			$sql= " SELECT * FROM ".BID_MASTER ." AS BM "
				  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id "
				  ." WHERE BM.project_id = '".$pro_id." '";
	    	$db->query($sql);
	    }
		   
		   function GetBid2() 
		   {
			  global $db;
			  $sql = "SELECT count(*) as cnt FROM ".BID_MASTER; 
			  $db->query($sql);
			  $db->next_record();
			  return ($db->f('cnt'));
		   }
		 function Get_Bids_Shortlist($pro_id)
			{
				global $db1;
				$sql= " SELECT * FROM ".BID_MASTER ." AS BM "
					  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id "
					  ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id "
					  ." WHERE BM.project_id = '".$pro_id." ' AND BM.shortlist = 0 AND BM.decline = 1 ORDER BY MM.membership_id DESC ";
				$db1->query($sql);
			}  
        function Get_Bids_Decline($pro_id)
			{
				global $db1;
				$sql= " SELECT * FROM ".BID_MASTER ." AS BM "
					  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id "
					  ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id "
					  ." WHERE BM.project_id = '".$pro_id." ' AND BM.decline = 0 ORDER BY MM.membership_id DESC ";
				$db1->query($sql);
			}  
			
		   
		function ToggleStatusBid($bid_id, $shortlist)
		{
			global $db;
			$sql = " UPDATE ".BID_MASTER
				 . " SET shortlist ='". $shortlist."'"
				 . " WHERE bid_id ='". $bid_id. "' ";
			return ($db->query($sql));
		}
		function ToggleStatusDecline($bid_id, $decline)
		{
			global $db;
			$sql = " UPDATE ".BID_MASTER
				 . " SET decline ='". $decline."'"
				 . " WHERE bid_id ='". $bid_id. "' ";
			 
			return ($db->query($sql));
		}
		function ToggleStatusUnDecline($bid_id,$reasons)
		{
			global $db;
			$sql = " UPDATE ".BID_MASTER
				 . " SET decline = 0 ,"
				 . " reasons = '".$reasons."' "
				 . " WHERE bid_id ='". $bid_id. "' ";
			return ($db->query($sql));
		}
		
		
	/////////////////////////////////////////
	///	Insert Msg into Msg board at user_side
	/////////////////////////////////////////
	function Insert_Msg($post,$user_id,$user_name,$en_message_desc)
	   {
		   global $db;
		   $sql="INSERT INTO ".MESSAGE_BOARD_MASTER
					." (project_id,sender_auth_id,sender_login_id,receiver_auth_id,receiver_login_id, "
					."	message_desc,dates) "
					." VALUES ('".$post['project_id']."' ,"
					." '".$user_id."' ,"
					." '".$user_name."' ,"
					." '".md5($post['project_creator'])."' ,"
					." '".$post['project_creator']."' ,"
					." '".$en_message_desc."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		}
	 /////////////////////////////////////////
	 ///	View Msg at admin_side
	 /////////////////////////////////////////  
	function View_Msg($pro_id) 
	   {
		  global $db;
		  $sql = "SELECT * FROM ".MESSAGE_BOARD_MASTER ." MBM "
			  ." LEFT JOIN ".project_MASTER." AS PM ON MBM.project_id = PM.project_id "
		  		." WHERE MBM.project_id = '".$pro_id."' ORDER BY MBM.dates DESC"; 
		  $db->query($sql);
	   }
	  /////////////////////////////////////////
	 ///	View private Msgs at admin_side
	 /////////////////////////////////////////    
	   function View_Private_Msg_Admin($pro_id) 
	   {
		  global $db;
		 /* $sql = "SELECT * FROM ".PRIVATE_MESSAGE_MASTER." WHERE project_id = '".$pro_id."' ORDER BY date DESC"; */
		  $sql = "SELECT * FROM ".PRIVATE_MESSAGE_MASTER." AS PMM "
		        ." LEFT JOIN ".project_MASTER." AS PM ON PMM.project_id = PM.project_id "
		  		." WHERE PMM.project_id = '".$pro_id."' ORDER BY PMM.date DESC"; 
		  $db->query($sql);
	   }
	 /////////////////////////////////////////
	///	Insert Msg into Private Msg at user_side
	/////////////////////////////////////////  
	  function Insert_Private_Msg($post,$user_id,$user_name,$en_message_desc,$attach_file)
	   {
		   global $db;
		   $sql="INSERT INTO ".PRIVATE_MESSAGE_MASTER
					." (project_id,sender_auth_id,sender_login_id,recevier_auth_id,recevier_login_id, "
					."	private_msg_desc,file,date) "
					." VALUES ('".$post['project_id']."' ,"
					." '".$user_id."' ,"
					." '".$user_name."' ,"
					." '".md5($post['project_creator'])."' ,"
					." '".$post['project_creator']."' ,"
					." '".$en_message_desc."' ,"
					." '".$attach_file."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		}
       function Insert_Private_Msg_user($post,$en_message_desc,$attach_file)
	   {
		   global $db;
		   $sql="INSERT INTO ".PRIVATE_MESSAGE_MASTER
					." (project_id,sender_auth_id,sender_login_id,recevier_auth_id,recevier_login_id, "
					."	private_msg_desc,file,date) "
					." VALUES ('".$post['project_id']."' ,"
					." '".md5($post['project_creator'])."' ,"
					." '".$post['project_creator']."' ,"
					." '".md5($post['bid_user'])."' ,"
					." '".$post['bid_user']."' ,"
					." '".$en_message_desc."' ,"
					." '".$attach_file."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);	
		}		
	   function View_Private_Msg($pro_id,$user,$bid_user) 
	   {
		  global $db;
	//	  $sql = "SELECT * FROM ".PRIVATE_MESSAGE_MASTER." WHERE project_id = '".$pro_id."' AND sender_login_id = '".$user."' ORDER BY date DESC"; 
		  $sql = " SELECT * FROM ".PRIVATE_MESSAGE_MASTER." WHERE project_id = '".$pro_id."' AND (sender_login_id = '".$user."' "
		         ." OR sender_login_id = '".$bid_user."') AND (recevier_login_id = '".$user."'OR recevier_login_id = '".$bid_user."') "
				 ." ORDER BY date DESC ";
		  $db->query($sql);
	   }
	################################################################################################################
	# Function		: Get_Msg_Sender($receiver_user)
	# Purpose		: This function is used for getting message listing which are posted for related user
	# Return		: none
	# Used At 		: account.php
	# Parameters	
	# 1. $receiver_user => user id
	################################################################################################################
	function Get_Msg_Sender($receiver_user)
	{
		global $db;
		
		$sql="SELECT count(*) as cnt FROM ".PRIVATE_MESSAGE_MASTER." AS PMM "
			." LEFT JOIN ".project_MASTER." AS PM ON PMM.project_id = PM.project_id "
			." WHERE PMM.recevier_login_id = '".$receiver_user."' " ;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
		$_SESSION['start_record'] = 0;
		}
		
		$sql=" SELECT * FROM ".PRIVATE_MESSAGE_MASTER." AS PMM "
			." LEFT JOIN ".project_MASTER." AS PM ON PMM.project_id = PM.project_id "
			." WHERE PMM.recevier_login_id = '".$receiver_user."' " 
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		$db->query($sql);
	}
	################################################################################################################
	# Function		: Delete_Private_Message($id)
	# Purpose		: This function is used to delete message from table
	# Return		: none
	# Used At 		: account.php
	# Parameters	
	# 1. $id =>  id
	################################################################################################################
	function Delete_Private_Message($id)
	{
		global $db;
		
		$sql="DELETE FROM ".PRIVATE_MESSAGE_MASTER
			." WHERE pm_id=".$id;
		return($db->query($sql));
	}	
	   function Checking($pro_id,$user)
	   {
	      global $db1;
		  $sql = "SELECT * FROM ".BID_MASTER."  "
	         ." WHERE bid_by_user ='".$user."' AND project_id = '".$pro_id."' ";
	      $db1->query($sql);

          if($db1->num_rows() > 0)
			{
				return 1;
			}
          return 0;
	   }
	################################################################################################################
	# Function		: ViewAll_projects()
	# Purpose		: This function is used for getting project listing
	# Return		: count value
	# Used At 		: all_projects.php
	################################################################################################################

	function ViewAll_projects()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.auth_id_of_post_by = MM.user_auth_id "
			 ." WHERE PM.project_status !=4 AND PM.project_status !=6";

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.auth_id_of_post_by = MM.user_auth_id "
			 ." WHERE PM.project_status !=4 AND PM.project_status !=6 "
			 ." ORDER BY PM.premium_project DESC,PM.project_post_time DESC "
			 ." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
			#print $sql;die; 
		$db->query($sql);
	}
	function Get_project_Count()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".project_MASTER ;
		$db->query($sql);
		$db->next_record();
		return($db->f("cnt"));
	}
	################################################################################################################
	# Function		: ViewAll_Premium_projects()
	# Purpose		: This function is used for getting project listing
	# Return		: count value
	# Used At 		: all_premium_projects.php
	################################################################################################################

	function ViewAll_Premium_projects_1()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
			 ." WHERE PM.premium_project = 1";

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
			 ." WHERE PM.premium_project = 1 "
			 ." ORDER BY PM.premium_project DESC,PM.project_posted_date DESC "
			 ." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		$db->query($sql);
	}
	################################################################################################################
	# Function		: Search_projects($keywords,$options)
	# Purpose		: This function is used for searching project according to keywords and options
	# Return		: none
	# Used At 		: search_tasks.php
	# Parameters	
	# 1. $keywords => search keyword
	# 2. $options => search option
	################################################################################################################
	function Search_projects($keywords)
	{
		global $db;
		
		//if($options == 1)
		//{
			$sql_where = " WHERE (project_title like '%".$keywords."%' "
						." OR project_description like '%".$keywords."%')";
/*		}
		if($options == 2)
			$sql_where = " WHERE (project_title like '%".$keywords."%') ";
		if($options == 3)
			$sql_where = " WHERE (project_description like '%".$keywords."%') ";
*/			
			
		$sql="SELECT count(*) as cnt FROM ".project_MASTER." AS PM " 
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
			. $sql_where
			." AND (project_status != 4 AND project_status != 6)";
       
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql = "SELECT * FROM ".project_MASTER." AS PM " 
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
			  . $sql_where." AND (project_status != 4 AND project_status != 6) "
		      ." ORDER BY premium_project DESC,project_post_time DESC"
			  ." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		$db->query($sql);
	}
	################################################################################################################
	# Function		: Search_projects_Count($keywords,$options)
	# Purpose		: This function is used for counting no of searched project according to keywords and options
	# Return		: count value
	# Used At 		: search_tasks.php
	# Parameters	
	# 1. $keywords => search keyword
	# 2. $options => search option
	################################################################################################################
	function Search_projects_Count($keywords,$options)
	{
		global $db;
		
		if($options == 1)
		{
			$sql_where = " WHERE project_title like '%".$keywords."%' "
						." OR project_description like '%".$keywords."%' ";
		}
		if($options == 2)
			$sql_where = " WHERE project_title like '%".$keywords."%' ";
		if($options == 3)
			$sql_where = " WHERE project_description like '%".$keywords."%' ";
			
			
		$sql="SELECT count(*) as cnt FROM ".project_MASTER 
  		   . $sql_where;

		$db->query($sql);
		$db->next_record();
		return($db->f("cnt"));
	}
	
	function Close_project($project_id)
	{
		global $db;
		$sql= " UPDATE ".project_MASTER
			." SET "
			." project_status   =   '4' "
			." WHERE project_id = '".$project_id." '";
		$db->query($sql);
	}
	/////////////////////////////////////////
	/////// to display accept project details at user side
	/////////////////////////////////////////
	function Bid_details_Of_User($project_id,$auth_id_of_post_to)
	{
		global $db;
		$sql="SELECT * FROM ".MEMBER_MASTER
			." WHERE user_auth_id = '".$auth_id_of_post_to."'";
		
		$db->query($sql);
		$db->next_record();

		$sql="SELECT * FROM ".BID_MASTER
			." WHERE project_id = '".$project_id."' AND bid_by_user = '".$db->f('user_login_id')."'";
		
		$db->query($sql);
		$db->next_record();
		return($db->f('bid_amount'));
	}
	
	function Payapl_Tran($project_id,$project_name)
	{
		global $db;
		 $sql= " SELECT * FROM ".project_MASTER." AS PRM "
		       ." LEFT JOIN ".PAYPAL_MASTER." AS PAM ON PRM.paypal_transaction_id = PAM.pp_id"
			   ." WHERE PRM.project_id = '".$project_id."' ";
	   $db->query($sql);
	   $db->next_record();
	   return($db->f('amount'));
   }
   
    function Insert_Seller_Paypal($user_id,$login_id,$amount)
	{
	    $trans_type = "-";
		$desc = "Fees Taken Form Site For Accepting project by you";   
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
    function Insert_Buyer_Paypal($user_id1,$login_id1,$amount1)
	{
	    $trans_type = "-";
		$desc = "Fees Taken Form Site For Accepting project By Seller";   
		global $db;
		$sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$user_id1."' ,"
					." '".$login_id1."' ,"
					." '".$amount1."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
       	$db->query($sql);
   }
   
    function Return_Buyer_Paypal($user_id2,$login_id2,$amount2,$project_title)
	{
	    $trans_type = "+";
		$desc = "Returning deposit fees By Site For <strong>".$project_title."</strong> project";   
		global $db;
		$sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$user_id2."' ,"
					." '".$login_id2."' ,"
					." '".$amount2."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
     	$db->query($sql);
   }
   	function Accept_project($project_id)
	{
		global $db;
		$sql= " UPDATE ".project_MASTER
			." SET "
			." project_status   =   '3' "
			." WHERE project_id = '".$project_id." '";
		$db->query($sql);
	}
	function Update_Award_project($project_id)
		{
			global $db;
			$sql= " UPDATE ".project_MASTER
				." SET "
				." project_status   =   '1' ,"
				." project_post_to   =   '' ,"
				." auth_id_of_post_to   =   '' ,"
				." award_project_date   =   '' "
				." WHERE project_id = '".$project_id." '";
			$db->query($sql);
		}
    ################################################################################################################
	# Function		: ViewAll_Premium_projects()
	# Purpose		: This function is used for getting project listing
	# Return		: count value
	# Used At 		: index.php
	################################################################################################################
    function ViewAll_projects_At_Home()
	{
		global $db;

		$sql= " SELECT * FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
			 ." WHERE PM.project_status !=4 AND PM.project_status !=6"
			 ." ORDER BY PM.premium_project DESC,PM.project_post_time DESC "
			 ." LIMIT 0,50 ";
		$db->query($sql);
	}
	function ViewAll_Premium_projects()
	{
		global $db;
		
		$sql= " SELECT * FROM ".project_MASTER." WHERE premium_project =1 AND (project_status =1 OR project_status =2)"
		     ." ORDER BY project_posted_date DESC "
			 ." LIMIT 0,50";
	   $db->query($sql);
	}
	################################################################################################################
	# Function		: ViewAll_Standard_projects()
	# Purpose		: This function is used for getting project listing
	# Return		: count value
	# Used At 		: index.php
	################################################################################################################

	function ViewAll_Standard_projects()
	{
		global $db;
	
		$sql=" SELECT * FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
			 ." WHERE PM.premium_project = 0 AND (PM.project_status =1 OR PM.project_status =2)"
		     ." ORDER BY PM.project_posted_date DESC,MM.membership_id DESC LIMIT 0,50";
		$db->query($sql);
	}
	################################################################################################################
	# Function		: rating()
	# Purpose		: This function is used for rating project listing
	# Used At 		: rating.php
	################################################################################################################
	function rating_to_seller($user)
	{
		global $db;
		$j = '';
		$sql=" SELECT * FROM ".SELLER_RATING_MASTER
			 ." WHERE rating_by_user = '".$user."' ";
		$db->query($sql);
		while($db->next_record())
		{
			$j = $j.$db->f('project_id').",";
		}
		
		$new_string = substr($j,0,-1);

		$sql=" SELECT * FROM ".project_MASTER
			 ." WHERE project_posted_by = '".$user."' AND project_post_to !='' "
			."".($new_string != '' ? " AND project_id NOT IN (".$new_string.")":"");
		$db->query($sql);
	}
	
	################################################################################################################
	# Function		: rating()
	# Purpose		: This function is used for rating project listing
	# Used At 		: rating.php
	################################################################################################################
	function rating_to_buyer($user)
	{
		global $db;
		$j = '';
		$sql=" SELECT * FROM ".BUYER_RATING_MASTER
			 ." WHERE rating_by_user = '".$user."' ";
		$db->query($sql);
		while($db->next_record())
		{
			$j = $j.$db->f('project_id').",";
		}
		
		$new_string = substr($j,0,-1);
		$sql=" SELECT * FROM ".project_MASTER
		    ." WHERE project_post_to = '".$user."'  AND project_posted_by !='' "
			."".($new_string != '' ? " AND project_id NOT IN (".$new_string.")":"");
		$db->query($sql);
		
	}
	
	################################################################################################################
	# Function		: Search_projects_Admin_side($keywords,$options)
	# Purpose		: This function is used for searching project according to keywords and options
	# Return		: none
	# Used At 		: project_search.php
	# Parameters	
	# 1. $keywords => search keyword
	# 2. $options => search option
	################################################################################################################
	function Search_projects_Admin_side($post)
	{
	    global $db;
		
		$sql_where = "";
		
		if($post['pre_project'] == 'on')
			{
			   $sql_where = $sql_where." AND PM.premium_project = 1 ";
			}
		if($post['vip_project'] == 'on')
			{
			   $sql_where = $sql_where." AND MM.membership_id != 0 ";
			}
        
		if($post['project_posted_by'] != '')
			{
			   $sql_where = $sql_where." AND PM.project_posted_by like '%".$post['project_posted_by']."%' ";
			}
		if($post['project_title'] != '')
			{
			   $sql_where = $sql_where." AND PM.project_title like '%".$post['project_title']."%' ";
			}
		if($post['project_description'] != '')
			{
			   $sql_where = $sql_where." AND PM.project_description like '%".$post['project_description']."%' ";
			}
		if($post['budget'] != 0)
			{
			   $sql_where = $sql_where." AND PM.project_budget ='".$post['budget']."' ";
			}	
 		if($post['bidding_days'] != 0)
			{
			   $sql_where = $sql_where." AND PM.project_days_open = '".$post['bidding_days']."' ";
			}	
		if($post['status_of_project'] != 0)
			{
			   $sql_where = $sql_where." AND PM.project_status = '".$post['status_of_project']."' ";
			}		
		if($post['cat_prod'] != '')
			{
			   foreach ($post['cat_prod'] as $key => $val)
				{
				  	if($key == 0)
					{
					  $sql_where = $sql_where." AND FIND_IN_SET('$val',PM.project_category)  ";
					}
					else
					{
					  $sql_where = $sql_where." OR FIND_IN_SET('$val',PM.project_category) ";
					}	
				}	
			}			
		$sql=" SELECT count(*) as cnt FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
  		     ."WHERE 1 ".$sql_where." ORDER BY PM.project_posted_date DESC ";
        $db->query($sql);
		
		$db->next_record();
		
		$_SESSION['total_record'] = $db->f("cnt") ;
		
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
       
	    $sql=" SELECT * FROM ".project_MASTER." AS PM "
		     ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
  		     ." WHERE 1 ".$sql_where." ORDER BY PM.project_posted_date DESC "
			 ." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	
	function GetprojectByCategory123($cdrinfoid) 
   {
      
      global $db;
	 
		$sql= " SELECT * FROM ".project_MASTER." AS PM "
			  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
		      ." WHERE PM.project_status = 1 AND (" ;
			  foreach ($cdrinfoid as $key=>$val)
			  {
			    if($key == 0)
				{
				  $sql.= " FIND_IN_SET('$val',PM.project_category) ";
				}
				else
				{
				  $sql.= " OR FIND_IN_SET('$val',PM.project_category) ";
				}	
			 }	
			 $sql.=") ORDER BY PM.premium_project DESC,PM.project_post_time DESC LIMIT 0,3";
		$db->query($sql);			 
    }
	function Insert_Commision($project_id,$buyer_comm,$seller_comm)
	   {
		   global $db;
		   $sql="INSERT INTO ".SITE_EARNING_project
					." (project_id,buyer_comm,seller_comm,submitted_date) "
					." VALUES ('".$project_id."' ,"
					." '".$buyer_comm."' ,"
					." '".$seller_comm."' ,"
					." '".date('Y-m-d')."' "
					." )";
		   $db->query($sql);	
		}	
	
	  function Get_details_form_bidid($bid_id) 
	   {
		  
		  global $db;
		 
		  $sql= " SELECT * FROM ".BID_MASTER." AS BM "
				  ." LEFT JOIN ".project_MASTER." AS PM ON BM.project_id = PM.project_id "
				  ." WHERE BM.bid_id = '".$bid_id."' ";
		  $db->query($sql);		
		  return ($db->fetch_object(MYSQL_FETCH_SINGLE));			 
		}
		
	   function Check_project($auth_id_of_post) 
	   {
		  
		  global $db;
		 
		  $sql =  "SELECT * FROM ". project_MASTER
					 . 	" WHERE auth_id_of_post_by = '". $auth_id_of_post. "' ";
		  $db->query($sql);
			
		  if($db->num_rows() > 0)
			{
				return 0;
			}
			return 1;
		}	
		function GetEditprojectDeatils($pro_id)
	   {
		   global $db;
		   $sql= " SELECT * FROM ".project_MASTER." AS PM "
				  ." LEFT JOIN ".project_EDIT_MASTER." AS PEM ON PM.project_id = PEM.project_id"
				  ." WHERE PM.project_id = '".$pro_id."'";
		   $db->query($sql);
		}
		function Delete_Private_Msg($pro_id1)
		{
			global $db;
			$sql="DELETE FROM ".PRIVATE_MESSAGE_MASTER
				." WHERE pm_id=".$pro_id1;
			return($db->query($sql));
		}
		function Delete_Message_Board($pro_id1)
		{
			global $db;
			$sql="DELETE FROM ".MESSAGE_BOARD_MASTER
				." WHERE message_id=".$pro_id1;
			return($db->query($sql));
		}
		
		function Checkproject_Id($project_id)
		{
			global $db;
			$sql =  "SELECT * FROM ". project_MASTER
				. 	" WHERE project_id  = '". $project_id. "' ";
			$db->query($sql);
	
			if($db->num_rows() > 0)
			{
				return 0;
			}
			return 1;
		}
		function GetMesaageBoardDetails($msg_id,$project_id) 
	   {
		  
		  global $db;
		  $sql= " SELECT * FROM ".MESSAGE_BOARD_MASTER
				  ." WHERE message_id = '".$msg_id."' AND project_id = '".$project_id."' ";
		  $db->query($sql);		
		  return ($db->fetch_object(MYSQL_FETCH_SINGLE));			 
		}
		
	################################################################################################################
	# Function		: UpdateMessage($bid_id,$project_id)
	# Purpose		: This function is used to get list of bid posted by user
	# Return		: none
	# Parameters	
	# 1. $bid_id 		=>  bid_id
	# 2. $project_id 	=>  project_id
	################################################################################################################
	function UpdateMessage($post)
	{
		global $db;
		$sql= " UPDATE ".MESSAGE_BOARD_MASTER
			." SET "
			." message_desc   =   '".$post['dec']."' "
			." WHERE message_id = '".$post['message_id']."' AND project_id = '".$post['project_id']."' ";
		$db->query($sql);
	}	
	function GetPrivateMessageDetails($pm_id,$project_id) 
	   {
		  
		  global $db;
		  $sql= " SELECT * FROM ".PRIVATE_MESSAGE_MASTER
				  ." WHERE pm_id = '".$pm_id."' AND project_id = '".$project_id."' ";
		  $db->query($sql);		
		  return ($db->fetch_object(MYSQL_FETCH_SINGLE));			 
		}
	function UpdatePrivateMessage($post)
	{
		global $db;
		$sql= " UPDATE ".PRIVATE_MESSAGE_MASTER
			." SET "
			." private_msg_desc   =   '".$post['dec']."' "
			." WHERE pm_id = '".$post['pm_id']."' AND project_id = '".$post['project_id']."' ";
		$db->query($sql);
	}	
		################################################################################################################
	# Function		: Check_BID($username,$project_id)
	# Purpose		: This function is used to getting bid  is there or not??
	# Return		: none
	# Parameters	
	# 1. $username 		=>  bid_by_user
	# 2. $project_id 	=>  project_id
	################################################################################################################
	
	function Check_BID($username,$project_id)
	{
		global $db;
	    $sql =  "SELECT * FROM ". BID_MASTER
            . 	" WHERE bid_by_user  = '". $username. "' AND project_id = '".$project_id."' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	function ViewAll_Today_Private_Msg()
	{
		global $db;
		$j = '';
		$k = '';
		$sql = " SELECT count(*) as cnt FROM ".PRIVATE_MESSAGE_MASTER;

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
        
		$sql = " SELECT * FROM ".PRIVATE_MESSAGE_MASTER;
		
		$db->query($sql);
		while($db->next_record())
		{
			$j = explode(" ",$db->f('date'));
			$today = date('m/d/y');
			
			if($j[0] == $today)
			{
				$k = $k.$db->f('pm_id')."-".$db->f('project_id')."-".$db->f('sender_auth_id').",";
			}
		}
		$new_string = substr($k,0,-1);
		return $new_string;
	}
	function Update_Category_Count($val)
	{
		global $db;
		$sql = "UPDATE " . CATEGORY_MASTER
			 . " SET total_projects = total_projects + 1 "
			 . " WHERE cat_id='" .$val. "'";	
		$db->query($sql);	 
	}
###################################################################################################
##################            NEW CODE
###################################################################################################
	function GetprojectAtHomePage_New($cdrinfoid) 
	{
		global $db1;
		$sql= " SELECT * FROM ".project_MASTER." AS PM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
			." WHERE FIND_IN_SET('$cdrinfoid',PM.project_category) AND (PM.project_status !=4 AND PM.project_status !=6) "
			." ORDER BY PM.project_post_time DESC LIMIT 0,9";
		$db1->query($sql);			 
//		return($db1->query($sql));      


	}
	function ViewAll_PMS()
	{
		global $db;
		$sql = " SELECT count(*) as cnt FROM ".PRIVATE_MESSAGE_MASTER
			  ." WHERE msg_check = '0' ORDER BY pm_id DESC ";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
        
		$sql= " SELECT * FROM ".PRIVATE_MESSAGE_MASTER
			  ." WHERE msg_check = '0' ORDER BY pm_id DESC LIMIT ". $_SESSION['start_record']. ",". $_SESSION['page_size'];
		$db->query($sql);
	}
	
	function GetPMDetailsByID($pm_id)
	{
		global $db;
		$sql= " SELECT * FROM ".PRIVATE_MESSAGE_MASTER
			  ." WHERE pm_id = '".$pm_id."' ";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));			 
	}

	function UpdatePrivateMessage_Checked($post)
	{
		global $db;
		$sql= " UPDATE ".PRIVATE_MESSAGE_MASTER
			." SET "
			." private_msg_desc	   =   '".$post['private_msg_desc']."', "
			." msg_check		   =   '".$post['msg_check']."' "
			." WHERE pm_id		   =   '".$post['pm_id']."' ";
		$db->query($sql);
	}	
}	
?>