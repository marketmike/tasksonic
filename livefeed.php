<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");

$img_path = $virtual_path['Seller_Logo'];
session_start();

$sql="SELECT count(*) as cnt FROM ".LATEST_ACTIVITY." AS LA "
		." WHERE LA.activity_city ='$citycurrent'";
$result = mysql_fetch_assoc(mysql_query($sql));
$total_entries = $result["cnt"];

if($_SESSION["total_activity"] != $total_entries){
$_SESSION["total_activity"];
    $limit = $total_entries - $_SESSION["total_activity"];
	$sql= " SELECT * FROM ".LATEST_ACTIVITY." AS LA "
		 ." WHERE LA.activity_city ='$citycurrent'"
		 ." ORDER BY LA.date DESC "
		 ." LIMIT $limit";	 
    $result = mysql_query($sql);
    if(mysql_num_rows($result)>0){
        while($row = mysql_fetch_assoc($result)){
		$activity_type = $row["activity_type"];
		if($activity_type == 'New Bid' || $activity_type == 'Update Bid' || $activity_type == 'Accepted' || $activity_type == 'Tasker Feedback'){
			$username = $row["tasker"];		
		}else{	
			$username = $row["task_owner"];	
		}	
			
			$fb_connect = Get_FB_ID($username);
			$is_admin = Check_If_Admin($username);
			$img_link = '';
			if ($fb_connect){ 
			$img_url = '<img id="image" src="https://graph.facebook.com/' .$fb_connect . '/picture" width="60" style="vertical-align:middle;" />';		
			}elseif ($is_admin){
			$img_link = 'tasksonic.png';
				if($img_link){
				$img_url = '<img src="' . $img_path . '/thumb_' . $img_link . '" width="60" style="border:1px solid #000" />';
				}else{
				$img_url = '<img src="' . $img_path . 'thumb-default.png" width="60" style="border:1px solid #000" />';
				}			
			}else{
			$userid = Get_User_ID($username);
			$img_link = Get_Profile_Img($userid);
				if($img_link){
				$img_url = '<img src="' . $img_path . '/thumb_' . $img_link . '" width="60" style="border:1px solid #000" />';
				}else{
				$img_url = '<img src="' . $img_path . 'thumb-default.png" width="60" style="border:1px solid #000" />';
				}			
			}
			

			$link = $row["activity_link"];
			$date = time_since(strtotime($row["date"]));
			//$date = time_since(activity_date);
			
            echo '<div id="feed_wrapper">' . $img_url . '<span class="activity_desc">' . $row["description"] . '</span><div class="clear">&nbsp;</div><span class="read_more"><a href="' . $link . '">View Task</a></span><span class="date">' . $date . ' ago</span></div>';
        }
    }
    $_SESSION["total_activity"] = $total_entries;
}
?> 
