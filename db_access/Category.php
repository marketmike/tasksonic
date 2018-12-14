<?php
class Category
{
	function Category()
	{}
	################################################################################################################
	# Function		: ViewAllCatagory($cat_parent_id)
	# Purpose		: This function is used to list all category by id
	# Return		: none
	# Used At 		: 
	# Parameters	
	# 1. $cat_parent_id =>  parent id
	################################################################################################################
	function ViewAllCatagory($cat_parent_id)
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".CATEGORY_MASTER
				. " WHERE cat_parent_id = '".$cat_parent_id."' ";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
	
		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
	
		$sql= " SELECT * FROM ".CATEGORY_MASTER
			 ." WHERE cat_parent_id = '".$cat_parent_id."' "; 
		$sql = $sql. " ORDER BY disp_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	}
    
	################################################################################################################
	# Function		: AddCategory($cat_parent_id)
	# Purpose		: This function is used to insert data
	# Return		: none
	# Used At 		: 
	# Parameters	
	# 1. $post =>  array of post
	################################################################################################################
	function AddCategory($post)
	{
		global $db;
		$sql="INSERT INTO ".CATEGORY_MASTER
			." (cat_parent_id,cat_name,cat_desc,disp_title,cat_status) "
			." VALUES ('".$post['cat_parent_id']."' ,"
			." '".$post['en_cat_name']."' ,"
			." '".$post['en_cat_desc']."' ,"
			." '".$post['en_disp_title']."' ,"
			." '".(int)$post['cat_status']."' )";

		$db->query($sql);
		$insertid=$db->sql_inserted_id();	
		$db->free();
	
		$sql= " SELECT * FROM ".CATEGORY_MASTER
			 ." WHERE cat_id = '".$post['cat_parent_id']."' "; 
		$db->query($sql);
		$db->next_record();
		if($post['cat_parent_id'] == 0)
			$cat_path = 0;
		else
			$cat_path = $db->f('cat_path')."/".$post['cat_parent_id'];

		$sql="UPDATE ".CATEGORY_MASTER
			." SET cat_path		='".$cat_path."' "
			." WHERE cat_id		=".$insertid;
		$db->query($sql);
		return($insertid);
	}


