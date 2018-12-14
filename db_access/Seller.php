<?php
class Seller
{
	function Seller()
	{}

	################################################################################################################
	# Function		: GetsellerDetails($buyer_id)
	# Purpose		: This function is used to check wheather table has entry exist for this user id or not
	# Return		: 0 or 1 depending on condition
	# Used At 		: edittaskerprofile.php
	# Parameters	
	# 1. $buyer_id =>  user id
	################################################################################################################
	function GetsellerDetails($buyer_id)
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

	function Update($post,$logo,$en_seller_slogan,$en_seller_description,$mother_lang,$lang_pairs)
	{
	   if($post['medic'] != 1)
	   {
	   		$mother_lang = '';
			$lang_pairs  = '';
	   }
	   if($post['industry_id'] == '')
		   {
			 $industry_id = $post['industry_id'];
		   }    
	   else
		   {
			$industry_id = implode(",",$post['industry_id']);
		   }
	   global $db;
	   $sql="UPDATE ".PROFILE_MASTER
			." SET "
			." seller_slogan	  	  ='".mysql_real_escape_string($en_seller_slogan)."' ,"
			." seller_description  	  ='".mysql_real_escape_string($en_seller_description)."' ,"
			." seller_rate_per_hour	  ='".$post['rate_hour']."' ,"
			." seller_exp			  ='".$post['Experience']."' ,"
			." seller_industry		  ='".$industry_id."' ,"
			." seller_logo			  ='".$logo."' ,"
			." mother_lang		  	  ='".$mother_lang."' ,"
			." lang_pairs			  ='".$lang_pairs."' ,"
			." medic			  ='".($post['medic'] == 1 ? 1 : 0 )."' "
			." WHERE user_auth_id	  ='".$post['User_Id']."' ";
		
		return($db->query($sql));
	}
	function Update_tasker_profile($post)
	{
	    if($post['medic'] != 1)
	   {
	   		$mother_lang = '';
			$lang_pairs  = '';
	   }
	   if($post['industry_id'] == '')
		   {
			 $industry_id = $post['industry_id'];
		   }    
	   else
		   {
			$industry_id = implode(",",$post['industry_id']);
		   }
	   global $db;
	   $sql="UPDATE ".PROFILE_MASTER
			." SET "
			." seller_slogan	  	  ='".mysql_real_escape_string($post['seller_slogan'])."' ,"
			." seller_description  	  ='".mysql_real_escape_string($post['seller_description'])."' ,"
			." seller_rate_per_hour	  ='".$post['rate_hour']."' ,"
			." seller_exp			  ='".mysql_real_escape_string($post['Experience'])."' ,"
			." seller_industry		  ='".$industry_id."' ,"
			." mother_lang		  	  ='".$mother_lang."' ,"
			." lang_pairs			  ='".$lang_pairs."' ,"
			." medic			  ='".($post['medic'] == 1 ? 1 : 0 )."' "
			." WHERE user_auth_id	  ='".$post['user_auth_id']."' ";
		return($db->query($sql));
	}
	function Insert($post,$logo,$en_seller_slogan,$en_seller_description,$mother_lang,$lang_pairs)
	{
	   if($post['medic'] != 1)
	   {
	   		$mother_lang = '';
			$lang_pairs  = '';
	   }
	   if($post['industry_id'] == '')
		   {
			 $industry_id = $post['industry_id'];
		   }    
	   else
		   {
			$industry_id = implode(",",$post['industry_id']);
		   }
	   global $db;
	   $sql="INSERT INTO ".PROFILE_MASTER
			." (user_auth_id,seller_slogan,seller_description,seller_rate_per_hour, "
			." seller_exp,seller_industry,seller_logo,mother_lang,lang_pairs,medic )"
			." VALUES ('".$post['User_Id']."' ,"
			." '".mysql_real_escape_string($en_seller_slogan)."' ,"
			." '".mysql_real_escape_string($en_seller_description)."' ,"
			." '".$post['rate_hour']."' ,"
			." '".mysql_real_escape_string($post['Experience'])."' ,"
			." '".$industry_id."' ,"
			." '".$logo."' ,"
			." '".$mother_lang."' ,"
			." '".$lang_pairs."' ,"
			." '".($post['medic'] == 1 ? 1 : 0 )."' "
			." )";
			
		return($db->query($sql));	
	}
	
