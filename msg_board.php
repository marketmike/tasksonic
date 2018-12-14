<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/msg_board.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Buyers.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
// creating objects
$buyer	 = new Buyers();


     
##############################################################################################					
/// get all projects data which are open posted by user
##############################################################################################
if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];

	$result = $buyer->ViewAll_project_task_owner_active($_SESSION['User_Id'],$citycurrent);
	$rscnt = $db->num_rows();
	
	$i=0;
		while($db->next_record())
		{
			$arr_post_project[$i]['id']					  = $db->f('project_id');
			$arr_post_project[$i]['project_Title']		  = $db->f('project_title');
			$arr_post_project[$i]['task_owner']		  	  = $db->f('project_posted_by');
			$arr_post_project[$i]['message_count'] 		  = $buyer->get_message_board_count_by_task($db->f('project_id'));			
			$arr_post_project[$i]['clear_title']		  = clean_url($db->f('project_title'));
			$arr_post_project[$i]['project_Description']  = $db->f('project_description');
			$arr_post_project[$i]['project_status']	      = $db->f('project_status');
			list($arr_post_project[$i]['bid'],$arr_post_project[$i]['Ave_Bid'],$arr_post_project[$i]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db->f('project_id')));
			if($arr_post_project[$i]['bid'] != 0)
			{
			  $arr_post_project[$i]['Ave_Bid1'] = number_format((($arr_post_project[$i]['Ave_Bid'])/($arr_post_project[$i]['bid'])),2);
			}
			$i++;
		}
			/// used for pagination				
			if($_SESSION['total_record'] > $_SESSION['user_page_size'] && $rscnt > 0)
			{
			$tpl->assign(array(	'Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])));	
			}
			$tpl->assign(array(	"T_Body"			=>	'msg_board'. $config['tplEx'],
								"lang"				=>  $lang,	
								"Loop1"				=>	$rscnt,
								"post_project"      =>  $arr_post_project,
								"uid"  => $_SESSION['User_Id'],
							));	
	
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>