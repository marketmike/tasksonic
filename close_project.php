<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/close_project.php');
include_once($physical_path['DB_Access']. 'task.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$proj 		= new project();
if($_POST['Submit'] == $lang['Close_Yes'])
{
	$ret = $proj->Close_project($_POST['project_id']);
	header("location: my-account.html");
	exit();

}
elseif($_POST['Submit'] == $lang['Close_No'])
{
	header("location: my-account.html");
	exit();
}

if($Action == 'ViewAll')
{
    $error = 0;
	$ret = $proj->Getproject($_GET['id']);
	
	if($_SESSION['User_Id'] == $ret->auth_id_of_post_by)
	{ 
		$tpl->assign(array(	"project_name"			=>  $ret->project_title,
							"project_id"			=>  $ret->project_id,
						));
	}
	else
	{
		$error = 1;
	}
	
	$tpl->assign(array("T_Body"				=>	'close_project'. $config['tplEx'],
						"lang"				=>  $lang,
						"error"				=>  $error,
						"navigation"		=>	$navigation,
						"navigation1"		=>	$navigation1,
						"navigation2"		=>	$navigation2, 
					));
	
}
$tpl->display('default_layout'. $config['tplEx']);								
?>