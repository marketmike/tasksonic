<?php
class Buyers
{
	function Buyers()
	{}

		
	################################################################################################################
	# Function		: GetBuyerDetails($buyer_id)
	# Purpose		: This function is used to check wheather table has entry exist for this user id or not
	# Return		: 0 or 1 depending on condition
	# Used At 		: edittask_ownerprofile.php
	# Parameters	
	# 1. $buyer_id =>  user id
	################################################################################################################
	function GetBuyerDetails($buyer_id)
	{  
	 	global $db;
	    $sql =  "SELECT * FROM ". PROFILE_MASTER
            . 	" WHERE user_auth_id  = '". $buyer_id. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	
	################################################################################################################
	# Function		: Insert($post,$it_buyers_slogan,$it_buyers_description,$en_buyers_slogan,$en_buyers_description)
	# Purpose		: This function is used to insert data in table
	# Return		: none
	# Used At 		: 
	# Parameters	
	# 1. $post =>  array of post
	# 2. $it_buyers_slogan =>  buyer slogan in italian
	# 3. $it_buyers_description =>  buyer description in italian
	# 4. $en_buyers_slogan =>  buyer slogan in english
	# 5. $en_buyers_description =>  buyer description in english
	################################################################################################################
	function Insert($post,$logo,$en_buyers_slogan,$en_buyers_description)
	{
	   global $db;
		$sql="INSERT INTO ".PROFILE_MASTER
			." (user_auth_id,seller_logo,buyers_slogan,buyers_description,buyers_profile_status) "
			." VALUES ('".$post['User_Id']."' ,"
			." '".$logo."' ,"
			." '".mysql_real_escape_string($en_buyers_slogan)."' ,"
			." '".mysql_real_escape_string($en_buyers_description)."' ,"
			." '1'"
			." )";
		return($db->query($sql));	
	}
	################################################################################################################
	# Function		: Insert_Extend_project($post)
	# Purpose		: This function is used to 
	# Return		: none
	# Used At 		: 
	# Parameters	
	# 1. $post =>  array of post
	################################################################################################################
	function Insert_Extend_project($post)
	{
	   global $db;
		$sql="INSERT INTO ".project_EXTEND_MASTER
			." (project_id,buyers_slogan,buyers_description,buyers_profile_status) "
			." VALUES ('".$post['User_Id']."' ,"
			." '".mysql_real_escape_string($en_buyers_slogan)."' ,"
			." '".mysql_real_escape_string($en_buyers_description)."' ,"
			." '1'"
			." )";
		return($db->query($sql));	
	}
	################################################################################################################
	# Function		: Update($post,$it_buyers_slogan,$it_buyers_description,$en_buyers_slogan,$en_buyers_description)
	# Purpose		: This function is used to update data in table
	# Return		: none
	# Used At 		: 
	# Parameters	
	# 1. $post =>  array of post
	# 2. $it_buyers_slogan =>  buyer slogan in italian
	# 3. $it_buyers_description =>  buyer description in italian
	# 4. $en_buyers_slogan =>  buyer slogan in english
	# 5. $en_buyers_description =>  buyer description in english
	################################################################################################################
	function Update($post,$logo,$en_buyers_slogan,$en_buyers_description)
	{
	   global $db;
		$sql="UPDATE ".PROFILE_MASTER
		    ." SET "
			." seller_logo = '".$logo."',"
			." buyers_slogan = '".mysql_real_escape_string($en_buyers_slogan)."',"
			." buyers_description = '".mysql_real_escape_string($en_buyers_description)."',"
			." buyers_profile_status = '1' "
		    ." WHERE user_auth_id ='".$post['User_Id']."'"; 
		return($db->query($sql));
	}
	################################################################################################################
	# Function		: GetDetail($Id)
	# Purpose		: This function is used to get data of user from table
	# Return		: object
	# Used At 		: edittask_ownerprofile.php
	# Parameters	
	# 1. $userid =>  user id
	################################################################################################################
	function GetDetail($Id)
	{
         global $db1;
		 $sql = "SELECT * FROM ".PROFILE_MASTER
		        ." WHERE user_auth_id = '".$Id."' ";
		 $db1->query($sql);		
		 return ($db1->fetch_object(MYSQL_FETCH_SINGLE));
    }
	################################################################################################################
	# Function		: UpdateImage($post)
	# Purpose		: This function is used to update some field in table
	# Return		: none
	# Used At 		: edittaskerprofile.php
	# Parameters	
	# 1. $post =>  array of post
	################################################################################################################
	function UpdateImage($post)
	{

		global $db,$physical_path;
		
		 $sql=" UPDATE ".PROFILE_MASTER
			 ." SET "
		     ." seller_logo	  	  = '' "
			 ." WHERE user_auth_id	  ='".$post['User_Id']."' ";
		$db->query($sql);
		return($db->query($sql));	

	}
		
	################################################################################################################
	# Function		: GetUserDetails($userid)
	# Purpose		: This function is used to get data of user
	# Return		: none
	# Used At 		: viewtask_ownerprofile.php,viewtaskerprofile.php
	# Parameters	
	# 1. $userid =>  user id
	################################################################################################################
	function GetUserDetails($userid)
	{

		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER." AS MM"
		      ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
		      ." LEFT JOIN ".STATE_MASTER." AS SM ON MM.mem_state = SM.state_id"			  
			  ." LEFT JOIN ".PROFILE_MASTER." AS PM ON MM.user_auth_id = PM.user_auth_id"
			  ." LEFT JOIN ".YEAR_EXPERIENCE." AS YE ON PM.seller_exp = YE.year_expe_id"
			  ." WHERE MM.user_auth_id  = '".md5($userid)."'";
      	$db->query($sql);
	}
	################################################################################################################
	# Function		: ViewAll_project_User($post_by_id)
	# Purpose		: This function is used to list all project posted by user
	# Return		: none
	# Used At 		: I do not beleive this is current used
	# Parameters	
	# 1. $post_by_id =>  user id
	################################################################################################################

	function ViewAll_project_User($post_by_id,$citycurrent)
	{
	  	 global $db;
		 $sql = "SELECT count(*) as tskcnt FROM ".project_MASTER
		        ." WHERE auth_id_of_post_by = '".$post_by_id."' AND project_city ='$citycurrent'"
				." ORDER BY project_post_time DESC";
				$db->query($sql);
				$db->next_record();
				$_SESSION['total_record'] = $db->f("tskcnt") ;
				$db->free();

				# Reset the start record if required
				if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
				{
				$_SESSION['start_record'] = 0;
				}
				$sql = "SELECT * FROM ".project_MASTER
				." WHERE auth_id_of_post_by = '".$post_by_id."' AND project_city ='$citycurrent'"
				." ORDER BY project_post_time DESC"
				." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
				$db->query($sql);
	}	

	################################################################################################################
	# Function		: ViewAll_project_task_owner_Open_($post_by_id)
	# Purpose		: This function is used to get data of project posted by user
	# Return		: none
	# Used At 		: viewtask_ownerprofile.php
	# Parameters	
	# 1. $auth_id_of_post_by  =>  user_auth_id
	################################################################################################################
	function ViewAll_project_task_owner_Open($user_auth_id)
	{
	  	 global $db2;
		 $sql = "SELECT * FROM ".project_MASTER
		        ." WHERE auth_id_of_post_by = '".$user_auth_id."' AND project_status = 1"
				." ORDER BY premium_project DESC,project_post_time DESC";
		 $db2->query($sql);		
	}
	################################################################################################################
	# Function		: ViewAll_project_task_owner_active($post_by_id)
	# Purpose		: This function is used to get data of project posted by user
	# Return		: none
	# Used At 		: msg_board.php
	# Parameters	
	# 1. $auth_id_of_post_by  =>  user_auth_id
	################################################################################################################
	function ViewAll_project_task_owner_active($user_auth_id,$citycurrent)
	{
	  	 global $db;
		 $sql = "SELECT * FROM ".project_MASTER
		         ." WHERE auth_id_of_post_by = '".$user_auth_id."'  AND project_city ='".$citycurrent."' AND (project_status =1 OR project_status =2 OR project_status =3)"
				." ORDER BY premium_project DESC,project_post_time DESC"
				." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		 $db->query($sql);		
	}
	################################################################################################################
	# Function		: ViewAll_project_task_owner_active($post_by_id)
	# Purpose		: This function is used to get data of project posted by user
	################################################################################################################
	function get_message_board_count_by_task($project_id)
	{
		global $db2;	
		$sql="SELECT count(*) as cnt FROM ".MESSAGE_BOARD_MASTER 
			." WHERE project_id = '".$project_id."' ";			
       
		$db2->query($sql);
		$db2->next_record();
		return $db2->f("cnt") ;

	}
	################################################################################################################
	# Function		: ViewAll_buyer_rating()
	# Purpose		: This function is used to get data of project posted by user
	# Return		: none
	# Used At 		: task_owner_feedback.php
	# Parameters	
	# 1. $post_by_id =>  user id
	################################################################################################################
	function ViewAll_Buyer_Rating($user)
	{
	  	 global $db1;
		 $sql = "SELECT * FROM ".BUYER_RATING_MASTER. " AS BRM "
		        ." LEFT JOIN ".project_MASTER." AS PM ON BRM.project_id = PM.project_id "
		        ." WHERE BRM.rating_to_user = '".$user."' ";
		 $db1->query($sql);		
	}
	
	################################################################################################################
	# Function		: ViewAll_buyer_rating()
	# Purpose		: This function is used to get data of project posted by user
	# Return		: none
	# Used At 		: task_owner_feedback.php
	# Parameters	
	# 1. $post_by_id =>  user id
	################################################################################################################
	function ViewAll_Buyer_Rating1($user)
	{
	  	 global $db1;
		 $sql = "SELECT * FROM ".BUYER_RATING_MASTER. " AS BRM "
		        ." LEFT JOIN ".project_MASTER." AS PM ON BRM.project_id = PM.project_id "
		        ." WHERE BRM.rating_to_user = '".$user."' LIMIT 0,5";
		 $db1->query($sql);		
	}
	################################################################################################################
	# Function		: Average_Buyer_Rating()
	# Purpose		: This function is used to returning ave_rate
	# Return		: ave_rate
	# Used At 		: task_owner_feedback.php
	################################################################################################################
	function Average_Buyer_Rating($user)
	{
	  	 global $db;
		 $sql = "SELECT rating_to_user,AVG(rating) as ave_rate FROM ".BUYER_RATING_MASTER
				 ." WHERE rating_to_user ='".$user."' GROUP BY rating_to_user='".$user."' ";  
		 $db->query($sql);
		 $db->next_record();
		 return ($db->f('ave_rate'));
 	}
	################################################################################################################
	# Function		: Total_Ratings_By_Tasker()
	# Purpose		: This function is used to return the total number of ratings by a tasker
	# Return		: count
	# Used At 		: task_owner_feedback.php and viewtask_ownerprofile.php
	################################################################################################################
	function Total_Ratings_By_Tasker($user)
	{
	  	 global $db1;
		 $sql = "SELECT rating_by_user, count(*) as cnt FROM ".BUYER_RATING_MASTER
				 ." WHERE rating_by_user ='".$user."' GROUP BY rating_by_user='".$user."' ";  
		 $db1->query($sql);
		 $db1->next_record();
		 return ($db1->f('cnt'));
 	}
	
	################################################################################################################
	# Function		: Update_task_owner_profile($post)
	# Purpose		: This function is used to update data in table
	# Return		: none
	# Used At 		: 
	# Parameters	
	# 1. $post =>  array of post
	# 2. $it_buyers_slogan =>  buyer slogan in italian
	# 3. $it_buyers_description =>  buyer description in italian
	# 4. $en_buyers_slogan =>  buyer slogan in english
	# 5. $en_buyers_description =>  buyer description in english
	################################################################################################################
	function Update_task_owner_profile($post)
	{
	   global $db;
		$sql="UPDATE ".PROFILE_MASTER
		    ." SET "
			." buyers_slogan = '".$post['buyers_slogan']."',"
			." buyers_description = '".$post['buyers_description']."',"
			." buyers_profile_status = '1' "
		    ." WHERE user_auth_id ='".$post['user_auth_id']."'"; 
		return($db->query($sql));
	}
	################################################################################################################
	# Function		: Insert($post)
	# Purpose		: This function is used to insert data in table
	# Return		: none
	# Used At 		: 
	# Parameters	
	# 1. $post =>  array of post
	# 2. $it_buyers_slogan =>  buyer slogan in italian
	# 3. $it_buyers_description =>  buyer description in italian
	# 4. $en_buyers_slogan =>  buyer slogan in english
	# 5. $en_buyers_description =>  buyer description in english
	################################################################################################################
	function Insert_task_owner_profile($post)
	{
	   global $db;
		$sql="INSERT INTO ".PROFILE_MASTER
			." (user_auth_id,buyers_slogan,buyers_description,buyers_profile_status) "
			." VALUES ('".$post['user_auth_id']."' ,"
			." '".$post['buyers_slogan']."' ,"
			." '".$post['buyers_description']."' ,"
			." '1'"
			." )";
		return($db->query($sql));	
	}
}
?>