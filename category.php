<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/category.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$category = new Category();
$proj = new project();

$sub_cats = $category->GetCatNameByParent($_GET['cat_id']);

$cnt = $db1->num_rows();
$i = 0;
while($db1->next_record())
{
	$arr_cat[$i]['id']					=	$db1->f('cat_id');
	$arr_cat[$i]['name']				=	$db1->f('cat_name');
	$arr_cat[$i]['total_projects']		=	$db1->f('total_projects');
	$i++;
}

$Cate_Name = $category->getTitle($_GET['cat_id']);
$navigationLink = getLinkPath1($_GET['cat_id']);
 $str = $_SERVER['HTTP_REFERER'];
	
	 $str1 = substr(strrchr($str,'/'),1);
		
	if($str1 == 'category_list.php')
	{
		$navigation= '<a href=category_list.php class=footerlink>'.$lang['Category_List1'].'</a>';
		$navigation1 = '<label class=navigation>'.$navigationLink.'</label>';
	}
	else
	{
		$navigation		=  $navigationLink;
	}
$tpl->assign(array(	"T_Body"			=>	'category'. $config['tplEx'],
					"Site_Title"		=>	$Cate_Name." : Tasks Related to ".$Cate_Name."." ,
					"JavaScript"		=>	array('deposit.js'),   
					"lang"				=>	$lang,	 
					"Loop"				=>	$cnt,    
					"arr_cat"    		=>	$arr_cat, 
					"navigation"		=>  $navigation,
					"navigation1"		=>  $navigation1,
					"tab"				=>  4,
					"path"              =>  $virtual_path['Seller_Logo']						
					));
if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];

$results = $proj->GetprojectByCategory($_GET['cat_id'],$citycurrent);

$rscntpro = $db->num_rows();

$i=0;
while($db->next_record())
{
	$view_pro[$i]['id']					= $db->f('project_id');
	$view_pro[$i]['status'] 			= $db->f('project_status');
	$view_pro[$i]['clear_title']		= clean_url($db->f('project_title'));
	$view_pro[$i]['premium_project'] 	= $db->f('premium_project');
	$view_pro[$i]['membership_id'] 		= $db->f('membership_id');
	$view_pro[$i]['project_date'] 		= $db->f('project_posted_date');
	$view_pro[$i]['title']		        = $db->f('project_title');
	$view_pro[$i]['dec']		        = $db->f('project_description');
	$view_pro[$i]['urgent_project']		= $db->f('urgent_project');
	$view_pro[$i]['project_posted_by']	= $db->f('project_posted_by');
	$view_pro[$i]['project_days_open'] 	= date('l F d, Y', strtotime(date("Y-m-d", strtotime($db->f('project_posted_date'))) . " +" . $db->f('project_days_open') . " day"));
	$view_pro[$i]['bidding_time']	 	= date("g:i a", strtotime($db->f('bidding_time')));	
	$view_pro[$i]['completed_by']	 	= date('l F d, Y', strtotime(date("Y-m-d", strtotime($db->f('project_posted_date'))) . " +" . $db->f('completed_by') . " day"));
	$view_pro[$i]['completed_time']	 	= date("g:i a", strtotime($db->f('completed_time')));	
	
	list($view_pro[$i]['bid'],$view_pro[$i]['Ave_Bid'],$view_pro[$i]['Ave_Time']) =  explode(",",Get_Bids_By_Id1($db->f('project_id')));
	$view_pro[$i]['category']		    =  Get_Cat_Names_project($db->f('project_category'));
	$view_pro[$i]['buyer_logo'] 		=  Get_Profile_Img($db->f('auth_id_of_post_by'));	// get profile picture	
	if($view_pro[$i]['bid'] != 0)
	{
	  $view_pro[$i]['Ave_Bid1'] = number_format((($view_pro[$i]['Ave_Bid'])/($view_pro[$i]['bid'])),2);
	}
	$i++;
}
$tpl->assign(array(	"view_project"    		=>	$view_pro,
					"rscntpro"				=>	$rscntpro,
				));
				
				
$cats_details = $category->GetCategory($_GET['cat_id']);	

$total_projects = $cats_details->total_projects;

$tpl->assign(array(	"Dsce_Cats"    	=>	$cats_details->cat_desc,
					"TOP_TITLE"		=>	strtoupper($Cate_Name)."(".$total_projects.")",	
					
					
					"MAIN_CAT"		=>	$Cate_Name,
					
					
					));		
					
	if($_SESSION['total_record'] > $_SESSION['user_page_size'] && $rscntpro > 0)
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record'])
						));
	}
	
	##############################################################################################					
	/// get list of available categories to build right rail menu 
	##############################################################################################

	$category->Get_Catagory_List();
	$cat_cnt = $db2->num_rows();
	$j = 0;

	while($db2->next_record())
	{
		$arr_cat[$j]['id']					=	$db2->f('cat_id');
		$arr_cat[$j]['desc']				=	$db2->f('cat_desc');
		$arr_cat[$j]['total_projects']		=	$db2->f('total_projects');		

	$j++;	
	}
	$tpl->assign(array("arr_cat"  	  		=>	$arr_cat,
						"CatLoop"			=>	$cat_cnt,
						));	
$tpl->display('default_layout'. $config['tplEx']);
?>