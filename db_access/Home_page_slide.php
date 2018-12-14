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
		$sql = " SELECT * FROM ".HOMEPAGE_SLIDE_MASTER." ORDER BY slide_id";

		# Show debug info
		$db->query($sql);
		return ($db->fetch_object());
	}
	#====================================================================================================
	#	Function Name	:   getPage
	#   User Side
	#----------------------------------------------------------------------------------------------------
    function getPage($slide_id)
    {
		global $db;

		$sql = " SELECT * FROM ".HOMEPAGE_SLIDE_MASTER
			 . " WHERE slide_id =  '". $slide_id ."'";

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
		$sql = 	"INSERT INTO ". HOMEPAGE_SLIDE_MASTER. " (slide_url,slide_order) "
			.	" VALUES ( "
			. 	" '".	mysql_real_escape_string($post['slide_url']).		"', " 
			. 	" '".	mysql_real_escape_string($post['slide_order']).	"' " 
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
		$sql = " UPDATE ".HOMEPAGE_SLIDE_MASTER
			 . " SET "
			 . " slide_url				=  '". mysql_real_escape_string($post['slide_url']) ."', "
			 . " slide_order			=  '". mysql_real_escape_string($post['slide_order']) ."' "
			 . " WHERE slide_id  		=  '". $post['slide_id'] ."'";
		return ($db->query($sql));
	}
	#====================================================================================================
	#	Function Name	:   Delete
	#   Admin Side
	#----------------------------------------------------------------------------------------------------
    function Delete($slide_id)
    {
		global $db;

		$sql = " DELETE FROM ".HOMEPAGE_SLIDE_MASTER
			 . " WHERE slide_id =  '". $slide_id ."'";

		return ($db->query($sql));
	}
	################################################################################################################
	# Function		: ShowHomePage()
	# Purpose		: This function is used for getting homepage details 
	# Return		: Title and Content
	# Used At 		: logged_in_home and logged_out_home
	################################################################################################################
    function ShowHomePage($slide_id)
    {
		global $db;
		$sql = " SELECT * FROM ".HOMEPAGE_SLIDE_MASTER
		. " WHERE slide_id =  '". $slide_id ."' ";
		  $db->query($sql);		
		  return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}

}
?>