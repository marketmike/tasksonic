<?php
class Bid
{
	function Bid()
	{}
	function ViewAll()
	{
		global $db;
		$sql = "SELECT count(*) as cnt FROM ".BID_MASTER." AS BM "
			  ." LEFT JOIN ".project_MASTER." AS PM ON BM.project_id = PM.project_id";

		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
	  
		$sql = "SELECT * FROM ".BID_MASTER." AS BM "
			  ." LEFT JOIN ".project_MASTER." AS PM ON BM.project_id = PM.project_id"
			  ." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
	function Get_Task_Title($project_id)
	{
		global $db2;
		$sql="SELECT * FROM ".PROJECT_MASTER
			." WHERE project_id = '".$project_id."'";
         $db2->query($sql);
		 $db2->next_record();
		 return($db2->f('project_title'));
	}	
	################################################################################################################
	# Function		: Get_Award_List_project($project_id)
	# Purpose		: This function is used to get 
	# Return		: none
	# Used At 		:  
	# Parameters	
	# 1. $project_id =>  id
	################################################################################################################
	function Get_Award_List_project($project_id)
	{
		global $db1;
		$sql = "SELECT * FROM ".BID_MASTER
			  ." WHERE project_id = '".$project_id."' AND bid_status = 1 ";
		$db1->query($sql);
	}
	
	################################################################################################################
	# Function		: award_task_Winner($project_id,$user_id)
	# Purpose		: This function is used to get 
	# Return		: none
	# Used At 		:  
	# Parameters	
	# 1. $project_id =>  id
	# 2. $user_id =>  user id
	################################################################################################################
	function award_task_Winner($project_id,$user_id)
	{
		global $db;
		$sql= " UPDATE ".project_MASTER
			." SET "
			." project_status   =   '2' ,"
			." project_post_to   =   '".$user_id."' ,"
			." auth_id_of_post_to   =   '".md5($user_id)."' ,"
			." award_project_date   =   '".date('Y-m-d')."' "
			." WHERE project_id = '".$project_id." '";
		$db->query($sql);
	}
	
	################################################################################################################
	# Function		: Seller_Listing_Win_project($user_id)
	# Purpose		: This function is used to get list for win project for user id
	# Return		: none
	# Used At 		: account.php
	# Parameters	
	# 1. $user_id =>  user id
	################################################################################################################
	function Seller_Listing_Win_project($user_id)
	{
		global $db;
		$sql = "SELECT * FROM ".project_MASTER." AS PM"
	          ." LEFT JOIN ".BID_MASTER." AS BM ON PM.project_id = BM.project_id"
			  ." WHERE PM.project_post_to  = '".$user_id."' AND PM.project_status = 2"
			  ." GROUP BY PM.project_id ";
		$db->query($sql);
//		print $sql;
	}
	################################################################################################################
	# Function		: Bidding On project($pro_id)
	# Purpose		: This function is used to get list for bidding on project by project id
	# Return		: none
	# Used At 		: view_bid_project.php
	# Parameters	
	# 1. $user_id =>  user id
	################################################################################################################
	function View_Bidding($pro_id)
		{
		
			global $db;
			$sql="SELECT count(*) as cnt FROM ".BID_MASTER ." AS BM "
					  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id "
					  ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id "
					  ." WHERE BM.project_id = '".$pro_id." ' ORDER BY MM.membership_id DESC ";
	
			$db->query($sql);
			$db->next_record();
			$_SESSION['total_record'] = $db->f("cnt") ;
			$db->free();
	
			# Reset the start record if required
			if($_SESSION['page_size'] >= $_SESSION['total_record'])
			{
				$_SESSION['start_record'] = 0;
			}
	
			$sql= " SELECT * FROM ".BID_MASTER ." AS BM "
				  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON BM.bid_by_user = MM.user_login_id "
				  ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id "
				  ." WHERE BM.project_id = '".$pro_id." ' ORDER BY MM.membership_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
			
			$db->query($sql);
	    }	
	################################################################################################################
	# Function		: Accept_project_Deny($project_id)
	# Purpose		: This function is used to get 
	# Return		: none
	# Used At 		:  
	# Parameters	
	# 1. $project_id =>  id
	################################################################################################################
	function Accept_project_Deny($project_id)
	{
		global $db;
		$sql = "SELECT * FROM ".project_MASTER
			." WHERE project_id = '".$project_id." '";
		$db->query($sql);
		$db->next_record();

		$a = explode("-",$db->f('project_posted_date'));
		$date1 = date('Y-m-d ', mktime(0,0,0,$a[1],($a[2]+$db->f('project_days_open')),$a[0]) );
		$date2 = date('Y-m-d');
		$s = strtotime($date1)-strtotime($date2);
		$d = intval($s/86400); 
		$s -= $d*86400;
		$h = intval($s/3600);
		$s -= $h*3600;
		$m = intval($s/60); 
		$s -= $m*60;	
		$remain_days = $d;
	
	    if($remain_days > 0)
		{
		  $status = 1;
		}
		else
		{
		  $status = 2;
		}
	 		
		$sql= " UPDATE ".project_MASTER
			." SET "
			." project_status   =   '".$status."' ,"
			." project_post_to   =   '' ,"
			." auth_id_of_post_to   =   '' "
			." WHERE project_id = '".$project_id." '";
		$db->query($sql);
	}
	################################################################################################################
	# Function		: GetBidBy_User On project($user_login_id)
	# Purpose		: This function is used to get list ofo bid posted by user
	# Return		: none
	# Parameters	
	# 1. $user_login_id =>  user login id
	################################################################################################################
	function GetBidBy_User($user_login_id)
	{
		global $db;
		$sql= " SELECT * FROM ".BID_MASTER ." AS BM "
			  ." LEFT JOIN ".project_MASTER." AS PM ON BM.project_id = PM.project_id"
			  ." WHERE BM.bid_by_user = '".$user_login_id."' ";
		$db->query($sql);
	}	

	################################################################################################################
	# Function		: GetPMBy_User($user_login_id)
	# Purpose		: This function is used to get list of private messages posted by user
	# Return		: none
	# Parameters	
	# 1. $user_login_id =>  user login id
	################################################################################################################
	function GetPMBy_User($user_login_id)
	{
		global $db;
		$sql= " SELECT * FROM ".PRIVATE_MESSAGE_MASTER ." AS PMM "
			  ." LEFT JOIN ".project_MASTER." AS PM ON PMM.project_id = PM.project_id"
			  ." WHERE PMM.sender_login_id = '".$user_login_id."' ";
		$db->query($sql);
	}	

	################################################################################################################
	# Function		: GetMessageBoardBy_User($user_login_id)
	# Purpose		: This function is used to get list of message board messages posted by user
	# Return		: none
	# Parameters	
	# 1. $user_login_id =>  user login id
	################################################################################################################
	function GetMessageBoardBy_User($user_login_id)
	{
		global $db;
		$sql= " SELECT * FROM ".MESSAGE_BOARD_MASTER ." AS MBM "
			  ." LEFT JOIN ".project_MASTER." AS PM ON MBM.project_id = PM.project_id"
			  ." WHERE MBM.sender_login_id = '".$user_login_id."' ";
		$db->query($sql);
	}	

	################################################################################################################
	# Function		: GetprojectPostedBy_User($user_login_id)
	# Purpose		: This function is used to get list of project posted by user
	# Return		: none
	# Parameters	
	# 1. $user_login_id =>  user login id
	################################################################################################################
	function GetprojectPostedBy_User($user_login_id)
	{
		global $db;
		$sql= " SELECT * FROM ".project_MASTER
			  ." WHERE project_posted_by = '".$user_login_id."' ";
		$db->query($sql);
	}	
	################################################################################################################
	# Function		: Delete($bid_id)
	# Purpose		: This function is used to get list of project posted by user
	# Return		: none
	# Parameters	
	# 1. $user_login_id =>  user login id
	################################################################################################################
	function Delete($bid_id)
	{
		global $db;
		$sql="DELETE FROM ".BID_MASTER
			." WHERE bid_id=".$bid_id;
		return($db->query($sql));
	}	
	################################################################################################################
	# Function		: GetBidDeatils($bid_id,$project_id)
	# Purpose		: This function is used to get list of bid posted by user
	# Return		: none
	# Parameters	
	# 1. $bid_id 		=>  bid_id
	# 2. $project_id 	=>  project_id
	################################################################################################################
	function GetBidDeatils($bid_id,$project_id)
	{
		global $db;
		$sql="SELECT * FROM ".BID_MASTER
			." WHERE bid_id='".$bid_id."' AND project_id='".$project_id."' ";
		$db->query($sql);	
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));

	}	
	################################################################################################################
	# Function		: GetBidDeatils($bid_id,$project_id)
	# Purpose		: This function is used to get list of bid posted by user
	# Return		: none
	# Parameters	
	# 1. $bid_id 		=>  bid_id
	# 2. $project_id 	=>  project_id
	################################################################################################################
	function UpdateBid($post)
	{
		global $db;
		$sql= " UPDATE ".BID_MASTER
			." SET "
			." bid_desc   =   '".$post['dec']."' "
			." WHERE bid_id = '".$post['bid_id']."' AND project_id = '".$post['project_id']."' ";
		$db->query($sql);
	}
	################################################################################################################
	# Function		: Update_bid_Status($bid_id,$project_id)
	# Purpose		: This function is used to update status of bid
	# Return		: none
	# Parameters	
	# 1. $bid_id 		=>  bid_id
	# 2. $project_id 	=>  project_id
	################################################################################################################
	function Update_bid_Status($post)
	{
		global $db;
		$sql= " UPDATE ".BID_MASTER
			." SET "
			." bid_desc  	=   '".$post['dec']."' ,"
			." bid_status   =   '".$post['bid_visible']."' "
			." WHERE bid_id = '".$post['bid_id']."' AND project_id = '".$post['project_id']."' ";
		$db->query($sql);
	}
	
}
?>