	function Insert_tasker_profile($post)
	{
	   if($post['medic'] != 1)
	   {
	   		$mother_lang = '';
			$lang_pairs  = '';
	   }
	   if($post['industry_id'] == '')
		   {
			 $industry_id = $post['industry_id'];
		   }    
	   else
		   {
			$industry_id = implode(",",$post['industry_id']);
		   }
	   global $db;
	   $sql="INSERT INTO ".PROFILE_MASTER
			." (user_auth_id,seller_slogan,seller_description,seller_rate_per_hour, "
			." seller_exp,seller_industry,mother_lang,lang_pairs,medic)"
			." VALUES ('".$post['user_auth_id']."' ,"
			." '".mysql_real_escape_string($post['seller_slogan'])."' ,"
			." '".mysql_real_escape_string($post['seller_description'])."' ,"
			." '".$post['rate_hour']."' ,"
			." '".mysql_real_escape_string($post['Experience'])."' ,"
			." '".$industry_id."' ,"
			." '".$mother_lang."' ,"
			." '".$lang_pairs."' ,"
			." '".$medic."' "
			." )";
	return($db->query($sql));	
	}
	################################################################################################################
	# Function		: GetSellerDetails1($userid)
	# Purpose		: This function is used to get details of user from table
	# Return		: object
	# Used At 		: edittaskerprofile.php
	# Parameters	
	# 1. $userid =>  user id
	################################################################################################################
	function GetSellerDetails1($userid)
	{
		global $db;
		$sql = " SELECT * FROM ".PROFILE_MASTER
			  ." WHERE user_auth_id  = '".$userid."'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
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
	# Function		: Get_Skills($user_auth_id)
	# Purpose		: This function is used to get details of skill from table
	# Return		: none
	# Used At 		: edittaskerprofile.php
	# Parameters	
	# 1. $user_auth_id =>  user id
	################################################################################################################
	function Get_Skills($user_auth_id)
	{
		global $db;
		$sql =	"SELECT * FROM ".SELLER_SKILL_MASTER
			."	WHERE user_auth_id = '".$user_auth_id."' ";
		$db->query($sql);
	} 
	
	
	################################################################################################################
	# Function		: Skills_Master($user_auth_id,$skill_id,$skill_name,$skill_rate)
	# Purpose		: This function is used to insert or update skill in table
	# Return		: none
	# Used At 		: edittaskerprofile.php
	# Parameters	
	# 1. $user_auth_id =>  user id
	# 1. $skill_id	   =>  skill id
	# 1. $skill_name   =>  skill name
	# 1. $skill_rate   =>  skill rating
	################################################################################################################
	function Skills_Master($user_auth_id,$skill_id,$skill_name,$skill_rate)
	{
		global $db;
	    $sql =  "SELECT * FROM ". SELLER_SKILL_MASTER
            . 	" WHERE user_auth_id  = '". $user_auth_id. "' AND skill_id = '".$skill_id."'";
		$db->query($sql);
		$db->next_record();
		$cnt = $db->num_rows();
	    if($cnt >= 1 && $skill_name != "")
	    {
			///update query
			$sql =	"UPDATE ".SELLER_SKILL_MASTER
					." SET "
					." skill_name	  	  ='".$skill_name."' ,"
					." skill_rate	  	  ='".$skill_rate."'"
					." WHERE skill_id 	  = '".$skill_id."' ";
			$db->query($sql);
			
	    }
		if($cnt == 0 && $skill_name != "")
		{
			///insert query
			$sql="INSERT INTO ".SELLER_SKILL_MASTER
				." (user_auth_id,skill_name,skill_rate) "
				." VALUES ('".$user_auth_id."' ,"
				." '".$skill_name."' ,"
				." '".$skill_rate."' "
				." )";
			$db->query($sql);	
		}
	}
	
	################################################################################################################
	# Function		: Skills_Listing($user_auth_id)
	# Purpose		: This function is used to get listing of skills from table
	# Return		: object
	# Used At 		: viewtaskerprofile.php
	# Parameters	
	# 1. $user_auth_id =>  user id
	################################################################################################################
	function Skills_Listing($user_auth_id)
	{
		global $db;
	    $sql =  "SELECT * FROM ". SELLER_SKILL_MASTER
            . 	" WHERE user_auth_id  = '". $user_auth_id. "' ";
		$db->query($sql);
		return ($db->fetch_object());
	}
	
	################################################################################################################
	# Function		: Get_Avg_Skill_User($user_auth_id)
	# Purpose		: This function is used to get average skill set by himself
	# Return		: count generated by query
	# Used At 		: viewtaskerprofile.php
	# Parameters	
	# 1. $user_auth_id =>  user id
	################################################################################################################
	function Get_Avg_Skill_User($user_auth_id)
	{
		global $db;
	    $sql =  "SELECT count(*) as cnt FROM ". SELLER_SKILL_MASTER
            . 	" WHERE user_auth_id  = '". $user_auth_id. "' ";
		$db->query($sql);
		$db->next_record();
		$cnt = $db->f('cnt');
		
		$db->free();
		if($cnt == 0)
		{
		    return $cnt;
		}
		else
		{
			$sql =  "SELECT * FROM ". SELLER_SKILL_MASTER
				. 	" WHERE user_auth_id  = '". $user_auth_id. "' ";
			$db->query($sql);
			$total = 0;
			while($db->next_record())
			{
				$total	=	$total + $db->f('skill_rate');
			}
			$avg = ($total / $cnt);
			return $avg;
		}
	}
	
	################################################################################################################
	# Function		: Skill_Count_User($user_auth_id)
	# Purpose		: This function is used to get count of skill set by himself
	# Return		: count generated by query
	# Used At 		: viewtaskerprofile.php
	# Parameters	
	# 1. $user_auth_id =>  user id
	################################################################################################################
	function Skill_Count_User($user_auth_id)
	{
		global $db1;
	    $sql =  "SELECT count(*) as cnt FROM ". SELLER_SKILL_MASTER
            . 	" WHERE user_auth_id  = '". $user_auth_id. "' ";
		$db1->query($sql);
		$db1->next_record();
		$cnt = $db1->f('cnt');
		return $cnt;
	}
	
	################################################################################################################
	# Function		: Delete($bid_id)
	# Purpose		: This function is used to delete bid palce
	# Used At 		: tasker_activity.php
	# Parameters	
	# 1. $user_auth_id =>  user id
	################################################################################################################
	function Delete($bid_id)
	{
		global $db;
		$sql="DELETE FROM ".BID_MASTER
			." WHERE bid_id=".$bid_id;
		return($db->query($sql));
	}
	################################################################################################################
	# Function		: GetSellerPortfolio($user_auth_id)
	# Purpose		: This function is used to get list of portfolio posted by user
	# Return		: none
	# Used At 		: viewtaskerprofile.php
	# Parameters	
	# 1. $user_auth_id =>  user id
	################################################################################################################
	function GetSellerPortfolio($user_auth_id)
	{
	    global $db;
		$sql = " SELECT * FROM ".SELLER_PORTFOLIO_MASTER." AS SPM"
	        ." LEFT JOIN ".INDUSTRY_MASTER." AS IM ON SPM.industry = IM.industry_id"
			." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON SPM.budget = DC.development_id"
			." LEFT JOIN ".EXECUTION_TIME." AS ET ON SPM.time_spent = ET.exe_id"
	        ." WHERE user_auth_id = '".$user_auth_id."' ORDER BY SPM.display_order ASC LIMIT 0,3";
	    $db->query($sql);	
	}
	function GetSellerPortfolioByName($user_name)
	{
	    global $db;
		$sql = " SELECT * FROM ".SELLER_PORTFOLIO_MASTER." AS SPM"
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON SPM.user_auth_id = MM.user_auth_id"
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LEFT JOIN ".STATE_MASTER." AS SM ON MM.mem_state = SM.state_id"
	        ." WHERE user_name = '".$user_name."' ORDER BY SPM.display_order ASC ";
	    $db->query($sql);	
		return($db->query($sql));
	}
	function SellerPortfolio($user_name)
	{
	    global $db1;
		$sql = " SELECT * FROM ".SELLER_PORTFOLIO_MASTER." AS SPM"
	        ." LEFT JOIN ".INDUSTRY_MASTER." AS IM ON SPM.industry = IM.industry_id"
			." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON SPM.budget = DC.development_id"
			." LEFT JOIN ".EXECUTION_TIME." AS ET ON SPM.time_spent = ET.exe_id"
	        ." WHERE user_auth_id = '".$user_name."' ORDER BY SPM.display_order ASC ";
	    $db1->query($sql);	
		return ($db1->fetch_object());
	}
	################################################################################################################
	# Function		: List_All_Sellers()
	# Purpose		: This function is used for listing of sellers 
	# Return		: none
	# Used At 		: tasker_category_list.php
	################################################################################################################
	
	function List_All_Sellers()
	{
		global $db1;
		$sql="SELECT count(*) as cnt FROM ".PROFILE_MASTER." AS PM "
	        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.user_auth_id = MM.user_auth_id"
	        ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			."";
		$db1->query($sql);
		$db1->next_record();
		$_SESSION['total_record'] = $db1->f("cnt") ;
		$db1->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		
		$sql = "SELECT * FROM ".PROFILE_MASTER." AS PM "
	        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.user_auth_id = MM.user_auth_id"
	        ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
	    $db1->query($sql);	
	}

	################################################################################################################
	# Function		: Get_Seller_Count()
	# Purpose		: This function is used for count of sellers 
	# Return		: count value
	# Used At 		: tasker_category_list.php
	################################################################################################################
	function Get_Seller_Count()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".PROFILE_MASTER." AS PM "
	        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.user_auth_id = MM.user_auth_id"
	        ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			."";
		$db->query($sql);
		$db->next_record();
		return ($db->f("cnt")) ;
	}
	################################################################################################################
	# Function		: Get_Seller_Search_Count($search_keyword,$option)
	# Purpose		: This function is used for counting no of seller profile according to keywords and options
	# Return		: count value
	# Used At 		: search_tasker_profiles.php
	# Parameters	
	# 1. $search_keyword => search keyword
	# 2. $options => search option
	################################################################################################################
	function Get_Seller_Search_Count($search_keyword,$option)
	{
		global $db;
		if($option == 1)
		{
			$sql_connect = " WHERE MM.mem_city = '".$search_keyword."' "
						  ." OR MM.mem_state = '".$search_keyword."' "
						  ." OR CM.country_name = '".$search_keyword."' "
						  ." OR MM.user_login_id = '".$search_keyword."' "
			              ." OR PM.seller_description  like '%".$search_keyword."%' ";
		}
		if($option == 2)
		{
			$sql_connect = " WHERE MM.mem_city = '".$search_keyword."' "
						  ." OR MM.mem_state = '".$search_keyword."' "
						  ." OR CM.country_name = '".$search_keyword."' ";
		}
		if($option == 3)
			$sql_connect = " WHERE MM.user_login_id = '".$search_keyword."' ";
		if($option == 4)
			$sql_connect = " WHERE PM.seller_description  like '%".$search_keyword."%' ";

////////////////////////////
		$sql="SELECT count(*) as cnt FROM ".PROFILE_MASTER." AS PM "
	        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.user_auth_id = MM.user_auth_id"
	        ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			. $sql_connect;
		$db->query($sql);
		$db->next_record();
		return($db->f("cnt"));
	}
	################################################################################################################
	# Function		: Search_All_Sellers($search_keyword,$option)
	# Purpose		: This function is used for seller profile searching according to keywords and options
	# Return		: none
	# Used At 		: search_tasker_profiles.php
	# Parameters	
	# 1. $search_keyword => search keyword
	# 2. $options => search option
	################################################################################################################
	function Search_All_Sellers($search_keyword)
	{
		global $db1;
		
		/*if($option == 1)
		{*/
			$sql_connect = " WHERE MM.mem_city like '%".$search_keyword."%' "
						  ." OR MM.mem_state like '%".$search_keyword."%' "
						  ." OR CM.country_name like '%".$search_keyword."%' "
						  ." OR MM.user_login_id like '%".$search_keyword."%' "
			              ." OR PM.seller_description  like '%".$search_keyword."%' ";
		/*}
		if($option == 2)
		{
			$sql_connect = " WHERE MM.mem_city = '".$search_keyword."' "
						  ." OR MM.mem_state = '".$search_keyword."' "
						  ." OR CM.country_name = '".$search_keyword."' ";
		}
		if($option == 3)
			$sql_connect = " WHERE MM.user_login_id = '".$search_keyword."' ";
		if($option == 4)
			$sql_connect = " WHERE PM.seller_description  like '%".$search_keyword."%' ";
*/
////////////////////////////
		$sql="SELECT count(*) as cnt FROM ".PROFILE_MASTER." AS PM "
	        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.user_auth_id = MM.user_auth_id"
	        ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			. $sql_connect;
		$db1->query($sql);
		$db1->next_record();
		$_SESSION['total_record'] = $db1->f("cnt") ;
		$db1->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql = "SELECT * FROM ".PROFILE_MASTER." AS PM "
	        ." LEFT JOIN ".MEMBER_MASTER." AS MM ON PM.user_auth_id = MM.user_auth_id"
	        ." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			. $sql_connect
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
	    $db1->query($sql);	
	}
	
