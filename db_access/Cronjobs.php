<?php
class Cronjobs
{
	function Cronjobs()
	{
		#print hi;die;
	}
	
	function Deactivate_User()
	{
		global $db;
		$sql = "UPDATE ".AUTH_USER
			 ." SET  user_status = 0 "
			 ." WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) > last_login_date "
			 ." AND user_type = 'User' AND user_status = 1";
		$db->query($sql);
	}
	
	#====================================================================================================
	#	Function Name: update_bid_status Update records with bid_status 1 when bidding expired
	#	used in: bid_ending_notifications.php
	#----------------------------------------------------------------------------------------------------			
            function update_bid_status($project_id){
			global $db;
						$sql1 = "UPDATE ".PROJECT_MASTER
								." SET "
								." project_status		='7' ,"
								." project_closed_date	= '".date('Y-m-d')."' "
								." WHERE project_id		=".$project_id;
						$db->query($sql1);						
			 }
	#====================================================================================================
	#	Function Name: update_notice_interval Update records with update_notice_interval to avoid duplicate email notification
	#	used in: bid_ending_notifications.php	
	#----------------------------------------------------------------------------------------------------			
            function update_notice_interval($project_id,$notice_interval){
			global $db;
						$sql1 = "UPDATE ".PROJECT_MASTER
								." SET "
								." notice_interval	= '".$notice_interval."' "
								." WHERE project_id		=".$project_id;
						$db->query($sql1);						
			 }

	#====================================================================================================
	#	Function Name: update_notice_interval_awarded_expiring Update records with update_notice_interval_awarded_expiring to avoid duplicate email notification
	#	used in: awarded_bidding_expiring_notifications.php	
	#----------------------------------------------------------------------------------------------------			
            function update_notice_interval_awarded_expiring($project_id,$notice_interval){
			global $db;
						$sql1 = "UPDATE ".PROJECT_MASTER
								." SET "
								." notice_interval_awarded_expiring	= '".$notice_interval."' "
								." WHERE project_id		=".$project_id;
						$db->query($sql1);						
			 }
	#====================================================================================================
	#	Function Name: update_notice_interval_completed Update records with notice_interval_completed to avoid duplicate email notification
	#	used in: awarded_completion_date_near_notifications.php
	#----------------------------------------------------------------------------------------------------			
            function update_notice_interval_completed($project_id,$notice_interval){
			global $db;
						$sql1 = "UPDATE ".PROJECT_MASTER
								." SET "
								." notice_interval_completed	= '".$notice_interval."' "
								." WHERE project_id		=".$project_id;
						$db->query($sql1);						
			 }			 
	#====================================================================================================
	#	Function Name: get tasker email address for email notification
	#	used in: awarded_bidding_expiring_notifications.php	
	#----------------------------------------------------------------------------------------------------	
	function get_tasker_email($tasker_id)
	{
		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER
			  ." WHERE user_auth_id  = '".$tasker_id."'";		
		$db->query($sql);
	    return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}				 			 
	#====================================================================================================
	#	Function Name: get task and user details for email notification
	#	used in: bid_ending_notifications.php	
	#----------------------------------------------------------------------------------------------------	
	function get_details_for_mail($project_id)
	{
		global $db;
		$sql = "SELECT * FROM ".PROJECT_MASTER." AS PM "
		        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
				." WHERE PM.project_id		=".$project_id;
		$db->query($sql);
	    return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}			 

	#====================================================================================================
	#	Function Name	:   project_status()
	#   Description   : Updates project_closed_date when the bidding date and time have expired
	#   Used in: expire_bidding.php 		
	#----------------------------------------------------------------------------------------------------	
	function project_status() // Mike verfied this function and updated it to reflect bidding end time
	{
		global $db,$db1;
		$sql = "SELECT * FROM ".project_MASTER." WHERE project_status = 1";
		$db->query($sql);
		while($db->next_record())
		{

			$project_days_open = $db->f('project_days_open');
			$completed_by  = $db->f('completed_by');
			$project_posted_date = $db->f('project_posted_date'); 
			$bidding_time = $db->f('bidding_time');
			$project_id = $db->f('project_id');

	#====================================================================================================
	#	Description 1	:  Used to calculate when bidding time has expired using date and time settings
	#----------------------------------------------------------------------------------------------------

		$bidding_end_date 	=  date('Y-m-d', strtotime(date("Y-m-d", strtotime($project_posted_date)) . " +$project_days_open day"));
		$bid_end = new Datetime($bidding_end_date. ' ' . $bidding_time);
		$now = new Datetime();
		$seconds_remaining = $bid_end->format('U') - $now->format('U');

		$time_remaining = sec2hms ($seconds_remaining);	// function call to establish time remaining on bidding
		
		if ($bid_end->format('U') < $now->format('U')) {
			$bid_status = 1;			
		}else{
			$bid_status = 0;		
		}

	#====================================================================================================
	#	Update records with bid_status 1
	#----------------------------------------------------------------------------------------------------			
            if($bid_status == 1) 
			 {
			   		$sql1 = "UPDATE ".project_MASTER
							." SET "
							." project_status		='5' ,"
							." project_closed_date	= '".date('Y-m-d')."' "
							." WHERE project_id		=".$project_id;
					$db1->query($sql1);						
			 }
		}
	}// end while
	
