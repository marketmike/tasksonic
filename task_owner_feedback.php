<?php
define('IN_SITE', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/task_owner_feedback.php');
include_once($physical_path['DB_Access']. 'Buyers.php');
include_once($physical_path['DB_Access']. 'Seller.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
// creating objects

$buyer = new Buyers();
$seller = new Seller();


	$buyer->ViewAll_Buyer_Rating($_GET['user']);				
	$rscnt = $db1->num_rows();
	$i=0; 			
	
	while($db1->next_record())
	{
		$arr_rating[$i]['project_title']	 = $db1->f('project_title');
		$arr_rating[$i]['dec']				 = wordwrap( $db1->f('description'), 15, "\n", 1);
		$arr_rating[$i]['clean_title']	 	 = clean_url($db1->f('project_title'));
		$arr_rating[$i]['project_id']		 = $db1->f('project_id');
		$arr_rating[$i]['date_time']		 = $db1->f('date_time');
		$arr_rating[$i]['rating_by_user']	 = $db1->f('rating_by_user');
		$arr_rating[$i]['rating']	   		 = $db1->f('rating');
		$arr_rating[$i]['count']             = $buyer->Total_Ratings_By_Tasker($db1->f('rating_by_user'));
		$i++;
	}	
 	
	
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	
	 					"T_Body"			  => 'task_owner_feedback'. $config['tplEx'],
						"arating"			  => $arr_rating,
						"Loop"				  => $rscnt,
						"user"          	  => $_GET['user'],
						
					));
##############################################################################################
					
   	$ave_rating = number_format($buyer->Average_Buyer_Rating($_GET['user']),2);		
	
	$tpl->assign(array(	
						"ave_rating"		  => $ave_rating,	
				));
	
/* assign language */
	$tpl->assign(array(	
						"TOP_TITLE"           => 	strtoupper($_GET['user']."<BR>"."Buyer's Feedback"),
						"Total_Reviews"       => 	$lang['Total_Reviews'],
						"Average_Rating"      => 	$lang['Average_Rating'],
						"Time"   			  => 	$lang['Time'],
						"seller"    		  => 	$lang['seller'],
						"Rating"    		  => 	$lang['Rating'],
						"Text1"    			  => 	$lang['Text1'],
						"Text2"    			  => 	$lang['Text2'],
				));
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>