	################################################################################################################
	# Function		: Seller_Win_projects()
	# Purpose		: This function is used for listing project win by seller
	# Return		: -
	# Used At 		: seller_project_win.php
	################################################################################################################
	function Seller_Win_projects($user,$citycurrent)
	{
		global $db;
		$sql="SELECT * FROM ".project_MASTER." WHERE project_post_to ='".$user."' AND project_city ='$citycurrent' AND (project_status =3 OR	project_status=5 OR project_status=6) ";
		$db->query($sql);
	}
	################################################################################################################
	# Function		: Seller_Win_projects()
	# Purpose		: This function is used for listing project win by seller
	# Return		: -
	# Used At 		: seller_project_win.php
	################################################################################################################
	function Seller_Place_projects($user)
	{
		global $db;
		$sql=" SELECT * FROM ".BID_MASTER." AS BM "
			 ." LEFT JOIN ".project_MASTER." AS PM ON BM.project_id = PM.project_id"
		     ." WHERE BM.bid_by_user ='".$user."' AND (PM.project_status =1 OR PM.project_status =2 OR PM.project_status =3)";
		$db->query($sql);
	}
	
	################################################################################################################
	# Function		: ViewAll_Seller_Rating()
	# Purpose		: This function is used to get data of project posted by user
	# Return		: none
	# Used At 		: task_owner_feedback.php
	# Parameters	
	# 1. $post_by_id =>  user id
	################################################################################################################
	function ViewAll_Seller_Rating($user)
	{
	  	 global $db1;
		 $sql = "SELECT * FROM ".SELLER_RATING_MASTER. " AS SRM "
		        ." LEFT JOIN ".project_MASTER." AS PM ON SRM.project_id = PM.project_id "
		        ." WHERE SRM.rating_to_user = '".$user."' ";
		 $db1->query($sql);		
	}
	################################################################################################################
	# Function		: ViewAll_Seller_Rating()
	# Purpose		: This function is used to get data of project posted by user
	# Return		: none
	# Used At 		: task_owner_feedback.php
	# Parameters	
	# 1. $post_by_id =>  user id
	################################################################################################################
	function ViewAll_Seller_Rating1($user)
	{
	  	 global $db1;
		 $sql = "SELECT * FROM ".SELLER_RATING_MASTER. " AS SRM "
		        ." LEFT JOIN ".project_MASTER." AS PM ON SRM.project_id = PM.project_id "
		        ." WHERE SRM.rating_to_user = '".$user."' LIMIT 0,5";
		 $db1->query($sql);		
	}
	################################################################################################################
	# Function		: Average_Seller_Rating()
	# Purpose		: This function is used to returning ave_rate
	# Return		: ave_rate
	# Used At 		: task_owner_feedback.php
	################################################################################################################
	function Average_Seller_Rating($user)
	{
	  	 global $db;
		 $sql = "SELECT rating_to_user,AVG(rating) as ave_rate FROM ".SELLER_RATING_MASTER
				 ." WHERE rating_to_user ='".$user."' GROUP BY rating_to_user='".$user."' ";  
		 $db->query($sql);
		 $db->next_record();
		 return ($db->f('ave_rate'));
 	}
	################################################################################################################
	# Function		: Total_Ratings_By_task_owner()
	# Purpose		: This function is used to return the total number of ratings by a tasker
	# Return		: count
	# Used At 		: task_owner_feedback.php and viewtask_ownerprofile.php
	################################################################################################################
	function Total_Ratings_By_task_owner($user)
	{
	  	 global $db1;
		 $sql = "SELECT rating_by_user, count(*) as cnt FROM ".SELLER_RATING_MASTER
				 ." WHERE rating_by_user ='".$user."' GROUP BY rating_by_user='".$user."' ";  
		 $db1->query($sql);
		 $db1->next_record();
		 return ($db1->f('cnt'));
 	}
		
	################################################################################################################
	# Function		: Average_Seller_Rating_Count()
	# Purpose		: This function is used to returning ave_rate
	# Return		: ave_rate
	# Used At 		: task_owner_feedback.php
	################################################################################################################
	function Average_Seller_Rating_Count($user)
	{
	  	 global $db;
		 $sql = "SELECT rating_to_user,count(*) as cnt FROM ".SELLER_RATING_MASTER
				 ." WHERE rating_to_user ='".$user."' GROUP BY rating_to_user='".$user."' ";  
		 $db->query($sql);
		 $db->next_record();
		 return ($db->f('cnt'));
 	}
	
	################################################################################################################
	# Function		: UpdateImage($post)
	# Purpose		: This function is used to update some field in table
	# Return		: none
	# Used At 		: edittaskerprofile.php
	# Parameters	
	# 1. $post =>  array of post
	################################################################################################################
	function UpdateImage_At_Admin($post)
	{

		global $db,$physical_path;
		
		 $sql=" UPDATE ".PROFILE_MASTER
			 ." SET "
		     ." seller_logo	  	  = '' "
			 ." WHERE user_auth_id	  ='".$post['user_auth_id']."' ";
		$db->query($sql);
		return($db->query($sql));	

	}

}	
?>