 	################################################################################################################
	# Function: GetCategory($cat_id)
	# Purpose: get data from id
	# Return: nothing
	# Parameters: 
	# 1. $cat_id = id
	################################################################################################################
	function GetCategory($cat_id)
	{
		global $db;
		$sql="SELECT * FROM ".CATEGORY_MASTER
			." WHERE cat_id = '".$cat_id."'";
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

 	################################################################################################################
	# Function: UpdateCategory($post)
	# Purpose: update data in table
	# Return: nothing
	# Parameters: 
	# 1. $post = array of post
	################################################################################################################
	function UpdateCategory($post)
	{
		global $db;
		$sql="UPDATE ".CATEGORY_MASTER
			." SET cat_name		='".$post['cat_name']."' ,"
			." cat_desc			='".$post['cat_desc']."' ,"
			." disp_title		='".$post['disp_title']."' ,"
			." cat_status		='".$post['cat_status']."' "
			." WHERE cat_id		=".$post['cat_id'];
		return($db->query($sql));
	}
 	################################################################################################################
	# Function: Update($cat_id)
	# Purpose: checking for subcategory
	# Return: depends on conditions
	# Parameters: 
	# 1. $cat_id = cat id
	################################################################################################################
	function ChkSubCat($cat_id)
	{
		global $db,$db1;
		$sql= " SELECT * FROM ".CATEGORY_MASTER
			 ." WHERE cat_parent_id  = '".$cat_id."' "; 
		$db->query($sql);
		$subcnt=$db->num_rows();
		if($subcnt==0)
		{
			if($prodcnt==0)
			{
			  return noprod;
			}
			else
			{
			  return prod;
			}
		
		}
		else
		{
			return subcat;
		}
		
	}
 	################################################################################################################
	# Function: DelCategory1($cat_id)
	# Purpose: delete data from id
	# Return: nothing
	# Parameters: 
	# 1. $cat_id = id
	################################################################################################################
	function DelCategory1($cat_id)
	{
		global $db;
		
		$sql="DELETE FROM ".CATEGORY_MASTER
			." WHERE cat_id=".$cat_id;
		return($db->query($sql));
	}
   #===============================================================================================
   # This function is used for updateing catagory order for particular Category Id
   # Admin Side
   #===============================================================================================   

	function DisplayOrder_Cat_Type($cat_id, $display_order)
	{
		global $db;

		$sql = " UPDATE ". CATEGORY_MASTER
			.  " SET disp_order 	= '". $display_order. "'"
			.  " WHERE cat_id	= '". $cat_id. "'";
	$db->query($sql);
		return ($db->affected_rows());

	}

   #===============================================================================================
   # This function is used for listing catagory order
   # Admin Side
   #===============================================================================================   
       
	function View_Cat_All_Order($cat_parent_id)
	{

		global $db;
		$sql= "SELECT * FROM ".CATEGORY_MASTER
	 		  ." WHERE cat_parent_id = ".$cat_parent_id."  "
	 		  ." ORDER BY disp_order ASC  ";
		$db->query($sql);
		#return ($db->fetch_object());
	}	
   #===============================================================================================
   # This function is used for visibility
   # User Side & Admin Side
   #===============================================================================================   
 
	function ToggleStatusCategory($cat_id, $cat_visible)
	{
		global $db;
		$sql = " UPDATE ".CATEGORY_MASTER
			 . " SET cat_status ='". $cat_visible."'"
			 . " WHERE cat_id = '". $cat_id. "'";
		return ($db->query($sql));
	}
	
   #===============================================================================================
   # This function is used for getting catagory name
   # Admin Side
   #===============================================================================================   

	function getTitle($cat_id)
	{
		global $db;
		$sql="SELECT * FROM ".CATEGORY_MASTER
			." WHERE cat_id = '".$cat_id."'";
		$db->query($sql);
		$db->next_record();
		return($db->f('cat_name'));
	}
	################################################################################################################
	# Function		: Home_Page_1()
	# Purpose		: This function is used for getting first 9 category 
	# Return		: object as array
	# Used At 		: index.php,all_projects.php,search_tasks.php,tasker_category_list.php,search_tasker_profiles.php,
	#				  all_portfolio.php,search_portfolio.php
	################################################################################################################

	function Home_Page_1()
	{
		global $db;
		$sql= " SELECT * FROM ".CATEGORY_MASTER
			. " WHERE cat_parent_id = 0  AND cat_status = 1 ORDER BY cat_name ASC "
			." LIMIT 0,15";
		$db->query($sql);
	}

	################################################################################################################
	# Function		: Home_Page_2()
	# Purpose		: This function is used for getting 9 category after first 9
	# Return		: object as array
	# Used At 		: index.php,all_projects.php,search_tasks.php,tasker_category_list.php,search_tasker_profiles.php,
	#				  all_portfolio.php,search_portfolio.php
	################################################################################################################

	function Home_Page_2()
	{
		global $db;
		$sql= " SELECT * FROM ".CATEGORY_MASTER
			. " WHERE cat_parent_id = 0  AND cat_status = 1 ORDER BY disp_order ASC "
			." LIMIT 9,9";
		$db->query($sql);
		return ($db->fetch_object());
	}
	
	################################################################################################################
	# Function		: HomeCategory()
	# Purpose		: This function is used to get primary category listing
	# Return		: none
	# Used At 		: edit_userinfo.php,signup.php
	# Parameters	
	# 1. $auth_id =>  member id
	################################################################################################################
	function HomeCategory()
	{
		global $db;
		$sql="SELECT * FROM ".CATEGORY_MASTER
		     ." WHERE cat_parent_id = 0 ORDER BY cat_name ASC  ";
		$db->query($sql);		
	}

	function Get_Category_Listing()
	{
		global $db;
		$sql="SELECT * FROM ".CATEGORY_MASTER
		     ." WHERE cat_parent_id = 0 AND cat_status = 1 ORDER BY disp_order";
		$db->query($sql);		
	}
	
	function GetCategorybyParent($parent_id)
	{
		global $db1;
		$sql="SELECT * FROM ".CATEGORY_MASTER
		     ." WHERE cat_parent_id = '".$parent_id."' AND cat_status = 1  ORDER BY disp_order";
		$db1->query($sql);	
		return ($db1->fetch_object());
	}
	
	################################################################################################################
	# Function		: GetCatName($value)
	# Purpose		: This function is used to get name of category from ID 
	# Return		: category name according to current language
	# Used At 		: viewtaskerprofile.php
	# Parameters	
	# 1. $value =>   id
	################################################################################################################
	function GetCatName($value)
	{
	  global $db1;
	  $sql="SELECT * FROM ".CATEGORY_MASTER
		     ." WHERE cat_id = '".$value."'";
	   $db1->query($sql);
	   $db1->next_record();
	   
	   return ($db1->f('cat_name'));
	}
	
	function GetCatNameByParent($value)
	{
	  global $db1;
	  $sql="SELECT * FROM ".CATEGORY_MASTER
		     ." WHERE cat_parent_id = '".$value."' AND cat_status = 1  ORDER BY disp_order";
			/*." WHERE cat_id = '".$value."' AND cat_status = 1  ORDER BY disp_order";*/
	   $db1->query($sql);
	}
	function GetCat23($id)
	{
	 global $db;
	 $sql = "SELECT * FROM ".project_MASTER." AS PM "
			 ." LEFT JOIN ".CATEGORY_MASTER." AS CM ON CM.cat_id = PM.project_category "
	         ." WHERE PM.project_id = '".$id."'";
	 $db->query($sql);		 
   }
   function HomeCategory_New()
	{
		global $db2;
		$sql="SELECT * FROM ".CATEGORY_MASTER
		     ." WHERE cat_parent_id = 0 ORDER BY cat_name ASC  ";
		$db2->query($sql);		
	}
	
	function Catagory_List()
	{
		global $db1;
		$sql= " SELECT * FROM ".CATEGORY_MASTER
			 ." WHERE cat_parent_id = 0 AND cat_status = 1 ORDER BY cat_name"; 
		$db1->query($sql);
	}
	function GetTaskCount($cdrinfoid,$citycurrent) 
	{
		global $db3;

		$sql= " SELECT * FROM ".PROJECT_MASTER." AS PM "			
			." WHERE FIND_IN_SET('$cdrinfoid',PM.project_category) AND PM.project_status = 1 AND PM.project_city = '$citycurrent'";
		$db3->query($sql);			 

	}		
	function Get_Catagory_List()
	{
		global $db2;
		$sql= " SELECT * FROM ".CATEGORY_MASTER
			 ." WHERE cat_parent_id = 0 AND cat_status = 1 ORDER BY cat_name"; 
		$db2->query($sql);
	}	
 }  
?>