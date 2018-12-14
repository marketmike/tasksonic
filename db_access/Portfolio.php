<?php
class Portfolio
{
	function Portfolio()
	{}
	
	function Insert($post,$portfolio_image,$user_auth_id,$user_name,$en_seller_title,$en_seller_description)
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
	  $sql= " INSERT INTO ".SELLER_PORTFOLIO_MASTER
			." (user_auth_id,user_name,title,description,sample_file,industry,budget,time_spent,categories) "
			." VALUES ( "
			." '".$user_auth_id."' ,"
			." '".$user_name."' ,"
			." '".$en_seller_title."' ,"
			." '".$en_seller_description."' ,"
			." '".$portfolio_image."' ,"
			." '".$post['industry']."' ,"
			." '".$post['dev']."' ,"
			." '".$post['exe']."' ,"
			." '".$cates."' "
			."  )";
		$db->query($sql);
		
	}
	
	################################################################################################################
	# Function		: ViewAllPortfolio($user_auth_id)
	# Purpose		: This function is used to list all portfolio posted by user
	# Return		: none
	# Used At 		: manage_portfolio.php
	# Parameters	
	# 1. $user_auth_id =>   user id
	################################################################################################################
	function ViewAllPortfolio($user_auth_id)
	{
	  global $db1;
	  $sql = " SELECT * FROM ".SELLER_PORTFOLIO_MASTER." AS SPM"
	        ." LEFT JOIN ".INDUSTRY_MASTER." AS IM ON SPM.industry = IM.industry_id"
			." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON SPM.budget = DC.development_id"
			." LEFT JOIN ".EXECUTION_TIME." AS ET ON SPM.time_spent = ET.exe_id"
	        ." WHERE user_auth_id = '".$user_auth_id."' ORDER BY SPM.display_order ASC ";
     $db1->query($sql);	
	}
	
	################################################################################################################
	# Function		: Delete_Portfolio($id_1)
	# Purpose		: This function is used to delete portfolio entry and images uploaded for id
	# Return		: none
	# Used At 		: manage_portfolio.php
	# Parameters	
	# 1. $id_1 =>   id
	################################################################################################################
	function Delete_Portfolio($id_1)
	  {
	     global $db,$physical_path;
	     $sql = "SELECT * FROM ".SELLER_PORTFOLIO_MASTER." WHERE portfolio_id=".$id_1;
		 $db->query($sql);
		 
		 while($db->next_record())
		 {
			$n1 = @unlink($physical_path['Portfolio'].$db->f('sample_file'));
			$n1 = @unlink($physical_path['Portfolio']."thumb_".$db->f('sample_file'));
		 }
		 
		$sql="DELETE FROM ".SELLER_PORTFOLIO_MASTER
			." WHERE portfolio_id=".$id_1;
		return($db->query($sql));
	 }
 
	 function Get_Portfolio($port_id)
	  {
	     global $db;
	     $sql = "SELECT * FROM ".SELLER_PORTFOLIO_MASTER." WHERE portfolio_id=".$port_id;
		 $db->query($sql);
		 return($db->fetch_object(MYSQL_FETCH_SINGLE));
	 }
	################################################################################################################
	# Function		: View_Portfolio_All_Order($user_id1,)
	# Purpose		: This function is used to list portfolio according to display order
	# Return		: none
	# Used At 		: manage_portfolio.php
	# Parameters	
	# 1. $portfolio_id11 =>   id
	# 2. $display_order =>   display order
	################################################################################################################
	function View_Portfolio_All_Order($user_id1)
	{

		global $db;
		$sql= "SELECT * FROM ".SELLER_PORTFOLIO_MASTER
	 		  ." WHERE user_auth_id = '".$user_id1."'  "
	 		  ." ORDER BY display_order ASC  ";
		$db->query($sql);
	}
	
	################################################################################################################
	# Function		: DisplayOrder_Portfolio_Type($portfolio_id11, $display_order)
	# Purpose		: This function is used to set portfolio display order
	# Return		: none
	# Used At 		: manage_portfolio.php
	# Parameters	
	# 1. $portfolio_id11 =>   id
	# 2. $display_order =>   display order
	################################################################################################################
	function DisplayOrder_Portfolio_Type($portfolio_id11, $display_order)
	{
		global $db;

		$sql = " UPDATE ". SELLER_PORTFOLIO_MASTER
			.  " SET display_order 	= '". $display_order. "' "
			.  " WHERE portfolio_id	= '". $portfolio_id11. "' ";
		$db->query($sql);
		return ($db->affected_rows());

	}
	function UpdateImage($post)
	{

		global $db;
		
		 $sql=" UPDATE ".SELLER_PORTFOLIO_MASTER
			 ." SET "
		     ." sample_file	  	  = '' "
			 ." WHERE user_auth_id	  ='".$post['User_Id']."' AND portfolio_id = '".$post['pro_id']."' ";
		$db->query($sql);
		return($db->query($sql));	

	}
	
	function Update($post,$logo,$en_seller_title,$en_seller_description)
	{
	   if($post['cat_prod'] == '')
		   {
			 $cat_prod1 = $post['cat_prod'];
		   }    
	   else
		   {
			$cat_prod1 = implode(",",$post['cat_prod']);
		   }
	   global $db;
	   $sql="UPDATE ".SELLER_PORTFOLIO_MASTER
			." SET "
			." title	  	  ='".$en_seller_title."' ,"
			." description 	  ='".$en_seller_description."' ,"
			." sample_file	  ='".$logo."' ,"
			." industry		  ='".$post['industry']."' ,"
			." budget		  ='".$post['dev']."' ,"
			." time_spent	  ='".$post['exe']."' ,"
			." categories	  ='".$cat_prod1."' "
			." WHERE user_auth_id	  ='".$post['User_Id']."' AND portfolio_id ='".$post['pro_id']."'";
		return($db->query($sql));
	}
	
	function GetPortFolio($userid,$portid)
	{
	  global $db;
	  $sql = " SELECT * FROM ".SELLER_PORTFOLIO_MASTER." AS SPM"
	        ." LEFT JOIN ".INDUSTRY_MASTER." AS IM ON SPM.industry = IM.industry_id"
			." LEFT JOIN ".DEVELOPMENT_COST." AS DC ON SPM.budget = DC.development_id"
			." LEFT JOIN ".EXECUTION_TIME." AS ET ON SPM.time_spent = ET.exe_id"
	         ." WHERE user_auth_id= '".$userid."' AND portfolio_id='".$portid."' ";
	  $db->query($sql); 		 
    }
	
	################################################################################################################
	# Function		: Get_Portfolio_Count()
	# Purpose		: This function is used for counting no of portfolio
	# Return		: count value
	# Used At 		: all_portfolio.php
	# Parameters	
	# 1. $user_auth_id => user auth id
	################################################################################################################
	function Get_Portfolio_Count()
	{
		global $db;
		$sql="SELECT distinct(user_auth_id) FROM ".SELLER_PORTFOLIO_MASTER;
		$db->query($sql);
		return ($db->num_rows());
	}

	################################################################################################################
	# Function		: Unique_Portfolio_User()
	# Purpose		: This function is used for portfolio listing
	# Return		: none
	# Used At 		: all_portfolio.php
	# Parameters	
	# 1. $user_auth_id => user auth id
	################################################################################################################
	function Unique_Portfolio_User()
	{
		global $db1;
		$sql="SELECT distinct(user_auth_id) FROM ".SELLER_PORTFOLIO_MASTER;
		$db1->query($sql);
		$_SESSION['total_record'] = $db1->num_rows();
		$db1->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
		
		$sql = " SELECT distinct(SPM.user_auth_id),MM.*,CM.country_name, SM.state_name FROM ".SELLER_PORTFOLIO_MASTER. "AS SPM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON SPM.user_auth_id = MM.user_auth_id"
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LEFT JOIN ".STATE_MASTER." AS SM ON MM.mem_state = SM.state_id"
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		$db1->query($sql); 	
	}
	
	################################################################################################################
	# Function		: Get_User_Portfolio_count($user_auth_id)
	# Purpose		: This function is used for counting no of portfolio posted by user
	# Return		: count value
	# Used At 		: search_tasker_profiles.php,all_portfolio.php
	# Parameters	
	# 1. $user_auth_id => user auth id
	################################################################################################################
	function Get_User_Portfolio_count($user_auth_id)
	{
		global $db2;
		$sql = " SELECT count(*) as cnt FROM ".SELLER_PORTFOLIO_MASTER
			 ." WHERE user_auth_id= '".$user_auth_id."' ";
		$db2->query($sql); 		 
		$db2->next_record();
		return ($db2->f('cnt'));
	}
	################################################################################################################
	# Function		: Get_Sample_File($user_auth_id)
	# Purpose		: This function is used for display first 3 file of portfolio posted by user
	# Return		: array as object
	# Used At 		: search_tasker_profiles.php,all_portfolio.php
	# Parameters	
	# 1. $user_auth_id => user auth id
	################################################################################################################
	function Get_Sample_File($user_auth_id)
	{
		global $db2;
		$sql= "SELECT * FROM ".SELLER_PORTFOLIO_MASTER
	 		  ." WHERE user_auth_id = '".$user_auth_id."'  "
	 		  ." ORDER BY display_order ASC LIMIT 0,5 ";
		$db2->query($sql);
		return ($db2->fetch_object());
	}
	################################################################################################################
	# Function		: Search_Portfolio($search_keyword)
	# Purpose		: This function is used for searching portfolio according to keywords and options
	# Return		: none
	# Used At 		: search_tasker_profiles.php
	# Parameters	
	# 1. $search_keyword => search keyword
	# 2. $options => search option
	################################################################################################################
	
	function Search_Portfolio($search_keyword)
	{
		global $db1;
		///////////////////
		/*if($option == 1)
		{*/
			$sql_connect = " WHERE SPM.title like '%".$search_keyword."%'"
						  ." OR SPM.description like '%".$search_keyword."%'"
						  ." OR SPM.user_name like '%".$search_keyword."%'";
		/*}
		if($option == 2)
			$sql_connect = " WHERE SPM.title like '%".$search_keyword."%'";
		if($option == 3)
			$sql_connect = " WHERE SPM.description like '%".$search_keyword."%'";
		if($option == 4)
			$sql_connect = " WHERE SPM.user_name = '".$search_keyword."'";*/
		///////////////////		

		$sql="SELECT distinct(user_auth_id) FROM ".SELLER_PORTFOLIO_MASTER. "AS SPM "
 		    ."".$sql_connect."";
		
		$db1->query($sql);

		$_SESSION['total_record'] = $db1->num_rows();
		$db1->free();

		# Reset the start record if required
		if($_SESSION['user_page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql = "SELECT distinct(SPM.user_auth_id),MM.*,CM.country_name FROM ".SELLER_PORTFOLIO_MASTER. "AS SPM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON SPM.user_auth_id = MM.user_auth_id"
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
 		    ."".$sql_connect.""
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['user_page_size'];
		
		$db1->query($sql); 	
	}

	################################################################################################################
	# Function		: Search_Portfolio_Count($search_keyword,$options)
	# Purpose		: This function is used for counting no of portfolio according to keywords and options
	# Return		: count value
	# Used At 		: search_tasker_profiles.php
	# Parameters	
	# 1. $search_keyword => search keyword
	# 2. $options => search option
	################################################################################################################
	function Search_Portfolio_Count($search_keyword,$option)
	{
		global $db;
		if($option == 1)
		{
			$sql_connect = " WHERE SPM.title like '%".$search_keyword."%'"
						  ." OR SPM.description like '%".$search_keyword."%'"
						  ." OR SPM.user_name = '".$search_keyword."'";
		}
		if($option == 2)
			$sql_connect = " WHERE SPM.title like '%".$search_keyword."%'";
		if($option == 3)
			$sql_connect = " WHERE SPM.description like '%".$search_keyword."%'";
		if($option == 4)
			$sql_connect = " WHERE SPM.user_name = '".$search_keyword."'";


		$sql="SELECT distinct(user_auth_id) FROM ".SELLER_PORTFOLIO_MASTER. "AS SPM "
 		    ."".$sql_connect."";
		$db->query($sql);
		return($db->num_rows());
	}
	
	################################################################################################################
	# Function		: Search_Protfolio_Admin_side($post)
	# Purpose		: This function is used for searching project according to keywords and options
	# Return		: none
	# Used At 		: project_search.php
	# Parameters	
	# 1. $keywords => search keyword
	# 2. $options => search option
	################################################################################################################
	
	function Search_Protfolio_Admin_side($post)
	{
		global $db1;
		///////////////////
		
		if($post['any_where'] != '')
			{
				$sql_connect = " WHERE SPM.title like '%".$post['any_where']."%'"
							  ." OR SPM.desc like '%".$post['any_where']."%'"
							  ." OR SPM.user_name = '".$post['any_where']."'";
			}
		if($post['portfolio_title'] != '')
			{
				$sql_connect = " WHERE SPM.title like '%".$post['portfolio_title']."%'";
			}	
		if($post['portfolio_description'] != '')	
		    {
				$sql_connect = " WHERE SPM.desc like '%".$post['portfolio_description']."%'";
			}	
		if($post['user_name'] != '')	
		    {
				$sql_connect = " WHERE SPM.user_name = '".$post['user_name']."'";
			}	
		///////////////////		

		$sql="SELECT distinct(user_auth_id) FROM ".SELLER_PORTFOLIO_MASTER. "AS SPM "
 		    ."".$sql_connect."";
		$db1->query($sql);

		$_SESSION['total_record'] = $db1->num_rows();
		$db1->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql = "SELECT distinct(SPM.user_auth_id),MM.*,CM.country_name FROM ".SELLER_PORTFOLIO_MASTER. "AS SPM "
			." LEFT JOIN ".MEMBER_MASTER." AS MM ON SPM.user_auth_id = MM.user_auth_id"
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
 		    ."".$sql_connect.""
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		//print $sql."<br>";	
		$db1->query($sql); 	
	}
	
	function InsertImage($post,$logo)
	{

		global $db;
		
		 $sql=" UPDATE ".SELLER_PORTFOLIO_MASTER
			 ." SET "
		     ." sample_file	  	 	  = '".$logo."' "
			 ." WHERE user_auth_id	  = '".$post['User_Id']."' AND portfolio_id = '".$post['pro_id']."' ";
		$db->query($sql);
		return($db->query($sql));	

	}
	
}	
?>