<?php

class Country
{
	function Country()
	{}
	
   #===============================================================================================
   # This function is used for listingss
   # Admin Side
   #===============================================================================================   

	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".COUNTRY_MASTER;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		//echo "ps : " . $_SESSION['page_size'] . " -- tot :" . $_SESSION['total_record'];

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".COUNTRY_MASTER." ORDER BY disp_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		//echo $sql; 
		$db->query($sql);
	}
	
   #===============================================================================================
   # This function is used for adding
   # Admin Side
   #===============================================================================================   
	
	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".COUNTRY_MASTER
			." (country_name) "
			." VALUES ('".$post['en_country_name']."' "
			." )";
		$db->query($sql);
	}
   #===============================================================================================
   # This function is used for getting country details 
   # User Side & Admin Side
   #===============================================================================================   

	function GetCountry($country_id)
	{
		
		global $db;
		$sql="SELECT * FROM ".COUNTRY_MASTER
			." WHERE country_id=".$country_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
   #===============================================================================================
   # This function is used for updateing country details for particular Country Id
   # Admin Side
   #===============================================================================================   

	function UpdateCategory($post)
	{
		global $db;
		$sql="UPDATE ".COUNTRY_MASTER
			." SET country_name		='".$post['country_name']."' "
			." WHERE country_id		=".$post['country_id'];
		return($db->query($sql));
	}
	
   #===============================================================================================
   # This function is used for deleting country details for particular Country Id
   # Admin Side
   #===============================================================================================   
	function Delete($country_id)
	{
		global $db;
		$sql="DELETE FROM ".COUNTRY_MASTER
			." WHERE country_id=".$country_id;
		return($db->query($sql));
		
		
	}

	################################################################################################################
	# Function		: GetCountryList()
	# Purpose		: This function is used for getting country details 
	# Return		: none
	# Used At 		: lots of files at both user and admin side
	# Parameters: 
	################################################################################################################

	function GetCountryList()
	{
		global $db;
		$sql= " SELECT * FROM ".COUNTRY_MASTER
			.  " WHERE status	= 1 "
			. " ORDER BY country_name ";
		$db->query($sql);
	}
   #===============================================================================================
   # This function is used for getting country name
   # User Side & Admin Side
   #=============================================================================================== 
	function GetCountryName($country_id)
	{
		global $db1;
		$sql="SELECT * FROM ".COUNTRY_MASTER
			." WHERE country_id=".$country_id;
		$db1->query($sql);
		$db1->next_record();
		return ( $db1->f("country_name") );
	}
	function DisplayOrder_Country($country_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". COUNTRY_MASTER
			.  " SET disp_order 	= '". $display_order. "' "
			.  " WHERE country_id	= '". $country_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	function View_Country_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".COUNTRY_MASTER
	 		  ." ORDER BY disp_order ASC  ";
		$db->query($sql);
	}

}

class State
{
	function State()
	{}
   #===============================================================================================
   # This function is used for listingss
   # Admin Side
   #===============================================================================================   

	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".STATE_MASTER;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		//echo "ps : " . $_SESSION['page_size'] . " -- tot :" . $_SESSION['total_record'];

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".STATE_MASTER." ORDER BY disp_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		//echo $sql; 
		$db->query($sql);
	}

	################################################################################################################
	# Function		: GetStateList()
	# Purpose		: This function is used for getting state details 
	# Return		: none
	# Used At 		: lots of files at both user and admin side
	# Parameters: 
	################################################################################################################

	function GetStateList()
	{
		global $db;
		$sql= " SELECT * FROM ".STATE_MASTER
			.  " WHERE status	= 1 "
			. " ORDER BY state_name ";
		$db->query($sql);
	}
   #===============================================================================================
   # This function is used for getting state name
   # User Side & Admin Side
   #=============================================================================================== 
	function GetStateName($state_id)
	{
		global $db1;
		$sql="SELECT * FROM ".STATE_MASTER
			." WHERE state_id=".$state_id;
		$db1->query($sql);
		$db1->next_record();
		return ( $db1->f("state_name") );
	}
	function GetState($state_id)
	{
		
		global $db;
		$sql="SELECT * FROM ".STATE_MASTER
			." WHERE state_id=".$state_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	function DisplayOrder_State($state_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". STATE_MASTER
			.  " SET disp_order 	= '". $display_order. "' "
			.  " WHERE state_id	= '". $state_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	function View_State_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".STATE_MASTER
	 		  ." ORDER BY disp_order ASC  ";
		$db->query($sql);
	}	
	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".STATE_MASTER
			." (state_name) "
			." VALUES ('".$post['en_state_name']."' "
			." )";
		$db->query($sql);
	}	
	function Update($post)
	{
		global $db;
		$sql="UPDATE ".STATE_MASTER
			." SET state_name		='".$post['state_name']."', "
			." status				='".(int)$post['status']."' "			
			." WHERE state_id		=".$post['state_id'];
		return($db->query($sql));
	}	
}

class City
{
	function City()
	{}
   #===============================================================================================
   # This function is used for listingss
   # Admin Side
   #===============================================================================================   

	function ViewAll()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".CITY_MASTER;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		//echo "ps : " . $_SESSION['page_size'] . " -- tot :" . $_SESSION['total_record'];

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".CITY_MASTER." ORDER BY disp_order ASC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		//echo $sql; 
		$db->query($sql);
	}
	
	################################################################################################################
	# Function		: GetCityList()
	# Purpose		: This function is used for getting city details 
	# Return		: none
	# Used At 		: lots of files at both user and admin side
	# Parameters: 
	################################################################################################################

	function GetCityList()
	{
		global $db;
		$sql= " SELECT * FROM ".City_MASTER
			.  " WHERE status	= 1 "		
			. " ORDER BY city_name ";
		$db->query($sql);
	}
   #===============================================================================================
   # This function is used for getting city name
   # User Side & Admin Side
   #=============================================================================================== 
	function GetCityName($city_id)
	{
		global $db1;
		$sql="SELECT * FROM ".City_MASTER
			." WHERE city_id=".$city_id;
		$db1->query($sql);
		$db1->next_record();
		return ( $db1->f("city_name") );
	}
	function GetCity($city_id)
	{
		
		global $db;
		$sql="SELECT * FROM ".City_MASTER
			." WHERE city_id=".$city_id;
		$db->query($sql);
		return($db->fetch_object(MYSQL_FETCH_SINGLE));
	}	
	function DisplayOrder_City($city_id, $display_order)
	{
		global $db;
		$sql = " UPDATE ". City_MASTER
			.  " SET disp_order 	= '". $display_order. "' "
			.  " WHERE city_id	= '". $city_id. "' ";
		$db->query($sql);
		return ($db->affected_rows());
	}
       
	function View_City_Order()
	{
		global $db;
		$sql= "SELECT * FROM ".City_MASTER
	 		  ." ORDER BY disp_order ASC  ";
		$db->query($sql);
	}	

	function Insert($post)
	{
		global $db;
		$sql="INSERT INTO ".City_MASTER
			." (city_name) "
			." VALUES ('".$post['en_city_name']."' "
			." )";
		$db->query($sql);
	}
	function Update($post)
	{
		global $db;
		$sql="UPDATE ".City_MASTER
			." SET city_name		='".$post['city_name']."', "
			." status				='".(int)$post['status']."' "			
			." WHERE city_id		=".$post['city_id'];
		return($db->query($sql));
	}		
}
?>