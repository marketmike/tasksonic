<?php
class Page
{
    function Page()
    {
		// Do nothing
	}
	#====================================================================================================
	#	This function is uesd for listing
    #   Admin side
	#----------------------------------------------------------------------------------------------------
    function ViewAll()
    {
		global $db;
		$sql = " SELECT * FROM ".PAGE_MASTER." ORDER BY page_id";

		# Show debug info
		$db->query($sql);
		return ($db->fetch_object());
	}
	#====================================================================================================
	#	This function is uesd for getting page details
	#   Admin side
	#----------------------------------------------------------------------------------------------------
    function getPage($page_id)
    {
		global $db;

		$sql = " SELECT * FROM ".PAGE_MASTER
			 . " WHERE page_id =  '". $page_id ."'";

		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	#====================================================================================================
	#	This function is used for adding
	#   Admin side
	#----------------------------------------------------------------------------------------------------
	function Insert($post)
	{
	 
		global $db;
		$sql = 	"INSERT INTO ". PAGE_MASTER. " (page_title, page_content) "
			.	" VALUES ( "
			. 	" '". mysql_real_escape_string($post['page_title'])."', " 
			. 	" '". mysql_real_escape_string($post['en_page_content'])."' " 
			.	" )"; 

		$db->query($sql);
		return $db->sql_inserted_id();
	}
	#====================================================================================================
	#	This function is used for update
	#   Admin side
	#----------------------------------------------------------------------------------------------------
	function Update($post)
    {
		global $db;
		$sql = " UPDATE ".PAGE_MASTER
			 . " SET "
			 . " page_title				=  '". mysql_real_escape_string($post['page_title']) ."', "
			 . " page_content			=  '". mysql_real_escape_string($post['en_page_content']) ."' "
			 . " WHERE page_id  		=  '". $post['page_id'] ."'";
		return ($db->query($sql));
	}
	#====================================================================================================
	#	This function is used for deleting
	#   Admin side
	#----------------------------------------------------------------------------------------------------
    function Delete($page_id)
    {
		global $db;

		$sql = " DELETE FROM ".PAGE_MASTER
			 . " WHERE page_id =  '". $page_id ."'";

		return ($db->query($sql));
	}
}
?>