	#====================================================================================================
	#	Function Name	:   auto_extend_bid_and_completion_dates()
	#   Description   : When the tasks has expired and has active bids but none awarded, add three days to project_days_open and completed_by 
	#   Used in: expire_bidding.php 	
	#----------------------------------------------------------------------------------------------------		
	function auto_extend_bid_and_completion_dates($project_id)
	{
		global $db,$db1;
		$sql = "SELECT * FROM ".PROJECT_MASTER." WHERE project_id		=".$project_id;
		$db->query($sql);
		while($db->next_record())
		{
		$completed_by = $db->f('completed_by') + 3;
		
		$sql1="UPDATE ".PROJECT_MASTER
			." SET completed_by		='".$completed_by."'  "
			." WHERE project_id	=	'".$project_id."' ";		
		$db1->query($sql1);
		}		
	}	
	#====================================================================================================
	#	Function Name	:   Update_Status_Of_project()
	#   Description   : Changes project status to 7 when user has not awarded within 3 days following notification handled by above function
	#   Used in: expire_bidding.php 	
	#----------------------------------------------------------------------------------------------------		
	function Update_Status_Of_project($project_id)
	{
		global $db;
		$sql = "UPDATE ".project_MASTER
			 ." SET project_status = '7' "
			 ." WHERE project_id = '".$project_id."' ";
		$db->query($sql);		
	}
	
	function mailadd_for_all_project()
	{
		global $db,$db1;
		
		$email = '';
		
		$sql = "SELECT * FROM ".MEMBER_MASTER." WHERE mem_pro_notice = 1";
		$db->query($sql);
		while($db->next_record())
		{
			$email = $email.$db->f('mem_email').",";
		}
		$new_email = substr($email,0,-1);
		return $new_email;		
	}
	function all_emails()
	{
		global $db,$db1;
		
		$email = '';
		
		$sql = "SELECT * FROM ".MEMBER_MASTER." WHERE mem_pro_notice = 1";
		$db->query($sql);
		while($db->next_record())
		{
			$email = $email.$db->f('mem_email').",";
		}
		$new_email = substr($email,0,-1);
		return $new_email;		
	}
	function all_task_subscribe()
	{
		global $db3;
		
		$sql = "SELECT * FROM ".MEMBER_MASTER." WHERE mem_pro_notice = 1";
		$db3->query($sql);
	}
	function all_newsletter_subscribe()
	{
		global $db3;
		
		$sql = "SELECT * FROM ".MEMBER_MASTER." WHERE newsletter = 1";
		$db3->query($sql);
	}
	function all_task_by_interest_subscribe()
	{
		global $db3;
		
		$sql = "SELECT * FROM ".MEMBER_MASTER." WHERE mem_pro_notice = 2";
		$db3->query($sql);
	}	
	function All_projects()
	{
		global $db;
	 	$sql= " SELECT * FROM ".project_MASTER." AS PM "
			 ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id"
			 
			  ." WHERE PM.project_posted_date = '".date('Y-m-d ',mktime(0,0,0,date("m"),date("d")-1,date("y")))." '";
		$db->query($sql);
	}
	function latest_tasks_by_city($membercity)
	{
		global $db1;
	 	$sql= " SELECT * FROM ".PROJECT_MASTER." AS PM "
			 ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id"			 
			 ." WHERE PM.project_city ='".$membercity."' AND AND PM.project_status = 1 PM.project_posted_date > '".date('Y-m-d ',mktime(0,0,0,date("m"),date("d")-1,date("y")))." '";
		$db1->query($sql);
	}
function latest_tasks_by_city_7_day($membercity)
	{
		global $db1;
	 	$sql= " SELECT * FROM ".PROJECT_MASTER." AS PM "
			 ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id"			 
			 ." WHERE PM.project_city ='".$membercity."' AND PM.project_status = 1 AND PM.project_posted_date > '".date('Y-m-d ',mktime(0,0,0,date("m"),date("d")-7,date("y")))." '";
		$db1->query($sql);
	}		
	
