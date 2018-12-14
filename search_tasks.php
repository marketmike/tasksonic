<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Country.php');
include_once($physical_path['DB_Access']. 'HomePage.php');
include_once($physical_path['DB_Access']. 'task.php');

include_once($physical_path['Site_Lang'].'/search_tasks.php');
include_once($physical_path['Site_Lang'].'/home.php');
// creating objects
$cats 		= new Category();
$country 	= new Country();
$home_page 	= new HomePage();
$proj	 	= new project();

##############################################################################################
##############################################################################################					
/// get project listing data from table for search
##############################################################################################
if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];

$proj->Search_projects($_POST['search_this'], $citycurrent);

$rscntpro = $db->num_rows();// get num of rows

$i=0;
while($db->next_record())// loop till last record
{
	$view_pro[$i]['id']					= $db->f('project_id');
	$view_pro[$i]['status'] 			= $db->f('project_status');
	$view_pro[$i]['project_date'] 		= $db->f('project_posted_date');
	$view_pro[$i]['premium_project'] 	= $db->f('premium_project');
	$view_pro[$i]['title']		        = $db->f('project_title');
	$view_pro[$i]['dec']		        = $db->f('project_description');
	$view_pro[$i]['urgent_project']		= $db->f('urgent_project');
	$view_pro[$i]['membership_id']		= $db->f('membership_id');
	$view_pro[$i]['clear_title']		= clean_url($db->f('project_title'));
	
	list($view_pro[$i]['bid'],$view_pro[$i]['Ave_Bid'],$view_pro[$i]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db->f('project_id')));
	$view_pro[$i]['category']		    =  Get_Cat_Names_project($db->f('project_category'));		// get category name
	
	if($view_pro[$i]['bid'] != 0)
	{
	  $view_pro[$i]['Ave_Bid1'] = number_format((($view_pro[$i]['Ave_Bid'])/($view_pro[$i]['bid'])),2);
	}

	$i++;
}

	/// assing to template
	$tpl->assign(array(	"T_Body"			=>	'search_tasks'. $config['tplEx'],
						"view_project"    	=>	$view_pro,
						"Loop"				=>	$rscntpro,
						"lang"				=>  $lang,
						"Site_Title"        => 	$lang['Browse_project'],
						"Meta_Title"        => 	$lang['Browse_project'],
						"Searched_For"      => $_POST['search_this'],
						"navigation"		=>	'<label class=navigation>'.$lang['Search_project'].'</label>'
				));
				
	/// used for pagination				
	if($_SESSION['total_record'] > $_SESSION['user_page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}
##############################################################################################
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>