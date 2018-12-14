<?php
class HomePage
{
    function HomePage()
    {
		// Do nothing
	}
	#====================================================================================================
	#	Function Name	:   ViewAll
	#   Admin Side	
	#----------------------------------------------------------------------------------------------------
    function ViewAll()
    {
		global $db;
		$sql = " SELECT * FROM ".HOMEPAGE_MASTER." ORDER BY home_id";

		# Show debug info
		$db->query($sql);
		return ($db->fetch_object());
	}
	#====================================================================================================
	#	Function Name	:   getPage
	#   User Side
	#----------------------------------------------------------------------------------------------------
    function getPage($home_id)
    {
		global $db;

		$sql = " SELECT * FROM ".HOMEPAGE_MASTER
			 . " WHERE home_id =  '". $home_id ."'";

		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	#====================================================================================================
	#	Function Name	:   Insert
	#   Admin Side	
	#----------------------------------------------------------------------------------------------------
	function Insert($post)
	{
		global $db;
		$sql = 	"INSERT INTO ". HOMEPAGE_MASTER. " (home_title,home_content) "
			.	" VALUES ( "
			. 	" '".	mysql_real_escape_string($post['home_title']).		"', " 
			. 	" '".	mysql_real_escape_string($post['home_content']).	"' " 
			.	" )"; 

		$db->query($sql);
		return $db->sql_inserted_id();
	}
	#====================================================================================================
	#	Function Name	:   Update
	#   Admin Side
	#----------------------------------------------------------------------------------------------------
	function Update($post)
    {
		global $db;
		$sql = " UPDATE ".HOMEPAGE_MASTER
			 . " SET "
			 . " home_title				=  '". mysql_real_escape_string($post['home_title']) ."', "
			 . " home_content			=  '". mysql_real_escape_string($post['en_home_content']) ."' "
			 . " WHERE home_id  		=  '". $post['home_id'] ."'";
		return ($db->query($sql));
	}
	#====================================================================================================
	#	Function Name	:   Delete
	#   Admin Side
	#----------------------------------------------------------------------------------------------------
    function Delete($home_id)
    {
		global $db;

		$sql = " DELETE FROM ".HOMEPAGE_MASTER
			 . " WHERE home_id =  '". $home_id ."'";

		return ($db->query($sql));
	}
	################################################################################################################
	# Function		: ShowHomePage()
	# Purpose		: This function is used for getting homepage details 
	# Return		: Title and Content
	# Used At 		: logged_in_home and logged_out_home
	################################################################################################################
    function ShowHomePage($home_id)
    {
		global $db;
		$sql = " SELECT * FROM ".HOMEPAGE_MASTER
		. " WHERE home_id =  '". $home_id ."' ";
		  $db->query($sql);		
		  return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

}
?>