	function Find_10_mins_Diff_projects()
	{
		global $db1;

	 	$sql= " SELECT * FROM ".project_MASTER." AS PM "
			 ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id"
			 ." WHERE "
			 ." TIME_TO_SEC(TIMEDIFF(now(), PM.project_post_time) )"
			 ." < 600 ";
		$db1->query($sql);
	}
	function Membership()
	{
		global $db1;
	 	$sql= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".MEMBERSHIP_PLAN_MASTER." AS MPM ON MM.membership_id = MPM.membership_id"
			 ." WHERE (MM.membership_finish_date < now()) AND (MM.membership_id !=0)";
		$db1->query($sql);
	}		
	function Update($post)
	{
		global $db2;
		$sql="UPDATE ".MEMBER_MASTER
			." SET membership_id		='0' ,"
			." membership_buy_date		='0000-00-00',"
			." membership_finish_date	='0000-00-00',"
			." transcation_id           ='0'  "
			." WHERE user_login_id	=	'".$post."' ";
		return($db2->query($sql));
	}
	
	function GetprojectByCategory($cdrinfoid,$membercity) 
   {
      
      global $db1;
	 
		$sql= " SELECT * FROM ".project_MASTER." AS PM "
			  ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id "
			  ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
		      ." WHERE PM.project_posted_date > '".date('Y-m-d ',mktime(0,0,0,date("m"),date("d")-1,date("y")))."' AND PM.project_city ='".$membercity."' AND PM.project_status = 1 AND (" ;
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
			 $sql.=") ORDER BY PM.premium_project DESC,PM.project_post_time DESC";
		$db1->query($sql);			 
    }
	function send_mail_to_closedproject()
	{
		global $db3;
		$sql = "SELECT * FROM ".project_MASTER." AS PM "
		        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.project_posted_by = MM.user_login_id "
				." WHERE PM.project_status = 5";
		$db3->query($sql);
	}
	function SUM_Of_All_projects()
	{
		global $db;
	 	$sql= " SELECT SUM(DC.dev_max_amount) AS cnt FROM ".project_MASTER." AS PM "
			 ." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON PM.project_budget = DC.development_id"
			 ." WHERE PM.project_posted_date = '".date('Y-m-d ',mktime(0,0,0,date("m"),date("d")-1,date("y")))." '";
		$db->query($sql);
        $db->next_record();
	    return($db->f('cnt'));

	}
	
	
	function One_Month_Special_User_Deactive($user_auth_id)
	{
		global $db,$db1;

				$sql_1 = "UPDATE ".MEMBER_MASTER
						 ." SET special_user = '0' ,"
						 ." special_user_start_date		='0000-00-00' "
						 ." WHERE user_auth_id = '".$user_auth_id."' ";
				$db1->query($sql_1);
	}
	function Showall_Blocked_User()
	{
		global $db1;
	 	$sql= " SELECT * FROM ".AUTH_USER." AS AU "
			  ." LEFT JOIN ".MEMBER_MASTER." AS MM on AU.user_auth_id = MM.user_auth_id" 	
			  ." WHERE AU.user_status = 0 and AU.user_type = 'User'";	
			  	
		$db1->query($sql);
	}
	function Update_Block_User($user_auth_id)
	{
		global $db;
	 	$sql= " Update ".AUTH_USER
			 ." SET user_status = '1' "
			 ." WHERE user_auth_id = '".$user_auth_id."' ";
		$db->query($sql);
	}
	
