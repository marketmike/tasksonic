<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/private_msg.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Buyers.php');


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
// creating objects
$project = new Project();
$buyer	 = new Buyers();


if($Action=='DeleteSelected')
{
##############################################################################################					
/// delete private message listing data from table 
##############################################################################################
	foreach($_POST['cat_prod'] as $key=>$val)
	{
		$val = $project->Delete_Private_Message($val)?'true':'false';			
	}
##############################################################################################

	header("location: my-account.html");
	exit();
}   

else
{
	
##############################################################################################					
/// get private message listing data from table 
##############################################################################################
if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];	
	
	$reult = $project->Get_Msg_Sender($_SESSION['User_Name']);
	$rscnt = $db->num_rows();	// get num of rows
	$i=0;
		while($db->next_record())		// loop till last record
		{
			$arr_msg_rece[$i]['id']					  = $db->f('pm_id');
			$arr_msg_rece[$i]['project_id']			  = $db->f('project_id');
			$arr_msg_rece[$i]['project_posted_by']	  = $db->f('project_posted_by');
			$arr_msg_rece[$i]['Project_Title']	  	  = $db->f('project_title');
			$arr_msg_rece[$i]['clear_title']	  	  =  clean_url($db->f('project_title'));
			$arr_msg_rece[$i]['Project_Description']  = $db->f('private_msg_desc');
			$arr_msg_rece[$i]['Form'] 				  = $db->f('sender_login_id');
			$arr_msg_rece[$i]['date']	     		  = $db->f('date');
			
			$arr_msg_rece[$i]['allow_delete'] = $project->checkProjectStatus($arr_msg_rece[$i]['project_id']); // Here we check to make sure the project status is 6 or 7 is we are to allow delete
			
			
			
			$i++;
		}
	
		/// used for pagination				
		if($_SESSION['total_record'] > $_SESSION['user_page_size'] && $rscnt > 0)
		{
			$tpl->assign(array(	'Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
							));
		}							
	
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'private_msg'. $config['tplEx'],
						"lang"				=>  $lang,
						"Action"			=>	'Save',
						"JavaScript"	    =>  array("account.js"),
						"arr_msg_rece"      =>  $arr_msg_rece,
						"Loop"				=>  $rscnt,
						"user"              =>  $_SESSION['User_Name'], 
						"Membership_Name"   =>  $_SESSION['Membership_Name'],
						"Buy_Date"   		=>  $_SESSION['Buy_Date'],
						"Finished_Date"   	=>  $_SESSION['Finished_Date'],
						"tab"				=>	4,
						"navigation"		=> '<a href="my-account.html" class=footerlink>'.$lang['My_Account'].'</a>',
						"navigation1"		=> '<label class=navigation>'.$lang['Private_Messages'].'</label>',
					));

}
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>