<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/category.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);

$category = new Category();

$cats = $category->Catagory_List();

$cnt = $db1->num_rows();
$i = 0;
while($db1->next_record())
{
	$arr_cat[$i]['id']					=	$db1->f('cat_id');
	$arr_cat[$i]['name']				=	$db1->f('cat_name');
	$arr_cat[$i]['desc']				=	$db1->f('cat_desc');
	$arr_cat[$i]['total_projects']		=	$db1->f('total_projects');

##############################################################################################					
/// get count of tasks for each category 
##############################################################################################
	$category->GetTaskCount($db1->f('cat_id'),$citycurrent);
	$arr_cat[$i]['task_count_menu']	  	=	$db3->num_rows();
	$i++;	
}



		$navigation= '<label class=navigation>'.$lang['Category_List1'].'</label>';
	
$tpl->assign(array(	"T_Body"			=>	'category_list'. $config['tplEx'],
					"arr_cat"			=>  $arr_cat,
					"Loop"				=>  $cnt,
					"lang"				=>  $lang,
					"navigation"		=>	$navigation,
					"nav_select"		=>	'categories',					
					
					));

$tpl->display('default_layout'. $config['tplEx']);
?>