	 function New_Update_Category_Count()
	 {
		global $db,$db1,$db2;
		$sql = "UPDATE " . CATEGORY_MASTER
			 . " SET total_projects = 0 ";
		$db->query($sql);			
		
		
		$sql1= "SELECT * FROM ".PROJECT_MASTER." WHERE project_status = 1";
		$db1->query($sql1);
		
		while($db1->next_record())
		{
			$project_cat = explode(",",$db1->f('project_category') );
			
			foreach ($project_cat as $key=>$val)
			{
				$sql3 = "UPDATE " . CATEGORY_MASTER
					 . " SET total_projects = total_projects + 1 "
					 . " WHERE cat_id='" .$val. "'";
				$db2->query($sql3);					 
			}
		}
		
	}
	function Delete_Expired_Staged_Task($expire_date)
	{
		global $db,$db2,$physical_path;
	    $sql = "SELECT * FROM ".PROJECT_STAGING_MASTER." AS cnt WHERE project_post_time<='".$expire_date." '";
		$db->query($sql);
		
		 while($db->next_record())
		 {
			$n1 = @unlink($physical_path['project'].$db->f('project_file_1'));
			$n1 = @unlink($physical_path['project'].$db->f('project_file_2'));
			$n1 = @unlink($physical_path['project'].$db->f('project_file_3'));
		 }
		 
		$sql2="DELETE FROM ".PROJECT_STAGING_MASTER
			." WHERE project_post_time<='".$expire_date." '";
			$db2->query($sql2);
	    return($db2->num_rows());
	}	
	function Open_projects()
	{	
		global $db;
	 	$sql= " SELECT * FROM ".project_MASTER." AS AU "
			  ." WHERE project_status = 1 order by project_posted_date desc ";	
		$db->query($sql);
	}
	function Arab_to_Int($name)
	{
	   global $db1;
	   $sql= " SELECT * FROM ".AUTH_USER." AS AU "
	        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON AU.user_auth_id = MM.user_auth_id"
	   		." WHERE AU.user_login_id LIKE '$name%'";	
	   $db1->query($sql);
	}
	
	function Update_Arab_User_Name($user_auth_id,$new_user_login_id)
	{
	   global $db2;
	   $sql= " UPDATE ".AUTH_USER
  			 ." SET "
			 ." user_auth_id = '".md5($new_user_login_id)."' ,"
			 ." user_login_id = '".$new_user_login_id."'"
			 ." WHERE user_auth_id  = '".$user_auth_id."' ";
	  $db2->query($sql);
	  $db2->free();
	  
	  $sql1= " UPDATE ".MEMBER_MASTER
  			 ." SET "
			 ." user_auth_id = '".md5($new_user_login_id)."' ,"
			 ." user_login_id = '".$new_user_login_id."'"
			 ." WHERE user_auth_id  = '".$user_auth_id."' ";
	  $db2->query($sql1);
	}
	
	function Insert_In_PipeMail($to,$from,$subject,$content)
	{
		global $db;
		$sql = "INSERT INTO ".EMAIL_IN_PIPELINE
				." (send_from,send_to,mail_subject,mail_content) "
				." values ("
				." '".$from."', " 
				." '".$to."', " 
				." '".$subject."', " 
				." '".mysql_real_escape_string($content)."') " ;
		$db->query($sql);
	}
	function Get_Emails_From_Pipeline()
	{
		global $db;
		$sql = "SELECT * FROM ".EMAIL_IN_PIPELINE
			  ." LIMIT 0,100";
		$db->query($sql);
	}
	function Delete_From_Pipeline($pk_id)
	{
		global $db1;
		$sql = "DELETE FROM ".EMAIL_IN_PIPELINE
			  ." WHERE pk_id = ".$pk_id."";
		$db1->query($sql);
	}
	
	#====================================================================================================
	#   Description   : Used for logging
	#   Called by
	#   // set path and name of log file (optional) 
	#   $cron->lfile('/tmp/mylog.log'); 
	#   // write message to the log file 
	#   $cron->lwrite('Test message');	
	#----------------------------------------------------------------------------------------------------	

		// define default log file 
		private $log_file = '../cron_logs/logfile.log'; 
		// define file pointer 
		private $fp = null; 
		// set log file (path and name) 
		public function lfile($path) { 
			$this->log_file = $path; 
		} 
		// write message to the log file 
		public function lwrite($message){ 
			// if file pointer doesn't exist, then open log file 
			if (!$this->fp) $this->lopen(); 
			// define script name 
			$script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME); 
			// define current time 
			$time = date('H:i:s'); 
			// write current time, script name and message to the log file 
			fwrite($this->fp, "$time ($script_name) $message\n"); 
		} 
		// open log file 
		private function lopen(){ 
			// define log file path and name 
			$lfile = $this->log_file; 
			// define the current date (it will be appended to the log file name) 
			$today = date('Y-m-d'); 
			// open log file for writing only; place the file pointer at the end of the file 
			// if the file does not exist, attempt to create it 
			$this->fp = fopen($lfile . '_' . $today, 'a') or exit("Can't open $lfile!"); 
		} 
	
	
}	
?>